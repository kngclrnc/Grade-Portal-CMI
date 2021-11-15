<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "cmi_gradedb";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$course_id = $_POST["course_id"];
$student_number = $_POST["student_number"];
$first_name = $_POST["first_name"];
$mid_name =  $_POST["mid_name"];
$last_name =  $_POST["last_name"];
$ext_name =  $_POST["ext_name"];
$contact_number =  $_POST["contact_number"];
$email_address =  $_POST["email_address"];
$username =  $_POST["username"];
$password =  md5($_POST["password"]);
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
