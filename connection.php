<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{ 
	die("failed to connect!");
}
