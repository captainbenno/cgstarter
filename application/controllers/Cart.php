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
        $this->load->library('cart');
        // load the language file
        //$this->lang->load('welcome');
    }


    /**
	 * Default
     */
	function index($cart_data = false)
	{	
        //add to cart
        if(is_numeric($cart_data)){
            $project_reward_id = $cart_data;
            $this->cart_model->add_to_cart($project_reward_id);
        }

        //del from cart

        var_dump(preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/', $cart_data));

        if(preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/', $cart_data)){
            echo "UUID";
        }

        if(strlen($cart_data) == 32){ //possibly a UUID 
            $project_reward_id = $cart_data;
            $this->cart_model->add_to_cart($project_reward_id);
        }

        echo "<xmp>";
        print_r($this->cart->contents());
        echo "</xmp>";

	}


	 /**
	 * Default
     */

}
