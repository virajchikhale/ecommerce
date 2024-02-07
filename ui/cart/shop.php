<?php
// Start the session
session_start();
if($_SESSION["user"]==""){
  echo "<script> alert('Please login....');</script>";
  echo '<script>window.location.href="index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
                
            <style> 
            .head {
            background-image: url("../../imgs/wp2417218-crops-wallpapers.jpg");
            background-repeat: no-repeat;
            background-color: #cccccc;
            background-size: 100% 100%;
            }
            </style>
    </head>
    <body>
    <?php
			include ('../../includes/connection.php');	
            $sql = "select * from `farmer_reg` where email='".$_SESSION["user"]."'";
			$ur = mysql_fetch_array(mysql_query($sql));
            $sql1 = "select * from `cart` where fid='".$ur['id']."'";
            $result=mysql_query($sql1);
            $cont=mysql_num_rows($result);
	
	?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Smart-Farming Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-outline-dark" href="cart.php">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $cont ?></span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5 head">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"> <!--?php echo  $ur['id']."  ".$ur['lname'];?--> Comman-man To Comman-man.</h1>
                    <p class="lead fw-normal text-white-50 mb-0">All the Products are sold directy by the farmer or the supplier, So no middle-man and you get the product at the best prise</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include ('../../includes/connection.php');
                $res = mysql_query("select * from products");
                $i = 1;
                while($row = mysql_fetch_array($res))
                        { ?>                    

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../../imgs/cart/<?php echo $row['img']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder name"><?php echo $row['name']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"><?php echo $row['oprise']; ?></span>
                                    <?php echo $row['dprise']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                <form  method="POST" enctype="multipart/form-data">
                                <select class="add-cart btn btn-outline-dark mt-auto" name="quantity">
                                        <option value = "1" > 1 </option>
                                        <option value = "2" > 2 </option>
                                        <option value = "3" > 3 </option>
                                        <option value = "4" > 4 </option>
                                        <option value = "5" > 5 </option>
                                </select>
                                <button name="add_<?php echo $row['id']?>" class="add-cart btn btn-outline-dark mt-auto">Add to cart</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php 
                
        if(isset($_POST['add_'.$row['id']]))
				  {	
                    $pid=$row['id'];
                    $fid=$ur['id'];
    
                    $sql="SELECT * from cart where pid='".$pid."' && fid='".$fid."'";
                    $result=mysql_query($sql);
                    $cnt=mysql_num_rows($result); 
                    //echo $sql;
                    if($cnt !== 0) {
                    echo "<script> alert('Already added to the cart....');</script>";
                    }
                     else{	
                    $quantity=$_POST['quantity'];

        
						$que="insert into `cart` SET `fid`='".$fid."',`pid`='".$pid."',`quantity`='".$quantity."'";
						mysql_query($que);

						echo "<script> alert('Added Successfully To the Cart....');</script>";
                        echo '<script>window.location.href="shop.php";</script>';
                     }
					}
                ?>   
                    <?php $i++;} ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright <?php echo  $quantity ;?> &copy; Smart-Farming System 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script>
                
       </script>
    </body>
</html>
