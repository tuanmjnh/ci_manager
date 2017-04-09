<?php

class TMAccess {

    public static function login($type) {
        try {
            if ($type === 1)
                return LoginSession::login();
            else
                return LoginCookie::login();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function logout() {
        try {
            LoginSession::logout();
            LoginCookie::logout();
//            if (self::$type == 'ss')
//                LoginSession::logout();
//            else
//                LoginCookie::logout();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function isLogin() {
        try {
            if (isset($_COOKIE['TM_ACE']))
                return TRUE;
            else if (isset($_SESSION['TM_ACE']))
                return TRUE;
            else
                return FALSE;
//            if (self::$type == 'ss')
//                LoginSession::isLogin();
//            else
//                LoginCookie::isLogin();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function getAccess() {
        try {
            if (isset($_COOKIE['TM_ACE']))
                return $_COOKIE['TM_ACE'];
            else if (isset($_SESSION['TM_ACE']))
                return $_SESSION['TM_ACE'];
            else
                return NULL;
//            if (self::$type == 'ss')
//                LoginSession::getAccess();
//            else
//                LoginCookie::getAccess();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function users($data = NULL, $user = 'users') {
        $_SESSION[$user] = $data;
    }

    public static function get_users($user = 'users') {
        return $_SESSION[$user];
    }

    public static function ReturnLogin() {
        if (!TMAccess::isLogin())
            redirect(TM_BASE_URL . 'cms/login');
    }

    public static function ReturnAccess() {
        if (TMAccess::isLogin())
            redirect(TM_BASE_URL . 'cms');
    }

    function setCookie($type) {
        self::$type = $type;
        setcookie('l', $type, time() + (86400 * 30), "/"); // 86400 = 1 day
        return $type;
    }

    function getCookie($type) {
        setcookie('l', $type, time() + (86400 * 30), "/"); // 86400 = 1 day
        return $type;
    }

}

class LoginCookie {

    public static function login() {
        try {
            $value = TMLib::md5(UUID::NewGuid() . '-' . time());
            setcookie('TM_ACE', $value, time() + (86400 * 30), "/"); // 86400 = 1 day
            return $value;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function logout() {
        try {
            if (isset($_COOKIE['TM_ACE'])) {
                unset($_COOKIE["TM_ACE"]);
                setcookie('TM_ACE', '', time() - 3600, "/"); // 86400 = 1 day
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function isLogin() {
        try {
            if (isset($_COOKIE['TM_ACE']))
                return TRUE;
            return FALSE;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function getAccess() {
        try {
            return isset($_COOKIE['TM_ACE']) ? $_COOKIE['TM_ACE'] : NULL;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

}

class LoginSession {

    public static function login() {
        try {
            $value = TMLib::md5(UUID::NewGuid() . '-' . time());
            $_SESSION["TM_ACE"] = $value;
            return $value;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function logout() {
        try {
            if (isset($_SESSION["TM_ACE"]))
                unset($_SESSION["TM_ACE"]);
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function isLogin() {
        try {
            if (isset($_SESSION["TM_ACE"]))
                return TRUE;
            return FALSE;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public static function getAccess() {
        try {
            return isset($_SESSION["TM_ACE"]) ? $_SESSION["TM_ACE"] : NULL;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function is_session_started() {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

}
