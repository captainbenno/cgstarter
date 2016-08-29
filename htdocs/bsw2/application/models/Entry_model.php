<?php defined('BASEPATH') OR exit('No direct script access allowed');


/*
CREATE TABLE `entry` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_album_art_id` int(10) NOT NULL,
  `user_album_id` int(10) NOT NULL,
  `album_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `art_id` int(10) NOT NULL,
  `arrange` int(10) NOT NULL,
  `deleted` int(10) NOT NULL,
  `threadid` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `category` varchar(30) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `image_orig` varchar(255) NOT NULL,
  `image_large` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `givenname` varchar(255) NOT NULL,
  `custom_fields_full_name` varchar(255) NOT NULL,
  `custom_fields_high_res_image` varchar(255) NOT NULL,
  `custom_fields_address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
*/

class Entry_model extends CI_Model
{

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
        $this->_db = 'entry';
    }

    function get_entry_by_index($index,$cat,$status)
    {
        $this->db->where('status', $status);
        $this->db->where('category_title', $cat);
        $this->db->where('image_large !=', '');
        $this->db->limit(1, $index);
        $query = $this->db->get($this->_db);
        $return_data = $query->row_array();
        return $return_data;
    }

    function get_all_categories()
    {
        //   $this->db->where('is_active', 1);
        $this->db->select('category_title');
        $this->db->group_by('category_title', 'DESC');
        $this->db->order_by('category_title', 'ASC');
        $query = $this->db->get($this->_db);
        $return_data = $query->result_array();
        return $return_data;
    }

    function acceptentry($art_id){
        $order_data = array(
            'status'    => 2
        );
        $this->db->where('art_id', $art_id);
        $this->db->update('entry', $order_data);
    }

    function changecat($art_id,$cat){
        $order_data = array(
            'category_title'    => $cat
        );
        $this->db->where('art_id', $art_id);
        $this->db->update('entry', $order_data);
    }



    function rejectentry($art_id){
        $order_data = array(
            'status'    => 1
        );
        $this->db->where('art_id', $art_id);
        $this->db->update('entry', $order_data);
    }

    function entry_exists($art_id)
    {
        $sql = "
            SELECT art_id
            FROM {$this->_db}
            WHERE art_id = " . $this->db->escape($art_id) . "
            LIMIT 1
        ";

        $query = $this->db->query($sql);

        if ($query->num_rows())
        {
            return TRUE;
        }

        return FALSE;
    }

}