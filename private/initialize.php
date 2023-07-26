<?php


// potrzebujemy zdefiniować ścieżki



define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_PATH . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/shared_path');



define('www_root', $_SERVER['SCRIPT_NAME']);



$public_end = strpos($_SERVER['SCRIPT_NAME'], '/');

$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WWW_ROOT', $doc_root);



require_once('helper_functions.php');
require_once('status_error_functions.php');
require_once('database_functions.php');
require_once('validation_functions.php');


include 'classes/databaseobject.class.php';
include 'classes/admin.class.php'; 
include 'classes/domain.class.php';
include 'classes/server.class.php'; 
include 'classes/session.class.php'; 

  // Autoload class definitions
   function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include __DIR__ . 'classes/' . $class . '.php';
    }
  }
  spl_autoload_register('my_autoload');




$db = db_connect();
DatabaseObject::db_init($db);

$session = new Session;