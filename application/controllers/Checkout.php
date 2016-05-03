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
            'cart'    => $this->cart_model->contents(),
            'user'              => $this->user,
        );

        $data['content'] = $this->load->view('checkout/index', $content_data, TRUE);
        $this->load->view($this->template, $data);
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

     /**
     * Default
     */

}
