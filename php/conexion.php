<?php


$hostname_myconex = "localhost";

$username_myconex = "root";
$password_myconex = '';
$database_myconex = "secretaria";


$myconex = mysqli_connect($hostname_myconex, $username_myconex, $password_myconex, $database_myconex); 

if (!mysqli_set_charset($myconex, "utf8")) {
  mysqli_error($enlace);
    exit();
} else {

}



