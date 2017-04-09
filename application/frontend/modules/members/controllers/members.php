<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class members extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_members');
        $this->load->module('membersType');
        $this->load->model('mdl_membersType');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('membersPTitle');
        $data['mTitle'] = LKEY::GET('membersList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('membersCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('membersUpdate');
        $data['d'] = $this->mdl_members->get_where($_POST['id']);
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
        $where = array('MBIFlag' => isset($_POST['stt']) ? intval($_POST['stt']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage(
                isset($_POST['page']) ? $_POST['page'] : 1, 
                isset($_POST['limit']) ? $_POST['limit'] : 10, 
                $this->mdl_members->get_count($where, $like));
        $thead = array(
            LKEY::GET('membersName'),
            LKEY::GET('Mobile'),
            LKEY::GET('membersCMND'),
            LKEY::GET('membersType')
        );
        $tbody = array();
        $qry = $this->mdl_members->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "Name" => $row->MBVPropertyNames,
                "Mobile" => $row->MBVMobile,
                "CMND" => $row->MBIPersonId,
                "Type" => $this->mdl_membersType->get_where($row->MBVPlus)->GVTitle,
                "stt" => $row->MBIFlag,
                "id" => $row->MBVID
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
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_members->_insert($this->tmpluss->TrimArray($_POST), $images);
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
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_members->_update($this->tmpluss->TrimArray($_POST), $images);
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
                    $this->mdl_members->_update_status($v, $_POST['flag']);
            else
                $this->mdl_members->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_members->_delete($v);
            else
                $this->mdl_members->_delete($_POST['id']);
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
        $this->form_validation->set_rules('MBVPropertyNames', LKEY::GET('membersName'), 'required');
        $this->form_validation->set_rules('MBVEmail', LKEY::GET('accountEmail'), 'valid_email');
        $this->form_validation->set_rules('MBVMobile', LKEY::GET('accountMobile'), 'is_natural');
        $this->form_validation->set_rules('MBIPersonId', LKEY::GET('membersCMND'), 'is_natural|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('MBVPlus', LKEY::GET('membersType'), 'required');
        return $this->form_validation->run();
    }

}
