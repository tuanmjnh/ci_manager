<?php

class LKEY {

    public static function GET($key, $rs = NULL) {//$rs = 'this is undefined'
        if ($key != NULL && $key != '') {
            $key = explode('|', strtolower($key));
            $s = '';
            foreach ($key as $v) {
                if (isset($_SESSION['langkey'][$v]))
                    $s .= $_SESSION['langkey'][$v] . ' ';
                else
                    $s .= ($rs == NULL ? $v : $rs) . ' ';
            }
            $s = trim($s, ' ');
            return $s != '' ? $s : $key;
        }
        return '';
    }

}
