<?php

    $ID = $_POST['id'];
    $Pass = $_POST['pass'];

    include "../db/config.php";
    $sql = "SELECT * FROM admin WHERE ID='$ID' and Password='$Pass';";

    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $row = mysqli_fetch_assoc($query);

        $_SESSION['login'] = True;
        $_SESSION['admin'] = True;
        $_SESSION['id'] = $ID;
        $_SESSION['name'] = $row['Name'];

        header("location: ../index.php?id='$ID'");
        exit();
    }

    header("location: ../admin/index.php?error=Invalid Username or Password")

?>