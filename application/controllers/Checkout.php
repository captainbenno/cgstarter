<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Checkout extends Public_Controller {

    
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        require_once '../application/libraries/eway-rapid-php-master/include_eway.php'; 

        if(!$this->uri->segment(2)=="guest"){
            if (!$this->session->userdata('logged_in')){
                $this->session->set_userdata('redirect' , '/checkout');
                redirect('/login', 'refresh');
            }
        }


        // load the projects model
        $this->load->model('cart_model');
        $this->load->model('checkout_model');

        // load the users model
        $this->load->model('users_model');
        $this->load->model('transactions_model');

    }


    /**
     * Default
     */
    function index()
    {   
        // reload the new user data and store in session
        $this->user = $this->users_model->get_user($this->user['id']);
        
        $content_data = array(
            'page_title' => 'Cart',
            'cancel_url' => base_url(),
            'cart'       => $this->cart_model->contents(),
            'user'       => $this->user
        );

        $data['content'] = $this->load->view('checkout/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    function complete(){
        if($this->input->get('AccessCode') != null){
            //we have a completed order transactoin, let's take a look at it:
            // Create the eWAY Client
            $client = $this->get_eway_client();
            // Query the transaction result.
            $response = $client->queryTransaction($this->input->get('AccessCode'));

            if(count($response->Transactions) > 0){

                $transactionResponse = $response->Transactions[0];
                
                /*
                    [AuthorisationCode] => 173879
                    [ResponseCode] => 00
                    [ResponseMessage] => A2000
                    [InvoiceReference] => 
                    [TotalAmount] => 2000
                    [TransactionID] => 12779253
                    [TransactionStatus] => 1
                    [BeagleScore] => 0
                */

                $transactionResponse->AuthorisationCode;
                $payment_success = false;

                if ($transactionResponse->TransactionStatus) {
                    $payment_success = true;
                    $order_data = array(
                        'transaction_status'        => 'paid',
                        'payment_transaction_ref'   => $transactionResponse->TransactionID,
                        'payment_auth_code'         => $transactionResponse->AuthorisationCode,
                        'order_status'              => 'payment confirmed',
                        'transaction_date'          => date_create()->format('Y-m-d H:i:s'),
                        'transaction_total'         => $transactionResponse->TotalAmount
                    );                
                } else {
                    $order_data = array(
                        'transaction_status'        => 'payment failure',
                        'payment_transaction_ref'   => $transactionResponse->TransactionID,
                        'order_status'              => 'pending',
                        'transaction_date'          => date_create()->format('Y-m-d H:i:s'),
                        'transaction_total'         => $transactionResponse->TotalAmount
                    );
                }

                $this->db->where('transaction_id', $this->session->transaction_id);
                $this->db->update('transactions', $order_data);

                if ($transactionResponse->TransactionStatus) {
                    $this->send_payment_success_email();
                    $this->cart->destroy();
                }

                $content_data = array(
                    'page_title' => 'Payment',
                    'cancel_url' => base_url(),
                    'payment_success' => $payment_success
                );

                $data['content'] = $this->load->view('checkout/complete', $content_data, TRUE);
                $this->load->view($this->template, $data);     

            } else {
                // take them home... they are lost
                    redirect('/', 'refresh');       
            }
        } else {
            // take them home... they are lost
            redirect('/', 'refresh');
        }
    }

    function send_payment_success_email(){
        $this->load->library('email');

        $this->email->from($this->config->item('order_email_from'));
        $this->email->to($this->session->order_details->email_address);
        $this->email->bcc($this->config->item('order_email_bcc'));

        $this->email->subject('CGStarter - Payment Invoice');

        $cart = $this->cart_model->contents();

        $email_body = '<h1>CGStarter</h1>
        <p>Thankyou for support CG projects through CG Starter, your payment for the following items was successful:</p>


        <table class="table table-striped" border="1">
            <tr>
                <th>Reward</th>
                <th>Qty</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>';
            foreach ($cart as $items){
                $email_body = $email_body.'<tr>
                    <td>
                        <h4>'.$items['name'].'</h4>
                        '.$items['project']['title'].'
                    </td>
                    <td>'.$items['qty'].'</td>
                    <td style="text-align:right">$'.$this->cart->format_number($items['price']).'</td>
                    <td style="text-align:right">$'.$this->cart->format_number($items['subtotal']).'</td>
                </tr>';
            }
            $email_body = $email_body.'<tr>
                <td colspan="2"> </td>
                <td style="text-align:right"><strong>Total</strong></td>
                <td style="text-align:right">$'.$this->cart->format_number($this->cart->total()).'</td>
                </tr>
            </table>

            <p>Your order reference is <strong>'.$this->session->order_ref.'</strong>.</p>

            <p>From everyone here at CGStarter we thank you for supporting the CG community.</p>

                    <p><em>cheers,<br />
                        The CGStarter Team</em></p>';

        $this->email->message($email_body);
        $this->email->send();
    }

    function placeorder(){
        $form_data = $this->input->get();
        $this->load->helper('MY_password');

        // if this is the first time we are registering this order, then do it!.
        if($this->session->order_ref == NULL){

            //if not logged in, then make a user account
            if (!$this->session->userdata('logged_in')){
                //check for an existing account with same email, if so use the userid from that.
                $user = $this->users_model->get_user_by_email($form_data['email']);

                if($user == false){
                    //otherwise create a new account
                    $password = get_random_password();

                    $profile_data = array(
                        'password' => $password,
                        'username' => $form_data['email'],
                        'first_name' => $form_data['first_name'],
                        'last_name' => $form_data['last_name'],
                        'email' => $form_data['email'],
                        'language' => 'ENG'
                    );

                    $this->users_model->create_profile($profile_data);
                    $user = $this->users_model->get_user_by_email($form_data['email']);
                }
                $user_id = $user['id'];
            } else {
                $user_id = $this->session->userdata['logged_in']['id'];
            }

            $order_ref = $this->transactions_model->next_order_id();;
            $order_data = array(
                'user_id' => $user_id,
                'first_name' => $form_data['first_name'],
                'last_name' => $form_data['last_name'],
                'billing_street_address1' => $form_data['billing_street_address1'],
                'billing_street_address2' => $form_data['billing_street_address2'],
                'billing_suburb' => $form_data['billing_suburb'],
                'billing_state' => $form_data['billing_state'],
                'billing_country' => $form_data['billing_country'],
                'billing_postcode' => $form_data['billing_postcode'],
                'delivery_street_address1' => (isset($form_data['delivery_street_address1']) ? $form_data['delivery_street_address1'] : $form_data['billing_street_address1']),
                'delivery_street_address2' =>  (isset($form_data['delivery_street_address2']) ? $form_data['delivery_street_address2'] : $form_data['billing_street_address2']),
                'delivery_suburb' =>  (isset($form_data['delivery_suburb']) ? $form_data['delivery_suburb'] : $form_data['billing_suburb']),
                'delivery_country' =>  (isset($form_data['delivery_country']) ? $form_data['delivery_country'] : $form_data['billing_country']),
                'delivery_state' =>  (isset($form_data['delivery_state']) ? $form_data['delivery_state'] : $form_data['billing_state']),
                'delivery_postcode' =>  (isset($form_data['delivery_postcode']) ? $form_data['delivery_postcode'] : $form_data['billing_postcode']),
                'email_address' => $form_data['email'],
                'order_ref' => $order_ref,
                'order_status' => 'pending'
            );
            
            $this->session->order_ref = $order_ref;
            $this->db->insert('transactions', $order_data);
            $transaction_id = $this->db->insert_id();
            $this->session->transaction_id = $transaction_id;
            $this->session->order_details = $order_data;
        }

        // remove all cart items first
        $this->db->where('transaction_id', $this->session->transaction_id);
        $this->db->delete('transaction_items');

        // add them all back in
        foreach ($this->cart_model->contents() as $items){
             $order_items_data = array(
                'transaction_id' => $this->session->transaction_id,
                'reward_id' => $items['id'],
                'reward_title' => $items['name'],
                'reward_cost' => $items['price'],
                'project_id' => $items['project_reward']['project_id'],
                'project_title' => $items['project']['title']
            );
            $this->db->insert('transaction_items', $order_items_data);
        }

        if($form_data['payment_type']=='eway'){
            $response = $this->create_transaction($this->session->order_details);
            $SharedPaymentUrl = $response->SharedPaymentUrl;
            $AccessCode = $response->AccessCode;

        } else {

            $SharedPaymentUrl = null;
            $AccessCode = null;
        }

        $order_data = array(
            'payment_gateway'    => $form_data['payment_type']
        );

        $this->db->where('transaction_id', $this->session->transaction_id);
        $this->db->update('transactions', $order_data);

        $content_data = array(
            'success' => 'true',
            'payment_url' => $SharedPaymentUrl,
            'access_code' => $AccessCode,
            'order_ref' => $this->session->order_ref
        );
        echo json_encode($content_data);
    }

    function refresh_qty()
    {
        $qty_data = $this->input->post();
        $this->cart_model->update_cart($qty_data);
        $this->index('','update_cart_alert');

    }

    function remove_product($project_reward_id = false)
    {   
        if(is_numeric($project_reward_id)){
            $this->cart_model->remove_from_cart($project_reward_id);
        }
        $this->index('','remove_cart_alert');
    }

    function create_transaction($order_data){
        
        $client = $this->get_eway_client();

        // Transaction details - these would usually come from the application
        $transaction = [
        'Customer' => [
            'FirstName' => $order_data['first_name'],
        //        'LastName' => 'Smith',
            'Street1' => $order_data['billing_street_address1'],
            'Street2' => $order_data['billing_street_address2'],
            'City' => $order_data['billing_suburb'],
            'State' => $order_data['billing_state'],
            'PostalCode' => $order_data['billing_postcode'],
            'Country' => $order_data['billing_country'],
            'Email' => $order_data['email_address']
            ],
            // These should be set to your actual website (on HTTPS of course)
            'RedirectUrl' => "http://$_SERVER[HTTP_HOST]" . dirname($_SERVER['REQUEST_URI']),
            'CancelUrl' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
            'Payment' => [
                'TotalAmount' => ($this->cart->total()*100),
                'InvoiceReference' => $this->session->order_ref
            ]
        ];

        // Submit data to eWAY to get a Shared Page URL
        $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);

        // Check for any errors
        if (!$response->getErrors()) {
          return $response;
        }

        return [ 'SharedPaymentUrl' => NULL, 'AccessCode' => NULL];
    }

     function get_eway_client(){
        if($this->config->item('paymentMode')){
            $apiKey = $this->config->item('testApiKey');
            $apiPassword = $this->config->item('testApiPassword');
            $apiEndpoint = $this->config->item('testApiEndpoint');

        } else {
            $apiKey = $this->config->item('prodApiKey');
            $apiPassword = $this->config->item('prodApiPassword');
            $apiEndpoint = $this->config->item('prodApiEndpoint');           
        }
        // Create the eWAY Client
        $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);
        return $client;
     }


}
