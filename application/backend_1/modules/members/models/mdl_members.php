<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_members extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblMembers() {
        return "members";
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
            $this->db->like('MBVPropertyNames', $like['searchKey']);
        return $this->db->get($this->get_tblMembers())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'MBVPropertyNames') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('MBVPropertyNames', $like['searchKey']);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblMembers())->result();
    }

    function get_order($flag, $order_by) {
        if (isset($flag) && $flag != NULL)
            $this->db->where('MBIFlag', $flag);
        $this->db->order_by($order_by);
        return $this->db->get($this->get_tblMembers())->result();
    }

    function get_where($id) {
        $data = $this->db->where('MBVID', $id)
                        ->get($this->get_tblMembers())->row();
        $gMember = $this->db->where('GUID', $data->MBVPlus)
                        ->get($this->get_tblMembersType())->row();
        $data->membersType = $gMember->GVTitle;
        $data->membersIcon = $gMember->GVContent;
        $data->membersDiscount = $gMember->GVPlus;
        return $data;
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['MBVID'] = UUID::NewGuid();
        $data['MBVAccount'] = UUID::NewGuid();
        $data['MBVPassword'] = UUID::NewGuid();
        $data['MBVPicture'] = $images;
        $data['MBILocked'] = 1;
        $data['MBIFlag'] = 1;
        $this->db->insert($this->get_tblMembers(), $data);
        //return $this->db->last_query();
    }

    function _update($data, $images = NULL) {
        $data['MBIFlag'] = isset($data['MBIFlag']) ? 1 : 0;
        if ($images != NULL)
            $data['MBVPicture'] = $images;
        $this->db->where('MBVID', $data['MBVID'])
                ->update($this->get_tblMembers(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('MBVID', $id)
                ->update($this->get_tblMembers(), array('MBIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblMembers(), array('MBVID' => $data));
    }

}
