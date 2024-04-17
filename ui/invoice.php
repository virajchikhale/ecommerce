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
    <title>Receipt page - Smart Farming</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include ('../includes/connection.php');	
    $sql = "select * from `customer_reg` where email='".$_SESSION["user"]."'";
    $ur = mysql_fetch_array(mysql_query($sql));
    $sql1 = "select * from `address` where cid='".$ur["id"]."'";
    $ad = mysql_fetch_array(mysql_query($sql1));
	
	?>
<div class="container bootdey">
<div class="row invoice row-printable">
    <div class="col-md-10">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here >
                        <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div-->
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li>VFL Market</li>
                                <li>IT Department</li>
                                <li>Goverment Polytechnic Awasari Kd</li>
                                <li>Maharashtra 410503, India</li>
                                <br>
                                <br>
                            </ul>
                        </div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    <li><strong>Invoice</strong> #<?php echo(rand(100000,999999));?></li>
                                    <li><strong>Invoice Date:</strong><?php echo date(" d-m-Y") ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-to mt25">
                            <ul class="list-unstyled">
                                <li><strong>Invoiced To</strong></li>
                                <li><?php echo  $ur['fname']."  ".$ur['lname'];?></li>
                                <li><?php echo  $ad['ad1'];?></li>
                                <li><?php echo  $ad['ad2'];?></li>
                                <li><?php echo  $ad['city'];?></li>
                                <li><?php echo  $ad['state'];?></li>
                                <li><?php echo  $ad['county'];?></li>
                                <li><?php echo  $ad['code'];?></li>
                            </ul>
                        </div>
                        <br>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:60%">Product</th>
                                            <th class="text-center" style="width:10%">Prise</th>
                                            <th class="text-center" style="width:10%">Discounted Prise</th>
                                            <th class="text-center" style="width:10%">Qty</th>
                                            <th class="text-center" style="width:10%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                $res = mysql_query("select * from `cart` where cid='".$ur['id']."'");
                $sr = 1;
                $total = 0;
                $subtotal_total = 0;
                $sudiscount = 0;
                while($row = mysql_fetch_array($res))
				    {
                        $prod = mysql_query("select * from `products` where id='".$row['pid']."'");
                        $pro = mysql_fetch_array($prod)
					?>
                <tr>
                    <td>
                        <div class="product-item">
                            <div class="product-info">
                                <h4 class="product-title"><?php echo $pro['name'];?></h4>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-item">
                            <div class="product-info">
                                <h4 class="product-title">  <?php echo $pro['oprise'];?></h4>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-item">
                            <div class="product-info">
                                <h4 class="product-title">  <?php echo $pro['dprise'];?></h4>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="col col-qty ">
                            <input class=" add-cart btn btn-outline-dark mt-auto" type="text" id="data" name="data" disabled class="form-control" value="<?php echo $row['quantity'];?>"/>
                        </div>
                    </td>
                    <?php $subtotal = $pro['oprise'] * $row['quantity'];?>
                    <?php $discount = $pro['oprise'] * $row['quantity'] - $pro['dprise'] * $row['quantity'];?>
                    <?php $final =  $pro['dprise'] * $row['quantity'];?>

                    <td class="text-center text-lg text-medium">₹ <?php echo $subtotal;?></td>
                </tr> 
            <?php $sr++; 
                $total = $total + $final;
                $subtotal_total = $subtotal_total + $subtotal;
                $sudiscount = $sudiscount + $discount;
            }
            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Sub Total:</th>
                                            <th class="text-center">₹ <?php echo $subtotal_total;?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Discount:</th>
                                            <th class="text-center">₹ <?php echo $sudiscount;?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Shipping:</th>
                                            <th class="text-center">₹ 100</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Total:</th>
                                            <th class="text-center">₹ <?php echo $total+100;?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <p class="text-center">Generated on <?php echo date(" l jS \of F Y") ?> <a onclick="hide()" class="btn btn-default ml15" id="print"><i class="fa fa-print mr5" ></i> Print</a></p>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>
<script>

    
var id = '<?php echo $ur['id']; ?>';
$.ajax({
                    type:'POST',
                    url:'../sqloperations/empty_cart.php',
                    data:{id:id
                    },
                    success:function(return_data) {
                    // if(return_data == "1"){
                    //     // alert('Address Updated, Order Placed1');
                    // }  else{
                    //     // alert('Address Added, Order Placed0');
                    //     // window.location.href='cart.php'; 
                    // } 
                    }
                });
function hide() {
    
    var x = document.getElementById("print");
    x.style.display = "none";
    window.print();
    return false;
  
}

</script>
<style type="text/css">
body{
    margin-top:10px;
    background:#eee;    
}
</style>

<script type="text/javascript">

</script>
</body>
</html>