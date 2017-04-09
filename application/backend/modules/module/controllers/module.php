<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class module extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_module');
        $this->load->module('roles');
        $this->load->model('mdl_roles');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('modulePTitle');
        $data['mTitle'] = LKEY::GET('moduleList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('moduleCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('moduleUpdate');
        $data['d'] = $this->mdl_module->get_where($_POST['id']);
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
        $where = array('MIFlag' => intval($_POST['stt']));
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_module->get_count($where, $like));
        $thead = array(
            LKEY::GET('moduleName'),
            LKEY::GET('moduleTitle')
        );
        $tbody = array();
        $qry = $this->mdl_module->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "id" => $row->MVID,
                "stt" => $row->MIFlag,
                "moduleName" => '<i class="item-level' . $row->MILevel . '">' . $row->MVTitle . '</i>',
                "moduleTitle" => LKEY::GET($row->MVTitle . 'PTitle|menu' . $row->MVTitle, ' ')
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
            if (($images = $this->tmpluss->upload_image(24, 24)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            if ($this->mdl_module->_insert($this->tmpluss->TrimArray($_POST), $images) == 'exist')
                throw new Exception(LKEY::GET('msgExist'));
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
            if (($images = $this->tmpluss->upload_image(24, 24)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            if ($this->mdl_module->_update($this->tmpluss->TrimArray($_POST), $images) == 'exist')
                throw new Exception(LKEY::GET('msgExist'));
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function updateStatus() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            if (is_array($_POST['id']))
                foreach ($_POST['id'] as $k => $v)
                    $this->mdl_module->_update_status($v, $_POST['flag']);
            else
                $this->mdl_module->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_module->_delete($v);
            else
                $this->mdl_module->_delete($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function validateForm() {
        //Load library validation form
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_message('is_unique', LKEY::GET('msgExist'));

        $this->form_validation->set_rules('MVTitle', LKEY::GET('moduleName'), 'required|is_unique[modules.MVTitle.MVID]');
        $this->form_validation->set_rules('MVUrl', LKEY::GET('moduleUrl'), 'required');
        $this->form_validation->set_rules('MIOrder', LKEY::GET('Order'), 'required|is_natural');
        $this->form_validation->set_rules('MVRoles[]', LKEY::GET('rolesType'), 'required');
        return $this->form_validation->run();
    }

}
