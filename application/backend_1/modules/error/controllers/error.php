<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class error extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('language');
        $this->load->model('mdl_language');
    }

    function index() {
        $data['pTitle'] = LKEY::GET('error_404_title|-|error_404_deails');
        $data['title'] = LKEY::GET('error_404_title');
        $data['details'] = LKEY::GET('error_404_deails');
        $data += $this->loadAssets();
        $this->load->view('error_general', $data);
        //$this->load->view('error_404', $data);
    }

    function error_404() {
        $data['pTitle'] = LKEY::GET('error_404_title|-|error_404_deails');
        $data['title'] = LKEY::GET('error_404_title');
        $data['details'] = LKEY::GET('error_404_deails');
        $data += $this->loadAssets();
        $this->load->view('error_general', $data);
        //$this->load->view('error_404', $data);
    }

    function error_12() {
        $data['pTitle'] = LKEY::GET('error_12_title|-|error_12_details');
        $data['title'] = LKEY::GET('error_12_title');
        $data['details'] = LKEY::GET('error_12_details');
        $data += $this->loadAssets();
        $this->load->view('error_general', $data);
        //$this->load->view('error_12', $data);
    }

    public function loadAssets() {
        $data['css'] = array(
            $this->template->AddAsset('css/bootstrap.css'),
            $this->template->AddAsset('font-awesome/css/font-awesome.css'),
            $this->template->AddAsset('css/error.css'),
            $this->template->AddAsset('css/plus.css'),
        );
        $data['js'] = array(
            $this->template->AddAsset('Scripts/jquery-1.11.3.min.js'),
            $this->template->AddAsset('Scripts/jquery.cookie.js'),
            $this->template->AddAsset('Scripts/bootstrap.min.js'),
            $this->template->AddAsset('Scripts/jquery.session.js'),
            $this->template->AddAsset('Scripts/jquery.validate.min.js'),
            $this->template->AddAsset('Scripts/additional-methods.min.js'),
            $this->template->AddAsset('Scripts/TMLibrary.js')
        );
        $data['icon'] = $this->template->AddAsset('favicon.ico');
        return $data;
    }

}
