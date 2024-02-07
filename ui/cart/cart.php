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
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Shop Cart </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
			include ('../../includes/connection.php');	
            $sql = "select * from `farmer_reg` where email='".$_SESSION["user"]."'";
			$ur = mysql_fetch_array(mysql_query($sql));
	
	?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container padding-bottom-3x mb-1">
    <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span>&nbsp;&nbsp;All Your Products are at one place, <strong>Checkout</strong> to place order.</div>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Discount</th>
                    <th class="text-center"><a class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#clearcart">Clear Cart</a></th>
                    

                    <div class="modal fade" id="clearcart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLongTitle" style="text-align: center;font-size: 25px;">DELETE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to the cart...? </p>
                                </div>
                                <div class="modal-footer">
                                    <form  method="POST" enctype="multipart/form-data">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="clear" class="btn btn-success">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_POST['clear']))
				  {		 
				  	$que = "delete from cart where fid = '".$ur['id']."' ";
					mysql_query($que);
					echo '<script>window.location.href="cart.php";</script>';
				}?>

                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysql_query("select * from `cart` where fid='".$ur['id']."'");
                $sr = 1;
                $total = 0;
                while($row = mysql_fetch_array($res))
				    {
                        $prod = mysql_query("select * from `products` where id='".$row['pid']."'");
                        $pro = mysql_fetch_array($prod)
					?>
                <tr>
                    <td>
                        <div class="product-item">
                            <a class="product-thumb" href="#"><img src="../../imgs/cart/<?php echo $pro['img']; ?>" alt="Product"></a>
                            <div class="product-info">
                                <h4 class="product-title"><a href="#"><?php echo $pro['name'];?></a></h4><span><em>Orignal Prise:</em> <?php echo $pro['oprise'];?></span><span><em>Discounted:</em><?php echo $pro['dprise'];?></span>
                            </div>
                        </div>
                    </td>
                    <form  method="POST" enctype="multipart/form-data">
                    <td class="text-center">
                    <div class="col col-qty ">
                        <input class=" add-cart btn btn-outline-dark mt-auto" type="text" id="data" name="data" disabled class="form-control" value="<?php echo $row['quantity'];?>"/>
                    </div>
                    </td>
                </form>
                    <?php   $subtotal = $pro['oprise'] * $row['quantity'];
                            $discount = $pro['oprise'] * $row['quantity'] - $pro['dprise'] * $row['quantity'];
                            $final =  $pro['dprise'] * $row['quantity'];?>

                    <td class="text-center text-lg text-medium">₹ <?php echo $subtotal;?></td>
                    <td class="text-center text-lg text-medium">₹ <?php echo $discount;?></td>
                    <td class="text-center"><a class="remove-from-cart" data-toggle="modal" data-target="#deleteModal_<?php echo $row['id'] ;?>"><i class="fa fa-trash"></i></a></td>


                    <div class="modal fade" id="deleteModal_<?php echo $row['id'];?>"tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLongTitle" style="text-align: center;font-size: 25px;">DELETE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this Farmer Details......? </p>
                                </div>
                                <div class="modal-footer">
                                    <form  method="POST" enctype="multipart/form-data">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="delete_<?php echo $row['id']; ?>" class="btn btn-success">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_POST['delete_'.$row['id']]))
				  {		 
				  	$que = "delete from cart where id = '".$row['id']."' ";
					mysql_query($que);
					echo '<script>window.location.href="cart.php";</script>';
				}?>
                </tr> 
            <?php $sr++; 
                $total = $total + $final;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="shopping-cart-footer">
        <div class="column text-lg">Subtotal: <span class="text-medium">₹ <?php echo $total;?></span></div>
    </div>
    <form  method="POST" enctype="multipart/form-data">
    <div class="shopping-cart-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="shop.php"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
        <div class="column"><a class="btn btn-success" href="invoice.php">Checkout</a></div>
    </div>
    </form>
</div>

