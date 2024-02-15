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
    <title>Cart</title>
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
    <!-- Topbar Start --><?php
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
                <a href="" class="btn border">
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Orignal Price</th>
                            <th>Discounted Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        
                        <?php
                        $res = mysql_query("select * from cart where cid='".$ur['id']."'");
                        $id = 1;
                        while($row = mysql_fetch_array($res))
                        {    
                            $resu = mysql_query("select * from products where id='".$row['pid']."'");
                            $roww = mysql_fetch_array($resu)
                        ?>
                        <tr>
                            <td class="align-middle"><img src="../images/products/<?php echo $roww['img']; ?>" alt="" style="width: 50px;"><?php echo $roww['name'];?></td>
                            <td class="align-middle">Rs. <?php echo $roww['oprise'];?></td>
                            <td class="align-middle">Rs. <?php echo $roww['dprise'];?></td>
                            <input type=hidden id="dprice_<?php echo $row['id']; ?>" value="<?php echo $roww['dprise'];?>">
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" onclick=minus_<?php echo $row['id']; ?>()>
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="quan_<?php echo $row['id']; ?>" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" onclick=plus_<?php echo $row['id']; ?>()>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" id="row_total_<?php echo $row['id']; ?>">Rs. <?php echo $roww['dprise'];?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>

                        
    <script>
        function minus_<?php echo $row['id']; ?>(){
            var quan = 1-parseInt($('#quan_<?php echo $row['id']; ?>').val());
            var dprice = $('#dprice_<?php echo $row['id']; ?>').val();
            m_sum = quan*dprice*-1;
            // alert(m_sum);
            document.getElementById("row_total_<?php echo $row['id']; ?>").innerHTML = "Rs. "+m_sum;

        }

        
        function plus_<?php echo $row['id']; ?>(){
            var quan = 1+parseInt($('#quan_<?php echo $row['id']; ?>').val());
            var dprice = $('#dprice_<?php echo $row['id']; ?>').val();
            sum = quan*dprice;
            // alert(sum);
            document.getElementById("row_total_<?php echo $row['id']; ?>").innerHTML = "Rs. "+sum;
        }
    </script>
<?php
$id++; }
?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium" id="total">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs. 100</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php 
        include ('footer.php');
        ?>
    <!-- Footer End -->


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