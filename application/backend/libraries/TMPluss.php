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

    public function SubTrimArray($obj) {
        if (is_array($obj)) {
            foreach ($obj as $k => $v)
                $obj[$k] = $this->SubTrimArray($v);
            return $obj = trim(implode(',', $obj), ',');
        } else
            return $obj = trim($obj);
    }

    public function TrimArray($arr) {
        if ($arr != NULL) {
            foreach ($arr as $k => $v)
                $arr[$k] = $this->SubTrimArray($v);
            return $arr;
        }
    }

    public function CreatePath($path = 'Uploads/Default') {
        $path = explode('/', $path); //preg_split('[/]', $path);
        $root = $_SERVER['DOCUMENT_ROOT'];
        $tmp = $root;
        foreach ($path as $k => $v) {
            $tmp.=$v . '/';
            if (!is_dir($tmp))
                mkdir($tmp);
        }
        return $tmp;
    }

    public function CreatePathImages($path = 'Uploads/') {
        $path.= ucfirst(self::CurrentController()) . '/Images';
        return self::CreatePath($path);
    }

    public function CreateThumbsPathImages($path = 'Uploads/') {
        $path.= ucfirst(self::CurrentController()) . '/Thumbs';
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

    public function getArray($obj = NULL) {
        if ($obj != NULL)
            return explode(',', trim($obj, ','));
        return NULL;
    }

    public function getStrArray($obj = NULL) {
        $obj = self::getArray($obj);
        $rs = '';
        foreach ($obj as $k => $v)
            $rs.=$v . ', ';
        return rtrim(rtrim($rs, ' '), ',');
    }

    public function getUrl() {
        return TM_BASE_URL . self::segment() . '/';
    }

    public function getUrlAction($method = NULL) {
        if ($method !== NULL)
            return self::getUrl() . self::CurrentController() . '/' . $method;
        else
            return self::getUrl() . self::CurrentController();
    }

    public function getUrlControl($control = NULL, $method = NULL) {
        if ($control == NULL)
            $control = self::CurrentController();
        if ($method != NULL)
            $method = '/' . $method;
        return self::getUrl() . $control . $method;
    }

    public function upload_image($width = NULL, $height = NULL) {
        if (isset($_FILES['ImageFiles']) && $_FILES['ImageFiles']['error'] == 0) {
            $u['upload_path'] = self::CreatePathImages();
            $u['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            //$u['max_size'] = '2048';
            //$u['overwrite'] = TRUE;
            $u['encrypt_name'] = TRUE;
            //$u['max_width'] = '1024';
            //$u['max_height'] = '768';
            $this->CI->load->library('upload', $u);
            $this->CI->load->library('image_lib');
            if ($this->CI->upload->do_upload('ImageFiles')) {
                $r['image_library'] = 'gd2';
                $r['source_image'] = $u['upload_path'] . $this->CI->upload->file_name;
                //$r['new_image'] = self::CreateThumbsPathImages() . $this->CI->upload->file_name;
                //$r['create_thumb'] = TRUE;
                $r['maintain_ratio'] = TRUE;
                if ($width != NULL)
                    $r['width'] = $width;
                if ($height != NULL)
                    $r['height'] = $height;
                $this->CI->image_lib->initialize($r);
                $this->CI->image_lib->resize();
                $this->CI->image_lib->clear();
                return ltrim($r['source_image'], $_SERVER['DOCUMENT_ROOT']);
            } else
                return 'error';
        }
        return NULL;
    }

    public function upload_multiple_image($input_file = 'ImageFiles', $width = NULL, $height = NULL) {
        $file = $_FILES[$input_file];
        $count = count($file['name']);
        $u['upload_path'] = self::CreatePathImages();
        $u['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        //$u['max_size'] = '2048';
        //$u['overwrite'] = TRUE;
        $u['encrypt_name'] = TRUE;
        //$u['max_width'] = '1024';
        //$u['max_height'] = '768';
        //
        //Result
        $rs['error'] = array();
        $rs['images'] = ',';
        for ($i = 0; $i < $count; $i++) {
            $_FILES[$input_file]['name'] = $file['name'][$i];
            $_FILES[$input_file]['type'] = $file['type'][$i];
            $_FILES[$input_file]['tmp_name'] = $file['tmp_name'][$i];
            $_FILES[$input_file]['error'] = $file['error'][$i];
            $_FILES[$input_file]['size'] = $file['size'][$i];
            //if ($_FILES[$input_file]['error'] == 0) {
            $this->CI->load->library('upload', $u);
            $this->CI->load->library('image_lib');
            //$this->upload->initialize($u);
            if ($this->CI->upload->do_upload($input_file)) {
                $r['image_library'] = 'gd2';
                $r['source_image'] = $u['upload_path'] . $this->CI->upload->file_name;
                $r['new_image'] = self::CreateThumbsPathImages() . $this->CI->upload->file_name;
                $r['create_thumb'] = TRUE;
                $r['maintain_ratio'] = TRUE;
                if ($width != NULL)
                    $r['width'] = $width;
                if ($height != NULL)
                    $r['height'] = $height;
                $this->CI->image_lib->initialize($r);
                //$this->CI->load->library('image_lib', $r);
                if (!$this->CI->image_lib->resize())
                    $rs['resize'][$i] = $this->image_lib->display_errors('', '');
                $this->CI->image_lib->clear();
                $rs['images'].= ltrim($r['source_image'], $_SERVER['DOCUMENT_ROOT']) . ',';
            } else
                $rs['error'][$i] = 'error'; //$this->upload->display_errors();









                
//}
        }
        return $rs;
        //}
        //return NULL;
    }

    public function csrf_check() {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'GET') {
                return FALSE;
            } else {
                if ($this->CI->security->get_csrf_hash() != $_GET[$this->CI->security->get_csrf_token_name()])
                    return FALSE;
            }
        }else {
            if ($this->CI->security->get_csrf_hash() != $_POST[$this->CI->security->get_csrf_token_name()])
                return FALSE;
        }
        //self::redirect(TM_BASE_URL_CMS_Error);
        return TRUE;
    }

}
