<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

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

        //$this->cart->destroy();

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

            $order_ref = $this->gen_order_ref();

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

            foreach ($this->cart_model->contents() as $items){
                 $order_items_data = array(
                    'transaction_id' => $transaction_id,
                    'reward_id' => $items['id'],
                    'reward_title' => $items['name'],
                    'reward_cost' => $items['price'],
                    'project_id' => $items['project_reward']['project_id'],
                    'project_title' => $items['project']['title']
                );
                $this->db->insert('transaction_items', $order_items_data);
            }
        }


        $content_data = array(
            'success' => 'true',
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

    function gen_order_ref()
    {   
        return time();
    }    

     /**
     * Default
     */

}
