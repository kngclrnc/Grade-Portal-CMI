<?php
    function getvalue($idx)
    {
        if(isset($_POST[$idx]))
        {
            return $_POST[$idx];
        }
        else if (isset($_GET[$idx]))
        {
            return $_GET[$idx];
        }
        else
        {
            return '';
        }
    }

    function clean_string($str)
    {
        include ("connection.php");
        return mysqli_real_escape_string($conn,$str);
    }

    function select($table, $where)
    {
        include ("connection.php");
        $sql = "SELECT * FROM `$table` $where";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }


    include ("connection.php");
    $password = clean_string(getvalue('password'));
    $username = clean_string(getvalue('username'));
    $new_password = md5($password);
    

    if (isset($_REQUEST['submit'])) {
        $where = "WHERE `username` = '$username' AND `password` = '$new_password'";
        $result = select('admins_tb', $where);
        $result1 = select('student_tb', $where);
        $result2 = select('prof_tb', $where);
        if($result)
        {
            $row = mysqli_fetch_array($result);    
            session_start();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['is_login'] = $row['is_login'];
            $_SESSION['id'] = $row['id'];
            $query = mysqli_query($conn, 'UPDATE `admins_tb` SET `is_login` = 1 WHERE id = '.$_SESSION['id']);
            if ($row['role'] == 'ADMIN') {
                echo"<script type='text/javascript'>alert('Welcome to Admin page!');window.location.href='/kulot/adminpage.php';</script>";
            }

            
            
        }
        elseif ($result1)
        {
            
            $row = mysqli_fetch_array($result1);    
            session_start();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['is_login'] = $row['is_login'];
            $_SESSION['id'] = $row['id'];
            $query = mysqli_query($conn, 'UPDATE `student_tb` SET `is_login` = 1 WHERE id = '.$_SESSION['id']);
            if ($row['role'] == 'STUDENT') {
                echo"<script type='text/javascript'>alert('Welcome to Student grade portal!');window.location.href='/kulot/studentpage.php';</script>";
            }
        }
        elseif ($result2) {
            $row = mysqli_fetch_array($result2);    
            session_start();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['is_login'] = $row['is_login'];
            $_SESSION['id'] = $row['id'];
            $query = mysqli_query($conn, 'UPDATE `prof_tb` SET `is_login` = 1 WHERE id = '.$_SESSION['id']);
            if ($row['role'] == 'PROFESSOR') {
                echo"<script type='text/javascript'>alert('Welcome Professor!');window.location.href='/kulot/profpage.php';</script>";
            }
            else{
                echo "Invalid Password";
            }
        }
    }
?>