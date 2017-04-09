<?php
//require_once('application/libraries/UUID.php');
class TMApplicationID {
    static $path = __DIR__; // '/config';
    static $file = 'TMConfig.txt';
    public static function getFile(){
        return self::$path . '/' . self::$file;
    }
    public static function CreateTMApplication() {
        if (!is_dir(self::$path)) mkdir(self::$path);
        $handle = fopen(self::getFile(), 'w') or die("System error!");
        $appId = UUID::NewGuid();
        fwrite($handle, $appId);
        fclose($handle);
        return $appId;
    }
    public static function OpenTMApplication(){
        $handle = fopen(self::getFile(), 'r') or die("System error!");
        $appId = fread($handle, filesize(self::getFile()));
        fclose($handle);
        return $appId;
    }
    public static function GetTMApplicationID() {
        $appId = NULL;
        if (!file_exists(self::getFile()) OR filesize(self::getFile()) != 36) {
            $appId = self::CreateTMApplication();
        } else {
            $appId = self::OpenTMApplication();
            if (!UUID::isGuid($appId)) $appId = self::CreateTMApplication();
        }
        return $appId;
    }
}
