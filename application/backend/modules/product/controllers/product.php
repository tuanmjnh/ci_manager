<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('mdl_product');
        $this->load->module('productGroup');
        $this->load->model('mdl_productGroup');
    }

    public function index() {
        //Load Assets
        $data = $this->loadAssets();
        //Main value page
        $data['pTitle'] = LKEY::GET('ProductPtitle');
        $data['mTitle'] = LKEY::GET('ProductList');
        //Sent data to View
        $data['content'] = $this->load->view('lists', $data, TRUE);
        //Run page in template
        echo Modules::run('template/content', $data);
    }

    public function create_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('ProductCreate');
        $this->load->view('create_modal', $data);
    }

    public function details_modal() {
        TMUrl::require_post();
        $data = $this->loadAssets();
        $data['mTitle'] = LKEY::GET('ProductUpdate');
        $data['d'] = $this->mdl_product->get_where($_POST['id']);
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
        $where = array('IIFlag' => intval($_POST['stt']));
        $like = array('searchKey' => isset($_POST['searchKey']) ? $_POST['searchKey'] : NULL);
        $TMPage = new TMPage($_POST['page'], $_POST['limit'], $this->mdl_product->get_count($where, $like));
        $thead = array(
            LKEY::GET('ProductTitle'),
            LKEY::GET('ProductCode'),
            LKEY::GET('ProductFPrice'),
            LKEY::GET('ProductLPrice'),
            LKEY::GET('Total_Item'),
            LKEY::GET('TotalQuantity')
        );
        $tbody = array();
        $qry = $this->mdl_product->get_limit($where, $TMPage->get_limit(), $TMPage->get_offset(), $like);
        foreach ($qry as $row) {
            $tbody [] = array(
                "Title" => $row->IVTitle,
                "Code" => $row->IVKey,
                "FPrice" => $row->IFFPrice,
                "LPrice" => $row->IFLPrice,
                "TotalItem" => $row->IITotalSubItems,
                "TotalQuantity" => $row->IITotalView,
                "stt" => $row->IIFlag,
                "id" => $row->IUID
            );
        }
        $data = array('thead' => $thead, 'tbody' => $tbody,
            'PageData' => array_merge($TMPage->page_data(), array('Count' => count($qry))));
        echo json_encode($data);
    }

    public function test_image() {
        $file = isset($_FILES['ImageFiles']) ? $_FILES['ImageFiles'] : NULL;
        //$_FILES['ImageFiles']['error'] 
        $rs = 'tuanmjnh';
        foreach ($_FILES as $key => $value) {
            $rs.=$key . ', ';
            echo json_encode($_FILES[$key]);
        }

        echo json_encode($rs);
    }

    public function insert() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgCreateSuccess');
        try {
            if (!$this->validateForm())
                throw new Exception(validation_errors()); //throw new Exception(LKEY::GET('msgInputError'));
            $post = $this->tmpluss->TrimArray($_POST);
            $sdata = array();
//            $Quantity = TMLib::Split($post['Quantity']);
//            $Origin = TMLib::Split($post['Origin']);
//            $Color = TMLib::Split($post['Color']);
//            $Size = TMLib::Split($post['Size']);
            for ($i = 1; $i <= intval($post['sub_items']); $i++) {
                if (isset($post['Quantity' . $i])&& intval($post['Quantity' . $i]) && isset($_FILES['ImageFiles' . $i])) {
                    $tmp = $this->tmpluss->upload_multiple_image('ImageFiles' . $i, 256, 256);
                    $images = ',';
                    if (count($tmp['error']) < 1)
                        $images = $tmp['images'];
                    $sdata[] = array(
                        'Quantity' => $post['Quantity' . $i],
                        'Origin' => $post['Origin' . $i],
                        'Color' => $post['Color' . $i],
                        'Size' => $post['Size' . $i],
                        'Images' => $images);
                }//GIParentID
            }
            //echo json_encode($sdata);
            $this->mdl_product->_insert($post, $sdata);
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
            $post = $this->tmpluss->TrimArray($_POST);
            $sdata = array();
            for ($i = 1; $i <= intval($post['sub_items']); $i++) {
                if (isset($post['Quantity' . $i]) && intval($post['Quantity' . $i]) && isset($_FILES['ImageFiles' . $i])) {
                    $tmp = $this->tmpluss->upload_multiple_image('ImageFiles' . $i, 256, 256);
                    $images = ',';
                    if (count($tmp['error']) < 1)
                        $images = $tmp['images'];
                    $sdata[] = array(
                        'SIUID' => isset($post['SIUID' . $i]) ? $post['SIUID' . $i] : NULL,
                        'Quantity' => $post['Quantity' . $i],
                        'Origin' => $post['Origin' . $i],
                        'Color' => $post['Color' . $i],
                        'Size' => $post['Size' . $i],
                        'Images' => $images);
                }
            }
            $this->mdl_product->_update($post, $sdata);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function remove_sub_item() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            $post = TMLib::Split($_POST['id']);
            $this->mdl_product->_remove_sub_item($post);
        } catch (Exception $e) {
            $rs = $e->getMessage();
        }
        echo json_encode($rs);
    }

    public function remove_images() {
        TMUrl::require_post();
        $rs = LKEY::GET('msgUpdateSuccess');
        try {
            $post = TMLib::Split($_POST['id']);
            $this->mdl_product->_remove_images($post[0], $post[1]);
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
                    $this->mdl_product->_update_status($v, $_POST['flag']);
            else
                $this->mdl_product->_update_status($_POST['id'], $_POST['flag']);
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
                    $this->mdl_product->_delete($v);
            else
                $this->mdl_product->_delete($_POST['id']);
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
        $this->form_validation->set_message('numeric', LKEY::GET('msgDecimalError'));
        $this->form_validation->set_rules('Title', LKEY::GET('ProductTitle'), 'required');
        $this->form_validation->set_rules('Code', LKEY::GET('ProductCode'), 'required');
        $this->form_validation->set_rules('FPrice', LKEY::GET('ProductFPrice'), 'required|numeric');
        $this->form_validation->set_rules('LPrice', LKEY::GET('ProductLPrice'), 'numeric');
        $this->form_validation->set_rules('Orders', LKEY::GET('Order'), 'required|is_natural');
        //$this->form_validation->set_rules('Quantity[]', LKEY::GET('Quantity'), 'required|is_natural');
        return $this->form_validation->run();
    }

}
