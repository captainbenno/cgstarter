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
        $this->db->order_by('price', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
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
        return $return_data;
    }


}
