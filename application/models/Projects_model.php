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
        if($this->config->item('project_seeding') && $this->config->item('project_seeding') == $project_id) {
            $sql = "SELECT orders.email_address AS email,orders.first_name,orders.last_name,UNIX_TIMESTAMP(orders.create_date) AS backer_timestamp,orders.create_date,orders.billing_country
                FROM orders
                INNER JOIN order_items ON order_items.order_id = orders.order_id
                WHERE order_items.project_id = ".$this->db->escape($project_id)."
                GROUP BY order_items.order_id
                UNION
                SELECT email,fullname AS firstname, '' AS last_name, UNIX_TIMESTAMP(order_date) AS backer_timestamp, order_date AS create_date, billing_country
                FROM project_seed
                WHERE project_id = ".$this->db->escape($project_id)."
                ORDER BY create_date DESC";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $this->db->select('orders.email_address AS email,orders.first_name,orders.last_name,UNIX_TIMESTAMP(orders.create_date) AS backer_timestamp,orders.create_date,orders.billing_country');
            $this->db->where('order_items.project_id', $project_id);
            $this->db->join('order_items', 'order_items.order_id = orders.order_id');
            $this->db->order_by('create_date', 'DESC');
            $this->db->group_by('order_items.order_id');
            $query = $this->db->get('orders');
            $return_data = $query->result_array();
            return $return_data;
        }


    }

    /**
     * Count backers
     *
     * @return int
     */
    function count_backers($project_id)
    {

        $this->db->select('count(orders.order_id) AS total');
        $this->db->where('order_items.project_id', $project_id);
        $this->db->join('order_items', 'order_items.order_id = orders.order_id');
        $this->db->group_by('order_items.order_id');
        $query = $this->db->get('orders');
        
        $total_backers = 0;
        if ($query->num_rows()) {
            $total_backers = $query->num_rows();
        }

        if($this->config->item('project_seeding') && $this->config->item('project_seeding') == $project_id){
            $this->db->select('count(*) AS total');
            $this->db->where('project_seed.project_id', $project_id);
            $query = $this->db->get('project_seed');
            $total_backers = $total_backers+$query->row()->total;
        }

        return $total_backers;
    }

     /**
     * Goal Achievement
     *
     * @return int
     */
    function goal_achievement($project_id)
    {

        $this->db->select('sum(reward_cost) AS total, sum(qty) AS total_cnt');
        $this->db->where('projects.project_id', $project_id);
        $this->db->join('orders', 'orders.order_id = order_items.order_id');        
        $this->db->join('projects', 'projects.project_id = order_items.project_id');        
        $query = $this->db->get('order_items');

        $total_cnt = $query->row()->total_cnt;
        $total = $query->row()->total;

        if($this->config->item('project_seeding') && $this->config->item('project_seeding') == $project_id){
            $this->db->select('count(*) AS total_cnt,sum(item_cost) AS total');
            $this->db->where('project_seed.project_id', $project_id);
            $query = $this->db->get('project_seed');

            $total_cnt = $total_cnt+$query->row()->total_cnt;
            $total = $total+$query->row()->total;
        }

        $project = $this->get_project($project_id);
        $goal_type = $project['goal_type'];
        $goal_results = array();

        if($goal_type=='items'){
            $goal_results['achievement_percentage'] = (($total_cnt/$project['goal'])*100);
            $goal_results['achievement_total'] = $total_cnt;
        } else {
            $goal_results['achievement_percentage'] = (($total/$project['goal'])*100);
            $goal_results['achievement_total'] = $total;
        }

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
