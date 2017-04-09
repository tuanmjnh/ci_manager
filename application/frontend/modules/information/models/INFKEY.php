<?php

class INFKEY {

    public static function GET($key, $rs = NULL) {//$rs = 'this is undefined'
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_APPKEY($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVAppKey'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_KEY($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVKey'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_VALUE($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVValue'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_SUBVALUE($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVSubValue'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_ORDER($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFIOrder'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_DESC($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVDesc'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_FLAG($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFIFlag'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

    public static function GET_PLUS($key, $rs = NULL) {
        if ($key != NULL && $key != '') {
            $key = strtolower($key);
            return isset($_SESSION['inf'][$key]) ? $_SESSION['inf'][$key]['INFVPlus'] : ($rs !== NULL ? $rs : $key);
        }
        return '';
    }

}
