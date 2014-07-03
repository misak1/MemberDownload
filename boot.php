<?php
// ソースチェック用
//header('Content-type: text/plain; charset=UTF-8');
//header('Content-Transfer-Encoding: binary');

require_once('config.php');

define("mf_session_name", 'iiw_contact');
define("mf_db_server", '192.168.1.201');
define("mf_dbname", 'imageworks_mf');
define("mf_dbuser", 'imageworks');
define("mf_dbpasswd", 'imageworks-6one');

// Global Function
define("gucchi_log", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'contact.log');

?>