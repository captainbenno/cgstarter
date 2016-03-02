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
		var_dump($this->projects_model->get_project_by_stub($stub));

		echo "hello world";

	}

}
