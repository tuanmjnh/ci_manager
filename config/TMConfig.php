<?php

require_once('UUID.php');
require_once('TMApplicationID.php');
require_once('TMLib.php');
require_once('TMAccess.php');
require_once('TMPage.php');
//SET DEFAULT TIME ZONE
date_default_timezone_set('Asia/Ho_Chi_Minh');
//SET DEFAUTL URL
define('TM_BASE_URL', TMUrl::TM_BASE_URL());
define('TM_BASE_URL_Login', TMUrl::TM_BASE_URL_Login());
define('TM_BASE_URL_CMS', TMUrl::TM_BASE_URL_CMS());
define('TM_BASE_URL_CMS_Login', TMUrl::TM_BASE_URL_CMS_Login());
define('TM_BASE_URL_Uploads', TMUrl::TM_BASE_URL_Uploads());
define('TM_BASE_URL_CMS_Error', TMUrl::TM_BASE_URL_CMS_Error());
//SET APPLICATION ID
define('TM_ApplicaionID', TMApplicationID::GetTMApplicationID());
