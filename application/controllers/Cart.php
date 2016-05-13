<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

	 	// load the projects model
        $this->load->model('cart_model');

        //$this->cart->destroy();

    }


    /**
	 * Default
     */
	function index($project_reward_id = false , $cart_alert = false)
	{	
        $add_cart_alert = 0;
        $remove_cart_alert = 0;
        $update_cart_alert = 0;
 
        //add to cart
        if(is_numeric($project_reward_id)){
            $this->cart_model->add_to_cart($project_reward_id);
            $add_cart_alert = 1;
        }

        if($cart_alert!=false){
            if($cart_alert == 'remove_cart_alert'){
                $remove_cart_alert = 1;
            }
            if($cart_alert == 'update_cart_alert'){
                $update_cart_alert = 1;
            }
        }

        $content_data = array(
            'page_title' => 'Cart',
            'cancel_url' => base_url(),
            'cart'    => $this->cart_model->contents(),
            'add_cart_alert' => $add_cart_alert,
            'update_cart_alert' => $update_cart_alert,
            'remove_cart_alert' => $remove_cart_alert
        );

        $data['content'] = $this->load->view('cart/index', $content_data, TRUE);
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
