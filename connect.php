<?php
ini_set("display_errors",true);
ob_start();
session_start();

//database credentials
define('DBHOST','us-cdbr-east.cleardb.com');
define('DBUSER','b9b362858de4a9');
define('DBPASS','2cb07a7d');
define('DBNAME','heroku_8d5f4fde79ce9f6');
 define("db_port",8889);

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//load classes as needed
spl_autoload_register(function ($class) {
   
   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 	
	
	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}
	
	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 		
	 
});
?>
