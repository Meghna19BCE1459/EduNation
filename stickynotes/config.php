<?php

//Connection to the MySQL Server by - hackandphp.com

define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
define('DB_USERNAME', 'root'); // Mysql username
define('DB_PASSWORD', ''); // Mysql password
define('DB_DATABASE', 'education'); // Mysql database name


$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysql_error()); //DataBase Connection 


//Function for sql injection
function sqlInjection($data){
$data = stripslashes($data);
$date = mysqli_real_escape_string($data);
return $data;	
}

//Function for Json Output
function outputJSON($msg, $status = 'error',$other=""){
    header('Content-Type: application/json');
    die(json_encode(array(
        'data' => $msg,
        'status' => $status,
		'other' => $other
		
    )));
}

?>