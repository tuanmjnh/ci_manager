<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TMLang {

    protected $CI;
    private $langkeyArray;

    public function __construct($rules = array()) {
        $this->CI = & get_instance();
    }

    function get_langcode() {
        return $this->CI->session->userdata('langcode') !== NULL ?
                $this->CI->session->userdata('langcode') : 'vi';
    }

    function set_langcode($langcode) {
        $this->CI->session->set_userdata('langcode', $langcode);
    }
}
