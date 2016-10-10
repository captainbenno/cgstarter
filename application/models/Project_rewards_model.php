<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_rewards_model extends CI_Model {

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
        $this->_db = 'project_rewards';
    }



    /**
     * Get all active rewards by project
     *
     * @return array
     */
    function get_active_rewards($project_id)
    {
        $this->db->where('is_active', 1);
        $this->db->where('project_id', $project_id);
        $this->db->order_by('price', 'ASC');
        $query = $this->db->get($this->_db);
        $return_data = $query->result_array();
        foreach ($return_data as $key => $value) {
            $return_data[$key]['sold'] = $this->get_rewards_sold_count($value['project_reward_id']);
            if($this->config->item('project_seeding') && $this->config->item('project_seeding') == $project_id){
                $return_data[$key]['sold'] = $return_data[$key]['sold']+$this->get_rewards_sold_count_seeded($value['project_reward_id']);
            }

        }

        return $return_data;
    }

    /**
     * Get reward
     *
     * @return array
     */
    function get_reward($project_reward_id)
    {
        $this->db->where('project_reward_id', $project_reward_id);
        $query = $this->db->get($this->_db);
        $return_data = $query->row_array();
        $return_data['sold'] = $this->get_rewards_sold_count($project_reward_id);
        return $return_data;
    }

    /**
     * Get get_rewards_sold_count
     *
     * @return int
     */
    function get_rewards_sold_count($project_reward_id)
    {
        $this->db->select('count(*) AS total');
        $this->db->where('order_items.reward_id', $project_reward_id);
        $query = $this->db->get('order_items');
        return $query->row()->total;
    }

    // get seeding data
    function get_rewards_sold_count_seeded($project_reward_id)
    {
        $this->db->select('count(*) AS total');
        $this->db->where('project_seed.item_id', $project_reward_id);
        $query = $this->db->get('project_seed');
        return $query->row()->total;
    }


}
