<?php
class UUID {
    /**
     * Generates version 1: MAC address
     */
    public static function v1() {
        if (!function_exists('uuid_create'))
            return false;
        uuid_create($context);
        uuid_make($context, UUID_MAKE_V1);
        uuid_export($context, UUID_FMT_STR, $uuid);
        return trim($uuid);
    }
    /**
     * Generates version 3 UUID: MD5 hash of URL
     */
    public static function v3($i_url) {
        if (!function_exists('uuid_create'))
            return false;
        if (!strlen($i_url))
            $i_url = self::v1();
        uuid_create($context);
        uuid_create($namespace);
        uuid_make($context, UUID_MAKE_V3, $namespace, $i_url);
        uuid_export($context, UUID_FMT_STR, $uuid);
        return trim($uuid);
    }
    /**
     * Generates version 4 UUID: random
     */
    public static function v4() {
        if (!function_exists('uuid_create'))
            return false;
        uuid_create($context);
        uuid_make($context, UUID_MAKE_V4);
        uuid_export($context, UUID_FMT_STR, $uuid);
        return trim($uuid);
    }
    /**
     * Generates version 5 UUID: SHA-1 hash of URL
     */
    public static function v5($i_url) {
        if (!function_exists('uuid_create'))
            return false;
        if (!strlen($i_url))
            $i_url = self::v1();
        uuid_create($context);
        uuid_create($namespace);
        uuid_make($context, UUID_MAKE_V5, $namespace, $i_url);
        uuid_export($context, UUID_FMT_STR, $uuid);
        return trim($uuid);
    }
    public static function NewGuid_1() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    public static function NewGuid() {
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = md5(uniqid(rand(), true));
            $hyphen = chr(45); // "-"          
            $uuid = substr($charid, 0, 8) . $hyphen //chr(123)// "{"
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12); //. chr(125); // "}"
            return $uuid;
        }
    }
    public static function NewGuidUp() {
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"          
            $uuid = substr($charid, 0, 8) . $hyphen //chr(123)// "{"
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12); //. chr(125); // "}"
            return $uuid;
        }
    }
    public static function isGuid($guid) {
        if (preg_match("/^(\{)?[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}(?(1)\})$/i", $guid))
            return TRUE;
        return FALSE;
    }
}
