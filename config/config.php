<?php

// ----------------------------
// database configuration
// ----------------------------
$DB['db_server'] = '127.0.0.1';
$DB['db_port'] = ':3306';
$DB['db_username'] = 'root';
$DB['db_password'] = 'Esco2017';
$DB['db_name'] = 'dh_database';
$DB['db_type'] = 'mysqli';

// ----------------------------
// Webiste Admin Login
// ----------------------------
$username = "";
$password = "";


// ----------------------------
// Page Default Password
// ----------------------------
$default_password = 'dreamhouse12345';

/*
 * Uploaded File Path
 */
$UPLOADED_FILES_PATH = "";
$FILE_UPLOADER_PATH = "";

$FILE_UPLOAD_PATH = "";

// ----------------------------
// SMS Details
// ----------------------------
$SMS_EMAIL = 'Strafer14@yahoo.com';
$SMS_PASSWORD = 'Tsumichan';
$SMS_DEVICE_ID = 47936;

// @TODO: Set the default timezone as per your preference
// default value = UTC
$DEFAULT_TIMEZONE = "Asia/Manila";
// set create_user_code and update_user_code
$SYSTEM_USER = 'system';
$SYSTEM_ID = '9999';




// set timezone if configured
if(isset($DEFAULT_TIMEZONE) && function_exists('date_default_timezone_set')) {
	@date_default_timezone_set($DEFAULT_TIMEZONE);
}


?>