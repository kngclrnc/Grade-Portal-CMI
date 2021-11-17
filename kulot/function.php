<?php

    function system_navbar()
    {
        include 'connection.php';
        session_start();
        
        $id = $_SESSION['id'];
        $role = $_SESSION['role'];
        $rolevalue = "";

        if ($role == "ADMIN") {
            $rolevalue = "admins_tb";
        }elseif ($role == "PROFESSOR") {
            $rolevalue= "prof_tb";
        }elseif ($role == "STUDENT") {
            $rolevalue = "student_tb";
        }
        
        
        

        $query = "SELECT * FROM $rolevalue WHERE `id` = $id";
        $query1 = mysqli_query($conn,$query);
        $result11 = mysqli_fetch_array($query1);
        

        echo '
            <nav id="sidebar">
                <div class="sidebar-header">
                <span><img src="image/logo.png" style="margin-left: 65px;" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px"></span>
                <span><h3>College of Mary Immaculate</h3></span>
                </div>

                <ul class="list-unstyled components">
            
                <span><img src="image/Profile-Avatar-PNG.png" style="margin-left: 30px;" class="rounded-circle" alt="Cinque Terre" width="50px" height="50px"></span>
                <span>'.$result11['first_name'].' '.$result11['last_name'].'</span> 
                <br>
                <b style="font-size: 20px; margin-left: 75px;">'.$result11['role'].'</b>
                <br>
                <br>
            ';
            if($result11['role'] == 'ADMIN')
            {
                echo '
                    <li>
                        <a href="adminpage.php">Manage Admin Account </a>
                    </li>
                
                    <li>
                        <a href="manage_prof.php">Manage Prof Account	</a>
                    </li>

                    <li>
                        <a href="manage_student.php">Manage Student Account	</a>
                    </li>

                    <li>
                        <a href="manage_course.php">Manage Course</a>
                    </li>

                    <li>
                        <a href="manage_subject.php">Manage Subject	</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    </ul>

                    <ul class="list-unstyled CTAs">
                    <li>
                        <a href="logout.php" class="logout">Log out</a> 
                    </li>
                    <li>
                        <a href="#" class="About_us">About us</a>
                    </li>
                    
                ';
            }
            elseif($result11['role'] == 'PROFESSOR')
            {
                echo '
                <li>
                <a href="profpage.php">My Classes </a>
                </li>
            
                <li>
                    <a href="#">My Account	</a>
                </li>
        
                <li>
                    <a href="#">Contact</a>
                </li>
                </ul>
        
                <ul class="list-unstyled CTAs">
                <li>
                    <a href="index.php" class="logout">Log out</a> 
                </li>
                <li>
                    <a href="#" class="About_us">About us</a>
                </li>
                    
                  
                
                    
                ';
            }
            elseif($result11['role'] == 'STUDENT')
            {
                echo '
                    <li>
                        <a href="studentpage.php">Student Info </a>
                    </li>
                
                    <li>
                        <a href="viewGrades.php">View Grades	</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>
                    </ul>

                    <ul class="list-unstyled CTAs">
                    <li>
                        <a href="logout.php" class="logout">Log out</a> 
                    </li>
                    <li>
                        <a href="#" class="About_us">About us</a>
                    </li>
                ';
            }
        echo '
            </ul>
        </nav>
        ';
    }

    function toggle_navbar($page1, $page2, $page3, $page4)
    {
        echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">'.$page1.'</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">'.$page2.'</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">'.$page3.'</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">'.$page4.'</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        ';
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

    function clean_string($str)
    {
        include ("connection.php");
        return mysqli_real_escape_string($conn,$str);
    }

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


    
?>
