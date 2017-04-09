<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    public function is_unique($str, $field) {
        //sscanf($field, '%[^.].%[^.]', $table, $field);
        list($table, $field, $field_id) = explode('.', $field);
        if (isset($this->CI->db)) {
            $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
            $id = $this->CI->input->post($field_id);
            if ($id) {
                if ($query->row() && $query->row_array()[$field_id] != $id)
                    return FALSE;
            }else {
                if ($query->row())
                    return FALSE;
            }
        } else
            return FALSE;
        return TRUE;
    }

    public function is_date($date) {
        $pattern = '/^([0-9]{4})([\/\-\ ])(0[1-9]|1[0-2])([\/\-\ ])(0[1-9]|1[0-9]|2[0-9]|3(0|1))$/';
        if (preg_match($pattern, $date)) {
            return true;
        } else {
            //$this->form_validation->set_message('is_date', 'The %s is not valid it should match this dd/md/yyyy format');
            return false;
        }
    }

    public function is_datetime($fields, $err_msg = '') {
        $this->_parse($fields);
        $exp = '/^([0-9]{4})([\-])([0-9]{2})([\-])([0-9]{2})[\ ]'
                . '([0-9]{2})[\:]([0-9]{2})[\:]([0-9]{2})$/';
        foreach ($fields as $v) {
            if ($this->is_valid()) {
                if (!empty($this->data[$v]) && $this->data[$v] != '0000-00-00 00:00:00') {
                    $match = array();
                    if (!preg_match($exp, $this->data[$v], $match)) {
                        $this->_error($err_msg, $v);
                    } elseif (!checkdate($match[3], $match[5], $match[1])) {
                        $this->_error($err_msg, $v);
                    }
                }
            }
        }
        return $this;
    }

}
