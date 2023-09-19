<?php
ob_start();
session_start();

require_once"../login/dbcon.php";

if (!isset($_SESSION['admin'])) {
    header("location: logout.php");
}


   
   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin</title>

    <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">


    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" width="50" height="50" alt="CoolAdmin"  />
                        </a>
                        <h4 class="text-center" style="color:indigo;">FPTB</h4>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                       
                       
                      
                        
                       
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>ACTIONS</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                
                               <li>
                                    <a href="../news/action/category.php">Create News Category</a>
                                </li>

                                 <li>
                                    <a href="../news/action/post.php">Post News</a>
                                </li>

                                 <li>
                                    <a href="all_news.php">Delete Post</a>
                                </li>



                                <li>
                                    <a href="../news/action/add_courses.php">Add Tutorial Courses</a>
                                </li>



                                <li>
                                    <a href="../pq/m_ad.php">Past Q.</a>
                                </li>


                               


                               
                            </ul>
                        </li>

                         <li>
                            <a href="../upload/upload.php">
                                <i class="fas fa-upload"></i>UPLOAD TUTORIALS</a>
                        </li>


                     

                        <li>
                            <a href="../upload/p1.php">
                                <i class="fas fa-key"></i>CHANGE PASSWORD</a>
                        </li>

                         <li>
                            <a href="logout.php">
                                <i class="fas fa-lock"></i>LOGOUT</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                   <img src="images/icon/logo.png" width="50" height="50" alt="CoolAdmin"  />
                </a>
                 <h4 class="text-center" style="color:indigo;">NACOSS FPTB</h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            
                            
                        </li>
                        
                       
                        

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>ACTIONS</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                
                               

                                <li>
                                    <a href="../news/action/category.php">Create News Category</a>
                                </li>

                                 <li>
                                    <a href="../news/action/post.php">Post News</a>
                                </li>

                                 <li>
                                    <a href="all_news.php">Delete Post</a>
                                </li>



                                <li>
                                    <a href="../news/action/add_courses.php">Add Tutorial Courses</a>
                                </li>



                                <li>
                                    <a href="../pq/m_ad.php">Past Q.</a>
                                </li>


                               
                            </ul>
                        </li>

                          <li>
                            <a href="../upload/upload.php">
                                <i class="fas fa-upload"></i>UPLOAD TUTORIALS</a>
                        </li>


                        
                        <li>
                            <a href="../upload/p1.php">
                                <i class="fas fa-key"></i>CHANGE PASSWORD</a>
                        </li>

                        <li>
                            <a href="logout.php">
                                <i class="fas fa-lock"></i>Logout</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">

                                        <a href="waiting.php"><div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                
                                         $sql1 = "SELECT * FROM registration WHERE status = 'yet' ";
                                         $result1 = mysqli_query($conn, $sql1);

                                                $ss = mysqli_num_rows($result1);
                                                $bb = "<span class='badge badge-warning'>$ss</span>";
                                              

        ?>
                                                <h2><?php echo $ss; ?></h2>
                                                <span>Total No. of Users Waiting for Approval </span>
                                            </div>
                                        </div></a>    

                                        
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">

                                        <a href="accepted.php"><div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                
                                         $sql1 = "SELECT * FROM registration WHERE status <> 'yet'";
                                         $result1 = mysqli_query($conn, $sql1);

                                                $ss = mysqli_num_rows($result1);
                                                $bb = "<span class='badge badge-warning'>$ss</span>";
                                              

        ?>
                                                <h2><?php echo $ss; ?></h2>
                                                <span>Total Number of Approved Users </span>
                                            </div>
                                        </div></a>    

                                        
                                        
                                    </div>
                                </div>
                            </div>


                             <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <a href="all_news.php"><div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">



                                            <?php
                                      $sql4 = "SELECT * FROM admin ";
                                         $result4 = mysqli_query($conn, $sql4);

                                                $ss4 = mysqli_num_rows($result4);
                                                $bb = "<span class='badge badge-warning'>$ss4</span>";
                
              

        ?>
                                                <h2><?php echo $ss4; ?></h2>
                                                <span>Total Number of Uploads</span>
                                            </div>
                                        </div></a>
                                        
                                    </div>
                                </div>
                            </div>
                           


                           



                            
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                         <a href="seen.php"> <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-eye"></i>
                                            </div>
                                            <div class="text">

                                                <?php

 
                                      $sql41 = "SELECT * FROM registration  ";
                                         $result41 = mysqli_query($conn, $sql41);

                                                $ss41 = mysqli_num_rows($result41);
                                                $bb = "<span class='badge badge-warning'>$ss</span>";
                
              

                                     ?>
                                                <h2><?php echo $ss41; ?></h2>
                                                
                                                <span>Total Viewers</span>
                                            </div>
                                        </div></a>
                                        
                                    </div>
                                </div>
                            </div>

                       


                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">

                                <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                    
                <!-- modal static -->
            
            </div>


                                
                               
                                


                            </div>
                            <div class="col-lg-3">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    
                                   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p class="mb-md-0"> &copy; Copyright <strong>Markaz Abi Adif <?php echo date("Y"); ?></strong>. All Rights Reserved </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
