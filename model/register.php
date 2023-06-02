<?php 

$name = $_POST['name'];
$id = $_POST['id'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dept = $_POST['dept'];
$address = $_POST['address'];
$password = $_POST['pass'];
$cpassword = $_POST['cpass'];
$type = $_POST['radio'];

if($password != $cpassword) {
    header("location: ../view/register.php?error=Please Check Your Password Again.");
    exit();
}

include "../db/config.php";
$sql = "SELECT * FROM user WHERE id='$id';";

$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)) {
    header("location: ../view/register.php?error=User Already Exist.");
    exit();
}

$sql = "INSERT INTO `user` (`ID`, `Name`, `Phone`, `Email`, `Department`, `Address`, `UType`, `Password`) 
        VALUES ('$id', '$name', '$phone', '$email' , '$dept', '$address', '$type', '$password')";

$query = mysqli_query($conn,$sql);

if($query) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['login'] = True;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;

    header("location: ../index.php");
    exit();
}
exit("Error Occured");

?>