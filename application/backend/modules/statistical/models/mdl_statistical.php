<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_statistical extends CI_Model {

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

    function get_count($SDate, $EDate, $where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like['searchKey'] != NULL)
            $this->db->like('GUID', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType())
                ->where('GDCDate >=', $SDate)
                ->where('GDCDate <=', $EDate);
        return $this->db->get($this->get_tblGroups())->num_rows();
    }

    function get_limit($SDate, $EDate, $where, $limit, $offset, $like = NULL, $order_by = 'GDCDate') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like['searchKey'] != NULL)
            $this->db->like('GUID', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType())
                ->where('GDCDate >=', $SDate)
                ->where('GDCDate <=', $EDate);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblGroups())->result();
        //return $this->db->last_query();
    }

    function get_count_item($SDate, $EDate, $where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like['searchKey'] != NULL)
            $this->db->like('IVTitle', $like['searchKey']);
        $this->db->where('IVType', $this->get_groupType())
                ->where('IDCDate >=', $SDate)
                ->where('IDCDate <=', $EDate);
        return $this->db->get($this->get_tblItems())->num_rows();
    }

    function get_limit_item($SDate, $EDate, $where, $limit, $offset, $like = NULL, $order_by = 'IDCDate') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like['searchKey'] != NULL)
            $this->db->like('IVTitle', $like['searchKey']);
        $this->db->where('IVType', $this->get_groupType())
                ->where('IDCDate >=', $SDate)
                ->where('IDCDate <=', $EDate);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblItems())->result();
        //return $this->db->last_query();
    }

    function get_order($flag = NULL, $order_by = 'GIOrder') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('GIFlag', $flag);
        return $this->db->where('GVType', $this->get_groupType())
                        ->order_by($order_by)
                        ->get($this->get_tblGroups())->result();
        //$this->db->last_query();
    }

    function get_where($id) {
        return $this->db->where('GUID', $id)
                        ->where('GVType', $this->get_groupType())
                        ->get($this->get_tblGroups())->row();
    }

    public function get_bill_statistic_total($SDate, $EDate, $where = null) {
//        if ($where != null)
//            $this->db->where($where);
//        $data->total_item = $this->db->select('IUID,count(*) AS total_item')
//                        ->where('IVType', $this->get_groupType())
//                        ->like('IDCDate', $date)
//                        ->get($this->get_tblItems())->row()->total_item;
        $qry_bill_unpaid = $this->db->select('COUNT(*) AS total_bill_unpaid')
                        ->where('GVType', $this->get_groupType())
                        ->where('GILevel', 1)
                        //->like('GDCDate', $date)
                        ->where('GDCDate >=', $SDate)
                        ->where('GDCDate <=', $EDate)
                        ->get($this->get_tblGroups())->row()->total_bill_unpaid;
        $qry_bill_paid = $this->db->select('COUNT(*) AS total_bill_paid')
                        ->where('GVType', $this->get_groupType())
                        ->where('GILevel', 2)
                        //->like('GDCDate', $date)
                        ->where('GDCDate >=', $SDate)
                        ->where('GDCDate <=', $EDate)
                        ->get($this->get_tblGroups())->row()->total_bill_paid;
        $data = $this->db->select('SUM(GVTotalItem) AS total_item,'
                                . 'SUM(GIParentSID) AS total_quantity,'
                                . 'SUM(SeoLink) AS total_price,'
                                . 'SUM(SeoPlus) AS total_paid,'
                                . 'SUM(SeoLang) AS total_upaid')
                        ->where('GVType', $this->get_groupType())
                        //->like('GDCDate', $date)
                        ->where('GDCDate >=', $SDate)
                        ->where('GDCDate <=', $EDate)
                        ->get($this->get_tblGroups())->row();
//        $data = '';
//        //total item
//        $data->total_item = $tmp->GVTotalItem;
//        //total quantity
//        $data->total_quantity = $tmp->GIParentSID;
//        //total Price
//        $data->total_price = $tmp->SeoLink;
//        //total paid
//        $data->total_paid = $tmp->SeoPlus;
//        //total unpaid
//        $data->total_upaid = $tmp->SeoLang;
        //total bill paid
        $data->total_bill_paid = $qry_bill_paid;
        //total bill unpaid
        $data->total_bill_upaid = $qry_bill_unpaid;
        return $data;
        //return $this->db->last_query();
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['GUID'] = UUID::NewGuid();
        $data['GVType'] = $this->get_groupType();
        $data['GVImages'] = $images;
        $data['GIFlag'] = 1;
        $data['GDCDate'] = TMLib::getNow();
        $this->db->insert($this->get_tblGroups(), $data);
    }

    function _update($data, $images = NULL) {
        $data['GIFlag'] = isset($data['GIFlag']) ? 1 : 0;
        if ($images != NULL)
            $data['GVImages'] = $images;
        $data['GDUDate'] = TMLib::getNow();
        $this->db->where('GUID', $data['GUID'])
                ->update($this->get_tblGroups(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblGroups(), array('GIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblGroups(), array('GUID' => $data));
    }

}
