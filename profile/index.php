<?php
ob_start();
session_start();

require_once"../login/dbcon.php";
$phonenumber = $_SESSION['phonenumber'];


if (!isset($_SESSION['phonenumber'])) {
  header("location: ../");
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="../sweet/dist/sweetalert2.all.min.js"></script>
  <script src="../sweet/dist/sweetalert2.min.js"></script>

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  
</head>

<body>

  <?php

            if (isset($_POST['update'])) {
              
             
              $name1 = $_FILES['aud1']['name'];
              $loc1 = $_FILES['aud1']['tmp_name'];
              $size1 = $_FILES['aud1']['size'];

                         
              $x1 = explode(".", $name1);
              $ext1 = strtolower(end($x1));

               if ($ext1 == "jpeg" OR $ext1 == "jpg" OR $ext1 == "png") {

                $sql = "UPDATE registration SET image = '$name1' WHERE phonenumber = '$phonenumber' ";

                if (mysqli_query($conn, $sql)) {
                   move_uploaded_file($loc1, "../images/".$name1);

                  ?>
                        <script>Swal.fire(
                          'Success!',
                          'Profile Image has been Updated',
                          'success'
                        )</script>
                 <?php
                  
                }else{

                  ?>
                  <script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please Try Again',
                   
                  })</script>

                 <?php

                }

               }else{

                ?><script>Swal.fire(
                'Invalid Image Format',
                'Your Image should be jpg,jpeg or png Only',
                'info'
              )</script><?php

               }
            }






            ?>


  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none bg-success"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
      <!-- User Data -->
      <?php
      
      $sql = "SELECT * FROM registration WHERE phonenumber = '$phonenumber' ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)> 0) {
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['fullname'];
        $phonenumber = $row['phonenumber'];
        $state = $row['state'];
        $lga = $row['lga'];
        $image = $row['image'];
        $loc = "../images/".$image;
      }


      ?>

      <div class="profile">
        <img src="<?php  echo $loc; ?>" alt="" class="img-fluid rounded-circle">
        <h6 class="text-light"><a href="index.html"><?php  echo $fullname; ?></a></h6>
        <div class="social-links mt-3 text-center">
          
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
         
          <a href="#" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
          
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar ">
        <ul>
          <li><a href="../" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Business Profile</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-upload"></i> <span>Upload Business Images</span></a></li>
          <li><a href="#facts" class="nav-link scrollto"><i class="bx bx-bar-chart"></i> <span>Statistics</span></a></li>


          <li><a href="#update" class="nav-link scrollto"><i class="bx bx-image"></i> <span>Update Profile Image</span></a></li>

          <li><a href="../admin/manage.php" class="nav-link scrollto"><i class="bx bx-task"></i> <span>Manage Upload</span></a></li>

          <li><a href="../upload/userp1.php" class="nav-link scrollto"><i class="bx bx-cog"></i> <span>Change Password</span></a></li>

           <li><a href="../admin/logout.php" class="nav-link scrollto"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>My Business</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="<?php  echo $loc; ?>" class="img-fluid rounded-left" style="border-radius: 20px;" alt="">
            
          </div>
          
        </div>

      </div>
    </section><!-- End About Section -->

    
   
    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        

        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            
            <div class="resume-item pb-0">
              <h4>Business Profile</h4>
              <table class="table table-top-countries table-responsive">
                <tr>
                  <td>
                    Business Name:
                  </td>

                  <td>
                    <?php echo $fullname; ?>
                    
                  </td>
                </tr>

                <tr>
                  <td>
                    Whatsapp Contact
                  </td>

                  <td>
                    <?php echo $phonenumber; ?>
                    
                  </td>
                </tr>
                <tr>
                  <td>
                    State:
                  </td>

                  <td>
                     <?php echo $state; ?>
                    
                  </td>
                </tr>
                <tr>
                  <td>
                    LGA
                  </td>

                  <td>
                     <?php echo $lga; ?>
                    
                  </td>
                </tr>
                
              </table>
              
            </div>

            <?php

            if (isset($_POST['upload'])) {
              
              $product = $_POST['product'];
              $price = $_POST['price'];
              $category = $_POST['category'];
              $product = $_POST['product'];

              $name1 = $_FILES['aud']['name'];
              $loc1 = $_FILES['aud']['tmp_name'];
              $size1 = $_FILES['aud']['size'];

                         
              $x1 = explode(".", $name1);
              $ext1 = strtolower(end($x1));

               if ($ext1 == "jpeg" OR $ext1 == "jpg" OR $ext1 == "png") {

                $sql = "INSERT INTO `products` (`sn`, `product`, `price`, `category`, `image`, `phonenumber`) VALUES (NULL, '$product', '$price', '$category', '$name1', '$phonenumber')";

                if (mysqli_query($conn, $sql)) {
                   move_uploaded_file($loc1, "../images/".$name1);

                  ?>
                        <script>Swal.fire(
                          'Success!',
                          'Image has been Uploaded',
                          'success'
                        )</script>
                 <?php
                  
                }else{

                  ?>
                  <script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please Try Again',
                   
                  })</script>

                 <?php

                }

               }else{

                ?><script>Swal.fire(
                'Invalid Image Format',
                'Your Image should be jpg,jpeg or png Only',
                'info'
              )</script><?php

               }
            }






            ?>

            <br><hr><br>
            <div class="resume-item">
              <h4>Upload Products Services</h4>
              <h5>2015 - 2016</h5>
              <form method="POST" enctype="multipart/form-data">
                <input type="text" name="product" placeholder="Products / Services Title" class="form-control" required><br>
                <input type="text" name="price" placeholder="Price" class="form-control" required><br>
                <select class="form-control" name="category" required>
                  <option selected disabled value="">Select Category</option>
                  <option>Products</option>
                  <option>Services</option>
                  
                </select><br>
                <input type="file" name="aud" class="form-control" required><br>
                <button class="btn btn-success" name="upload">Upload</button>
              </form>
            </div>


            <br><hr><br>
            <div class="resume-item" id="update">
              <h4>Update Business Image</h4>

              
             
              <form method="POST" enctype="multipart/form-data">
                <input type="file" name="aud1" class="form-control" required><br>
                <button class="btn btn-info" name="update">Update</button>
              </form>
            </div>
            
          </div>
          
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">

      <div class="container">

        

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Product & services Viewers so far</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total Number of Uploaded Images</strong></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->


    
    
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
      $('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 @. ()]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>

</body>

</html>