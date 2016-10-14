<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    /**
     * @vars
     */
    private $_db;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // define primary table
        //$this->_db = 'project_leaders';
        $this->load->model('project_rewards_model');
        $this->load->model('projects_model');
    }


    /**
     * Add to cart
     *
     * @return array
     */
    function add_to_cart($project_reward_id)
    {
        // get the reward data and add to cart
        $project_reward_data = $this->project_rewards_model->get_reward($project_reward_id);
        if(is_array($project_reward_data)){
            if($project_reward_data['is_active']==1){
                $data = array(
                        'id'      => $project_reward_data['project_reward_id'],
                        'qty'     => 1,
                        'price'   => $project_reward_data['price']+$project_reward_data['shipping'],
                        'name'    => $project_reward_data['title'],
                        'shipping'  => $project_reward_data['shipping']);



                $this->cart->insert($data);

            }
        }

    }

    
    /**
     * Content of cart
     *
     * @return array
     */
    function contents()
    {
        // get the reward data and add to cart
        $cart_items = $this->cart->contents(); 

        $cart_data = array();
        //add project and reward data to cart items
        foreach ($cart_items as $cart_item) {
            $cart_item['project_reward'] = $this->project_rewards_model->get_reward($cart_item['id']);
            $cart_item['project'] = $this->projects_model->get_project($cart_item['project_reward']['project_id']);
            array_push($cart_data, $cart_item);
        }

        return $cart_data;
    }

    /**
     * Remove from cart
     *
     * @return array
     */
    function remove_from_cart($project_reward_id)
    {
        // get the reward data and add to cart
        $this->cart->remove($project_reward_id); 
    }

    /**
     * Update from cart
     *
     * @return array
     */
    function update_cart($cart_data)
    {
        // get the reward data and add to cart
        $this->cart->update($cart_data);
    }
}
