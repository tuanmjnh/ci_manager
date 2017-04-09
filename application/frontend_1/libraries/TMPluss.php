<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of LibTM
 *
 * @author tuanmjnh
 */
class tmpluss {

    //var $CI;
    public function __construct() {
        $this->CI = & get_instance();
    }

    public function getBoolean($val) {
        if (is_numeric($val) && $val != NULL) {
            $data = ($val == 0) ? NULL : 'Checked="Checked"';
        } else {
            $data = NULL;
        }
        return $data;
    }

    public function fixDecimal($data) {
        $data = str_replace(',', '', $data);
        if (!strpos($data, '.')) {
            $data .= '.00';
        }
        return $data;
    }

    public function TrimArray($arr) {
        if ($arr != NULL)
            foreach ($arr as $k => $v)
                $arr[$k] = trim($v);
        return $arr;
    }

    public function CreatePath($path = './Uploads/Default') {
        $path = preg_split('[/]', $path);
        $tmp = './';
        foreach ($path as $k => $v) {
            $tmp.=$v . '/';
            if (!is_dir($tmp))
                mkdir($tmp);
        }
        return substr($tmp, 2);
    }

    public function CreatePathImages($path = 'Uploads/') {
        $path.= ucfirst(self::CurrentController()) . '/Images';
        return self::CreatePath($path);
    }

    public function CreatePathFile($path = 'Uploads/') {
        $path.= ucfirst(self::CurrentController()) . '/File';
        return self::CreatePath($path);
    }

    public function CreatePathOrther($path = 'Uploads/', $subPath = 'Orther') {
        $path.= ucfirst(self::CurrentController()) . '/' . ucfirst($subPath);
        return self::CreatePath($path);
    }

    //public function 
    public function CurrentController() {
        return $this->CI->router->fetch_class();
    }

    public function getSegment($url = NULL) {
        $url = $url == NULL ? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : $url;
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $i = strpos($url, '/');
            $url = substr($url, $i + 1);
        }
        return explode('/', $url);
    }

    public function segment($index = 0) {
        $list = self::getSegment();
        if (count($list) > $index) {
            if ($index == -1)
                return $list[count($list) - 1];
            return $list[$index];
        } else
            return NULL;
    }

    public function GetCountSegments() {
        return count(self::getSegment());
    }

    public function CreateToken() {
        return md5(uniqid(rand(), true));
    }

    public function getImage($img) {
        if ($img != NULL || $img != '/')
            return TM_BASE_URL . $img;
        else
            return TM_BASE_URL . 'assets/images/default-50.jpg';
    }

    public function getUrlAction($method = NULL) {
        if ($method !== NULL)
            return TM_BASE_URL . self::CurrentController() . '/' . $method;
        else
            return TM_BASE_URL . self::CurrentController();
    }

}
