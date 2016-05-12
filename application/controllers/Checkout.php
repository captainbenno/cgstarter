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
        $this->load->model('orders_model');

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

    //complete paypal order
    function paypal(){

        $payment_success = true;

        $content_data = array(
            'page_title' => 'Payment',
            'cancel_url' => base_url(),
            'payment_success' => $payment_success
        );
        $data['content'] = $this->load->view('checkout/complete', $content_data, TRUE);
        $this->load->view($this->template, $data);

    }

    function paypal_ipn(){
        // CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
        // Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
        // Set this to 0 once you go live or don't require logging.
        define("DEBUG", 1);
        // Set to 0 once you're ready to go live
        define("USE_SANDBOX", 1);
        define("LOG_FILE", "../application/controllers/ipn.log");
        // Read POST data
        // reading posted data directly from $_POST causes serialization
        // issues with array data in POST. Reading raw POST data from input stream instead.
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }

        // Post IPN data back to PayPal to validate the IPN data is genuine
        // Without this step anyone can fake IPN data
        if(USE_SANDBOX == true) {
            $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
        } else {
            $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
        }
        $ch = curl_init($paypal_url);
        if ($ch == FALSE) {
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        if(DEBUG == true) {
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        }
        // CONFIG: Optional proxy configuration
        //curl_setopt($ch, CURLOPT_PROXY, $proxy);
        //curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        // Set TCP timeout to 30 seconds
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        // CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
        // of the certificate as shown below. Ensure the file is readable by the webserver.
        // This is mandatory for some environments.
        //$cert = __DIR__ . "./cacert.pem";
        //curl_setopt($ch, CURLOPT_CAINFO, $cert);
        $res = curl_exec($ch);

        if (curl_errno($ch) != 0) // cURL error
            {
            if(DEBUG == true) { 
                error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
            }
            curl_close($ch);
            exit;
        } else {
                // Log the entire HTTP response if debug is switched on.
                if(DEBUG == true) {
                    error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
                    error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
                }
                curl_close($ch);
        }
        // Inspect IPN validation result and act accordingly
        // Split response headers and payload, a better way for strcmp
        $tokens = explode("\r\n\r\n", trim($res));
        $res = trim(end($tokens));

        if (strcmp ($res, "VERIFIED") != 0) {
            // check whether the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your PayPal email
            // check that payment_amount/payment_currency are correct
            // process payment and mark item as paid.
            // assign posted variables to local variables
            //$item_name = $_POST['item_name'];
            //$item_number = $_POST['item_number'];
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $invoice = $_POST['invoice'];
            //$payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            //$receiver_email = $_POST['receiver_email'];
            //$payer_email = $_POST['payer_email'];
            

            $payment_success = true;
            $order_data = array(
                'order_ref'   => $invoice,
                'payment_auth_code'         => '',
                'order_status'              => 'payment confirmed',
                'order_date'          => date_create()->format('Y-m-d H:i:s'),
                'order_total'         => $payment_amount);

            $this->db->where('order_ref', $invoice);
            $this->db->update('orders', $order_data);

            $this->send_payment_success_email($invoice);
            $this->cart->destroy();

            if(DEBUG == true) {
                error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
            }
        } else if (strcmp ($res, "INVALID") == 0) {

            $invoice = $_POST['invoice'];

            $order_data = array(
                'order_status'        => 'payment failure',
                'order_date'          => date_create()->format('Y-m-d H:i:s'));

            $this->db->where('order_ref', $invoice);
            $this->db->update('orders', $order_data);

            // log for manual investigation
            // Add business logic here which deals with invalid IPN messages
            if(DEBUG == true) {
                error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
            }
        }



    }


    // complete eway order
    function complete(){
        if($this->input->get('AccessCode') != null){
            //we have a completed order transactoin, let's take a look at it:
            // Create the eWAY Client
            $client = $this->get_eway_client();
            // Query the order result.
            $response = $client->queryorder($this->input->get('AccessCode'));

            if(count($response->orders) > 0){

                $orderResponse = $response->orders[0];
                
                /*
                    [AuthorisationCode] => 173879
                    [ResponseCode] => 00
                    [ResponseMessage] => A2000
                    [InvoiceReference] => 
                    [TotalAmount] => 2000
                    [orderID] => 12779253
                    [orderStatus] => 1
                    [BeagleScore] => 0
                */

                $orderResponse->AuthorisationCode;
                $payment_success = false;

                if ($orderResponse->orderStatus) {
                    $payment_success = true;
                    $order_data = array(
                        'payment_order_ref'   => $orderResponse->orderID,
                        'payment_auth_code'         => $orderResponse->AuthorisationCode,
                        'order_status'              => 'payment confirmed',
                        'order_date'          => date_create()->format('Y-m-d H:i:s'),
                        'order_total'         => $orderResponse->TotalAmount
                    );                
                } else {
                    $order_data = array(
                        'order_status'        => 'payment failure',
                        'payment_order_ref'   => $orderResponse->orderID,
                        'order_date'          => date_create()->format('Y-m-d H:i:s'),
                        'order_total'         => $orderResponse->TotalAmount
                    );
                }

                $this->db->where('order_id', $this->session->order_id);
                $this->db->update('orders', $order_data);

                if ($orderResponse->orderStatus) {
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

    function send_payment_success_email($order_ref){


        $cart = $this->orders_model->order_by_ref($order_ref);

        $this->load->library('email');

        $this->email->from($this->config->item('order_email_from'));
        $this->email->to($cart['email_address']);
        $this->email->bcc($this->config->item('order_email_bcc'));
        $this->email->subject('CGStarter - Payment Invoice');

        $email_body = '<h1>CGStarter</h1>
        <p>Thankyou for support CG projects through CG Starter, your payment for the following items was successful:</p>


        <table class="table table-striped" border="1">
            <tr>
                <th>Reward</th>
                <th>Qty</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>';

            $items = $cart['items'];

            foreach ($items as $item){
                $email_body = $email_body.'<tr>
                    <td>
                        <h4>'.$item['reward_title'].'</h4>
                        '.$item['project_title'].'
                    </td>
                    <td>'.$items['qty'].'</td>
                    <td style="text-align:right">$'.$this->cart->format_number($item['price']).'</td>
                    <td style="text-align:right">$'.$this->cart->format_number($item['price']*$item-['qty']).'</td>
                </tr>';
            }
            $email_body = $email_body.'<tr>
                <td colspan="2"> </td>
                <td style="text-align:right"><strong>Total</strong></td>
                <td style="text-align:right">$'.'2'.'</td>
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

            $order_ref = $this->orders_model->next_order_id();;
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
            $this->db->insert('orders', $order_data);
            $order_id = $this->db->insert_id();
            $this->session->order_id = $order_id;
            $this->session->order_details = $order_data;
        }

        // remove all cart items first
        $this->db->where('order_id', $this->session->order_id);
        $this->db->delete('order_items');

        // add them all back in
        foreach ($this->cart_model->contents() as $items){
             $order_items_data = array(
                'order_id' => $this->session->order_id,
                'reward_id' => $items['id'],
                'reward_title' => $items['name'],
                'reward_cost' => $items['price'],
                'project_id' => $items['project_reward']['project_id'],
                'project_title' => $items['project']['title']
            );
            $this->db->insert('order_items', $order_items_data);
        }

        if($form_data['payment_type']=='eway'){
            $response = $this->create_order($this->session->order_details);
            $SharedPaymentUrl = $response->SharedPaymentUrl;
            $AccessCode = $response->AccessCode;

        } else {

            $SharedPaymentUrl = null;
            $AccessCode = null;
        }

        $order_data = array(
            'payment_gateway'    => $form_data['payment_type']
        );

        $this->db->where('order_id', $this->session->order_id);
        $this->db->update('orders', $order_data);

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

    function create_order($order_data){
        
        $client = $this->get_eway_client();

        // order details - these would usually come from the application
        $order = [
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
            'orderType' => \Eway\Rapid\Enum\orderType::PURCHASE,
            'Payment' => [
                'TotalAmount' => ($this->cart->total()*100),
                'InvoiceReference' => $this->session->order_ref
            ]
        ];

        // Submit data to eWAY to get a Shared Page URL
        $response = $client->createorder(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $order);

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
