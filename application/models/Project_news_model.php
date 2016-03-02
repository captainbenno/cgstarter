<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_news_model extends CI_Model {

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
        $this->_db = 'project_news';
    }


    /**
     * Get all active news by project
     *
     * @return array
     */
    function get_all_active_news($project_id)
    {
        $this->db->where('is_active', 1);        
        $this->db->where('project_id', $project_id);        
        $this->db->order_by('create_date', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
        return $return_data;
    }

    /**
     * Get news
     *
     * @return array
     */
    function get_news($project_news_id)
    {
        $this->db->where('project_news_id', $project_news_id);        
        $query = $this->db->get($this->_db); 
        $return_data = $query->row_array();
        return $return_data;
    }    

}
