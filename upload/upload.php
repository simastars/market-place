<?php
ob_start();
session_start();
require_once "../login/dbcon.php";

if (!isset($_SESSION['admin'])) {
    header("location: ../admin/logout.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Videos</title>
  
 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link href="images/icons/1.png" rel="icon">
  <link href="images/icons/1.png" rel="apple-touch-icon">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--===============================================================================================-->
</head>
<body>

  <?php

  if (isset($_POST['upload'])) {

            //Audio File
            $name1 = $_FILES['aud']['name'];
            $loc1 = $_FILES['aud']['tmp_name'];
            $size1 = $_FILES['aud']['size'];

            $name2 = $_FILES['aud2']['name'];
            $loc2 = $_FILES['aud2']['tmp_name'];
            $size2 = $_FILES['aud2']['size'];
               
            $x1 = explode(".", $name1);
            $ext1 = strtolower(end($x1));


            $x2 = explode(".", $name2);
            $ext2 = strtolower(end($x2));

            //Image File
            
           
            $heading = $_POST['heading'];
            $course = $_POST['course'];
            $category = $_POST['category'];
            
        
            $dates = date("d-m-yy");
            
            

            $sq = "SELECT * FROM videos WHERE video_file = '$name1' AND  heading ='$heading' ";
            $result = mysqli_query($conn, $sq);
            if (mysqli_num_rows($result)> 0) {

             ?><script>alert("File Already Exist");</script><?php

            }
            else{


                //Check Condition for Uploads

            if ($ext1 == "mp4" AND $ext2 == "jpg") {

              move_uploaded_file($loc1, "videos/".$name1);
              move_uploaded_file($loc2, "images/".$name2);
              
             
            

              $sql = "INSERT INTO `videos` (`id`, `video_file`, `images`, `heading`, `dates`, `course`, `category`) VALUES (NULL, '$name1', '$name2', '$heading', '$dates', '$course', '$category')";


              if (mysqli_query($conn, $sql)) {
                ?><script>alert("File Uploaded Successfully");</script><?php
              }
              else{
                ?><script>alert("Failed to Upload File Please Try Again");</script><?php
              }
              
            }
            else{
              ?><script>alert("The File Should be mp3, m4a, wav or amr Only");</script><?php
            }


            }
            


          
  }

  ?>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" enctype="multipart/form-data">
          <span class="login100-form-title">
           <h6>Upload Tutorials</h6>
          </span>

         

          
           
            <div class="wrap-input100 validate-inp"  data-validate="You must select a file">
              <select class="input100" name="course" required>
                <option selected disabled value="">Select Course</option>
                <?php 
                  $sql = "SELECT * FROM tutorial_courses";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result)> 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $course = $row['course'];
                      echo "

                      <option>$course</option>


                      ";
                    }
                  }
                ?>
                
              </select>
            <span class="focus-input100"></span>
          </div><br>

           
          <div class="wrap-input100 validate-inp"  data-validate="Enter Heading">
            <input class="input100" type="text" name="heading" placeholder="Enter Video Heading Here" required>
            <span class="focus-input100"></span>
          </div><br>


      
            <div class="wrap-input100 validate-inp"  data-validate="You must select a file">
              <select class="input100" name="category" required>
              <option selected disabled value="">Select Language</option>
              <option>ENGLISH</option>
              <option>HAUSA</option>
              </select>
            <span class="focus-input100"></span>
          </div>


            <h6>Video File</h6>

          <div class="wrap-input100 validate-inp" data-validate="You must select a file">
            <input class="input100" type="file" name="aud" required>
            <span class="focus-input100"></span>
          </div>

          <h6>Image File</h6>

           <div class="wrap-input100 validate-inp" data-validate="You must select a file">
            <input class="input100" type="file" name="aud2" required>
            <span class="focus-input100"></span>
          </div>

            
        



           
           


          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="upload">
             Upload
            </button>
          </div>

          
        </form>

        <br><br>

         <a href="../admin/admin.php" class="btn btn-primary">Back</a>
      </div>
    </div>
  </div>
  
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>