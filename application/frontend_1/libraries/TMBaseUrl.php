<?php
class TMBaseUrl {
    public static function TM_BASE_URL() {
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $s = explode('/', trim(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH), '/'));
            return 'http://localhost/' . $s[0] . '/';
        } else {
            return 'http://' . $_SERVER['SERVER_NAME'] . '/';
        }
    }

}
