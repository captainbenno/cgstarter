<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Misc extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the projects model
        //$this->cart->destroy();

    }


    /**
     * Default
     */
    function about()
    {   
       $content_data = array(
            'page_title' => 'About',
        );

        $data['content'] = $this->load->view('misc/about', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    /**
     * Default
     */
    function privacy()
    {   
       $content_data = array(
            'page_title' => 'About',
        );

        $data['content'] = $this->load->view('misc/privacy', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
    /**
     * Default
     */
    function terms()
    {   
       $content_data = array(
            'page_title' => 'About',
        );

        $data['content'] = $this->load->view('misc/terms', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
    /**
     * Default
     */
    function shipping()
    {   
       $content_data = array(
            'page_title' => 'About',
        );

        $data['content'] = $this->load->view('misc/shipping', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

}
