<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model {

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
        $this->_db = 'transactions';
    }

    function next_order_id(){
        $sql = "
            SELECT transaction_id
            FROM {$this->_db}
            ORDER BY transaction_id DESC
            LIMIT 0,1
        ";
        $query = $this->db->query($sql);
        //return 
        return $this->config->item('order_ref_prefix').($query->row_array()['transaction_id']+1);
    }

}
