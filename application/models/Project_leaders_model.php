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

        $this->db->where('project_leaders.project_id', $project_id);
        $this->db->join('users', 'users.id = project_leaders.user_id');        
        $return_data = $query->row_array();
        return $return_data
    }
}
