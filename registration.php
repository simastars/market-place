<?php
ob_start();
session_start();

require_once"login/dbcon.php";


/*if (!isset($_SESSION['password'])) {
    header("location: ../admin/logout.php");
}*/


function generateRandomString($length = 10) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

  
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <script src="sweet/dist/sweetalert2.all.min.js"></script>
  <script src="sweet/dist/sweetalert2.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
      <a class="navbar-brand text-brand" href="index.html">Modern<span class="color-b">Market</span></a>

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
            <a class="nav-link " href="about.html">About</a>
          </li>

          

         
          <li class="nav-item">
            <a class="nav-link " href="contact.html">Contact</a>
          </li>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="title-single-box">
              <?php
              if (isset($_POST['submit'])) {
                  $fullname = $_POST['fullname'];
                  $phonenumber = $_POST['phonenumber'];
                 
                  $state = $_POST['state'];
                  $lga = $_POST['lga'];
                  $gender = $_POST['gender'];
                  $dates = date("D d/m/Y");
                  $status = "yet";
                  $image = "biz.jpg";


                  
                   $rand = rand(0,100000);

                   $alph = generateRandomString();

                  

                   $unique_id = $rand.$alph;

  



  $sql = "SELECT * FROM registration WHERE phonenumber = '$phonenumber'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    ?><script>Swal.fire(
                'User Already Exist',
                'Thanks',
                'info'
              )</script><?php
  }
  else{
  
      $sql="INSERT INTO `registration` (`sn`, `fullname`, `phonenumber`, `gender`, `state`, `lga`, `password`, `status`, `dates`, `image`) VALUES (NULL, '$fullname', '$phonenumber', '$gender', '$state', '$lga', '$unique_id', '$status', '$dates', '$image')";

      if (mysqli_query($conn, $sql)) {

        

        ?>
              <script>Swal.fire(
                'Congratulations!',
                'Your Business is Registered on Modern Market Successfully! Wait for your confirmation Code and login details',
                'success'
              )</script>
       <?php
          
                
      }
      else{
        ?>
                  <script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please Try Again',
                   
                  })</script>
        <?php
      }
    
    }
  }
  ?>
              <h1 class="title-single">Registration</h1>
              <span class="color-text-a"></span>
              <form  method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="fullname" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                      </div>
                    </div>
                    

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="phonenumber" type="number" class="form-control form-control-lg form-control-a" placeholder="Whatsapp Number" required>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <select class="form-control form-control-lg form-control-a" id="Type" name="gender" required>
                          <option selected disabled value="">Select Gender</option>
                          <option>Female</option>
                          <option>Male</option>
                      </select>
                      
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <select class="form-control form-control-lg form-control-a" name="state" id="state" required onchange="changeCat(this);">
                          <option selected disabled value="">Select State</option>
                          <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="AkwaIbom">Akwa Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="CrossRiver">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">FCT Abuja</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
                        </select>
                        
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <select class="form-control form-control-lg form-control-a" name="lga" id="lga" required>
                          <option selected disabled value="">Select Local Government</option>
                          
                        </select>
                        
                      </div>
                    </div>
                    <script>
    var Abia = [ 'Aba North', 'Aba South', 'Arochukwu', 'Bende', 'Ikwuano', 'Isiala Ngwa North', 'Isiala Ngwa South', 'Isuikwuato', 'Obi Ngwa', 'Ohafia', 'Osisioma', 'Ugwunagbo', 'Ukwa East', 'Ukwa West', 'Umuahia North', 'muahia South', 'Umu Nneochi'];

    var Adamawa = [ 'Demsa', 'Fufure', 'Ganye', 'Gayuk', 'Gombi', 'Grie', 'Hong', 'Jada', 'Larmurde', 'Madagali', 'Maiha', 'Mayo Belwa', 'Michika', 'Mubi North', 'Mubi South', 'Numan', 'Shelleng', 'Song', 'Toungo', 'Yola North', 'Yola South'];

    var AkwaIbom = [ 'Abak', 'Eastern Obolo', 'Eket', 'Esit Eket', 'Essien Udim', 'Etim Ekpo', 'Etinan', 'Ibeno', 'Ibesikpo Asutan', 'Ibiono-Ibom', 'Ika', 'Ikono', 'Ikot Abasi', 'Ikot Ekpene', 'Ini', 'Itu', 'Mbo', 'Mkpat-Enin', 'Nsit-Atai', 'Nsit-Ibom', 'Nsit-Ubium', 'Obot Akara', 'Okobo', 'Onna', 'Oron', 'Oruk Anam', 'Udung-Uko', 'Ukanafun', 'Uruan', 'Urue-Offong Oruko', 'Uyo'];

    var Anambra = [ 'Aguata', 'Anambra East', 'Anambra West', 'Anaocha', 'Awka North', 'Awka South', 'Ayamelum', 'Dunukofia', 'Ekwusigo', 'Idemili North', 'Idemili South', 'Ihiala', 'Njikoka', 'Nnewi North', 'Nnewi South', 'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba North', 'Orumba South', 'Oyi'];

    var Bauchi = [ 'Alkaleri', 'Bauchi', 'Bogoro', 'Damban', 'Darazo', 'Dass', 'Gamawa', 'Ganjuwa', 'Giade', 'Itas-Gadau', 'Jama are', 'Katagum', 'Kirfi', 'Misau', 'Ningi', 'Shira', 'Tafawa Balewa', ' Toro', ' Warji', ' Zaki'];

    var Bayelsa = [ 'Brass', 'Ekeremor', 'Kolokuma Opokuma', 'Nembe', 'Ogbia', 'Sagbama', 'Southern Ijaw', 'Yenagoa'];

    var Benue = [ 'Agatu', 'Apa', 'Ado', 'Buruku', 'Gboko', 'Guma', 'Gwer East', 'Gwer West', 'Katsina-Ala', 'Konshisha', 'Kwande', 'Logo', 'Makurdi', 'Obi', 'Ogbadibo', 'Ohimini', 'Oju', 'Okpokwu', 'Oturkpo', 'Tarka', 'Ukum', 'Ushongo', 'Vandeikya'];

    var Borno = [ 'Abadam', 'Askira-Uba', 'Bama', 'Bayo', 'Biu', 'Chibok', 'Damboa', 'Dikwa', 'Gubio', 'Guzamala', 'Gwoza', 'Hawul', 'Jere', 'Kaga', 'Kala-Balge', 'Konduga', 'Kukawa', 'Kwaya Kusar', 'Mafa', 'Magumeri', 'Maiduguri', 'Marte', 'Mobbar', 'Monguno', 'Ngala', 'Nganzai', 'Shani'];

    var CrossRiver = [ 'Abi', 'Akamkpa', 'Akpabuyo', 'Bakassi', 'Bekwarra', 'Biase', 'Boki', 'Calabar Municipal', 'Calabar South', 'Etung', 'Ikom', 'Obanliku', 'Obubra', 'Obudu', 'Odukpani', 'Ogoja', 'Yakuur', 'Yala'];

    var Delta = [ 'Aniocha North', 'Aniocha South', 'Bomadi', 'Burutu', 'Ethiope East', 'Ethiope West', 'Ika North East', 'Ika South', 'Isoko North', 'Isoko South', 'Ndokwa East', 'Ndokwa West', 'Okpe', 'Oshimili North', 'Oshimili South', 'Patani', 'Sapele', 'Udu', 'Ughelli North', 'Ughelli South', 'Ukwuani', 'Uvwie', 'Warri North', 'Warri South', 'Warri South West'];

    var Ebonyi = [ 'Abakaliki', 'Afikpo North', 'Afikpo South', 'Ebonyi', 'Ezza North', 'Ezza South', 'Ikwo', 'Ishielu', 'Ivo', 'Izzi', 'Ohaozara', 'Ohaukwu', 'Onicha'];

    var Edo = [ 'Akoko-Edo', 'Egor', 'Esan Central', 'Esan North-East', 'Esan South-East', 'Esan West', 'Etsako Central', 'Etsako East', 'Etsako West', 'Igueben', 'Ikpoba Okha', 'Orhionmwon', 'Oredo', 'Ovia North-East', 'Ovia South-West', 'Owan East', 'Owan West', 'Uhunmwonde'];

    var Ekiti = [ 'Ado Ekiti', 'Efon', 'Ekiti East', 'Ekiti South-West', 'Ekiti West', 'Emure', 'Gbonyin', 'Ido Osi', 'Ijero', 'Ikere', 'Ikole', 'Ilejemeje', 'Irepodun-Ifelodun', 'Ise-Orun', 'Moba', 'Oye'];

    var Enugu = [ 'Aninri', 'Awgu', 'Enugu East', 'Enugu North', 'Enugu South', 'Ezeagu', 'Igbo Etiti', 'Igbo Eze North', 'Igbo Eze South', 'Isi Uzo', 'Nkanu East', 'Nkanu West', 'Nsukka', 'Oji River', 'Udenu', 'Udi', 'Uzo Uwani'];

    var FCT = [ 'Abaji', 'Bwari', 'Gwagwalada', 'Kuje', 'Kwali', 'Municipal Area Council'];

    var Gombe = ['Akko', 'Balanga', 'Billiri', 'Dukku', 'Funakaye', 'Gombe', 'Kaltungo', 'Kwami', 'Nafada', 'Shongom', 'Yamaltu-Deba'];

    var Imo = [ 'Aboh Mbaise', 'Ahiazu Mbaise', 'Ehime Mbano', 'Ezinihitte', 'Ideato North', 'Ideato South', 'Ihitte-Uboma', 'Ikeduru', 'Isiala Mbano', 'Isu', 'Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nkwerre', 'Nwangele', 'Obowo', 'Oguta', 'Ohaji-Egbema', 'Okigwe', 'Orlu', 'Orsu', 'Oru East', 'Oru West', 'Owerri Municipal', 'Owerri North', 'Owerri West', 'Unuimo'];

    var Jigawa = [ 'Auyo', 'Babura', 'Biriniwa', 'Birnin Kudu', 'Buji', 'Dutse', 'Gagarawa', 'Garki', 'Gumel', 'Guri', 'Gwaram', 'Gwiwa', 'Hadejia', 'Jahun', 'Kafin Hausa', 'Kazaure', 'Kiri Kasama', 'Kiyawa', 'Kaugama', 'Maigatari', 'Malam Madori', 'Miga', 'Ringim', 'Roni', 'Sule Tankarkar', 'Taura', 'Yankwashi'];

    var Kaduna = [ 'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', 'Jema a', 'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura', 'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga', 'Soba', 'Zangon Kataf', 'Zaria'];

    var Kano = [ 'Ajingi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi', 'Bunkure', 'Dala', 'Dambatta', 'Dawakin Kudu', 'Dawakin Tofa', 'Doguwa', 'Fagge', 'Gabasawa', 'Garko', 'Garun Mallam', 'Gaya', 'Gezawa', 'Gwale', 'Gwarzo', 'Kabo', 'Kano Municipal', 'Karaye', 'Kibiya', 'Kiru', 'Kumbotso', 'Kunchi', 'Kura', 'Madobi', 'Makoda', 'Minjibir', 'Nasarawa', 'Rano', 'Rimin Gado', 'Rogo', 'Shanono', 'Sumaila', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa', 'Tudun Wada', 'Ungogo', 'Warawa', 'Wudil'];

    var Katsina = [ 'Bakori', 'Batagarawa', 'Batsari', 'Baure', 'Bindawa', 'Charanchi', 'Dandume', 'Danja', 'Dan Musa', 'Daura', 'Dutsi', 'Dutsin Ma', 'Faskari', 'Funtua', 'Ingawa', 'Jibia', 'Kafur', 'Kaita', 'Kankara', 'Kankia', 'Katsina', 'Kurfi', 'Kusada', 'Mai Adua', 'Malumfashi', 'Mani', 'Mashi', 'Matazu', 'Musawa', 'Rimi', 'Sabuwa', 'Safana', 'Sandamu', 'Zango'];

    var Kebbi = [ 'Aleiro', 'Arewa Dandi', 'Argungu', 'Augie', 'Bagudo', 'Birnin Kebbi', 'Bunza', 'Dandi', 'Fakai', 'Gwandu', 'Jega', 'Kalgo', 'Koko Besse', 'Maiyama', 'Ngaski', 'Sakaba', 'Shanga', 'Suru', 'Wasagu Danko', 'Yauri', 'Zuru'];

    var Kogi = [ 'Adavi', 'Ajaokuta', 'Ankpa', 'Bassa', 'Dekina', 'Ibaji', 'Idah', 'Igalamela Odolu', 'Ijumu', 'Kabba Bunu', 'Kogi', 'Lokoja', 'Mopa Muro', 'Ofu', 'Ogori Magongo', 'Okehi', 'Okene', 'Olamaboro', 'Omala', 'Yagba East', 'Yagba West'];

    var Kwara = [ 'Asa', 'Baruten', 'Edu', 'Ekiti', 'Ifelodun', 'Ilorin East', 'Ilorin South', 'Ilorin West', 'Irepodun', 'Isin', 'Kaiama', 'Moro', 'Offa', 'Oke Ero', 'Oyun', 'Pategi'];

    var Lagos = [ 'Agege', 'Ajeromi-Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa', 'Badagry', 'Epe', 'Eti Osa', 'Ibeju-Lekki', 'Ifako-Ijaiye', 'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu', 'Surulere'];

    var Nassarawa = [ 'Akwanga', 'Awe', 'Doma', 'Karu', 'Keana', 'Keffi', 'Kokona', 'Lafia', 'Nasarawa', 'Nasarawa Egon', 'Obi', 'Toto', 'Wamba'];

    var Niger = [ 'Agaie', 'Agwara', 'Bida', 'Borgu', 'Bosso', 'Chanchaga', 'Edati', 'Gbako', 'Gurara', 'Katcha', 'Kontagora', 'Lapai', 'Lavun', 'Magama', 'Mariga', 'Mashegu', 'Mokwa', 'Moya', 'Paikoro', 'Rafi', 'Rijau', 'Shiroro', 'Suleja', 'Tafa', 'Wushishi'];

    var Ogun = [ 'Abeokuta North', 'Abeokuta South', 'Ado-Odo Ota', 'Egbado North', 'Egbado South', 'Ewekoro', 'Ifo', 'Ijebu East', 'Ijebu North', 'Ijebu North East', 'Ijebu Ode', 'Ikenne', 'Imeko Afon', 'Ipokia', 'Obafemi Owode', 'Odeda', 'Odogbolu', 'Ogun Waterside', 'Remo North', 'Shagamu'];

    var Ondo = [ 'Akoko North-East', 'Akoko North-West', 'Akoko South-West', 'Akoko South-East', 'Akure North', 'Akure South', 'Ese Odo', 'Idanre', 'Ifedore', 'Ilaje', 'Ile Oluji-Okeigbo', 'Irele', 'Odigbo', 'Okitipupa', 'Ondo East', 'Ondo West', 'Ose', 'Owo'];

    var Osun = [ 'Atakunmosa East', 'Atakunmosa West', 'Aiyedaade', 'Aiyedire', 'Boluwaduro', 'Boripe', 'Ede North', 'Ede South', 'Ife Central', 'Ife East', 'Ife North', 'Ife South', 'Egbedore', 'Ejigbo', 'Ifedayo', 'Ifelodun', 'Ila', 'Ilesa East', 'Ilesa West', 'Irepodun', 'Irewole', 'Isokan', 'Iwo', 'Obokun', 'Odo Otin', 'Ola Oluwa', 'Olorunda', 'Oriade', 'Orolu', 'Osogbo'];

    var Oyo = [ 'Afijio', 'Akinyele', 'Atiba', 'Atisbo', 'Egbeda', 'Ibadan North', 'Ibadan North-East', 'Ibadan North-West', 'Ibadan South-East', 'Ibadan South-West', 'Ibarapa Central', 'Ibarapa East', 'Ibarapa North', 'Ido', 'Irepo', 'Iseyin', 'Itesiwaju', 'Iwajowa', 'Kajola', 'Lagelu', 'Ogbomosho North', 'Ogbomosho South', 'Ogo Oluwa', 'Olorunsogo', 'Oluyole', 'Ona Ara', 'Orelope', 'Ori Ire', 'Oyo', 'Oyo East', 'Saki East', 'Saki West', 'Surulere'];

    var Plateau = [ 'Bokkos', 'Barkin Ladi', 'Bassa', 'Jos East', 'Jos North', 'Jos South', 'Kanam', 'Kanke', 'Langtang South', 'Langtang North', 'Mangu', 'Mikang', 'Pankshin', 'Qua an Pan', 'Riyom', 'Shendam', 'Wase'];

    var Rivers = [ 'Abua Odual', 'Ahoada East', 'Ahoada West', 'Akuku-Toru', 'Andoni', 'Asari-Toru', 'Bonny', 'Degema', 'Eleme', 'Emuoha', 'Etche', 'Gokana', 'Ikwerre', 'Khana', 'Obio Akpor', 'Ogba Egbema Ndoni', 'Ogu Bolo', 'Okrika', 'Omuma', 'Opobo Nkoro', 'Oyigbo', 'Port Harcourt', 'Tai'];

    var Sokoto = [ 'Binji', 'Bodinga', 'Dange Shuni', 'Gada', 'Goronyo', 'Gudu', 'Gwadabawa', 'Illela', 'Isa', 'Kebbe', 'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame', 'Sokoto North', 'Sokoto South', 'Tambuwal', 'Tangaza', 'Tureta', 'Wamako', 'Wurno', 'Yabo'];

    var Taraba = [ 'Ardo Kola', 'Bali', 'Donga', 'Gashaka', 'Gassol', 'Ibi', 'Jalingo', 'Karim Lamido', 'Kumi', 'Lau', 'Sardauna', 'Takum', 'Ussa', 'Wukari', 'Yorro', 'Zing'];

    var Yobe = [ 'Bade', 'Bursari', 'Damaturu', 'Fika', 'Fune', 'Geidam', 'Gujba', 'Gulani', 'Jakusko', 'Karasuwa', 'Machina', 'Nangere', 'Nguru', 'Potiskum', 'Tarmuwa', 'Yunusari', 'Yusufari'];

    var Zamfara = [ 'Anka', 'Bakura', 'Birnin Magaji Kiyaw', 'Bukkuyum', 'Bungudu', 'Gummi', 'Gusau', 'Kaura Namoda', 'Maradun', 'Maru', 'Shinkafi', 'Talata Mafara', 'Chafe', 'Zurmi'];

    var changeCat = function changeCat(firstList) {
    var newSel = document.getElementById("lga");
    //if you want to remove this default option use newSel.innerHTML=""
    newSel.innerHTML="<option value='' disabled selected>--Select Local Government--</option>"; // to reset the second list everytime
    var opt;

      //test according to the selected value
      switch (firstList.options[firstList.selectedIndex].value) {
          case "Abia":
              for (var i=0; len=Abia.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Abia[i];
                    opt.text = Abia[i];
                    newSel.appendChild(opt);
              }
              break;
          case "Adamawa":
              for (var i=0; len=Adamawa.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Adamawa[i];
                    opt.text = Adamawa[i];
                    newSel.appendChild(opt);
              }
              break;
          case "AkwaIbom":
              for (var i=0; len=AkwaIbom.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = AkwaIbom[i];
                    opt.text = AkwaIbom[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Anambra":
              for (var i=0; len=Anambra.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Anambra[i];
                    opt.text = Anambra[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Bauchi":
              for (var i=0; len=Bauchi.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Bauchi[i];
                    opt.text = Bauchi[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Bayelsa":
              for (var i=0; len=Bayelsa.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Bayelsa[i];
                    opt.text = Bayelsa[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Benue":
              for (var i=0; len=Benue.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Benue[i];
                    opt.text = Benue[i];
                    newSel.appendChild(opt);
              }
              break;



               case "Borno":
              for (var i=0; len=Borno.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Borno[i];
                    opt.text = Borno[i];
                    newSel.appendChild(opt);
              }
              break;





              case "CrossRiver":
              for (var i=0; len=CrossRiver.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = CrossRiver[i];
                    opt.text = CrossRiver[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Delta":
              for (var i=0; len=AkwaIbom.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Delta[i];
                    opt.text = Delta[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Ebonyi":
              for (var i=0; len=Ebonyi.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Ebonyi[i];
                    opt.text = Ebonyi[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Edo":
              for (var i=0; len=Edo.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Edo[i];
                    opt.text = Edo[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Ekiti":
              for (var i=0; len=Ekiti.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Ekiti[i];
                    opt.text = Ekiti[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Enugu":
              for (var i=0; len=Enugu.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Enugu[i];
                    opt.text = Enugu[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Gombe":
              for (var i=0; len=Gombe.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Gombe[i];
                    opt.text = Gombe[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Imo":
              for (var i=0; len=Imo.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Imo[i];
                    opt.text = Imo[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Jigawa":
              for (var i=0; len=Jigawa.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Jigawa[i];
                    opt.text = Jigawa[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Kano":
              for (var i=0; len=Kano.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Kano[i];
                    opt.text = Kano[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Kaduna":
              for (var i=0; len=Kaduna.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Kaduna[i];
                    opt.text = Kaduna[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Katsina":
              for (var i=0; len=Katsina.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Katsina[i];
                    opt.text = Katsina[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Kebbi":
              for (var i=0; len=Kebbi.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Kebbi[i];
                    opt.text = Kebbi[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Kogi":
              for (var i=0; len=Kogi.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Kogi[i];
                    opt.text = Kogi[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Kwara":
              for (var i=0; len=Kwara.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Kwara[i];
                    opt.text = Kwara[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Lagos":
              for (var i=0; len=Lagos.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Lagos[i];
                    opt.text = Lagos[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Nasarawa":
              for (var i=0; len=Nasarawa.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Nasarawa[i];
                    opt.text = Nasarawa[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Niger":
              for (var i=0; len=Niger.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Niger[i];
                    opt.text = Niger[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Ogun":
              for (var i=0; len=Ogun.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Ogun[i];
                    opt.text = Ogun[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Ondo":
              for (var i=0; len=Ondo.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Ondo[i];
                    opt.text = Ondo[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Osun":
              for (var i=0; len=Osun.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Osun[i];
                    opt.text = Osun[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Oyo":
              for (var i=0; len=Oyo.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Oyo[i];
                    opt.text = Oyo[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Plateau":
              for (var i=0; len=Plateau.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Plateau[i];
                    opt.text = Plateau[i];
                    newSel.appendChild(opt);
              }
              break;


              case "Rivers":
              for (var i=0; len=Rivers.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Rivers[i];
                    opt.text = Rivers[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Sokoto":
              for (var i=0; len=Sokoto.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Sokoto[i];
                    opt.text = Sokoto[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Taraba":
              for (var i=0; len=Taraba.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Taraba[i];
                    opt.text = Taraba[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Yobe":
              for (var i=0; len=Yobe.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Yobe[i];
                    opt.text = Yobe[i];
                    newSel.appendChild(opt);
              }
              break;

              case "Zamfara":
              for (var i=0; len=Zamfara.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = Zamfara[i];
                    opt.text = Zamfara[i];
                    newSel.appendChild(opt);
              }
              break;

              case "FCT":
              for (var i=0; len=FCT.length, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = FCT[i];
                    opt.text = FCT[i];
                    newSel.appendChild(opt);
              }
              break;
      }

}


    </script>

                    

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-block btn-a" name="submit">Submit</button>
                    </div>
                  </div>

                   <div class="col-sm-12 pt-3 text-center">
            <p>Already have an Account?  <a href="login/login.php">Login Here</a></p>
          </div>
                </form>
            </div>
          </div>
          
        </div>
      </div>
    </section><!-- End Intro Single-->


  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/vaidate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



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

</body>

</html>