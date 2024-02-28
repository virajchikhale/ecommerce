<!DOCTYPE html>
<html lang="en">
<?php
        include ('../includes/connection.php');
        
session_start();
if($_SESSION["user"]==""){
  echo "<script> alert('Please login....');</script>";
  echo '<script>window.location.href="index.php";</script>';
}
$sql = "select * from `customer_reg` where email='".$_SESSION["user"]."'";
$ur = mysql_fetch_array(mysql_query($sql));
$sql1 = "select * from `cart` where cid='".$ur['id']."'";
$result=mysql_query($sql1);
$cont=mysql_num_rows($result);

$product_id = $_GET['product_id']; 
// echo $product_id;
?>
<head>
    <meta charset="utf-8">
    <title>Detail</title>
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
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
    }
    .rating > span {
        display: inline-block;
        position: relative;
        width: 1.1em;
    }
    .rating > span:hover:before,
    .rating > span.checked:before {
        content: "\2605";
        position: absolute;
        color: gold;
    }
</style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                <img src="../images/logo/logo.png" alt="Cool Admin" height="70px"/></a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Product Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Product Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
  
  <?php
$res = mysql_query("select * from products where id = '".$product_id."'");
$id = 1;
while($row = mysql_fetch_array($res))
{
    $count = mysql_query("select * from review where pid = '".$product_id."'");
?>
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../images/products/<?php echo $row['img']; ?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $row['name']; ?></h3>
                <div class="d-flex mb-3">
                    <!-- <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div> -->
                    <small class="pt-1">(<?php echo mysql_num_rows($count);?> Reviews)</small>
                </div>
                <?php
                    $re = mysql_query("select * from products where id = '".$product_id."'");
                    while($ro = mysql_fetch_array($re))
                    {
                        $sale= $ro['sale'];
                    }
                ?>
                <p class="mb-4">Total Purchases: <b><?php echo $sale;?></b></p>
                <h3 class="font-weight-semi-bold mb-4">₹<?php echo $row['dprise']; ?></h3>
                <p class="mb-4"><?php echo $row['description']; ?></p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <button onclick=addtocart()  class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
            </div>
        </div>

        
    <script>

function addtocart>(){
var pid = $product_id;
var cid = $ur['id'];
var quan = "1";

    $.ajax({
    type:'POST',
    url:'../sqloperations/insert_reg.php',
    data:{pid:pid,
        cid:cid,
        quan:quan
    },
    success:function(return_data) {
        //alert(return_data);
      if(return_data == "1"){
        alert('Someting went wrong!!!');
      }  else{
        alert('Item Added Successfully');
        window.location.href='home.php'; 
      } 
    }
  });
}
</script>
        
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link" active data-toggle="tab" href="#tab-pane-3">Reviews (<?php echo mysql_num_rows($count);?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade  show active" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?php echo mysql_num_rows($count);?>  review for "<?php echo $row['name']; ?>"</h4>
                                <?php
                                    $ress = mysql_query("select * from review where pid = '".$product_id."'");
                                    while($roww = mysql_fetch_array($ress))
                                    {
                                ?>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6><?php echo $roww['name']; ?><small> - <i><?php echo $roww['date']; ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                            <?php 
                                            for($i=0; $i<$roww["rating"]; $i++){?>
                                                <i class="fas fa-star"></i>
                                                <?php
                                            }?>
                                        </div>
                                        <p><?php echo $roww['review']; ?></p>
                                    </div>
                                </div>

                                <?php
                                    $id++; }
                                ?>
                                
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <div class="rating">
                                            <span data-value="1">&#9734;</span>
                                            <span data-value="2">&#9734;</span>
                                            <span data-value="3">&#9734;</span>
                                            <span data-value="4">&#9734;</span>
                                            <span data-value="5">&#9734;</span>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="review" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                        <input type="hidden" id="rating">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button onclick=submit() class="btn btn-primary px-3">Leave Your Review</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

<script>
    const ratingStars = document.querySelectorAll(".rating span");
    
    ratingStars.forEach((star) => {
        star.addEventListener("click", () => {
            const value = parseInt(star.getAttribute("data-value"));
            var ratingValue = 6 - value; // Mapping the value to the desired output
            for (let i = 0; i < ratingStars.length; i++) {
                if (i < ratingValue) {
                    ratingStars[i].classList.add("checked");
                } else {
                    ratingStars[i].classList.remove("checked");
                }
            }
            // alert(ratingValue);
            document.getElementById("rating").value = ratingValue;
            // console.log("Rating:", ratingValue);
        });
    });

    function submit(){
            // alert("hiii")
            var pid = '<?php echo $product_id; ?>';
            var review = $('#review').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var rating = $('#rating').val();
            alert(email);
            alert(rating);
        	$.ajax({
            type:'POST',
            url:'../sqloperations/add_review.php',
            data:{pid:pid,
                review:review,
                name:name,
                email:email,
                rating:rating
        	},
            success:function(return_data) {
                alert(return_data)
              if(return_data == "0"){
                alert('review Added');
              }  else{
                alert('Address Added, Order Placed');
				// window.location.href='cart.php'; 
              } 
                // window.location.href='invoice.php'; 
                // window.open('invoice.php', '_blank', 'noopener, noreferrer');

            }
          });
        }
</script>
        
    <?php
$id++; }
?>


    <!-- Footer Start -->
    <?php 
        include ('footer.php');
        ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        </script>
</body>

</html>