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
    <title>History</title>
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
                <img src="../images/logo/logo.png" alt="Cool Admin" height="70px"/>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Purchase History</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Purchase History</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Date of Order</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        
                        <?php
                        $res = mysql_query("select * from `order` where cid='".$ur['id']."'");
                        $id = 1;
                        $sum = 0;
                        while($row = mysql_fetch_array($res))
                        {    
                            $resu = mysql_query("select * from products where id='".$row['pid']."'");
                            $roww = mysql_fetch_array($resu)
                        ?>
                        <tr>                            
                            <td class="align-middle"><?php echo $row['id'];?></td>
                            <td class="align-middle"><?php echo $row['date'];?></td>
                            <td class="align-middle"><img src="../images/products/<?php echo $roww['img']; ?>" alt="" style="width: 50px;"><?php echo $roww['name'];?></td>
                            <td class="align-middle"><?php echo $row['quantity'];?></td>
                            <td class="align-middle">Rs. <?php echo $roww['dprise']*$row['quantity'];?></td>
                            <td class="align-middle"><?php if ($row['status']==0){echo "Ready to dispatch";}else if($row['status']==1){echo "Shipped";}else{echo "Delivered";}?></td>
                        </tr>
<?php
$sum = $sum + $roww['dprise'];
$id++; }
?>
                    </tbody>
                </table>
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