<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "cmi_gradedb";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$remarks =  $_POST["remarks"];


if (isset($_REQUEST["addCourse"])) {

    $sql = "INSERT INTO `course_tb`(`course_code`, `course_name`, `remarks`) VALUES ('$course_code','$course_name','$remarks')";
    


    if (mysqli_query($conn, $sql)) {
        header("Location: /kulot/manage_course.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
