<?php
include "function.php";
include "connection.php";


$course_id = clean_string($_POST["course_id"]);
$student_number = clean_string($_POST["student_number"]);
$first_name = clean_string($_POST["first_name"]);
$mid_name =  clean_string($_POST["mid_name"]);
$last_name =  clean_string($_POST["last_name"]);
$ext_name =  clean_string($_POST["ext_name"]);
$contact_number =  clean_string($_POST["contact_number"]);
$email_address =  clean_string($_POST["email_address"]);
$username =  clean_string($_POST["username"]);
$password =  clean_string(md5($_POST["password"]));
$role =  "STUDENT";
$new_password = $password;


if (isset($_REQUEST["addStudent"])) {

    $sql = "INSERT INTO `student_tb` (`course_id`, `student_number`, `first_name`, `mid_name`, `last_name`, `ext_name`, `contact_number`, `email_address`, `username`, `password`, `role`) VALUES ('$course_id','$student_number','$first_name','$mid_name','$last_name','$ext_name','$contact_number','$email_address','$username','$new_password','$role')";
    


    if (mysqli_query($conn, $sql)) {
        header("Location: /kulot/manage_student.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
