<?php
$host = 'mysql:3306';
$username ='root';
$password = 'Csl7510@';
$database = 'phonebook';
$dbcon = @mysqli_connect($host, $username, $password, $database);
if(!$dbcon){
	die('could not find database'. mysqli_error($dbcon));
}


?>
