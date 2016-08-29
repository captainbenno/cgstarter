<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Judging extends Public_Controller {

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
        $this->set_title('Judging');

        $cat = $this->input->get('cat');

        $data = $this->includes;

        $entries = $this->entry_model->get_all_entries_judging($cat);

        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'entries' => $entries
        );

        // load views
        $data['content'] = $this->load->view('judging', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}

}
