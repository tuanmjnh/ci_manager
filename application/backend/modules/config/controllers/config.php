<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class config extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function get($order_by) {
        $this->load->model('mdl_SQLDB');
        $query = $this->mdl_SQLDB->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_SQLDB');
        $query = $this->mdl_SQLDB->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_SQLDB');
        $query = $this->mdl_SQLDB->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_SQLDB');
        $query = $this->mdl_SQLDB->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_SQLDB');
        $this->mdl_SQLDB->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_SQLDB');
        $this->mdl_SQLDB->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_SQLDB');
        $this->mdl_SQLDB->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_SQLDB');
        $count = $this->mdl_SQLDB->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_SQLDB');
        $max_id = $this->mdl_SQLDB->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_SQLDB');
        $query = $this->mdl_SQLDB->_custom_query($mysql_query);
        return $query;
    }

}
