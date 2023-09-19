<?php
ob_start();
session_start();

require_once"dbcon.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- Favicons -->
  <link href="images/logo.png" rel="icon">
  <link href="images/logo.png" rel="apple-touch-icon">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo.png" alt="IMG">
				</div>

<?php

if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$status = $_POST['status'];
	$gender = $_POST['gender'];

	$sql = "SELECT * FROM registration WHERE phonenumber = '$phonenumber' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		?><script>swal("User Already Exist");</script><?php
	}
	else{
		if ($password1 != $password2) {
			
			?><script>swal("Password Doesn't Match");</script><?php
		}
		else{
			$sql="INSERT INTO `registration` (`id`, `fullname`, `phonenumber`, `email`, `username`, `pass` , `status`, `gender`) VALUES (NULL, '$fullname', '$phonenumber', '$email', '$username', '$password1', '$status', '$gender')";

			if (mysqli_query($conn, $sql)) {

				?><script>swal("Successful!", "You can now login to start learning!", "success");</script><?php
				
			}
			else{
				?><script>swal("Registration Fail, Please Try Again");</script><?php
			}
		}
	}
}
  
 ?>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
					 <h6>Create New Account</h6>	
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Fullname if required">
						<input class="input100" type="text" name="fullname" placeholder="fullname" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Gender if required">
						<select class="input100" name="gender" required>
							<option disabled selected value="">Select Gender</option>
							<option>Female</option>
							<option>Male</option>
						</select>
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						</span>
					</div>



					<div class="wrap-input100 validate-input" data-validate = "phonenumber is required">
						<input class="input100" type="number" name="phonenumber" placeholder="contact-phone" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="contact-email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Gender is required">
						<select class="input100" name="status" required>
							<option disabled selected value="">Select Status</option>
							<option>Staff</option>
							<option>Student</option>
						</select>
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="create Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password1" placeholder="Create Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password2" placeholder="Comfirm Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Signup <i class="fa fa-user-plus m-l-5" aria-hidden="true"></i>
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Already have an Account?
						</span>
						<a class="txt2" href="login.php">
							Signin Here <i class="fa fa-sign-in" aria-hidden="true"></i>
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
	    $('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 @. ()]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
	</script>6

</body>
</html>