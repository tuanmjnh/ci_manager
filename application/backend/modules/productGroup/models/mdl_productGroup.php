<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_productGroup extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblGroup() {
        return "groups";
    }

    function get_groupType() {
        return "ProductType";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        return $this->db->get($this->get_tblGroup())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'GIOrder') {
        if ($where != NULL) {
            $this->db->where($where);
            if ($where['GIFlag'] == 1)
                $this->db->where('GIParentID', NULL);
        }
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('GVTitle', $like['searchKey']);
        $this->db->where('GVType', $this->get_groupType());
        $ls = $this->db->limit($limit, $offset)
                        ->get($this->get_tblGroup())->result();
        $rs = array();
        foreach ($ls as $v) {
            $rs[] = $v;
            $rs = array_merge($rs, $this->get_list($v->GUID));
        }
        return $rs;
    }

    function get_where($id) {
        return $this->db->where('GUID', $id)
                        ->get($this->get_tblGroup())->row();
    }

    function get_order($flag = NULL, $order_by = 'GIOrder') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('GIFlag', $flag);
        return $this->db->where('GVType', $this->get_groupType())
                        ->order_by($order_by)
                        ->get($this->get_tblGroup())->result();
        //$this->db->last_query();
    }

    function get_parent($roles, $flag = 1, $order = 'GIOrder') {
        $where = "GIFlag='$flag' AND GIParentID IS NULL AND (";
//        foreach ($roles as $k => $v)
//            $where.="MVRoles LIKE '%,$v,%' OR ";
        $where = rtrim($where, ' OR ') . ')';
        return $this->db->order_by($order)
                        ->where($where)
                        ->get($this->get_tblGroup())->result();
    }

    function get_sub_parent($roles, $parent = NULL, $flag = 1, $order = 'GIOrder') {
        $where = "GIFlag='$flag' AND GIParentID='$parent' AND (";
//        foreach ($roles as $k => $v)
//            $where.="MVRoles LIKE '%,$v,%' OR ";
        $where = rtrim($where, ' OR ') . ')';
        return $this->db->order_by($order)
                        ->where($where)
                        ->get($this->get_tblGroup())->result();
    }

    function get_list($parent = NULL, $flag = 1, $order = 'GIOrder') {
        $rs = array();
        $ls = $this->db->order_by($order)
                        ->where(array('GIFlag' => $flag, 'GIParentID' => $parent, 'GVType' => $this->get_groupType()))
                        ->get($this->get_tblGroup())->result();
        foreach ($ls as $v) {
            $rs[] = $v;
            $rs = array_merge($rs, $this->get_list($v->GUID));
        }
        return $rs;
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['GUID'] = UUID::NewGuid();
        $data['GVType'] = $this->get_groupType();
        $data['GILevel'] ++;
        $data['GIParentID'] = $data['GIParentID'] == 'NULL' ? NULL : $data['GIParentID'];
        $data['GIFlag'] = 1;
        $data['GDCDate'] = TMLib::getNow();
        $data['GVImages'] = $images;
        $this->db->insert($this->get_tblGroup(), $data);
    }

    function _update($data, $images = NULL) {
        $data['GIFlag'] = isset($data['GIFlag']) ? 1 : 0;
        $data['GILevel'] ++;
        $data['GIParentID'] = $data['GIParentID'] == 'NULL' ? NULL : $data['GIParentID'];
        $data['GDUDate'] = TMLib::getNow();
        if ($images != NULL)
            $data['GVImages'] = $images;
        $this->db->where('GUID', $data['GUID'])
                ->update($this->get_tblGroup(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('GUID', $id)
                ->update($this->get_tblGroup(), array('GIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblGroup(), array('GUID' => $data));
    }

}
