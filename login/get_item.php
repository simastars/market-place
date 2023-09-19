<?php
ob_start();
session_start();

require_once"dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modern Market</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.7.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  
  

  <main id="main">

     <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="bg-success text-center">
          <h2>Recent Search</h2>
         
        </div>

        <div class="row">

          <?php

      $output = '';


if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM products 
  WHERE product LIKE '%".$search."%'
  OR phonenumber LIKE '%".$search."%' 
  OR category LIKE '%".$search."%' 
 
  ORDER BY rand() LIMIT 10
 " ;
}
else
{
 $query = "
  SELECT * FROM products LIMIT ORDER BY rand() LIMIT 10 
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 
 while($row = mysqli_fetch_assoc($result))
 {
                $product = $row['product'];
                $price = $row['price'];
                $category = $row['category'];
                $image = $row['image'];
                $loc = "../images/".$image;

  echo "
                       <div class='col-lg-4 col-md-6'>
                        <div class='speaker' data-aos='fade-up' data-aos-delay='100'>
                          <img src='$loc' alt='Speaker 1' class='img-fluid'>
                          <div class='details'>
                            <h3><a href='speaker-details.html'>$product</a></h3>
                            <p style='color:#7CFC00'>&#8358 $price</p>
                            <div class='social'>
                             
                            </div>
                          </div>
                        </div>
                      </div>
  ";
 }

}
else
{
 echo "<h6 class='alert alert-info'>Item  not found</h6>";
}

?>

          

        </div>
      </div>

    </section><!-- End Speakers Section -->



   
    

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>