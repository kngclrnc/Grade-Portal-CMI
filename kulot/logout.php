<?php
    include "connection.php";
    session_start();
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];
    if ($role == "PROFESSOR") {

        $query = mysqli_query($conn, 'UPDATE `prof_tb` SET `is_login` = 0 WHERE id = '.$id);
    }
    elseif ($role == "ADMIN") {
        $query = mysqli_query($conn, 'UPDATE `admins_tb` SET `is_login` = 0 WHERE id = '.$id);
    }
    elseif ($role == "STUDENT") {
        $query = mysqli_query($conn, 'UPDATE `student_tb` SET `is_login` = 0 WHERE id = '.$id);
    }

session_destroy();
header("Location: /kulot/index.php");

?>
