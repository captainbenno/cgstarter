<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

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
        $this->_db = 'orders';
    }

    /**
     * Get all orders
     *
     * @return array
     */
    function get_all_orders()
    {
     //   $this->db->where('is_active', 1);        
   //     $this->db->order_by('end_date', 'DESC');       
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

    function is_order_success($order_ref)
    {
        $this->db->where('order_ref', $order_ref);        
        $query = $this->db->get($this->_db); 
        $data = $query->row_array();
        return $return_data;
    }

    function order_by_ref($order_ref)
    {
      //  $this->output->enable_profiler(TRUE);
        $this->db->select('orders.*');
        $this->db->where('order_ref', $order_ref);
        $query = $this->db->get('orders'); 
        $order = $query->row_array();

        $this->db->select('project_title,project_id,reward_id,reward_cost,reward_title,qty');
        $this->db->where('orders.order_ref', $order_ref);
        $this->db->join('order_items', 'orders.order_id = order_items.order_id');        
        $query = $this->db->get($this->_db); 

        $order_items = $query->result_array();

        $order['items'] = $order_items;

        return $order;
    }

    function next_order_id(){
        $sql = "
            SELECT order_id
            FROM {$this->_db}
            ORDER BY order_id DESC
            LIMIT 0,1
        ";
        $query = $this->db->query($sql);
        //return 
        return $this->config->item('order_ref_prefix').($query->row_array()['order_id']+1);
    }

}