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
        $return_data = $query->result_array();
        return $return_data;
    }

    /**
     * Get all active projects
     *
     * @return array
     */
    function get_all_projects()
    {
     //   $this->db->where('is_active', 1);        
        $this->db->order_by('end_date', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->result_array();
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
        $return_data['seconds_remaining'] = $this->seconds_remaining($return_data['end_date']);
        return $return_data;
    }

    /**
     * Get all backers
     *
     * @return array
     */
    function get_backers($project_id)
    {
        $this->db->select('id,username,first_name,last_name,email,UNIX_TIMESTAMP(create_date) AS backer_timestamp,create_date');
        $this->db->where('project_rewards.project_id', $project_id);
        $this->db->join('users', 'users.id = project_rewards_join_backers.user_id');        
        $this->db->join('project_rewards', 'project_rewards.project_reward_id = project_rewards_join_backers.reward_id');        
        $this->db->order_by('', 'DESC');     
        $query = $this->db->get('project_rewards_join_backers'); 
        $return_data = $query->result_array();
        return $return_data;

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

     /**
     * Goal Achievement
     *
     * @return int
     */
    function goal_achievement($project_id)
    {

        $this->db->select('sum(reward_cost) AS total');
        $this->db->where('projects.project_id', $project_id);
        $this->db->join('orders', 'orders.order_id = order_items.order_id');        
        $this->db->join('projects', 'projects.project_id = order_items.project_id');        
        $query = $this->db->get('order_items'); 

        $project = $this->get_project($project_id);

        $goal_results = array();
        $goal_results['achievement_percentage'] = (($query->row()->total/$project['goal'])*100);
        $goal_results['achievement_dollars'] = $query->row()->total;

        return $goal_results;
    }

    function seconds_remaining($end_date)
    {
        $end_date_timestamp = strtotime($end_date);
        $current_timestamp = now();
        return $current_timestamp - $end_date_timestamp;
    }

#
}
