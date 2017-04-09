<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_module extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblModules() {
        return "modules";
    }

    function get_tblModules_items() {
        return "modules_items";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('MVTitle', $like['searchKey']);
        return $this->db->get($this->get_tblModules())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'MIOrder') {
        if ($where != NULL) {
            $this->db->where($where);
            if ($where['MIFlag'] == 1)
                $this->db->where('MVParent', NULL);
        }
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('MVTitle', $like['searchKey']);
        $ls = $this->db->limit($limit, $offset)
                        ->get($this->get_tblModules())->result();
        $rs = array();
        foreach ($ls as $v) {
            $rs[] = $v;
            $rs = array_merge($rs, $this->get_list($v->MVID));
        }
        return $rs;
    }

    function get_order($flag, $order_by = 'MIOrder') {
        if (isset($flag) && $flag != NULL)
            $this->db->where('MIFlag', $flag);
        $this->db->order_by($order_by);
        return $this->db->get($this->get_tblModules());
    }

    function get_all($order = 'MIOrder', $flag = 1) {
        return $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->get($this->get_tblModules())->result();
    }

    function get_parent($roles, $flag = 1, $order = 'MIOrder') {
        $where = "MIFlag='$flag' AND MVParent IS NULL AND (";
        foreach ($roles as $k => $v)
            $where.="MVRoles LIKE '%,$v,%' OR ";
        $where = rtrim($where, ' OR ') . ')';
        return $this->db->order_by($order)
                        ->where($where)
                        ->get($this->get_tblModules())->result();
    }

    function get_sub_parent($roles, $parent = NULL, $flag = 1, $order = 'MIOrder') {
        $where = "MIFlag='$flag' AND MVParent='$parent' AND (";
        foreach ($roles as $k => $v)
            $where.="MVRoles LIKE '%,$v,%' OR ";
        $where = rtrim($where, ' OR ') . ')';
        return $this->db->order_by($order)
                        ->where($where)
                        ->get($this->get_tblModules())->result();
    }

    function get_list($parent = NULL, $flag = 1, $order = 'MIOrder') {
        $rs = array();
        $ls = $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->where('MVParent', $parent)
                        ->get($this->get_tblModules())->result();
        foreach ($ls as $v) {
            $rs[] = $v;
            $rs = array_merge($rs, $this->get_list($v->MVID));
        }
        return $rs;
    }

    function get_where($id) {
        return $this->db->get_where($this->get_tblModules(), array('MVID' => $id))->row();
    }

    function _insert($data, $images = NULL) {
        if ($this->db->get_where($this->get_tblModules(), array('MVTitle' => $data['MVTitle']))->num_rows() < 1) {
            $data['ApplicationId'] = TM_ApplicaionID;
            $data['MVID'] = UUID::NewGuid();
            $data['MIFlag'] = 1;
            $data['MILevel'] ++;
            $data['MVParent'] = $data['MVParent'] == 'NULL' ? NULL : $data['MVParent'];
            $data['MVCBy'] = 'admin';
            $data['MVCDate'] = TMLib::getNow();
            $data['MVIcon'] = $images;
            $data['MVRoles'] = isset($data['MVRoles']) ? ',' . trim($data['MVRoles']) . ',' : NULL;
            $this->db->insert($this->get_tblModules(), $data);
        } else
            return 'exist';
    }

    function _update($data, $images = NULL) {
        $old = $this->db->get_where($this->get_tblModules(), array('MVID' => $data['MVID']))->row();
        if ($old->MVTitle == $data['MVTitle'])
            $this->_sub_update($data, $images);
        else {
            if ($this->db->get_where($this->get_tblModules(), array('MVTitle' => $data['MVTitle']))->num_rows() < 1)
                $this->_sub_update($data, $images);
            else
                return 'exist';
        }
    }

    function _sub_update($data, $images = NULL) {
        $data['MIFlag'] = isset($data['MIFlag']) ? 1 : 0;
        $data['MILevel'] ++;
        $data['MVParent'] = $data['MVParent'] == 'NULL' ? NULL : $data['MVParent'];
        $data['MVUBy'] = 'admin';
        $data['MVUDate'] = TMLib::getNow();
        $data['MVRoles'] = isset($data['MVRoles']) ? ',' . trim($data['MVRoles']) . ',' : NULL;
        if ($images != NULL)
            $data['MVIcon'] = $images;
        $this->db->where('MVID', $data['MVID'])
                ->update($this->get_tblModules(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('MVID', $id)
                ->update($this->get_tblModules(), array('MIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblModules(), array('MVID' => $data));
    }

}
