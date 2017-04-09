<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_users extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblUsers() {
        return "users";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('UVAccount', $like['searchKey']);
        return $this->db->get($this->get_tblUsers())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'UVAccount') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('UVAccount', $like['searchKey']);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblUsers())->result();
    }

    function get_order($flag, $order_by = 'MIOrder') {
        if (isset($flag) && $flag != NULL)
            $this->db->where('MIFlag', $flag);
        $this->db->order_by($order_by);
        return $this->db->get($this->get_tblUsers());
    }

    function get_all($order = 'MIOrder', $flag = 1) {
        return $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->get($this->get_tblUsers())->result();
    }

    function get_parent($flag = 1, $order = 'MIOrder') {
        return $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->where('MVParent', NULL)
                        ->get($this->get_tblUsers())->result();
    }

    function get_sub_parent($parent = NULL, $flag = 1, $order = 'MIOrder') {
        return $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->where('MVParent', $parent)
                        ->get($this->get_tblUsers())->result();
    }

    function get_list($parent = NULL, $flag = 1, $order = 'MIOrder') {
        $rs = array();
        $ls = $this->db->order_by($order)
                        ->where('MIFlag', $flag)
                        ->where('MVParent', $parent)
                        ->get($this->get_tblUsers())->result();
        foreach ($ls as $v) {
            $rs[] = $v;
            $rs = array_merge($rs, $this->get_list($v->MVID));
        }
        return $rs;
    }

    function get_where($id) {
        return $this->db->get_where($this->get_tblUsers(), array('UVID' => $id))->row();
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['UVID'] = UUID::NewGuid();
        $data['UDLocked'] = isset($data['UDLocked']) ? 0 : 1;
        $data['UDCDate'] = TMLib::getNow();
        $data['UVPicture'] = $images;
        $data['UVProperty_names'] = isset($data['UVProperty_names']) && $data['UVProperty_names'] != NULL ? ',' . $data['UVProperty_names'] . ',' : NULL;
        $data['UVRoles'] = isset($data['UVRoles']) ? ',' . $data['UVRoles'] . ',' : NULL;
        $data['UVPasswordSalt'] = UUID::NewGuid();
        $data['UVPassword'] = TMLib::md5($data['UVPassword'] . $data['UVPasswordSalt']);
        unset($data['UVPassworda']);
        $this->db->insert($this->get_tblUsers(), $data);
    }

    function _update($data, $images = NULL) {
        $d = array();
        $d['UVProperty_names'] = isset($data['UVProperty_names']) && $data['UVProperty_names'] != NULL ? ',' . $data['UVProperty_names'] . ',' : NULL;
        $d['UVEmail'] = isset($data['UVEmail']) ? $data['UVEmail'] : NULL;
        $d['UVMobile'] = isset($data['UVMobile']) ? $data['UVMobile'] : NULL;
        $d['UDLocked'] = isset($data['UDLocked']) ? 0 : 1;
        $d['UVRoles'] = isset($data['UVRoles']) ? ',' . $data['UVRoles'] . ',' : NULL;
        $d['UDUDate'] = TMLib::getNow();
        if ($images != NULL)
            $d['UVPicture'] = $images;
        $this->db->where('UVID', $data['UVID'])
                ->update($this->get_tblUsers(), $d);
    }

    function _update_profile($data) {
        $d = array();
        $d['UVProperty_names'] = isset($data['UVProperty_names']) && $data['UVProperty_names'] != NULL ? ',' . $data['UVProperty_names'] . ',' : NULL;
        $d['UVEmail'] = isset($data['UVEmail']) ? $data['UVEmail'] : NULL;
        $d['UVMobile'] = isset($data['UVMobile']) ? $data['UVMobile'] : NULL;
        $d['UDUDate'] = TMLib::getNow();
        $this->db->where('UVID', $data['UVID'])
                ->update($this->get_tblUsers(), $d);
    }

    function _update_images($data, $images = NULL) {
        $d = array();
        if ($images != NULL)
            $d['UVPicture'] = $images;
        $this->db->where('UVID', $data['UVID'])
                ->update($this->get_tblUsers(), $d);
    }
    
    function _change_password($data) {
        if (TMLib::md5($data['oldPassword'] . Logged::password_salt()) == Logged::password())
            $this->db->where('UVID', Logged::UserID())
                    ->update($this->get_tblUsers(), array('UVPassword' => TMLib::md5($data['newPassword'] . Logged::password_salt())));
        else
            return 1;
        return 0;
    }

    function _update_status($id, $flag) {
        $this->db->where('UVID', $id)
                ->update($this->get_tblUsers(), array('UDLocked' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblUsers(), array('UVID' => $data));
    }

    function _reset_password($data) {
        $user = $this->db->where('UVID', $data)
                        ->get($this->get_tblUsers())->row();
        $password = TMLib::md5(UUID::NewGuid() . $user->UVPasswordSalt);
        $this->db->where('UVID', $data)
                ->update($this->get_tblUsers(), array('UVPassword' => $password));
        return array($user->UVAccount, $password);
    }

}
