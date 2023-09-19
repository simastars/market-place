<?php
ob_start();
session_start();
error_reporting(E_ALL);
require_once "./login/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Market Joint</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/mj.png" rel="icon">
  <link href="assets/img/mj.png" rel="apple-touch-icon">
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

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="POST">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome"  name="search_box" id="search_box">
            </div>
          </div>

          <div class="table-responsive" id="dynamic_content"></div>
          
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Market<span class="color-b"> Joint</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="registration.php">Register your Business</a>
          </li>

          <?php
          if (isset($_SESSION['phonenumber'])) {
            echo" <li class='nav-item'>
                    <a class='nav-link' href='admin/logout.php'>Logout</a>
                  </li>

                  <li class='nav-item'>
                    <a class='nav-link' href='profile/'>Profile</a>
                  </li>";
          }else{
            echo "<li class='nav-item'>
                    <a class='nav-link' href='login/login.php'>Login</a>
                  </li>";
          }



          ?>

          

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="#">About</a>
          </li>

          

         
          <li class="nav-item">
            <a class="nav-link " href="#">Contact</a>
          </li>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

      <?php

        $sql = "SELECT * FROM products ORDER BY rand() LIMIT 15 ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)> 0) {
          while ($row = mysqli_fetch_assoc($result)) {
                $product = $row['product'];
                $price = $row['price'];
                $category = $row['category'];
                $image = $row['image'];
                $loc = "images/".$image;
                $sn = $row['sn'];
                

                echo "<div class='swiper-slide carousel-item-a intro-item bg-image' style='background-image: url($loc)'>
                    <div class='overlay overlay-a'></div>
                    <div class='intro-content display-table'>
                      <div class='table-cell'>
                        <div class='container'>
                          <div class='row'>
                            <div class='col-lg-8'>
                              <div class='intro-body'><a href='property.php?pro=$sn'>
                                <p class='intro-title-top'>$category
                                 
                                </p>
                                <h1 class='intro-title mb-4 '>
                                  $product
                                </h1>
                                <p class='intro-subtitle intro-price'>
                                  <span class='price-a'>Price | &#8358 $price</span></a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";
          }
        }



      ?>

      
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

     <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="bg-success text-center">
          <h2>Latest Products</h2>
         
        </div>

        <div class="row">

          <?php

        $sql = "SELECT * FROM products WHERE category = 'Products' ORDER BY rand() LIMIT 15 ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)> 0) {
          while ($row = mysqli_fetch_assoc($result)) {
                $product = $row['product'];
                $price = $row['price'];
                $category = $row['category'];
                $image = $row['image'];
                $loc = "images/".$image;
                $sn = $row['sn'];
                

                echo "<div class='col-lg-4 col-md-6'>
                        <div class='speaker' data-aos='fade-up' data-aos-delay='100'>
                          <a href='property.php?pro=$sn'><img src='$loc' alt='Speaker 1' class='img-fluid'>
                          <div class='details'>
                            <h3>$product</h3>
                            <p style='color:#7CFC00'>&#8358 $price</p></a>
                            <div class='social'>
                             
                            </div>
                          </div>
                        </div>
                      </div>";
          }
        }



          ?>

        </div>
      </div>

    </section><!-- End Speakers Section -->



   
    <!-- ======= Latest News Section ======= -->
    <section class="section-news section-t8">
      <div class="container">

        <div class="text-center bg-success" style="color:red">
          <h2>Services</h2>
        </div>
        

        <div id="news-carousel" class="swiper">
          <div class="swiper-wrapper">

            <?php

            $sql = "SELECT * FROM products WHERE category = 'Services' ORDER BY rand() LIMIT 15 ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)> 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                    $product = $row['product'];
                    $price = $row['price'];
                    $category = $row['category'];
                    $image = $row['image'];
                    $loc = "images/".$image;
                    $sn = $row['sn'];
                    

                    echo "<div class='carousel-item-c swiper-slide'>
                            <div class='card-box-b card-shadow news-box'>
                              <div class='img-box-b'>
                                <img src='$loc' alt='' class='img-b img-fluid'>
                              </div>
                              <div class='card-overlay'>
                                <div class='card-header-b'>
                                  <div class='card-category-b'>
                                    <a href='property.php?pro=$sn' class='category-b text-dark'><strong>&#8358 $price</strong></a>
                                  </div>
                                  <div class='card-title-b'>
                                    <h2 class='title-2'>
                                      <a href='property.php?pro=$sn'>$product</a>
                                    </h2>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>";
              }
            }



          ?>


          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Contact</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                For more information you can contact us at our main office in Gwallameji opposite Along Dass road opposite Federal Polytechnic Bauchi, Bauchi State
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  Phone:<a href="tel:+2349043608006">+2349043608006</a>
                </li>
                <li class="color-a">
                  Email:<a href="mailto:info@modernmarket.com">info@modernmarket.com</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>

              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-whatsapp" aria-hidden="true"></i>
                </a>
              </li>

              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              
              <span class="color-a">Powered by:</span> <a href="https://mastermind.gcca.com.ng/">Mastermind Info Tech Bauchi</a>
            </p>
          </div>
          <div class="credits">
           
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>




<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"get_item.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>

</html>