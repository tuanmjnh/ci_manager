<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Logged');
    }

    function get_tblUsers() {
        return "users";
    }

    function get_Access() {
        return "TM_ACE";
    }

    function get_Account() {
        return "TM_ACC";
    }

    function get_Session() {
        return "_session";
    }

    function get_Cookie() {
        return "_cookie";
    }

    function _logging($data) {
        $qry = $this->db->get_where($this->get_tblUsers(), array(
                    'UVAccount' => $data['account']))->row();
        if ($qry) {
            $qry = $this->db->get_where($this->get_tblUsers(), array(
                        'UVAccount' => $data['account'],
                        'UVPassword' => TMLib::md5($data['password'] . $qry->UVPasswordSalt)))->row();
            if ($qry) {
                $ac_code = '';
                if (!isset($data['remember']))
                    $ac_code = $this->login($this->get_Session(), $data['account']);
                else
                    $ac_code = $this->login($this->get_Cookie(), $data['account']);
                $this->db->where(array('UVID' => $qry->UVID))
                        ->update($this->get_tblUsers(), array(
                            'UDLastLogin' => TMLib::getNow(),
                            'UILoginTime' => 0,
                            'UVAccess' => $ac_code,
                            'UVLastInf' => 'ip,' . TMIP::IPClient() . '|' . 'mac,' . TMIP::MACClient()));
                $this->set_users($qry);
                return 3;
            } else
                return 2;
        } else
            return 1;
    }

    function login($type, $acc) {
        try {
            $value = TMLib::md5(UUID::NewGuid() . '-' . time());
            if ($type == $this->get_Session()) {
                $_SESSION[$this->get_Account()] = $acc;
                $_SESSION[$this->get_Access()] = $value;
            } else {
                setcookie($this->get_Account(), $acc, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($this->get_Access(), $value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            return $value;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function logout() {
        try {
            if (isset($_COOKIE[$this->get_Access()])) {
                unset($_COOKIE[$this->get_Access()]);
                setcookie($this->get_Access(), '', time() - 3600, "/"); // 86400 = 1 day
            }
            if (isset($_SESSION[$this->get_Access()]))
                unset($_SESSION[$this->get_Access()]);
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function is_login() {
        try {
            if (isset($_COOKIE[$this->get_Access()]))
                return TRUE;
            else if (isset($_SESSION[$this->get_Access()]))
                return TRUE;
            else
                return FALSE;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function get_type_login() {
        try {
            if (isset($_COOKIE[$this->get_Access()]))
                return $this->get_Cookie();
            else if (isset($_SESSION[$this->get_Access()]))
                return $this->get_Session();
            else
                return NULL;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function get_access_code() {
        try {
            if (isset($_COOKIE[$this->get_Access()]))
                return $_COOKIE[$this->get_Access()];
            else if (isset($_SESSION[$this->get_Access()]))
                return $_SESSION[$this->get_Access()];
            else
                return NULL;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function get_acc_code() {
        try {
            if (isset($_COOKIE[$this->get_Account()]))
                return $_COOKIE[$this->get_Account()];
            else if (isset($_SESSION[$this->get_Account()]))
                return $_SESSION[$this->get_Account()];
            else
                return NULL;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function set_users($data = NULL, $user = 'users') {
        $this->session->set_userdata($user, $data);
    }

//    function users($user = 'users') {
//        if ($this->is_login()) {
//            if ($this->session->userdata($user) == NULL) {
//                $qry = $this->db->get_where($this->get_tblUsers(), array(
//                            'UVAccount' => $this->get_acc_code(),
//                            'UVAccess' => $this->get_access_code()))->row();
//                if ($qry)
//                    $this->set_users($qry);
//                else
//                    $this->logout();
//            }
//            return $this->session->userdata($user);
//        } else
//            return NULL;
//    }
    function users($user = 'users') {
        if ($this->session->userdata($user) == NULL) {
            return $this->users_reset();
        }
    }

    function users_reset($user = 'users') {
        if ($this->is_login()) {
            $qry = $this->db->get_where($this->get_tblUsers(), array(
                        'UVAccount' => $this->get_acc_code(),
                        'UVAccess' => $this->get_access_code()))->row();
            if ($qry)
                $this->set_users($qry);
            else
                $this->logout();
            return $this->session->userdata($user);
        }
        return NULL;
    }

    function redirect_login() {
        if (!$this->is_login())
            redirect(TMUrl::return_login());
    }

    function redirect_continue() {
        if ($this->is_login())
            redirect(TMUrl::return_continue());
    }

    function return_continue() {
        if ($this->is_login())
            return TMUrl::return_continue();
    }

    function return_login() {
        return TMUrl::return_login();
    }

}
