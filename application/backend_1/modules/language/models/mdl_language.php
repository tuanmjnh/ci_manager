<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ObjLanguage {

    public static $ApplicationId;
    public static $LIID;
    public static $LVTitle;
    public static $LVLangCode;
    public static $LIZipCode;
    public static $LVImages;
    public static $LVDesc;
    public static $LIFlag;

}

class mdl_language extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('LKEY');
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

    function langid() {
        return $this->session->userdata('lang')->LIID;
    }

    function langname() {
        return $this->session->userdata('lang')->LVTitle;
    }

    function langcode() {
        return $this->session->userdata('lang')->LVLangCode;
    }

    function langimg() {
        return $this->session->userdata('lang')->LVImages;
    }

    function get_language($flag = 1) {
        //$this->db->select('LIID,LVTitle');
        $this->db->where('LIFlag', $flag);
        $this->db->order_by('LIOrder');
        return $this->db->get('language')->result();
    }

    function set_lang($code = NULL) {
        if ($code != NULL)
            $this->db->where('LVLangCode', $this->security->xss_clean($code));
        $this->db->where('LIFlag', 1);
        $this->db->select('LIID,LVTitle,LVLangCode,LVImages');
        $this->db->limit(1);
        $this->db->order_by('LIOrder');
        return $this->db->get($this->get_tblLanguage())->row();
    }

    function get_langkey_array() {
        $this->db->select('LOWER(LKVTitle) LKVTitle,LIVTitle')
                ->from($this->get_tblItem() . ' i')
                ->join($this->get_tblKey() . ' k', 'i.LKIID=k.LKIID')
                ->where('i.LIID', $this->langid())
                ->order_by('LKVTitle');
        $lang_key = array();
        foreach ($this->db->get()->result() as $v) {
            $lang_key[$v->LKVTitle] = $v->LIVTitle;
        }
        return $lang_key;
    }

    function initialization_lang($code = NULL) {
        if ($code == NULL) {
            if ($this->session->userdata('lang') == NULL)
                $this->session->set_userdata('lang', $this->set_lang());
            if ($this->session->userdata('langkey') == NULL)
                $this->session->set_userdata('langkey', $this->get_langkey_array());
        }else {
            $this->session->set_userdata('lang', $this->set_lang($code));
            $this->session->set_userdata('langkey', $this->get_langkey_array());
        }
    }

    function get_langkey($key, $rs = 'this is undefined') {
        $key = explode('|', strtolower($key));
        $s = '';
        foreach ($key as $v) {
            if (isset($this->session->userdata('langkey')[$v]))
                $s .= $this->session->userdata('langkey')[$v] . ' ';
            else
                $s .= $v . ' ';
        }
        $s = trim($s, ' ');
        return $s != '' ? $s : $key;
    }

//    function get_langkey($key) {
//        if (isset($this->session->userdata('langkey')[$key]))
//            return $this->session->userdata('langkey')[$key];
//        else
//            return 'this is undefined';
//    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('LVTitle', $like['searchKey']);
        return $this->db->get($this->get_tblLanguage())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'LIOrder') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by);
        if ($like != NULL)
            $this->db->like('LVTitle', $like['searchKey']);
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblLanguage())->result();
    }

    function get_order($flag, $order_by) {
        if (isset($flag) && $flag != NULL)
            $this->db->where('LIFlag', $flag);
        $this->db->order_by($order_by);
        return $this->db->get($this->get_tblLanguage())->result();
    }

    function get_where($id) {
        return $this->db->where('LIID', $id)
                        ->get($this->get_tblLanguage())->row();
    }

    function _insert($data, $images = NULL) {
        $data['ApplicationId'] = TM_ApplicaionID;
        $data['LIID'] = UUID::NewGuid();
        $data['LVImages'] = $images;
        $data['LIFlag'] = 1;
        $this->db->insert($this->get_tblLanguage(), $data);
    }

    function _update($data, $images = NULL) {
        $data['LIFlag'] = isset($data['LIFlag']) ? 1 : 0;
        if ($images != NULL)
            $data['LVImages'] = $images;
        $this->db->where('LIID', $data['LIID'])
                ->update($this->get_tblLanguage(), $data);
    }

    function _update_status($id, $flag) {
        $this->db->where('LIID', $id)
                ->update($this->get_tblLanguage(), array('LIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblLanguage(), array('LIID' => $data));
    }

}
