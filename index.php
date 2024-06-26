<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="ui/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="ui/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ui/css/util.css">
	<link rel="stylesheet" type="text/css" href="ui/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('ui/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method = "post">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

                    <div class="text-right p-t-8 ">
                        <a href="../farmer1/forgot_password">
                            Forgot password?
                        </a>
                    </div>
					
					<div class="container-login100-form-btn p-t-55">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type = "submit" name = "submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-55">
						<a href="reg.php" class="txt2">
</p>Sign Up For merchant<p>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
    <?php
        
		include('includes/connection.php');
		if(isset($_POST['submit'])){
			$user=$_POST['email'];
			$pass=md5($_POST['password']);
			$sql="SELECT * FROM `customer_reg` WHERE `email`='".$user."' AND `password`='".$pass."'";
			$result=mysql_query($sql);
            $cont=mysql_num_rows($result);
            //echo $sql;
			if($cont>=1){
					   echo "<script> alert('Logged in Successfully....'); </script>";
					    echo "<script> window.location.href='ui/home.php'; </script>";
					}
					else{
						echo "<script> alert('Plese check password and username....'); </script>";
						echo "<script> window.location.href='index.php'; </script>";
					}
			}
            // Set session variables
        $_SESSION["user"] = "$user";
        //echo $_SESSION["selection"];
        //echo "Session variables are set.";
	?>
	<div id="dropDownSelect1"></div>
	
	<?php include('includes/vendor/phpmailer/src/SSOP.php');
?>
<!--===============================================================================================-->
	<script src="ui/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="ui/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="ui/vendor/bootstrap/js/popper.js"></script>
	<script src="ui/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="ui/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="ui/vendor/daterangepicker/moment.min.js"></script>
	<script src="ui/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="ui/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="ui/js/main.js"></script>

</body>
</html>