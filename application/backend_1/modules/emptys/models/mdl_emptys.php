<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Mdl_emptys extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getall() {
        $qry = $this->db->get('tbl_user');
        return $qry;
    }

}