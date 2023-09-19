<?php
ob_start();
session_start();
require_once "action/dbcon.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
  
  $id = $_GET['id'];
  $_SESSION['id'] = $_GET['id'];

  //

            $sql = "SELECT * FROM posts WHERE sn ='$id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            //$main_image = $row['image'] ;

            $unique_heading1 = $row['heading'];
            $unique_heading = addslashes($unique_heading1);
            $_SESSION['unique'] = $unique_heading;
            
            // $loca = "images/".$main_image;
               

          $ip = $_SERVER['REMOTE_ADDR'];
          $dates = date("d/m/Y");
  

          $sql_ip = "SELECT * FROM seen WHERE heading = '$unique_heading' AND ip = '$ip' ";
          $ip_result = mysqli_query($conn, $sql_ip);
          if (mysqli_num_rows($ip_result)> 0) {
            
          }
          else{

            $countss = "INSERT INTO `seen` (`heading`, `ip`, `dates`) VALUES ('$unique_heading', '$ip', '$dates')";
            if (mysqli_query($conn, $countss)) {
              
            }
          }

 


}

?>



<?php
            $sn = $_SESSION['id'];
            $sql = "SELECT * FROM posts WHERE sn ='$sn' ORDER BY id DESC LIMIT 20";
            
            $result = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_assoc($result)) {

                $main_content = $row['content'];
                $main_heading = $row['heading'];
                $main_id = $row['id'];
                $times1 = $row['times'];
                $main_image = $row['image'];
                $loc2 = "images/".$main_image;
                $times = time_elapsed_string($times1);

              }

?>


