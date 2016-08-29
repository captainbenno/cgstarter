<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends API_Controller {

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Default
     */
    public function index()
    {
        $this->lang->load('core');
        $results['error'] = lang('core error no_results');
        display_json($results);
        exit;
    }


    /**
     * Users API - DO NOT LEAVE THIS ACTIVE IN A PRODUCTION ENVIRONMENT !!! - for demo purposes only
     */
    public function changecat()
    {
        $this->load->model('entry_model');
        $art_id = $this->input->get('art_id');
        $cat = $this->input->get('cat');
        // get user data
        $this->entry_model->changecat($art_id,$cat);
        display_json('ok');
        exit;
    }

    public function acceptentry()
    {
        $this->load->model('entry_model');
        $art_id = $this->input->get('art_id');
        // get user data
        $this->entry_model->acceptentry($art_id);
        display_json('ok');
        exit;
    }


    public function rejectentry()
    {
        $this->load->model('entry_model');
        $art_id = $this->input->get('art_id');
        // get user data
        $this->entry_model->rejectentry($art_id);
        display_json('ok');
        exit;
    }

    /**
     * Users API - DO NOT LEAVE THIS ACTIVE IN A PRODUCTION ENVIRONMENT !!! - for demo purposes only
     */
    public function entry()
    {
        $this->load->model('entry_model');

        $cat = $this->input->get('cat');
        $status = $this->input->get('status');
        $index = $this->input->get('index');

        // get user data
        $entry = $this->entry_model->get_entry_by_index($index,$cat,$status);

        if($entry==null){
            $entry = 'end';
        }

        display_json($entry);
        exit;
    }


    /**
     * Users API - DO NOT LEAVE THIS ACTIVE IN A PRODUCTION ENVIRONMENT !!! - for demo purposes only
     */
    public function users()
    {
        // load the users model and admin language file
        $this->load->model('users_model');
        $this->lang->load('admin');

        // get user data
        $users = $this->users_model->get_all();
        $results['data'] = NULL;

        if ($users)
        {
            // build usable array
            foreach($users['results'] as $user)
            {
                $results['data'][$user['id']] = array(
                    'name'   => $user['first_name'] . " " . $user['last_name'],
                    'email'  => $user['email'],
                    'status' => ($user['status']) ? lang('admin input active') : lang('admin input inactive')
                );
            }
            $results['total'] = $users['total'];
        }
        else
            $results['error'] = lang('core error no_results');

        // display results using the JSON formatter helper
        display_json($results);
        exit;
    }
}
