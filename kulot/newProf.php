<?php
include "function.php";
include "connection.php";


$first_name = clean_string($_POST["first_name"]);
$mid_name = clean_string($_POST["mid_name"]);
$last_name =  clean_string($_POST["last_name"]);
$ext_name =  clean_string($_POST["ext_name"]);
$contact_number = clean_string($_POST["contact_number"]);
$email_address = clean_string($_POST["email_address"]); 
$username = clean_string($_POST["username"]);
$password =  clean_string(md5($_POST["password"]));
$role =  "PROFESSOR";

if (isset($_REQUEST["addProf"])) {

    $username2 = $_POST['username'];
    $email_address2 = $_POST['email_address'];

    $sql_u = "SELECT * FROM prof_tb WHERE username='$username2'";
    $sql_e = "SELECT * FROM prof_tb WHERE email_address='$email_address2'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);

    if (mysqli_num_rows($res_u) > 0){
        echo"<script type='text/javascript'>alert('Username has already taken!');window.location.href='/kulot/adminpage.php';</script>";

    }
    elseif (mysqli_num_rows($res_e)> 0) {
        echo"<script type='text/javascript'>alert('Email address has already taken!');window.location.href='/kulot/adminpage.php';</script>";

    }
    else {
        $sql = "INSERT INTO `prof_tb`(`first_name`, `mid_name`, `last_name`, `ext_name`, `contact_number`, `email_address`, `username`, `password`, `role`) VALUES ('$first_name','$mid_name','$last_name','$ext_name','$contact_number','$email_address','$username','$password','$role')";
        if (mysqli_query($conn, $sql)) {
            header("Location: /kulot/manage_prof.php");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    


    
}


mysqli_close($conn);
?>
