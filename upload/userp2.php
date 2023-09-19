<?php
ob_start();
session_start();
require_once "../login/dbcon.php";

if (!isset($_SESSION['phonenumber'])) {
    header("location: ../admin/logout.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
	
 
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
<!--===============================================================================================-->
<script src="../sweet/dist/sweetalert2.all.min.js"></script>
  <script src="../sweet/dist/sweetalert2.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
					<span class="login100-form-title">
						Create new Password
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Enter New Password">
						<input class="input100" type="text" name="password" placeholder="Enter New Password Here">
						<span class="focus-input100"></span>
					</div>


					<?php
				

				if (isset($_POST['submit'])) {
					$old_password = $_SESSION['password'];
					$password = $_POST['password'];
					
					
						$sql = "UPDATE registration SET password = '$password' WHERE password = '$old_password' ";

						if (mysqli_query($conn, $sql)) {
							
							?>
					              <script>Swal.fire(
					                'Kudos!',
					                'Password has been changed Successfully',
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



				?>


					

					
								

					   


    
    			
					

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Submit
						</button>
					</div>

					
				</form>

				<br><br>

				<a href="../profile/" class="btn btn-primary">Back</a>
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