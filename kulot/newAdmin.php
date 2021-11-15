<?php
    include ("connection.php");


$first_name = $_POST["first_name"];
$mid_name = $_POST["mid_name"];
$last_name =  $_POST["last_name"];
$ext_name =  $_POST["ext_name"];
$contact_number = $_POST["contact_number"];
$email_address = $_POST["email_address"]; 
$username = $_POST["username"];
$password =  md5($_POST["password"]);
$role =  "ADMIN";

if (isset($_REQUEST["addAdmin"])) {

    $username2 = $_POST['username'];
    $email_address2 = $_POST['email_address'];

    $sql_u = "SELECT * FROM admins_tb WHERE username='$username2'";
    $sql_e = "SELECT * FROM admins_tb WHERE email_address='$email_address2'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);

    if (mysqli_num_rows($res_u) > 0){
        echo"<script type='text/javascript'>alert('Username has already taken!');window.location.href='/kulot/adminpage.php';</script>";

    }
    elseif (mysqli_num_rows($res_e)> 0) {
        echo"<script type='text/javascript'>alert('Email address has already taken!');window.location.href='/kulot/adminpage.php';</script>";

    }
    else {
        $sql = "INSERT INTO `admins_tb`(`first_name`, `mid_name`, `last_name`, `ext_name`, `contact_number`, `email_address`, `username`, `password`, `role`, `active`) VALUES ('$first_name','$mid_name','$last_name','$ext_name','$contact_number','$email_address','$username','$password','$role', 1)";
        if (mysqli_query($conn, $sql)) {
            header("Location: /kulot/adminpage.php");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    


    
}


mysqli_close($conn);
?>
