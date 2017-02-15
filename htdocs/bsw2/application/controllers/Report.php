<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->load->model('entry_model');
        $this->lang->load('welcome');
        if ($this->session->userdata('logged_in')['user_type'] == 'Judge') {
            redirect(base_url() . "/judging");
        }

    }


    /**
     * Default
     */
    function index()
    {
        // setup page header data
        $this->load->model('entry_model');
        $this->set_title('Final Judge Report');


        $data = $this->includes;
        $entries = $this->entry_model->get_all_entries_ordered_final();

        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'entries' => $entries
        );

        // load views
        $data['content'] = $this->load->view('report', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    function missing_images()
    {
        // setup page header data
        $this->load->model('entry_model');
        $this->set_title('Final Judge Report');


        $data = $this->includes;
        $entries = $this->entry_model->get_missing_images();

        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'entries' => $entries
        );

        // load views
        $data['content'] = $this->load->view('missing_images', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


}
