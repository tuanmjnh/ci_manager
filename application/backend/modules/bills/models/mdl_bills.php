<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_bills extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblGroups() {
        return "groups";
    }

    function get_tblItems() {
        return "items";
    }

    function get_groupType() {
        return "billsType";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->get($this->get_tblGroups())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'GDCDate') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by, 'DESC');
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblGroups())->result();
        //return $this->db->last_query();
    }

    function get_order($flag = NULL, $order_by = 'GDCDate') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('GIFlag', $flag);
        return $this->db->where('GVType', $this->get_groupType())
                        ->order_by($order_by, 'DESC')
                        ->get($this->get_tblGroups())->result();
        //$this->db->last_query();
    }

    function get_where($id) {
        $data = $this->db->where('GUID', $id)
                        ->get($this->get_tblGroups())->row();
        $data->products = $this->db->where('IVPlus', $data->GUID)
                        ->get($this->get_tblItems())->result();
        return $data;
    }

    function _insert($mdata, $total, $sdata) {
        $this->db->trans_begin();
        $GUID = $this->_insert_main($mdata, $total);
        foreach ($sdata as $value)
            $this->_insert_sub($GUID, $value);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    function _insert_main($data, $total) {
        $mdata['ApplicationId'] = TM_ApplicaionID;
        $mdata['GUID'] = UUID::NewGuidOrderCode();
        $mdata['LVLangCode'] = $this->mdl_language->langcode();
        $mdata['GVType'] = $this->get_groupType();
        $mdata['GIFlag'] = 1;
        $mdata['GDCDate'] = TMLib::getNow();
        //
        $mdata['GVTitle'] = $data['buyBy'];
        $mdata['GIParentID'] = $data['id'];
        $mdata['SeoLinkSearch'] = $data['membersName'];
        $mdata['SeoKeyword'] = $data['mobile'];
        $mdata['SeoDesc'] = $data['address'];
        $mdata['GVDesc'] = $data['desc'];
        $mdata['SeoTitle'] = $data['discount'];
        //
        $mdata['GVTotalItem'] = $total['TotalProducts'];
        $mdata['GIParentSID'] = $total['TotalQuantity'];
        $mdata['SeoLink'] = $total['TotalPrice'];
        $mdata['SeoPlus'] = $total['Paid'];
        $mdata['SeoLang'] = $total['TotalUnPaid'];
        $mdata['GILevel'] = floatval($total['TotalUnPaid']) > 0 ? 1 : 2;
        $this->db->insert($this->get_tblGroups(), $mdata);
        return $mdata['GUID'];
    }

    function _insert_sub($GUID, $data) {
        $sdata['ApplicationId'] = TM_ApplicaionID;
        $sdata['IUID'] = UUID::NewGuid();
        $sdata['LVLangCode'] = $this->mdl_language->langcode();
        $sdata['IVType'] = $this->get_groupType();
        $sdata['IDCDate'] = TMLib::getNow();
        //
        $sdata['IVPlus'] = $GUID;
        $sdata['IVDesc'] = $data['id'];
        $sdata['IVContent'] = $data['name'];
        $sdata['IVKey'] = $data['key'];
        $sdata['SeoLinkSearch'] = $data['color'];
        $sdata['SeoKeyword'] = $data['size'];
        $sdata['SeoDesc'] = $data['total'];
        $sdata['IVImages'] = $data['quantity'];
        $sdata['IFFPrice'] = $data['fPrice'];
        $sdata['IFLPrice'] = $data['lPrice'];
        $sdata['IVUrl'] = $data['discount'];
        $sdata['IVAuthor'] = $data['attach'];
        $this->db->insert($this->get_tblItems(), $sdata);
    }

    function _update($data) {
        $data['GIFlag'] = isset($data['GIFlag']) ? 1 : 0;
        $data['GDUDate'] = TMLib::getNow();
        $this->db->where('GUID', $data['GUID'])
                ->update($this->get_tblGroups(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblGroups(), array('GIFlag' => $flag));
    }

    function _update_paid($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblGroups(), array('GILevel' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblGroups(), array('GUID' => $data));
    }

}
