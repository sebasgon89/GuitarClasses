<?php

//db connection
$server='localhost';
$user='root';
$password='';
$db='userstest';

// DB connection
$conn = new mysqli($server, $user, $password, $db);	

// utf8 format definition
$conn->set_charset('utf8');

// error checking
if ($conn->connect_errno) {
	echo "DB connection error {$conn->connect_errno}";
}

// Project URL (with '/' at end)
$base_url="http://localhost/GuitarClasses/seba/";

?>
