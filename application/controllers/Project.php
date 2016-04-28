<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

	 	// load the projects model
        $this->load->model('projects_model');
        // load the language file
        //$this->lang->load('welcome');
    }


    /**
	 * Default
     */
	function index()
	{		
		var_dump($this->projects_model->count_backers(1));
		


		echo "hello world";

	}


	 /**
	 * Default
     */
	function project_by_stub($stub)
	{		        
        $data = $this->includes;
        $this->set_title( 'project' );

        // set content data
        $content_data = array(
            'cancel_url'        => base_url(),
            'project'              => $this->projects_model->get_project_by_stub($stub),

        );
        // load views
        $data['content'] = $this->load->view('project/project_view', $content_data, TRUE);
        $this->load->view($this->template, $data);


	}

}
