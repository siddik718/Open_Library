<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'library';

$conn = mysqli_connect($host,$user,$pass,$database) or die("Connection failed: " . mysqli_connect_error());

?>