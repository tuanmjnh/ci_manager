<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_langItem extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblItem() {
        return "language_items";
    }

    function get_tblKey() {
        return "language_key";
    }

    function get_tblLanguage() {
        return "language";
    }

    function get_count($where = NULL, $like = NULL) {
        //if ($where != NULL)
        //    $this->db->where($where);
        if ($like != NULL)
            $this->db->like('LKVTitle', $like['searchKey']);
        return $this->db->get($this->get_tblKey())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'LKVTitle') {
        //if ($where != NULL)
        //    $this->db->where($where);
        if ($like != NULL)
            $this->db->like('LKVTitle', $like['searchKey']);
        return $this->db->select('*,(SELECT LIVTitle FROM ' . $this->get_tblItem() .
                                ' i WHERE LIID=\'' . $where['LIID'] . '\' AND i.LKIID=k.LKIID)LIVTitle')
                        ->from($this->get_tblKey() . ' k')
                        ->order_by($order_by)
                        ->limit($limit, $offset)->get()->result();
    }

    function get_order() {
        $this->db->select('LKIID');
        $this->db->order_by('LKIID', 'DESC');
        $this->db->limit(1);
        return $this->db->get($this->get_tblKey())->row()->LKIID;
    }

    function get_where($id) {
        $this->db->where('LKIID', $id);
        $key = $this->db->get($this->get_tblKey())->row();
        $this->db->where('LIID', $this->mdl_language->langid());
        $this->db->where('LKIID', $id);
        $value = $this->db->get($this->get_tblItem())->row();
        return (object) array_merge((array) $key, (array) $value);
        //return $this->db->last_query();
    }

    function _insert($data) {
        $this->db->trans_start();
        $LKIID = $this->db->get_where($this->get_tblKey(), array('LKVTitle' => $data['LKVTitle']));
        $key = array('ApplicationId' => TM_ApplicaionID, 'LKVTitle' => $data['LKVTitle'], 'LKVDesc' => $data['LKVDesc']);
        $value = array('ApplicationId' => TM_ApplicaionID, 'LIVTitle' => $data['LIVTitle'], 'LIVDesc' => $data['LIVDesc']);
        if ($LKIID->num_rows() < 1) {
            $key['LKIID'] = UUID::NewGuid();
            $this->db->insert($this->get_tblKey(), $key);
            //
            $value['LIID'] = $this->mdl_language->langid();
            $value['LKIID'] = $key['LKIID'];
            $this->db->insert($this->get_tblItem(), $value);
        } else {
            $this->db->where(array(
                'LIID' => $this->mdl_language->langid(),
                'LKIID' => $LKIID->row()->LKIID));
            $this->db->update($this->get_tblItem(), $value);
        }
        $this->db->trans_complete();
    }

    function _update($data) {
        $this->db->trans_start();
        $this->db->where('LKIID', $data['LKIID']);
        $this->db->update($this->get_tblKey(), array('LKVTitle' => $data['LKVTitle'], 'LKVDesc' => $data['LKVDesc']));
        //
        $where = array(
            'ApplicationId' => TM_ApplicaionID,
            'LIID' => $this->mdl_language->langid(),
            'LKIID' => $data['LKIID']);
        $value = array(
            'LIVTitle' => $data['LIVTitle'],
            'LIVDesc' => $data['LIVDesc']
        );
        if ($this->db->get_where($this->get_tblItem(), $where)->num_rows() > 0) {
            $this->db->where($where);
            $this->db->update($this->get_tblItem(), $value);
        } else {
            $this->db->insert($this->get_tblItem(), array_merge((array) $where, $value));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return "error";
        }
    }

    function _delete($id) {
        $this->db->trans_start();
        $this->db->where('LKIID', $id);
        $this->db->delete($this->get_tblItem());
        $this->db->where('LKIID', $id);
        $this->db->delete($this->get_tblKey());
        $this->db->trans_complete();
    }

}
