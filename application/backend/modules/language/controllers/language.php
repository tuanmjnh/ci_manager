<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class language extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        //$this->load->model('mdl_language');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('languagePTitle');
        $data['mTitle'] = LKEY::GET('LanguageList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function details() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('languagePTitle');
        $data['mTitle'] = LKEY::GET('languageDetails');
        $data['d'] = $this->mdl_language->get_where($this->tmpluss->segment(-1));
        //Sent data to View
        $data['content'] = $this->load->view('details', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('languageCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('languageUpdate');
        $data['d'] = $this->mdl_language->get_where($_POST['id']);
        $this->load->view('details_modal', $data);
    }

    public function loadAssets() {
        $data['_css'] = array(
            $this->template->AddAsset('css/plugins/dataTables/dataTables.bootstrap.css'),
        );
        $data['_js'] = array(
            $this->template->AddAsset('Scripts/bootstrap-confirmation.js'),
            $this->template->AddAsset('Scripts/TMAjaxTable.js')
        );
        return $data;
    }

    public function data() {
        TMUrl::require_post();
        $where = array('LIFlag' => intval($_POST['stt']));
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_language->get_count($where, $like));
        $thead = array(
            LKEY::GET('languageName'),
            LKEY::GET('languageCode'),
            LKEY::GET('languageISOCode'),
            LKEY::GET('languageCountryCode')
        );
        $tbody = array();
        $qry = $this->mdl_language->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "title" => $row->LVTitle,
                "langcode" => $row->LVLangCode,
                "isocode" => $row->LVISOCode,
                "zipcode" => $row->LVCountryCode,
                "stt" => $row->LIFlag,
                "id" => $row->LIID
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function insert() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(48, 48)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_language->_insert($this->tmpluss->TrimArray($_POST), $images);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function Update() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(48, 48)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_language->_update($this->tmpluss->TrimArray($_POST), $images);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function UpdateStatus() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            if (is_array($_POST['id']))
                foreach ($_POST['id'] as $k => $v)
                    $this->mdl_language->_update_status($v, $_POST['flag']);
            else
                $this->mdl_language->_update_status($_POST['id'], $_POST['flag']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function delete() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgDeleteSuccess');
        try {
            if (is_array($_POST['id']))
                foreach ($_POST['id'] as $k => $v)
                    $this->mdl_language->_delete($v);
            else
                $this->mdl_language->_delete($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function validateForm() {
        //Load library validation form
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_message('required', LKEY::GET('msgRequiredError'));
        $this->form_validation->set_rules('LVTitle', LKEY::GET('languageName'), 'required');
        $this->form_validation->set_rules('LVLangCode', LKEY::GET('languageCode'), 'required|max_length[8]');
        $this->form_validation->set_rules('LIOrder', LKEY::GET('Order'), 'required|is_natural');
        return $this->form_validation->run();
    }

    public function setLanguage() {
        $this->mdl_language->initialization_lang($_GET['lang']);
    }

//if (isset($_SERVER["REQUEST_URI"])) {
//if (stripos($_SERVER["REQUEST_URI"], '/ajax/') === FALSE AND # all ajax controllers
//stripos($_SERVER["REQUEST_URI"], '/facebook_app/) === FALSE AND # all facebook controllers
//stripos($_SERVER["REQUEST_URI"], '/twitter_app/login') === FALSE AND # only login function
//) {
//$config['csrf_protection'] = TRUE;
//} else {
//$config['csrf_protection'] = FALSE;
//}
//} else {
//$config['csrf_protection'] = TRUE;
//}
}
