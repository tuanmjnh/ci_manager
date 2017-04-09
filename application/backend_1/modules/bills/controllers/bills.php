<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bills extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_bills');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('BillsPTitle');
        $data['mTitle'] = LKEY::GET('BillsList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('BillsCreate');
        $data['mTitle'] = LKEY::GET('BillsCreate');
        //Sent data to View
        $data['content'] = $this->load->view('create', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function find_members_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('BillsFindMembers');
        $this->load->view('find_members_modal', $data);
    }

    public function data_members() {
        TMUrl::require_post();
        $this->load->module('members');
        $this->load->model('mdl_members');
        $where = array('MBIFlag' => isset($_POST['stt']) ? intval($_POST['stt']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage(
                isset($_POST['page']) ? $_POST['page'] : 1, isset($_POST['limit']) ? $_POST['limit'] : 10, $this->mdl_members->get_count($where, $like));
        $thead = array(
            LKEY::GET('membersName'),
            LKEY::GET('Mobile'),
            LKEY::GET('membersCMND'),
            LKEY::GET('membersType'),
            '#'
        );
        $tbody = array();
        $qry = $this->mdl_members->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "Name" => $row->MBVPropertyNames,
                "Mobile" => $row->MBVMobile,
                "CMND" => $row->MBIPersonId,
                "Type" => $this->mdl_membersType->get_where($row->MBVPlus)->GVTitle,
                "Select" => '<div data-dismiss="modal" value="' . $row->MBVID . '"' .
                'class="btn btn-warning btn-xs choose-items">' .
                '<i class="fa fa-hand-pointer-o"></i> ' . LKEY::GET('Choose') . '</div>',
                "stt" => $row->MBIFlag,
                "id" => $row->MBVID
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function get_members() {
        TMUrl::require_post();
        $this->load->module('members');
        $this->load->model('mdl_members');
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            $rs = $this->mdl_members->get_where($_POST['id']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function find_products_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('BillsFindProducts');
        $this->load->view('find_products_modal', $data);
    }

    public function data_products() {
        TMUrl::require_post();
        $this->load->module('product');
        $this->load->model('mdl_product');
        $where = array('IIFlag' => isset($_POST['stt']) ? intval($_POST['stt']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage(
                isset($_POST['page']) ? $_POST['page'] : 1, isset($_POST['limit']) ? $_POST['limit'] : 10, $this->mdl_product->get_count($where, $like));
        $thead = array(
            LKEY::GET('ProductTitle'),
            LKEY::GET('ProductCode'),
            LKEY::GET('ProductFPrice'),
            LKEY::GET('ProductLPrice'),
            '#'
        );
        $tbody = array();
        $qry = $this->mdl_product->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        $lblColor = LKEY::GET('Color');
        $lblSize = LKEY::GET('Size');
        foreach ($qry as $row) {
            $select = '<div class="fix-check list-none list-sub-item"><ul>';
            $li = '<li><label><input type="checkbox" name="sub_item" value="' . $row->IUID . ',null">' . LKEY::GET('Choose') . '</label></li>';
            foreach ($this->mdl_product->get_where_sub($row->IUID) as $srow) {
                $li = '';
                $btnRadio = '<label class="sub-item"><input type="checkbox" name="sub_item" value="' . $row->IUID . ',' . $srow->SIUID . '">';
                $select.="<li>$btnRadio <span><div>$lblColor: $srow->SIVEmail</div><div>$lblSize:$srow->SIVAuthor</div></span></label></li>";
            }
            $select.=$li . '</ul></div>';
            $tbody [] = array(
                "Title" => $row->IVTitle,
                "Code" => $row->IVKey,
                "FPrice" => $row->IFFPrice,
                "LPrice" => $row->IFLPrice,
                "Select" => $select,
                "stt" => $row->IIFlag,
                "id" => $row->IUID
            );
        }
//        '<div class="fix-check"><label><input type="checkbox" name="products[]" value="' . $row->IUID . '"> '
//                . LKEY::GET('Choose') . '</label></div>'
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function get_products() {
        TMUrl::require_post();
        $this->load->module('product');
        $this->load->model('mdl_product');
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            $items = array();
            foreach ($_POST as $key => $value) {
                $tmp = TMLib::Split($value);
                $items[$key] = array($tmp[0], $tmp[1]);
            }
            $rs = $this->mdl_product->get_where_list($items);
            //$rs = $items;
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function create_modal() {
        TMUrl::require_post();
        //$data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('BillsCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        //$data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('BillsUpdate');
        $data['d'] = $this->mdl_bills->get_where($_POST['id']);
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
        $where = array('GIFlag' => intval($_POST['stt']), 'GILevel' => isset($_POST['paid_status']) ? intval($_POST['paid_status']) : 1);
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_bills->get_count($where, $like));
        $thead = array(
            LKEY::GET('BillsTitle'),
            LKEY::GET('BillsBuyBy'),
            LKEY::GET('membersName'),
            //LKEY::GET('TotalPaid'),
            //LKEY::GET('TotalUnPaid'),
            LKEY::GET('TotalProducts'),
            LKEY::GET('TotalQuantity'),
            LKEY::GET('TotalPrice'),
        );
        $tbody = array();
        $qry = $this->mdl_bills->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "BillsID" => $row->GUID,
                "order" => $row->GVTitle,
                "createDate" => $row->SeoLinkSearch,
                //"totalPaid" => number_format($row->SeoPlus),
                //"totalUnpaid" => number_format($row->SeoLang),
                "totalProducts" => number_format($row->GVTotalItem),
                "totalQuantity" => number_format($row->GIParentSID),
                "totalPrice" => '<span class="bold text-danger">' . number_format($row->SeoLink) . '</span> (' . LKEY::GET('Rates') . ')',
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
            if (!$this->validateForm() || !isset($_POST['members']) || !isset($_POST['products']))
                throw new Exception(LKEY::GET('msgInputError'));
            $members = $this->tmpluss->TrimArray($_POST['members']);
            $products = $_POST['products'];
            $total = $_POST['total'];
            $this->mdl_bills->_insert($members, $total, $products);
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
            $this->mdl_bills->_update($this->tmpluss->TrimArray($_POST), $images);
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
                    $this->mdl_bills->_update_status($v, $_POST['flag']);
            else
                $this->mdl_bills->_update_status($_POST['id'], $_POST['flag']);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function update_paid() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            $this->mdl_bills->_update_paid($_POST['id'], $_POST['flag']);
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
                    $this->mdl_bills->_delete($v);
            else
                $this->mdl_bills->_delete($_POST['id']);
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
        $this->form_validation->set_rules('members[buyBy]', LKEY::GET('BillsBuyBy'), 'required');
        $this->form_validation->set_rules('members[membersName]', LKEY::GET('membersName'), 'required');
        $this->form_validation->set_rules('members[mobile]', LKEY::GET('Mobile'), 'is_natural');
        $this->form_validation->set_rules('products[quantity]', LKEY::GET('Quantity'), 'is_natural');
        return $this->form_validation->run();
    }

}
