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
        $this->load->model('project_news_model');
        $this->load->model('project_leaders_model');
        $this->load->model('project_rewards_model');

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

        $project_data = $this->projects_model->get_project_by_stub($stub);
        $project_data['project_leaders'] = $this->project_leaders_model->get_project_leaders($project_data['project_id']);
        $project_data['project_news'] = $this->project_news_model->get_all_active_news($project_data['project_id']);
        $project_data['backers_total'] = $this->projects_model->count_backers($project_data['project_id']);
        $project_data['project_rewards'] = $this->project_rewards_model->get_active_rewards($project_data['project_id']);
        $project_data['goal_achievement'] = $this->projects_model->goal_achievement($project_data['project_id']);
        $project_data['backers'] = $this->projects_model->get_backers($project_data['project_id']);

        // set content data
        $content_data = array(
            'page_title' => 'Project: '.$project_data['title'],
            'cancel_url' => base_url(),
            'project'    => $project_data,

        );
        // load views
        $data['content'] = $this->load->view('project/project_view', $content_data, TRUE);
        $this->load->view($this->template, $data);


	}

}
