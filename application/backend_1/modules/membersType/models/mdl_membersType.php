<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_membersType extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblMembersType() {
        return "groups";
    }

    function get_groupType() {
        return "membersType";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->get($this->get_tblMembersType())->num_rows();
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
                        ->get($this->get_tblMembersType())->result();
    }

    function get_order($flag = NULL, $order_by = 'GIOrder') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('GIFlag', $flag);
        return $this->db->where('GVType', $this->get_groupType())
                        ->order_by($order_by)
                        ->get($this->get_tblMembersType())->result();
        //$this->db->last_query();
    }

    function get_where($id) {
        return $this->db->where('GUID', $id)
                        ->get($this->get_tblMembersType())->row();
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['GUID'] = UUID::NewGuid();
        $data['GVType'] = $this->get_groupType();
        $data['GVImages'] = $images;
        $data['GIFlag'] = 1;
        $data['GDCDate'] = TMLib::getNow();
        $this->db->insert($this->get_tblMembersType(), $data);
    }

    function _update($data, $images = NULL) {
        $data['GIFlag'] = isset($data['GIFlag']) ? 1 : 0;
        if ($images != NULL)
            $data['GVImages'] = $images;
        $data['GDUDate'] = TMLib::getNow();
        $this->db->where('GUID', $data['GUID'])
                ->update($this->get_tblMembersType(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblMembersType(), array('GIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblMembersType(), array('GUID' => $data));
    }

}
