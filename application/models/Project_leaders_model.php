<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_leaders_model extends CI_Model {

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

        $this->leader_type = array(
            0 => 'PM',
            1 => 'Marketing',
            2 => 'Admin'
        );

        $this->_db = 'project_leaders';
    }


    /**
     * Get project leaders
     *
     * @return array
     */
    function get_project_leaders($project_id)
    {
      //  $this->output->enable_profiler(TRUE);
        $this->db->select('project_leader_id,leader_type,username,first_name,last_name,email,user_id,leader_profile');
        $this->db->where('project_leaders.project_id', $project_id);
        $this->db->join('users', 'users.id = project_leaders.user_id');        
        $query = $this->db->get($this->_db); 
        $project_leaders = $query->result_array();

        $return_data = array();

        foreach ($project_leaders as $project_leader) {
            $project_leader['leader_type'] = $this->leader_type[$project_leader['leader_type']];
            array_push($return_data, $project_leader);
        }

        return $return_data;
    }
}
