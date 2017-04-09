<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class mdl_config extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_table() {
        return 'config';
    }
    function get_AppId($AppKey) {
        return $this->db->get_where($this->get_table(), 
                array('CVKey' => 'ApplicationId', 'CVSubKey' => $AppKey))->row()->CVValue;
    }
}
