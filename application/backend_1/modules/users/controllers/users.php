<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class users extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_users');
        $this->load->module('roles');
        $this->load->model('mdl_roles');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('accountPTitle|accountUsers');
        $data['mTitle'] = LKEY::GET('accountList|accountUsers');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountCreate|accountUsers');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountUpdate|accountUsers');
        $data['d'] = $this->mdl_users->get_where($_POST['id']);
        $this->load->view('details_modal', $data);
    }

    public function profile_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountProfile|accountUsers');
        $this->load->view('u_profile', $data);
    }

    public function profile() {
        TMUrl::require_post();
        //$rs = LKEY::GET('msgUpdateSuccess');
        $rs = 'reload';
        try {
            $this->load->library('form_validation');
            $this->set_message();
            $this->set_rules_email();
            $this->set_rules_mobile();
            if (!$this->form_validation->run())
                throw new Exception(validation_errors());
            if ($this->mdl_users->_update_profile(TMLib::TrimArray($_POST)) == 'exist')
                throw new Exception(LKEY::GET('msgExist'));
            $this->mdl_login->users_reset();
            echo $rs;
        } catch (Exception $e) {
            //$rs = $e->getMessage();
            echo json_encode($e->getMessage());
        }
        //echo json_encode($rs);
    }

    public function change_password_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountChangePassword|accountUsers');
        $this->load->view('u_change_pass', $data);
    }

    public function change_password() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            $this->load->library('form_validation');
            $this->set_message();
            $this->set_rules_oldPassword();
            $this->set_rules_newPassword();
            if (!$this->form_validation->run())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if ($this->mdl_users->_change_password($this->tmpluss->TrimArray($_POST)) == 1)
                throw new Exception(LKEY::GET('msgPasswordChangeError'));
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function setting_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('settting|accountUsers');
        $this->load->view('u_setting', $data);
    }

    public function setting() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('settting|accountUsers');
        $this->load->view('u_setting', $data);
    }

    public function help_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountHelp|accountUsers');
        $this->load->view('u_help', $data);
    }

    public function help() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountHelp|accountUsers');
        $this->load->view('u_help', $data);
    }

    public function change_picture_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('accountUpdatePicture|accountUsers');
        $this->load->view('u_update_picture', $data);
    }

    public function change_picture() {
        TMUrl::require_post();
        //$rs = LKEY::GET('msgUpdateSuccess');
        $rs = 'reload';
        try {
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            if ($this->mdl_users->_update_images($_POST, $images) == 'exist')
                throw new Exception(LKEY::GET('msgExist'));
            $this->mdl_login->users_reset();
            echo $rs;
        } catch (Exception $e) {
            //$rs = $e->getMessage();
            echo json_encode($e->getMessage());
        }
        //echo json_encode($rs);
    }

    protected function loadAssets() {
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
        $where = array('UDLocked' => intval($_POST['stt']));
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_users->get_count($where, $like)); 
        $thead = array(
            LKEY::GET('accountName'),
            LKEY::GET('rolesName'),
            LKEY::GET('accountLastLogin'),
            LKEY::GET('accountResetPassword')
        );
        $tbody = array();
        $qry = $this->mdl_users->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                'id' => $row->UVID,
                'stt' => $row->UDLocked,
                'account' => $row->UVAccount,
                'rolesName' => $this->tmpluss->getStrArray($row->UVRoles),
                'lastLogin' => ($row->UDLastLogin != NULL ? TMLib::FormatDate2($row->UDLastLogin) : LKEY::GET('emptyField')),
                'changePass' => '<button td-css="ct-reset-password" th-css="ct-reset-password" class="reset_password btn btn-info btn-xs" ' .
                'value="' . $row->UVID . '" ' .
                'data-title="' . LKEY::GET('ConfirmTitle') . '" ' .
                'data-btnoklabel="' . LKEY::GET('ConfirmOk') . '" ' .
                'data-btncancellabel="' . LKEY::GET('ConfirmCancel') . '">' .
                LKEY::GET('accountResetPassword') . '</button>'
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' =>count($qry))));
        echo json_encode($data);
    }

    public function insert() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            $this->load->library('form_validation');
            $this->set_message();
            $this->set_rules_account();
            $this->set_rules_password();
            $this->set_rules_roles();
            $this->set_rules_email();
            $this->set_rules_mobile();
            if (!$this->form_validation->run())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            if ($this->mdl_users->_insert($this->tmpluss->TrimArray($_POST), $images) == 'exist')
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
            $this->load->library('form_validation');
            $this->set_message();
            $this->set_rules_roles();
            $this->set_rules_email();
            $this->set_rules_mobile();
            if (!$this->form_validation->run())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            if ($this->mdl_users->_update($this->tmpluss->TrimArray($_POST), $images) == 'exist')
                throw new Exception(LKEY::GET('msgExist'));
            $this->mdl_login->users_reset();
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
                    $this->mdl_users->_update_status($v, $_POST['flag']);
            else
                $this->mdl_users->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_users->_delete($v);
            else
                $this->mdl_users->_delete($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function reset_password() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgResetPasswordError');
        try {
            $acc = $this->mdl_users->_reset_password($_POST['id']);
            $rs = TMLib::StringFormat(LKEY::GET('msgResetPassword'), array($acc[0], $acc[1]));
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    protected function set_message() {
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_message('is_unique', LKEY::GET('msgExist'));
        $this->form_validation->set_message('min_length', LKEY::GET('msgMinLengthError'));
        $this->form_validation->set_message('max_length', LKEY::GET('msgMaxLengthError'));
        $this->form_validation->set_message('alpha_numeric', LKEY::GET('msgAlphaNumericError'));
    }

    protected function set_rules_account() {
        $this->form_validation->set_rules('UVAccount', LKEY::GET('accountName'), 'required|min_length[4]|max_length[32]|alpha_numeric|is_unique[users.UVAccount.UVID]');
    }

    protected function set_rules_password() {
        $this->form_validation->set_rules('UVPassword', LKEY::GET('accountPassword'), 'required|min_length[4]|max_length[32]');
    }

    protected function set_rules_roles() {
        $this->form_validation->set_rules('UVRoles[]', LKEY::GET('rolesType'), 'required');
    }

    protected function set_rules_email() {
        $this->form_validation->set_rules('UVEmail', LKEY::GET('accountEmail'), 'valid_email|is_unique[users.UVEmail.UVID]');
    }

    protected function set_rules_mobile() {
        $this->form_validation->set_rules('UVMobile', LKEY::GET('accountMobile'), 'is_natural');
    }

    protected function set_rules_oldPassword() {
        $this->form_validation->set_rules('oldPassword', LKEY::GET('accountPasswordOld'), 'required|min_length[6]|max_length[32]');
    }

    protected function set_rules_newPassword() {
        $this->form_validation->set_rules('newPassword', LKEY::GET('accountPasswordNew'), 'required|min_length[6]|max_length[32]');
    }

}
