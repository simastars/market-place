<?php
require_once "dbcon.php";


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    

    <title>Login form with password show and hide  using JavaScript - bootstrapfriendly</title>

    <style type="text/css">
        .login_oueter {
            width: 360px;
            max-width: 100%;
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        }

        
    </style>
  </head>
  <body>
<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
    <div class="login_oueter">
        <div class="col-md-12 logo_outer">
            <img src="https://bootstrapfriendly.com/static/images/bootstrapfriendly_logo.png">
        </div>
      <form action="" method="post" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Login For Access</h4>
          
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
            </div>
            </div>
            
          </div>
          <div class="col-6">
            <div class="form-group form-check text-left">
              <input type="checkbox" name="remember" class="form-check-input" id="remember_me" />
              <label class="form-check-label" for="remember_me">Remember me</label>
            </div>
          </div>
          <div class="col-sm-12 pt-3 text-right">
            <p>Already registered <a href="#">Register</a></p>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="signin">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
    
  }
}

</script>
  </body>
</html>