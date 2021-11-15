<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "cmi_gradedb";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$sub_code = $_POST["sub_code"];
$sub_name = $_POST["sub_name"];
$remarks =  $_POST["remarks"];


if (isset($_REQUEST["addSubject"])) {

    $sql = "INSERT INTO `subject_tb`(`id`, `sub_code`, `sub_name`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES ('','$sub_code','$sub_name','$remarks','','','','','')";
    


    if (mysqli_query($conn, $sql)) {
        header("Location: /kulot/manage_subject.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