<!DOCTYPE html>
<html lang="eng">
  <head>
      
      
      
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $unique_heading1; ?></title>
    
    
    
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $main_heading; ?>">
    <meta property="og:site_name" content="ISS-Foundation News ">
    <meta property="og:description" content="<?php $main_content; ?>">
    <meta property="og:url" content="https://fityanumedia.com/news/news.php?id=<?php echo $_SESSION['id'];?>">
    <meta property="og:locale" content="en_GB">
    <meta property="og:image" content="https://fityanumedia.com/news/images/<?php echo $main_image; ?>?fit=650%2C871&amp;ssl=1">
    <meta property="og:image:height" content="871">
    <meta property="og:image:width" content="650">



    
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="images/fityanu.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1432857107587471"
     crossorigin="anonymous"></script>
     
     
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60abbe6b3074f10011babb99&product=inline-share-buttons' async='async'></script>
     
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                
              </div>
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <img src="images/logo.png" width="80" height="100" class="footer-logo" alt="" />
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="index.php">Home</a>
                        </li>

                      

                        <?php
                        $sql = "SELECT * FROM category ORDER BY id ASC LIMIT 5";
                        
                        $result = mysqli_query($conn, $sql);

                         while ($row = mysqli_fetch_assoc($result)) {

                            $category = $row['category'];
                            $id = $row['id'];


               
                  
                 
                 
                  


                
                   echo "

                   <li class='nav-item'>
                          <a class='nav-link' href='all.php?id=$id'>$category</a>
                   </li>



                  



                   ";

                 }









                    ?>
                  
                        


                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                      <a href="">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->
        <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <a href="login/reg1.php" class="btn btn-primary">Membership Registration</a>
                <p class="mb-0">
                  <marquee>

                 <?php
                 $dates = date("l d F Y");
                  $sql = "SELECT *  FROM posts WHERE dates = '$dates' ORDER BY sn DESC LIMIT 1 ";
                  $result = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_assoc($result)) {

                  $heading = $row['heading'];
                  $flash = $row['flash'];
                  $id = $row['id'];
                  $sn = $row['sn'];



                
                              echo "
                            <a href='news.php?id=$sn'> $heading</a>

                
                   
                

                      ";

                  

                  }
             

                
            
          ?>
                 </marquee>
                </p>
              </div>
             
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
                
                
              <?php
              $heading = $_SESSION['unique'] ;

                                $sql = "SELECT * FROM seen WHERE heading = '$heading' ";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                  $total = mysqli_num_rows($result);
                                  
                                    
                                    

                            }




                                ?>

              


            </div>
            
            <div class="row" data-aos="fade-up">
              
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                      
                      
                      
                      
                      

                    <?php
                    $sn = $_SESSION['id'];
            $sql = "SELECT * FROM posts WHERE sn ='$sn' ORDER BY id DESC LIMIT 20";
            
            $result = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_assoc($result)) {

                $main_content = $row['content'];
                $main_heading = $row['heading'];
                $main_id = $row['id'];
                $times1 = $row['times'];
                $main_image = $row['image'];
                $loc2 = "images/".$main_image;
                $times = time_elapsed_string($times1);
                  
                 
                 
                  


                
                   echo "


                   <div class='row'>
                      <div class='col-sm-4 grid-margin'>
                        <div class='position-relative'>
                          <div class='rotate-img'>
                            <img
                              src='$loc2'
                              alt='thumb'
                              class='img-fluid'
                            />
                          </div>
                          <div class='badge-positioned'>
                            <span class='badge badge-danger font-weight-bold'
                              >ISS-Foundation</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class='col-sm-8  grid-margin'>
                        <h2 class='mb-2 font-weight-600'>
                          $main_heading
                        </h2>
                        <div class='fs-13 mb-2'>
                          <span class='mr-2'>Photo </span> <i class='fas fa-eye'></i>$total</span> | $times
                        </div>
                        <p class='mb-0'>
                          $main_content 
                        </p>
                       
                      </div>
                    </div>

                   



                  



                   ";

                 }






                    $x = $_SESSION['id'];


                    $a = " https://fityanumedia.com/news/news.php?id=$x";

                    $ax = urlencode($a);




                    ?>
                    
                    
                    
                     <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $ax; ?>" class="popup">
               <img src="images/fb.png" width="30" height="30"></a>

                

              <a target="_blank"href="whatsapp://send?phone=9986128665&text=<?php echo $main_heading; echo" ". $ax;?>"  data-action="share/whatsapp/share"><img src="images/wsap.png" width="30" height="30"></a>



          
              <a target="_blank" href="https://t.me/share/url?url=<?php echo $ax;?>&text=<?php echo $main_heading;?>&to="><img src="images/tele.png" width="30" height="30">



                    


                    





                    
                  </div>
                </div>
              </div>

              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      

                      <?php
                $sql = "SELECT * FROM category ORDER BY id ASC";
                
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {

                $category = $row['category'];
                $id = $row['id'];
                  
                 
                 
                  


                
                   echo "

                   <li><a href='all.php?id=$id'>$category</a></li>



                  



                   ";

                 }









                    ?>
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <img src="images/ft1.png" class="footer-logo" alt="" />
                  <h5 class="font-weight-normal mt-4 mb-5">
                    <strong>IIS: </strong>Ita dai wannan cibiya tun A sali an samar da ita ne domin taimakon al'umma masu rauni. Kan tallafin karatu jinya sana'oi da kuma tallafin rashin lafiya da taimako ta fuskar addini ga al'ummar karamar hukumar Toro jihar Bauchi. 
                  </h5>
                  <ul class="social-media mb-3">
                    <li>
                      <a href="">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>


                   <?php
            $sql = "SELECT * FROM posts ORDER BY sn DESC LIMIT 10";
            
            $result = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_assoc($result)) {

                  $kanu = $row['heading'];
                  $id = $row['id'];
                  $sn = $row['sn'];
                  $dates = $row['dates'];
                  $times = $row['times'];
                  $image = $row['image'];
                  $loc1 = "images/".$image;
                 
                 
                  


                
                   echo "


                   <div class='row'>
                    <div class='col-sm-12'>
                      <div class='footer-border-bottom pb-2'>
                        <div class='row'>
                          <div class='col-3'><a href='news.php?id=$sn' style='color: white;'>
                            <img
                              src='$loc1'
                              alt='thumb'
                              class='img-fluid'
                            />
                          </div>
                          <div class='col-9'>
                            <h5 class='font-weight-600'>
                              $kanu
                            </h5>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                   



                   ";

                 }









                    ?>

                    



                 
                  
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>

                  <?php
            $sql = "SELECT * FROM category ORDER BY id ASC";
            
            $result = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_assoc($result)) {

                $category = $row['category'];
                $id = $row['id'];


                $sql1 = "SELECT * FROM posts WHERE category = '$category'";
                $result1 = mysqli_query($conn, $sql1);
                $count = mysqli_num_rows($result1);
                  
                 
                 
                  


                
                   echo "

                   <div class='footer-border-bottom pb-2'>
                    <div class='d-flex justify-content-between align-items-center'><a href='all.php?id=$id' style='color: white;'>
                      <h5 class='mb-0 font-weight-600'>$category</h5></a>
                      <div class='count'>$count</div>
                    </div>
                  </div>



                  



                   ";

                 }
                 
                 
                 
                 
                 function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}










                    ?>
                  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <script src="./assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
