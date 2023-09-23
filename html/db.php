<?php
$host = '192.168.1.132';
$username ='m21aie249';
$password = 'Csl7510@';
$database = 'phonebook';
$dbcon = @mysqli_connect($host, $username, $password, $database);
if(!$dbcon){
	die('could not find database'. mysqli_error($dbcon));
}


?>
