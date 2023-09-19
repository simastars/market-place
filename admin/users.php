<?php
ob_start();
session_start();

require_once"../login/dbcon.php";

if (!isset($_SESSION['admin'])) {
    header("location: logout.php");
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM registration WHERE sn ='$id' ";
    if (mysqli_query($conn, $sql)) {
        
        
    }
    else{
        echo "failed";
    }
}



if (isset($_GET['rq'])) {
    $id = $_GET['rq'];
    $status = "Approved";
    $sql = "UPDATE registration SET status = '$status' WHERE sn ='$id' ";
    if (mysqli_query($conn, $sql)) {
        
        
    }
    else{
        echo "failed";
    }
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

    <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">


    <!-- Title Page-->
    <title>Registered Users</title>
     <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
   


       

        <!-- PAGE CONTAINER-->
        <div class="page-cntainer">
            <!-- HEADER DESKTOP-->
            

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">LIST OF ALL REGISTERED USERS</h3>
                                <div class="table-responsive table--no-card m-b-30">
                                    <a href="admin.php" class="btn btn-primary">Back</a>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Fullname</th>
                                                <th>Phonenumber</th>
                                                <th>State</th>
                                                <th>LGA</th>
                                                <th>Login ID</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>


                                <?php

                                $sql = "SELECT * FROM registration WHERE status = 'yet'  ";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    
                                    for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                                              $sn = $i + 1;
                                              $row = mysqli_fetch_assoc($result);
                                              $fullname = $row['fullname'];
                                              $phonenumber = $row['phonenumber'];
                                              $state = $row['state'];
                                              $lga = $row['lga'];
                                              $password = $row['password'];
                                           
                                              $serial = $row['sn'];

                                              echo "<tr>
                                                <td>$serial</td>
                                                <td>$fullname</td>
                                                <td>$phonenumber</td>
                                                 <td>$state</td>
                                                  <td>$lga</td>
                                                  <td>$password</td>




                                                <td>
                                                <a href='users.php?rq=$serial' class='btn btn-success'>Approve</a>
                                                </td>
                                               
                                                <td>
                                                <a href='users.php?id=$serial' class='btn btn-danger'>Reject</a>
                                                </td>

                                              
                                            </tr>";

                                }

                            }




                                ?>

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p class="mb-md-0"> &copy; Copyright <strong>NACOSS FPTB <?php echo date("Y"); ?></strong>. All Rights Reserved </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
