<?php
    session_start();
    include "function.php";
 


    include ("connection.php");
    $password = clean_string(getvalue('password'));
    $username = clean_string(getvalue('username'));
    $new_password = md5($password);
    

    if (isset($_REQUEST['submit'])) {
        $where = "WHERE `username` = '$username' AND `password` = '$new_password'";
        $result = select('admins_tb', $where);
        $result1 = select('student_tb', $where);
        $result2 = select('prof_tb', $where);
        $admin = mysqli_fetch_array($result);    
        $student = mysqli_fetch_array($result1);    
        $prof = mysqli_fetch_array($result2);    
        

        if($result)
        {   
            $query = mysqli_query($conn, 'UPDATE `admins_tb` SET `is_login` = 1 WHERE id = '.$admin['id']);
            if ($admin['role'] == 'ADMIN') {
                $_SESSION['id'] = $admin['id'];
                $_SESSION['role'] = $admin['role'];
                // echo"<script type='text/javascript'>alert('Welcome to Admin page!');window.location.href='/kulot/adminpage.php';</script>";
                header("Location: /kulot/adminpage.php");
            }
            
            
        }
        elseif ($result1)
        {
            $query = mysqli_query($conn, 'UPDATE `student_tb` SET `is_login` = 1 WHERE id = '.$prof['id']);
            if ($student['role'] == 'STUDENT') {
                $_SESSION['id'] = $student['id'];
                $_SESSION['role'] = $student['role'];
                header("Location: /kulot/studentpage.php");
            }
        }
        elseif ($result2) {
            $query = mysqli_query($conn, 'UPDATE `prof_tb` SET `is_login` = 1 WHERE id = '.$student['id']);
            if ($prof['role'] == 'PROFESSOR') {
                $_SESSION['id'] = $prof['id'];
                $_SESSION['role'] = $prof['role'];
                header("Location: /kulot/profpage.php");
            }
        }
        else {
            header("Location: /kulot/index.php");
            
        }
    }
?>
