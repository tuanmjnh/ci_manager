<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class statistical extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_statistical');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('StatisticalPTitle');
        $data['mTitle'] = LKEY::GET('StatisticalList');
        //$data['total_satistic'] = $this->get_bill_statistic();
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('membersTypeCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('membersTypeUpdate');
        $data['d'] = $this->mdl_statistical->get_where($_POST['id']);
        $this->load->view('details_modal', $data);
    }

    public function loadAssets() {
        $data['_css'] = array(
            $this->template->AddAsset('css/plugins/dataTables/dataTables.bootstrap.css'),
            $this->template->AddAsset('css/bootstrap-datetimepicker.min.css'),
        );
        $data['_js'] = array(
            $this->template->AddAsset('Scripts/moment.js'),
            $this->template->AddAsset('Scripts/bootstrap-confirmation.js'),
            $this->template->AddAsset('Scripts/bootstrap-datetimepicker.min.js'),
            $this->template->AddAsset('Scripts/jquery.number.min.js'),
            $this->template->AddAsset('Scripts/TMAjaxTable.js'),
        );
        return $data;
    }

    public function get_bill_statistic() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            $where = array('GIFlag' => isset($_POST['stt']) ? intval($_POST['stt']) : 1);
            $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
            $SDate = isset($_POST['SDate']) ? $_POST['SDate'] . ' 00:00:00' : TMLib::getFirstNow();
            $EDate = isset($_POST['EDate']) ? $_POST['EDate'] . ' 23:59:59' : TMLib::getEndNow();
            //if(isset($_POST['SDate']) && isset($_POST['EDate'])
            if (!$this->validateDate())
                throw new Exception(LKEY::GET('msgInputError'));
            $rs = $this->mdl_statistical->get_bill_statistic_total($SDate, $EDate);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function data() {
        TMUrl::require_post();
        $where = NULL; //array('GIFlag' => intval($_POST['stt']), 'GILevel' => isset($_POST['paid_status']) ? intval($_POST['paid_status']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $SDate = isset($_POST['SDate']) ? $_POST['SDate'] . ' 00:00:00' : TMLib::getFirstNow();
        $EDate = isset($_POST['EDate']) ? $_POST['EDate'] . ' 23:59:59' : TMLib::getEndNow();
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_statistical->get_count($SDate, $EDate, $where, $like));
        $thead = array(
            LKEY::GET('BillsTitle'),
            LKEY::GET('BillsBuyBy'),
            LKEY::GET('membersName'),
            LKEY::GET('TotalProducts'),
            LKEY::GET('TotalQuantity'),
            LKEY::GET('TotalPrice') . ' (' . LKEY::GET('rates') . ')',
            LKEY::GET('Pay'),
        );
        $tbody = array();
        $qry = $this->mdl_statistical->get_limit($SDate, $EDate, $where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "BillsID" => $row->GUID,
                "order" => $row->GVTitle,
                "createDate" => $row->SeoLinkSearch,
                "totalProducts" => number_format($row->GVTotalItem),
                "totalQuantity" => number_format($row->GIParentSID),
                "totalPrice" => '<span class="bold text-danger">' . number_format($row->SeoLink) . '</span>',
                "paid" => $row->GILevel == '1' ?
                        '<span class="fa fa-times-circle text-center text-danger block fs20" title="' . LKEY::GET('UnPaid') . '"></span>' :
                        '<span class="fa fa-check-circle text-center text-success block fs20" title="' . LKEY::GET('Paid') . '"></span>',
                "stt" => $row->GIFlag,
                "id" => $row->GUID
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function data_item() {
        TMUrl::require_post();
        $where = NULL; //array('IIFlag' => isset($_POST['stt']) ? intval($_POST['stt']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $SDate = isset($_POST['SDate']) ? $_POST['SDate'] . ' 00:00:00' : TMLib::getFirstNow();
        $EDate = isset($_POST['EDate']) ? $_POST['EDate'] . ' 23:59:59' : TMLib::getEndNow();
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_statistical->get_count_item($SDate, $EDate, $where, $like));
        $thead = array(
            LKEY::GET('ProductTitle'),
            LKEY::GET('ProductCode'),
            LKEY::GET('Color'),
            LKEY::GET('Size'),
            LKEY::GET('Quantity'),
            LKEY::GET('ProductFPrice') . ' (' . LKEY::GET('rates') . ')',
            LKEY::GET('Discount'),
            LKEY::GET('ProductLPrice') . ' (' . LKEY::GET('rates') . ')',
            LKEY::GET('total') . ' (' . LKEY::GET('rates') . ')',
        );
        $tbody = array();
        $qry = $this->mdl_statistical->get_limit_item($SDate, $EDate, $where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        $lblColor = LKEY::GET('Color');
        $lblSize = LKEY::GET('Size');
        foreach ($qry as $row) {
            $tbody [] = array(
                "Title" => $row->IVContent,
                "Code" => $row->IVKey,
                "color" => $row->SeoLinkSearch,
                "size" => $row->SeoKeyword,
                "quantity" => number_format($row->IVImages),
                "FPrice" => '<span class="bold text-danger">' . number_format($row->IFFPrice) . '</span>',
                "discount" => $row->IVUrl,
                "LPrice" => '<span class="bold text-danger">' . number_format($row->IFLPrice) . '</span>',
                "total" => '<span class="bold text-danger">' . number_format($row->SeoDesc) . '</span>',
                "stt" => $row->IIFlag,
                "id" => $row->IUID
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
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_statistical->_insert($this->tmpluss->TrimArray($_POST), $images);
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
            if (($images = $this->tmpluss->upload_image(128, 128)) == 'error')
                throw new Exception(LKEY::GET('msgUploadError'));
            $this->mdl_statistical->_update($this->tmpluss->TrimArray($_POST), $images);
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
                    $this->mdl_statistical->_update_status($v, $_POST['flag']);
            else
                $this->mdl_statistical->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_statistical->_delete($v);
            else
                $this->mdl_statistical->_delete($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function validateForm() {
        //Load library validation form
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_rules('GVTitle', LKEY::GET('membersName'), 'required');
        $this->form_validation->set_rules('GIOrder', LKEY::GET('Order'), 'required|is_natural');
        return $this->form_validation->run();
    }

    public function validateDate() {
        //Load library validation form
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        $this->form_validation->set_rules('SDate', LKEY::GET('SDate'), 'is_date');
        $this->form_validation->set_rules('EDate', LKEY::GET('EDate'), 'is_date');
        return $this->form_validation->run();
    }

}
