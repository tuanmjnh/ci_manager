<?php

class TMLib {

    public static function getNow() {
        return date("Y-m-d H:i:s");
    }

    public static function getDate() {
        return date("Y-m-d");
    }

    public static function getTime() {
        return date("H:i:s");
    }

    public static function getFirstNow() {
        return date("Y-m-d 00:00:00");
    }

    public static function getEndNow() {
        return date("Y-m-d 23:59:59");
    }

    public static function FormatDate1($obj) {
        try {
            if ($obj != NULL)
                return date_format(date_create($obj), "d-m-Y H:i:s");
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function FormatDate2($obj) {
        try {
            if ($obj != NULL)
                return date_format(date_create($obj), "d/m/Y H:i:s");
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function FormatDate3($obj) {
        try {
            if ($obj != NULL)
                return date_format(date_create($obj), "d-m-Y H:i:s(A)");
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function FormatDate4($obj) {
        try {
            if ($obj != NULL)
                return date_format(date_create($obj), "d/m/Y H:i:s(A)");
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function md5($str = NULL, $char = '&trade;') {
        try {
            if ($str == '' && $str == NULL)
                $str = UUID::NewGuid();
            return md5($str . $char);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function SubTrimArray($obj) {
        if (is_array($obj)) {
            foreach ($obj as $k => $v)
                $obj[$k] = self::SubTrimArray($v);
            return $obj = trim(implode(',', $obj), ',');
        } else
            return $obj = trim($obj);
    }

    public static function TrimArray($arr) {
        if ($arr != NULL) {
            foreach ($arr as $k => $v)
                $arr[$k] = self::SubTrimArray($v);
            return $arr;
        }
    }

    public static function Split($str, $char = ',', $limit = NULL) {
        try {
            if ($str != '' && $str != NULL && $char != NULL)
                if ($limit == NULL)
                    return explode($char, $str);
                else
                    return explode($char, $str, $limit);
            return '';
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function SplitTrim($str, $char = ',', $limit = NULL, $trim = ',') {
        try {
            return self::Split(trim(trim($str), $trim), $char, $limit);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function SplitStr($str, $char1 = '|', $char2 = ',') {
        try {
            $finnaly = array();
            if ($str == NULL || $str == '')
                throw new Exception();
            foreach (TMLib::Split($str, $char1) as $k => $v) {
                if ($v == NULL || $v == '')
                    throw new Exception();
                $tmp = TMLib::Split($v, $char2);
                if (count($tmp) < 2)
                    throw new Exception();
                $finnaly[$tmp[0]] = $tmp[1];
            }
            return $finnaly;
        } catch (Exception $ex) {
            return '';
        }
    }

    public static function SplitToStr($str, $char = ',') {
        try {
            if ($str == NULL)
                return NULL;
            $rs = '';
            foreach (self::SplitTrim($str) as $key => $value)
                $rs .= $value . $char . ' ';
            return trim($rs, $char . ' ');
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function ReplaceAt($str, $char, $index, $leap = NULL) {
        try {
            $leap = $leap != NULL ? $leap : 1;
            if ($index !== FALSE)
                return mb_substr($str, 0, $index) . $char . mb_substr($str, $index + $leap);
            else
                return '';
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public static function StringFormat($str, $key, $count = 1) {
        try {
            $str = str_replace('%S', '%s', $str);
            if (mb_strpos($str, '%s') !== FALSE) {
                if (is_array($key))
                    foreach ($key as $k => $v)
                        $str = self::ReplaceAt($str, $v, mb_strpos($str, '%s'), 2);
                else
                    $str = preg_replace('/%s/', $key, $str, $count);
            } else {
                if (is_array(key))
                    foreach ($key as $k => $v)
                        $str = str_replace('{' . $k . '}', $v, $str);
                else
                    $str = preg_replace('/{0}/', $v, $str, $count);
            }
            return $str;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}

class TMUrl {

    public static function TM_BASE_URL() {
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $s = explode('/', trim(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH), '/'));
            return "http://localhost/$s[0]/";
        } else {
            return "http://$_SERVER[SERVER_NAME]/";
        }
    }

    public static function TM_BASE_URL_Login() {
        return self::TM_BASE_URL() . 'login';
    }

    public static function TM_BASE_URL_CMS() {
        return self::TM_BASE_URL() . 'cms';
    }

    public static function TM_BASE_URL_CMS_Login() {
        return self::TM_BASE_URL() . 'cms/login';
    }

    public static function TM_BASE_URL_Uploads() {
        return self::TM_BASE_URL() . 'Uploads/';
    }

    public static function TM_BASE_URL_CMS_Error() {
        return self::TM_BASE_URL() . 'cms/error';
    }

    public static function TM_BASE_URL_Error() {
        return self::TM_BASE_URL() . 'error';
    }

    public static function redirect($url = NULL) {
        if ($url != NULL)
            header('Location: ' . urldecode($url));
    }

    public static function current_url() {
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function qry_str_to_arr($qry_str = NULL) {
        if ($qry_str == NULL)
            $qry_str = $_SERVER['QUERY_STRING'];
        return TMLib::SplitStr($qry_str, '&', '=');
    }

    public static function QueryString($key) {
        $qry = self::qry_str_to_arr();
        return isset($qry[$key]) ? $qry[$key] : NULL;
    }

    public static function qry_str_exist($key, $array = NULL) {
        $array = $array == NULL ? self::qry_str_to_arr() : $array;
        if (is_array($array) && array_key_exists($key, $array))
            return TRUE;
        else
            return FALSE;
    }

    public static function return_login($login = NULL, $continue = NULL) {
        if ($login == NULL)
            $login = self::TM_BASE_URL_CMS_Login();
        $_SESSION['urlLogin'] = "continue=" . urlencode($continue == NULL ? self::current_url() : $continue);
        return "$login?$_SESSION[urlLogin]";
    }

    public static function return_continue($default = NULL) {
        if ($default == NULL)
            $default = self::TM_BASE_URL_CMS();
        $arr = self::qry_str_to_arr($_SESSION['urlLogin']);
        if (self::qry_str_exist('continue', $arr))
            $_SESSION['urlLogin'] = urldecode($arr['continue']);
        else
            $_SESSION['urlLogin'] = urldecode($default);
        return $_SESSION['urlLogin'];
    }

    public static function require_method() {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
            if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET')
                self::redirect(TM_BASE_URL_CMS_Error);
        return TRUE;
    }

    public static function require_post() {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
            self::redirect(TM_BASE_URL_CMS_Error);
        return TRUE;
    }

    public static function require_get() {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET')
            self::redirect(TM_BASE_URL_CMS_Error);
        return TRUE;
    }

    public static function csrf_check($csrf_cookie_name = 'csrf_cookie_name', $csrf_token_name = 'csrf_token_name') {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET') {
                return FALSE;
            } else {
                if ($_COOKIE[$csrf_cookie_name] != $_GET[$csrf_token_name])
                    return FALSE;
            }
        }else {
            //if ($_COOKIE[$csrf_cookie_name] != $_POST[$csrf_token_name])
            return $_COOKIE[$csrf_cookie_name];
        }
        //self::redirect(TM_BASE_URL_CMS_Error);
        return TRUE;
    }

}

class TMIP {

    public static function IPServer() {
        return $_SERVER['SERVER_ADDR'];
    }

    public static function IPClient2() {
        return $_SERVER['REMOTE_ADDR']? : ($_SERVER['HTTP_X_FORWARDED_FOR']? : $_SERVER['HTTP_CLIENT_IP']);
    }

    public static function IPClient() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function MACClient() {
        return shell_exec("arp -a " . self::IPClient());
    }

}
