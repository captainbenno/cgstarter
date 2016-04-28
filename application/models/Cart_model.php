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
        $this->load->library('cart');
        $this->load->model('project_rewards_model');
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
                        'price'   => $project_reward_data['price'],
                        'name'    => $project_reward_data['title']
                );

                $this->cart->insert($data); 
            }
        }

    }

    /**
     * Add to cart
     *
     * @return array
     */
    function remove_from_cart($project_reward_id)
    {
        // get the reward data and add to cart
        $project_reward_data = $this->project_rewards_model->get_reward($project_reward_id);
        if(is_array($project_reward_data)){
            if($project_reward_data['is_active']==1){
                $data = array(
                        'id'      => $project_reward_data['project_reward_id'],
                        'qty'     => 1,
                        'price'   => $project_reward_data['price'],
                        'name'    => $project_reward_data['title']
                );

                $this->cart->insert($data); 
            }
        }

    }
}
