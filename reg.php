<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
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
<body onload="disable()">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('ui/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method = "post">
					<span class="login100-form-title p-b-49">
						Registration
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">First Name</span>
						<input type="text" class="input100" id="fname" name="fname" required >						
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Last Name</span>
						<input type="text" class="input100" id="lname" name="lname" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Phone</span>
						<input type="text" class="input100" id="phone" onchange=checkmobno() name="phone" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email</span>
						<input type="email" class="input100" id="email" onchange=emailvalid(this.value) name="email" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired" id="box">
						<span class="label-input100">OTP</span>
						<input type="text" class="input100" onchange=otp() onkeyup=otp1()  id="otp" name="otp" placeholder="Enter your OTP" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Password</span>
						<input type="password" class="input100" onchange=passvalid() id="password" name="password" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Confirm Password</span>
						<input type="password" class="input100" onchange=passcon() id="cpassword" name="cpassword" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="container-login100-form-btn p-t-55" id = "submit">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type = "button"  onclick=response() name = "submit" class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-55">
						<a href="../farmer1/reg" class="txt2">
							</p>Logo in For merchant<p>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script> 
	
	function checkmobno() {
		var mob = $('#phone').val();
		$.ajax({
		type:'POST',
		url:'validation/checkmob.php',
		data:{mob:mob,table:'customer_reg'},
		success:function(return_data) {
		// alert(return_data);
			if(return_data == 1){
			alert('This Number already exist in system');
			$('#phone').val('');
			$('#phone').focus();
			}   //	alert(return_data);      
		}
		});
	}


    function emailvalid(str) {
      var email = $('#email').val();
      //alert(email);
      $.ajax({
        type:'POST',
        url:'validation/emailvalid.php',
        data:{email:email,
			type:'reg',
			table:'customer_reg'},
        success:function(return_data) {
          if(return_data == "1"){
            alert('This Email already exist in system');
            $('#email').val('');
            $('#email').focus();
          }  else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                }
                xmlhttp.open("GET", "email/email_base.php?q="+str+"&otp="+return_data+"&type=reg_otp&position=hod", true);
                xmlhttp.send();
                //alert(return_data);
            alert('We have sent OTP to '+str);
             var x = document.getElementById("box");
            x.style.display = "block";
            otp = return_data;
          }   
        }
      });
    }

    
	function response() {

		
var fname = $('#fname').val();
var lname = $('#lname').val();
var email = $('#email').val();
var phoneno = $('#phone').val();
var password = $('#password').val();
var	table='customer_reg';
	

$.ajax({
	type:'POST',
	url:'sqloperations/insert_admin.php',
	data:{fname:fname,
		lname:lname,
		email:email,
		phoneno:phoneno,
		password:password,
		table:table
	},
	success:function(return_data) {
		// alert(return_data);
	if(return_data == "1"){
		alert('Someting went wrong!!!');
	}  else{

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			}
			xmlhttp.open("GET", "../email/email_base.php?q="+email+"&type=thanks&position=hod", true);
			xmlhttp.send();
			alert('Signed Up Successfully....');
			window.location.href='index.php';
	} 
	}
});
}
        
</script>



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
	<script src="includes/js/validation.js"></script>


</body>
</html>