<?php

include '../db/config.php';

$sql = 'CREATE TABLE IF NOT EXISTS User (
    	ID int,
		Primary Key(ID),
    	Name varchar(255),
    	Phone varchar(255),
    	Email varchar(255),
    	Department varchar(255),
    	Address varchar(255),
		UType varchar(255),
    	Password varchar(255)
	);';
	
$res = mysqli_query($conn,$sql);

if($res) {
	echo "FINE";
}else {
	echo "NOT FINE";
}

$sql = 'CREATE TABLE IF NOT EXISTS admin (
	ID int,
	Primary Key(ID),
	Name varchar(255),
	Password varchar(255)
);';

$res = mysqli_query($conn,$sql);

if($res) {
echo "FINE";
}else {
echo "NOT FINE";
}

$sql = 'CREATE TABLE IF NOT EXISTS books (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    cover_image VARCHAR(255) NOT NULL,
    book_pdf VARCHAR(255) NOT NULL
);';

$res = mysqli_query($conn,$sql);

if($res) {
echo "FINE";
}else {
echo "NOT FINE";
}


?>