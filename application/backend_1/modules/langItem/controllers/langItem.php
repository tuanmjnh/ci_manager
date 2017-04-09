<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class langItem extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_langItem');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('langitemPTitle');
        $data['mTitle'] = LKEY::GET('LangItemList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function details() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('LangItemPTitle');
        $data['mTitle'] = LKEY::GET('LangItemDeails');
        $data['d'] = $this->mdl_langItem->get_where($this->tmpluss->segment(-1));
        //Sent data to View
        $data['content'] = $this->load->view('details', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('LangItemCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('LangItemUpdate');
        $data['d'] = $this->mdl_langItem->get_where($_POST['id']);
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
        $where = array('LIID' => $this->mdl_language->langid());
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_langItem->get_count($where, $like));
        $thead = array(
            LKEY::GET('LangItemKey'),
            LKEY::GET('LangItemValue')
        );
        $tbody = array();
        $qry = $this->mdl_langItem->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "key" => $row->LKVTitle,
                "value" => $row->LIVTitle,
                "id" => $row->LKIID
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function insert() {
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(LKEY::GET('msgInputError'));
            $this->mdl_langItem->_insert($this->tmpluss->TrimArray($_POST));
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function Update() {
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(LKEY::GET('msgInputError'));
            $this->mdl_langItem->_update($this->tmpluss->TrimArray($_POST));
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function UpdateStatus() {
        $rs = LKEY::GET('msgDeleteSuccess');
        try {
            if (is_array($_POST['id']))
                foreach ($_POST['id'] as $k => $v)
                    $this->mdl_langItem->_delete($v);
            else
                $this->mdl_langItem->_delete($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode(is_array($_POST['id']));
    }

    public function validateForm() {
        //Load library validation form
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_rules('LKVTitle', LKEY::GET('LangItemKey'), 'required');
        $this->form_validation->set_rules('LIVTitle', LKEY::GET('LangItemValue'), 'required');
        return $this->form_validation->run();
    }

}
