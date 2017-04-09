<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class productGroup extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_productGroup');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('productGroupPTitle');
        $data['mTitle'] = LKEY::GET('productGroupList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('productGroupCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('productGroupUpdate');
        $data['d'] = $this->mdl_productGroup->get_where($_POST['id']);
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
        $where = array('GIFlag' => intval($_POST['stt']));
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_productGroup->get_count($where, $like));
        $thead = array(
            LKEY::GET('GroupTitle'),
            LKEY::GET('Order')
        );
        $tbody = array();
        $qry = $this->mdl_productGroup->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "title" => '<i class="item-level' . $row->GILevel . '">' . $row->GVTitle . '</i>',
                "order" => $row->GIOrder,
                "stt" => $row->GIFlag,
                "id" => $row->GUID
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
            $this->mdl_productGroup->_insert($this->tmpluss->TrimArray($_POST), $images);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function update() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_productGroup->_update($this->tmpluss->TrimArray($_POST), $images);
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
                    $this->mdl_productGroup->_update_status($v, $_POST['flag']);
            else
                $this->mdl_productGroup->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_productGroup->_delete($v);
            else
                $this->mdl_productGroup->_delete($_POST['id']);
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
        $this->form_validation->set_rules('GVTitle', LKEY::GET('membersName'), 'required');
        $this->form_validation->set_rules('GIOrder', LKEY::GET('Order'), 'required|is_natural');
        return $this->form_validation->run();
    }

}