<style type="text/css">
body{margin-top:20px;}
select.form-control:not([size]):not([multiple]) {
    height: 44px;
}
select.form-control {
    padding-right: 38px;
    background-position: center right 17px;
    background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
    background-repeat: no-repeat;
    background-size: 9px 9px;
}
.form-control:not(textarea) {
    height: 44px;
}
.form-control {
    padding: 0 18px 3px;
    border: 1px solid #dbe2e8;
    border-radius: 22px;
    background-color: #fff;
    color: #606975;
    font-family: "Maven Pro",Helvetica,Arial,sans-serif;
    font-size: 14px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.shopping-cart,
.wishlist-table,
.order-table {
    margin-bottom: 20px
}

.shopping-cart .table,
.wishlist-table .table,
.order-table .table {
    margin-bottom: 0
}

.shopping-cart .btn,
.wishlist-table .btn,
.order-table .btn {
    margin: 0
}

.shopping-cart>table>thead>tr>th,
.shopping-cart>table>thead>tr>td,
.shopping-cart>table>tbody>tr>th,
.shopping-cart>table>tbody>tr>td,
.wishlist-table>table>thead>tr>th,
.wishlist-table>table>thead>tr>td,
.wishlist-table>table>tbody>tr>th,
.wishlist-table>table>tbody>tr>td,
.order-table>table>thead>tr>th,
.order-table>table>thead>tr>td,
.order-table>table>tbody>tr>th,
.order-table>table>tbody>tr>td {
    vertical-align: middle !important
}

.shopping-cart>table thead th,
.wishlist-table>table thead th,
.order-table>table thead th {
    padding-top: 17px;
    padding-bottom: 17px;
    border-width: 1px
}

.shopping-cart .remove-from-cart,
.wishlist-table .remove-from-cart,
.order-table .remove-from-cart {
    display: inline-block;
    color: #ff5252;
    font-size: 18px;
    line-height: 1;
    text-decoration: none
}

.shopping-cart .count-input,
.wishlist-table .count-input,
.order-table .count-input {
    display: inline-block;
    width: 100%;
    width: 86px
}

.shopping-cart .product-item,
.wishlist-table .product-item,
.order-table .product-item {
    display: table;
    width: 100%;
    min-width: 150px;
    margin-top: 5px;
    margin-bottom: 3px
}

.shopping-cart .product-item .product-thumb,
.shopping-cart .product-item .product-info,
.wishlist-table .product-item .product-thumb,
.wishlist-table .product-item .product-info,
.order-table .product-item .product-thumb,
.order-table .product-item .product-info {
    display: table-cell;
    vertical-align: top
}

.shopping-cart .product-item .product-thumb,
.wishlist-table .product-item .product-thumb,
.order-table .product-item .product-thumb {
    width: 130px;
    padding-right: 20px
}

.shopping-cart .product-item .product-thumb>img,
.wishlist-table .product-item .product-thumb>img,
.order-table .product-item .product-thumb>img {
    display: block;
    width: 100%
}

@media screen and (max-width: 860px) {
    .shopping-cart .product-item .product-thumb,
    .wishlist-table .product-item .product-thumb,
    .order-table .product-item .product-thumb {
        display: none
    }
}

.shopping-cart .product-item .product-info span,
.wishlist-table .product-item .product-info span,
.order-table .product-item .product-info span {
    display: block;
    font-size: 13px
}

.shopping-cart .product-item .product-info span>em,
.wishlist-table .product-item .product-info span>em,
.order-table .product-item .product-info span>em {
    font-weight: 500;
    font-style: normal
}

.shopping-cart .product-item .product-title,
.wishlist-table .product-item .product-title,
.order-table .product-item .product-title {
    margin-bottom: 6px;
    padding-top: 5px;
    font-size: 16px;
    font-weight: 500
}

.shopping-cart .product-item .product-title>a,
.wishlist-table .product-item .product-title>a,
.order-table .product-item .product-title>a {
    transition: color .3s;
    color: #374250;
    line-height: 1.5;
    text-decoration: none
}

.shopping-cart .product-item .product-title>a:hover,
.wishlist-table .product-item .product-title>a:hover,
.order-table .product-item .product-title>a:hover {
    color: #0da9ef
}

.shopping-cart .product-item .product-title small,
.wishlist-table .product-item .product-title small,
.order-table .product-item .product-title small {
    display: inline;
    margin-left: 6px;
    font-weight: 500
}

.wishlist-table .product-item .product-thumb {
    display: table-cell !important
}

@media screen and (max-width: 576px) {
    .wishlist-table .product-item .product-thumb {
        display: none !important
    }
}

.shopping-cart-footer {
    display: table;
    width: 100%;
    padding: 10px 0;
    border-top: 1px solid #e1e7ec
}

.shopping-cart-footer>.column {
    display: table-cell;
    padding: 5px 0;
    vertical-align: middle
}

.shopping-cart-footer>.column:last-child {
    text-align: right
}

.shopping-cart-footer>.column:last-child .btn {
    margin-right: 0;
    margin-left: 15px
}

@media (max-width: 768px) {
    .shopping-cart-footer>.column {
        display: block;
        width: 100%
    }
    .shopping-cart-footer>.column:last-child {
        text-align: center
    }
    .shopping-cart-footer>.column .btn {
        width: 100%;
        margin: 12px 0 !important
    }
}

.coupon-form .form-control {
    display: inline-block;
    width: 100%;
    max-width: 235px;
    margin-right: 12px;
}

.form-control-sm:not(textarea) {
    height: 36px;
}



</style>

<script>
$('.visibility-cart').on('click',function(){
       
       var $btn =  $(this);
       var $cart = $('.cart');
       console.log($btn);
       
       if ($btn.hasClass('is-open')) {
          $btn.removeClass('is-open');
          $btn.text('O')
          $cart.removeClass('is-open');     
          $cart.addClass('is-closed');
          $btn.addClass('is-closed');
       } else {
          $btn.addClass('is-open');
          $btn.text('X')
          $cart.addClass('is-open');     
          $cart.removeClass('is-closed');
          $btn.removeClass('is-closed');
       }
     
                       
     });
     
      
     
     // RESTRICT INPUTS TO NUMBERS ONLY WITH A MIN OF 0 AND A MAX 100
     $('input').on('blur', function(){
     
       var input = $(this);
       var value = parseInt($(this).val());
     
         if (value < 0 || isNaN(value)) {
           input.val(0);
         } else if
           (value > 100) {
           input.val(100);
         }
     });
</script>

<script type="text/javascript">

</script>
</body>
</html>