<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
    }

    public function index() {
        $this->mdl_login->redirect_continue();
        $data['pTitle'] = LKEY::GET('loginCmsPTitle');
        $data['pTitle'] = 'Login';
        $data += $this->loadAssets();
        $this->load->view('login', $data);
    }

    public function logging() {
        $rs = $this->mdl_login->return_continue();
        try {
            if (!$this->validateForm())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            $acc = $this->mdl_login->_logging($this->tmpluss->TrimArray($this->security->xss_clean($_POST)));
            if ($acc === 1)
                throw new Exception('Tài khoản không tồn tại sdgsdg');
            if ($acc === 2)
                throw new Exception('Tài khoản hoặc mật khẩu không đúng');
            echo $rs;
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function logout() {
        try {
            $this->mdl_login->logout();
            echo 'reload';
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function loadAssets() {
        $data['css'] = array(
            $this->template->AddAsset('css/bootstrap.css'),
            $this->template->AddAsset('font-awesome/css/font-awesome.css'),
            $this->template->AddAsset('css/login.css'),
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

    public function validateForm() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('account', LKEY::GET('accountName'), 'required|min_length[4]|max_length[32]|alpha_numeric');
        $this->form_validation->set_rules('password', LKEY::GET('accountPassword'), 'required|min_length[4]|max_length[32]');
        //Set Message
        $this->form_validation->set_message('min_length', LKEY::GET('msgMinLengthError'));
        $this->form_validation->set_message('max_length', LKEY::GET('msgMaxLengthError'));
        $this->form_validation->set_message('alpha_numeric', LKEY::GET('msgAlphaNumericError'));
        return $this->form_validation->run();
    }

}
