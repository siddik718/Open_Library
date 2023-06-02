<?php

$host = 'localhost';
$user = 'root';
$pass = '';

$con = mysqli_connect($host,$user,$pass);

if($con == false) {
	exit("Error 404");
}

	$sql = 'create database library'; // Creating a Database named library.
	$res = mysqli_query($con,$sql);
	if($res == true) {
		echo 'OK'; // checking if everything ok or not.
	}else {
		echo "Not Ok";
	}

?>