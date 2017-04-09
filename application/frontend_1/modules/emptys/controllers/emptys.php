<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Emptys extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('mdl_account');
        $data['qry'] = $this->mdl_account->getall();
        $data['mudule']='account';
        $data['content']= $this->load->view('list', $data, TRUE);
        $data['page_title']='Manager accout';
        echo Modules::run('template/content',$data);
        //$this->load->view('list',$data);
        
    }

}