<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

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
        $this->set_title('Culling & Re-Cat Centre');

        $data = $this->includes;

        $categories = $this->entry_model->get_all_categories();

        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'categories' => $categories
        );

        // load views
        $data['content'] = $this->load->view('welcome', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}

}
