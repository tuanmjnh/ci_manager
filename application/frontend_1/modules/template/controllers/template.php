<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Load model
//        $this->load->module('module');
//        $this->load->model('mdl_module');
//        $this->load->module('language');
//        $this->load->model('mdl_language');
//        $this->load->module('login');
//        $this->load->model('mdl_login');
        //$this->mdl_language->initialization_lang();
        //$this->mdl_login->users();
    }

    public function index() {
        //$this->mdl_login->redirect_login();
        $data['content'] = $this->load->view('content', NULL, TRUE);
        //$data['pTitle'] = LKEY::GET('CMSPTitle');
        //$data['_css'] = array(
            //$this->AddAsset('css/plugins/morris/morris-0.4.3.min.css'),
            //$this->AddAsset('css/plugins/timeline/timeline.css'));
        //$data['_js'] = array(
            //$this->AddAsset('Scripts/plugins/morris/raphael-2.1.0.min.js'),
            //$this->AddAsset('Scripts/plugins/morris/morris.js'),
            //$this->AddAsset('Scripts/demo/dashboard-demo.js'));
        $data += $this->getAssets();
        //$data['langdata'] = $this->mdl_language->get_language();
        $this->load->view('main', $data);
    }

    public function content($data) {
        //$this->mdl_login->redirect_login();
        if ($data != NULL) {
            $data += $this->getAssets();
            //$data['langdata'] = $this->mdl_language->get_language();
            $this->load->view('main', $data);
        } else {
            redirect(TM_BASE_URL);
        }
    }

    public function getAssets() {
        $data['css'] = array(
            $this->AddAsset('css/bootstrap.min.css'),
            $this->AddAsset('font-awesome/css/font-awesome.css'),
            $this->AddAsset('css/sb-admin.css'),
            $this->AddAsset('css/plus.css')
        );
        $data['js'] = array(
            $this->AddAsset('Scripts/jquery-1.11.3.min.js'),
            $this->AddAsset('Scripts/jquery.cookie.js'),
            $this->AddAsset('Scripts/bootstrap.min.js'),
            $this->AddAsset('Scripts/plugins/metisMenu/jquery.metisMenu.js'),
            $this->AddAsset('Scripts/sb-admin.js'),
            $this->AddAsset('Scripts/jquery.session.js'),
            $this->AddAsset('Scripts/jquery.validate.min.js'),
            $this->AddAsset('Scripts/additional-methods.min.js'),
            $this->AddAsset('Scripts/TMLibrary.js')
        );
        $data['icon'] = $this->AddAsset('favicon.ico');
        return $data;
    }

    public function AddAsset($data) {
        if (preg_match('/css$/i', $data)) {
            $data = '<link href="' . base_url() . 'assets/' . $data . '" rel="stylesheet">';
        } elseif (preg_match('/js$/i', $data)) {
            $data = '<script type="text/javascript" src="' . base_url() . 'assets/' . $data . '"></script>';
        } elseif (preg_match('/ico$/i', $data)) {
            $data = '<link rel="icon" href="' . base_url() . 'assets/' . $data . '" type="image/x-icon"/>';
        } else {
            $data = '<script type="text/javascript">' . $data . '</script>';
        }
        return $data;
    }

}
