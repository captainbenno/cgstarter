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
        $this->db->select('author_id,title,teaser_image,teaser_text,create_date,description,username,first_name,last_name,email');
        $this->db->where('is_active', 1);        
        $this->db->where('project_id', $project_id);
        $this->db->join('users', 'users.id = project_news.author_id');        
        $this->db->order_by('create_date', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->result_array();
        return $return_data;
    }

    /**
     * Get all active news by project
     *
     * @return array
     */
    function get_all_news($limit, $offset, $filters, $sort, $dir)
    {
        $query = $this->db->get($this->_db); 
        if ($query->num_rows() > 0)
        {
            $results['results'] = $query->result_array();
        }
        else
        {
            $results['results'] = NULL;
        }

        $sql = "SELECT FOUND_ROWS() AS total";
        $query = $this->db->query($sql);
        $results['total'] = $query->row()->total;
        return $results;
    }

    /**
     * Get news
     *
     * @return array
     */
    function get_news($project_news_id)
    {
        $this->db->select('project_news_id,author_id,title,teaser_image,teaser_text,create_date,description,username,first_name,last_name,email');
        $this->db->where('project_news_id', $project_news_id);        
        $this->db->join('users', 'users.id = project_news.author_id');        
        $this->db->order_by('create_date', 'DESC');       
        $query = $this->db->get($this->_db); 
        $return_data = $query->result_array();
        return $return_data;
    }    

     function edit_news($form_data = array())
    {

        $data = array(
        'title' => $form_data['title'],
        'description' => $form_data['description']
        );

        $this->db->where('project_news_id', $form_data['project_news_id']);
       $success = $this->db->update('project_news', $data);

        return true;
    }

 /**
     * Add a new user
     *
     * @param  array $data
     * @return mixed|boolean
     */
    function add_news($data = array())
    {

        if ($data)
        {

            $sql = "
                INSERT INTO {$this->_db} (
                    title,
                    description,
                    project_id,
                    create_date,
                    is_active,
                    author_id
                ) VALUES (
                    " . $this->db->escape($data['title']) . ",
                    " . $this->db->escape($data['description']) . ",
                    1,
                    '" . date('Y-m-d H:i:s') . "',
                    1,
                    " . $this->session->userdata['logged_in']['id'] . "
                )
            ";

            $this->db->query($sql);

            if ($id = $this->db->insert_id())
            {
                return $id;
            }
        }

        return FALSE;
    }

}
