<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        if (index_page()=="index.php"){
//            redirect(base_url().'index.html','refresh');
//        }
        $this->load->library('parser');
        $data = array(
            'page_title' => 'Index web',
            'heading' => 'My Heading',
            'entries' => array(
                array('title' => 'Title 1', 'body' => 'Body 1'),
                array('title' => 'Title 2', 'body' => 'Body 2'),
                array('title' => 'Title 3', 'body' => 'Body 3'),
                array('title' => 'Title 4', 'body' => 'Body 4'),
                array('title' => 'Title 5', 'body' => 'Body 5')
            )
        );

        $this->parser->parse('index', $data);
    }

}
