<?php
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
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
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

