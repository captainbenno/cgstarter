<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Selecting extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->load->model('entry_model');
        $this->lang->load('welcome');
    }


    /**
     * Default
     */
    function index()
    {
        // setup page header data
        $this->load->model('entry_model');
        $this->set_title('Selecting');

        $cat = $this->input->get('cat');
        $status = $this->input->get('status');

        $data = $this->includes;
        $categories = $this->entry_model->get_all_categories();
        $entries = $this->entry_model->get_all_entries_ordered($cat,$status);

        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'entries' => $entries,
            'categories' => $categories,
            'current_cat' => $cat,
            'current_status' => $status
        );

        // load views
        $data['content'] = $this->load->view('selecting', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


}
