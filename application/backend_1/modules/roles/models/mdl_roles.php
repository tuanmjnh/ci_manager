<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_roles extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('objRoles');
    }

    function get_tblRoles() {
        return "roles";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like(objRoles::$RVKey, $like['searchKey']);
        return $this->db->get($this->get_tblRoles())->num_rows();
    }

    function get_limit($where = NULL, $limit, $offset, $like = NULL, $order_by = NULL) {
        if ($where != NULL) {
            $this->db->where($where);
        }
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like(objRoles::$RVKey, $like['searchKey']);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblRoles())->result_array();
    }

    function get_all($flag = NULL, $order_by = 'RIOrder') {
        if ($flag != NULL)
            $this->db->where('RIFlag', $flag);
        return $this->db->order_by($order_by)
                        ->get($this->get_tblRoles())->result();
    }

    function get_order($flag = NULL, $order_by = NULL) {
        if ($flag != NULL)
            $this->db->where('RIFlag', $flag);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        return $this->db->get($this->get_tblRoles());
    }

    function get_where($id) {
        return $this->db->where(objRoles::$RVID, $id)
                        ->get($this->get_tblRoles())->row_array();
    }

    function _insert($data, $images = NULL) {
        $data[objRoles::$ApplicationId] = TM_ApplicaionID;
        $data[objRoles::$RVID] = UUID::NewGuid();
        $this->db->insert($this->get_tblRoles(), $data);
    }

    function _update($data, $images = NULL) {
        if ($images != NULL)
            $data['MVIcon'] = $images;
        $this->db->where(objRoles::$RVID, $data[objRoles::$RVID])
                ->update($this->get_tblRoles(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where(objRoles::$RVID, $id)
                ->update($this->get_tblRoles(), array('MIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblRoles(), array(objRoles::$RVID => $data));
    }

}
