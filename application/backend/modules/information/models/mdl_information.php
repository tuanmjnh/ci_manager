<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_information extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('INFKEY');
    }

    function get_tblInformation() {
        return "information";
    }

    function get_groupType() {
        return "InfSite";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->get($this->get_tblInformation())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'GIOrder') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblInformation())->result();
    }

    function get_order($flag = NULL, $order_by = 'GIOrder') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('GIFlag', $flag);
        return $this->db->where('GVType', $this->get_groupType())
                        ->order_by($order_by)
                        ->get($this->get_tblInformation())->result();
        //$this->db->last_query();
    }

    function get_inf($flag = NULL, $order_by = 'INFIOrder') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('INFIFlag', $flag);
        $data = $this->db->where('INFVAppKey', $this->get_groupType())
                        ->order_by($order_by)
                        ->get($this->get_tblInformation())->result_array();
        $rs = array();
        foreach ($data as $value)
            $rs[strtolower($value['INFVKey'])] = $value;
        return $rs;
    }

    function initialization_inf($code = NULL) {
        if ($code == NULL) {
            if ($this->session->userdata('inf') == NULL)
                $this->session->set_userdata('inf', $this->get_inf());
        } else
            $this->session->set_userdata('inf', $this->get_inf());
    }

    function get_where($id) {
        return $this->db->where('GUID', $id)
                        ->get($this->get_tblInformation())->row();
    }

    function _insert($data, $images = NULL) {
        //$this->db->trans_begin();
        foreach ($data as $key => $value) {
            $sql = "INSERT IGNORE INTO information(ApplicationId,LVLangCode,INFVAppKey,INFVKey,INFVValue,INFIFlag) "
                    . "VALUES(?,?,?,?,?,?)";
            $this->db->query($sql, array(
                TM_ApplicaionID,
                $this->mdl_language->langcode(),
                $this->get_groupType(),
                $key,
                $value,
                1));
            $this->db->where(array(
                        'LVLangCode' => $this->mdl_language->langcode(),
                        'INFVAppKey' => $this->get_groupType(),
                        'INFVKey' => $key))
                    ->update($this->get_tblInformation(), array('INFVValue' => $value));
        }
//        if ($this->db->trans_status() === FALSE) {
//            $this->db->trans_rollback();
//        } else {
//            $this->db->trans_commit();
//        }
    }

    function _update($data, $images = NULL) {
        $data['GIFlag'] = isset($data['GIFlag']) ? 1 : 0;
        if ($images != NULL)
            $data['GVImages'] = $images;
        $data['GDUDate'] = TMLib::getNow();
        $this->db->where('GUID', $data['GUID'])
                ->update($this->get_tblInformation(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblInformation(), array('GIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblInformation(), array('GUID' => $data));
    }

}
