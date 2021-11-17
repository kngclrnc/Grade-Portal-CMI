<?php
include "function.php";
include "connection.php";

$course_code = clean_string($_POST["course_code"]);
$course_name = clean_string($_POST["course_name"]);
$remarks =  clean_string($_POST["remarks"]);


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
