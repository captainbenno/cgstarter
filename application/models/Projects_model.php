<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {

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
        $this->_db = 'projects';
    }


    /**
     * Get all active projects
     *
     * @return array
     */
    function get_active_projects()
    {
        $this->db->where('is_active', 1);        
        $this->db->order_by('end_date', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
        return $return_data;
    }

    /**
     * Get project by id
     *
     * @return array
     */
    function get_project($project_id)
    {
        $this->db->where('project_id', $project_id);        
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
        return $return_data;
    }


    /**
     * Get project by stub
     *
     * @return array
     */
    function get_project_by_stub($stub)
    {

        $this->db->where('stub', $stub);        
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
        return $return_data;
    }

    /**
     * Get all backers
     *
     * @return array
     */
    function get_backers($project_id)
    {
       
    }

    /**
     * Count backers
     *
     * @return int
     */
    function count_backers($project_id)
    {
      //  $this->output->enable_profiler(TRUE);
       // $this->db->count_all_results();
        $this->db->select('count(*) AS total');
        $this->db->where('project_rewards.project_id', $project_id);
        $this->db->join('project_rewards', 'project_rewards.project_reward_id = project_rewards_join_backers.reward_id');        
        $query = $this->db->get('project_rewards_join_backers'); 
        return $query->row()->total;
    }

#
}
