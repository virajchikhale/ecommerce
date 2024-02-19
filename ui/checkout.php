<!DOCTYPE html>
<html lang="en">

<?php 
        include ('../includes/connection.php');
        
session_start();
if($_SESSION["user"]==""){
  echo "<script> alert('Please login....');</script>";
  echo '<script>window.location.href="index.php";</script>';
}

?>
<head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <?php
        include ('../includes/connection.php');
        $sql = "select * from `customer_reg` where email='".$_SESSION["user"]."'";
        $ur = mysql_fetch_array(mysql_query($sql));
        $sql1 = "select * from `cart` where cid='".$ur['id']."'";
        $result=mysql_query($sql1);
        $cont=mysql_num_rows($result);
    ?>

<div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
            </div>
            <div class="col-lg-2 col-6 text-right">
                <h6><?php echo ucfirst($ur["fname"])." ".ucfirst($ur["lname"]);?></h6>
            </div>
            <div class="col-lg-1 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $cont ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->




    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing & Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" value="<?php echo ucfirst($ur["fname"]);?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" value="<?php echo ucfirst($ur["lname"]);?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" value="<?php echo $ur["email"];?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" value="<?php echo $ur["phone"];?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" id="ad1" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" id="ad2" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" id="county" value="Bharat" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" id="state" placeholder="Maharastra">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" id="city" placeholder="Pune">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" id="code" placeholder="23xx43x">
                        </div>
                        <!-- <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php
                        $res = mysql_query("select * from cart where cid='".$ur['id']."'");
                        $id = 1;
                        $sum = 0;
                        while($row = mysql_fetch_array($res))
                        {    
                            $resu = mysql_query("select * from products where id='".$row['pid']."'");
                            $roww = mysql_fetch_array($resu)
                        ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo $roww['name'];?></p>
                                <p>Rs.<?php echo $roww['dprise']*$row['quantity'];?></p>
                            </div>
                        <?php
                        $sum = $sum + $roww['dprise'];
                        $id++; }
                        ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rs. <span id="total"><?php echo $sum;?></span></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs. 100</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rs. <span id="f_total"><?php echo $sum + 100;?></span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">*COD is the only payment method avilable</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button onclick=order() class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>                
                <!-- <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php 
        include ('footer.php');
        ?>
    <!-- Footer End -->
    
    <script>
    function order(){
            // alert("hiii")
            var id = '<?php echo $ur['id']; ?>';
            var ad1 = $('#ad1').val();
            var ad2 = $('#ad2').val();
            var county = $('#county').val();
            var state = $('#state').val();
            var city = $('#city').val();
            var code = $('#code').val();
        	$.ajax({
            type:'POST',
            url:'../sqloperations/add_ad.php',
            data:{id:id,
                ad1:ad1,
                ad2:ad2,
                county:county,
                state:state,
                city:city,
                code:code
        	},
            success:function(return_data) {
              if(return_data == "1"){
                alert('Address Updated, Order Placed');
              }  else{
                alert('Address Added, Order Placed');
				// window.location.href='cart.php'; 
              } 
                // window.location.href='invoice.php'; 
                window.open('invoice.php', '_blank', 'noopener, noreferrer');

            }
          });
        }
    </script>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>