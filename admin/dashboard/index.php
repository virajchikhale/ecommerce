<?php

session_start();
?><!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../src/assets/images/favicon.png">
    <title>Admin Add Product</title>
    <!-- This page css -->
    <!-- Custom CSS -->
	<link href="../src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../src/dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="highlights/highlight.min.css">
	<!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	<!-- Custom CSS -->

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="docs.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../src/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../src/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../src/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../src/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <a class="nav-link" href="docs.html" role="button">
                                Documentation
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <div class="col-md-12 text-center">
                            <?php
                                include ('../../includes/connection.php');	
                                $ur = mysql_fetch_array(mysql_query("select * from admin_reg where email='".$_SESSION["user"]."'"));
                            ?>
                            <h4 class="name"><?php echo  ucfirst($ur['first_name'])."  ".ucfirst($ur['last_name']);?></h4>
                            <a href="../login" ><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Sign out</a>
                        </div>
                        <br>
                        <li class="nav-small-cap"><span class="hide-menu">Products</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                        aria-expanded="false"><i data-feather="bar-chart-2" class="feather-icon"></i>
							<span class="hide-menu">Product Report</span></a>
						</li>
                        <li class="list-divider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="d-flex align-items-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-0">Product Report</h4>
                    <div class="ml-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Admin</li>
                                <li class="breadcrumb-item text-muted" aria-current="page">Product Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->




            <!-- add product model -->
            <div class="modal fade" id="add_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ADD PRODUCT FOR SELL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    
                        <div class="modal-body">
                            <form  method="POST" enctype="multipart/form-data">
                    
                                <div class="form-group mb-3">
                                <label for="">Name</label><input type="text" name="name" class="form-control" >
                                <label for="">Category</label><input type="text" name="category" class="form-control" >
                                <label for="">Type</label><input type="text" name="type" class="form-control" >
                                <label for="">Orignal Prise</label><input type="text" name="oprise" class="form-control" >
                                <label for="">Discounted Prise</label><input type="text" name="dprise" class="form-control" >
                                <label for="">Description</label><input type="text" name="description" class="form-control" >
                                <label for="">Quantity</label><input type="text" name="quantity" class="form-control" >
                                <label for="">Image</label><br>
                                <input type="file" name="img" class="form-control" >

                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="add_pro" class="btn btn-success">Add</button>
                                </div>

                            </form>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden">
							<div class="row justify-content-center bg-light p-3">
								<div class="col-md-12">
									<div class="card shadow-sm">
										<div class="p-4 text-center">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                    <a class="btn btn-lg btn-info" data-toggle="modal" data-target="#add_pro"  style="color:white"><i class="far fa-plus" style="color:rgb(0,0,0)"></i>Add Product</a>
                                                </div>
                                            </div>
											<div class="table-responsive">
			                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
			                                        <thead>
			                                            <tr>
			                                                <th>Action</th>
			                                                <th>ID</th>
			                                                <th>Name</th>
			                                                <th>Category</th>
			                                                <th>Type</th>
			                                                <th>Orignal Prise</th>
			                                                <th>Discounted Prise</th>
			                                                <th>Quantity</th>
			                                                <th>Sale</th>
			                                                <th>Description</th>
			                                                <th>Image</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
                                                        <?php
                                                                    include ('../../includes/connection.php');
                                                                    $ur = mysql_fetch_array(mysql_query("select * from admin_reg where email='".$_SESSION["user"]."'"));
                                                                    $res = mysql_query("select * from products WHERE aid='".$ur['id']."'");
                                                                    $id = 1;
                                                                    while($row = mysql_fetch_array($res))
                                                                    {
                                                                ?>
			                                            <tr>
                                                        
                                                        <th scope="row">
                                                            <label class="control control--checkbox">
                                                            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal_<?php echo $row['id'] ;?>"><i class="far fa-edit" style="color:rgb(10,10,10)"></i></a>
                                                            <div class="control__indicator"></div>
                                                            </label>

                                                            <label class="control control--checkbox">
                                                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_<?php echo $row['id'] ;?>"><i class="fas fa-trash-alt" style="color:rgb(40,40,40)"></i></a>
                                                            <div class="control__indicator"></div>
                                                            </label>
                                                        </th>
                                                        <td><?php echo $id;?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['category']; ?></td>
                                                        <td><?php echo $row['type']; ?></td>
                                                        <td><?php echo $row['oprise']; ?></td>
                                                        <td><?php echo $row['dprise']; ?></td>	
                                                        <td><?php echo $row['quantity']; ?></td>	
                                                        <td><?php echo $row['sale']; ?></td>				  
                                                        <td><?php echo $row['description']; ?></td>	
                                                        <th scope="row">
                                                            <label class="control control--checkbox">
                                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#imageModal_<?php echo $row['id'] ;?>"><i class="fa-solid fa-image"  style="color:black"></i></i></a>
                                                            <div class="control__indicator"></div>
                                                            </label>
                                                        </th>
			                                            </tr>

                                                         <!-- image model -->
                                                        <div class="modal fade" id="imageModal_<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                            
                                                            <?php  $query1="SELECT * FROM products where id='".$row['id']."' ";
                                                                $query_run2=mysql_query($query1);
                                                                $results = mysql_fetch_array($query_run2);
                                                                //echo $results['keyword']; 
                                                                // echo $results['question']; 					  
                                                            ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Image of <?php echo $results['name']; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="../../images/products/<?php echo $results['img']; ?>" class="rounded" alt="<?php echo $results['img']; ?>" style="width:100%;">
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- update model -->
                                                        <div class="modal fade" id="exampleModal_<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                            
                                                            <?php  $query1="SELECT * FROM products where id='".$row['id']."' ";
                                                                $query_run2=mysql_query($query1);
                                                                $results = mysql_fetch_array($query_run2);
                                                                //echo $results['keyword']; 
                                                                // echo $results['question']; 					  
                                                            ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">UPDATE CURRENT PRODUCT</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                    </div>
                                                                
                                                                    <div class="modal-body">
                                                                        <form  method="POST" enctype="multipart/form-data">
                                                                
                                                                            <div class="form-group mb-3">
                                                                            <label for="">ID</label><input type="text" name="ID" class="form-control" value="<?php echo $results['id']; ?>">
                                                                            <label for="">Name</label><input type="text" name="name" class="form-control" value="<?php echo $results['name']; ?>">
                                                                            <label for="">Type</label><input type="text" name="type" class="form-control" value="<?php echo $results['type']; ?>">
                                                                            <label for="">Orignal Prise</label><input type="text" name="oprise" class="form-control" value="<?php echo $results['oprise']; ?>">
                                                                            <label for="">Discounted Prise</label><input type="text" name="dprise" class="form-control" value="<?php echo $results['dprise']; ?>">
                                                                            <label for="">Description</label><input type="text" name="description" class="form-control" value="<?php echo $results['description']; ?>">
                                                                            <label for="">Quantity</label><input type="text" name="quantity" class="form-control" value="<?php echo $results['quantity']; ?>">
                                                                            <label for="">Image</label><br>
                                                                            <label for="">Old image: <?php echo $results['img']; ?></label><input type="file" name="img" class="form-control" >

                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                            <button type="submit" name="update_<?php echo $row['id']; ?>" class="btn btn-success">update</button>
                                                                            </div>

                                                                        </form>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Delete model -->
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
                                                                        <p>Are you sure want to delete <?php echo $row['name'];?>......? </p>
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


                                                        
                                                        <?php 
                                                            if(isset($_POST['update_'.$row['id']]))
                                                            {		

                                                                if(isset($_FILES['img'])){
                                                                    echo "<pre>";
                                                                    print_r($_FILES);
                                                                    echo "</pre>";
                                                                    $rand = (rand(1,999999));
                                                                    $file_name = $rand.$_FILES['img']['name'];
                                                                    $file_tmp = $_FILES['img']['tmp_name'];
                                                                    move_uploaded_file($file_tmp,"../images/products/".$file_name);
                                                                }
                                                                $name=$_POST['name'];
                                                                $img=$file_name;
                                                                $type=$_POST['type'];
                                                                $oprise=$_POST['oprise'];
                                                                $dprise=$_POST['dprise'];
                                                                $description=$_POST['description'];
                                                                $quantity=$_POST['quantity'];
                                                                $que="UPDATE `products` SET `name`='".$name."', `type`='".$type."',`img`='".$img."',`oprise`='".$oprise."',`dprise`='".$dprise."',`description`='".$description."',`quantity`='".$quantity."'  WHERE id='".$row['id']."'" ;
                                                                mysql_query($que);
                                                                echo "<script> alert('Crop data updated Successfully....');</script>";
                                                                echo '<script>window.location.href="my-products.php";</script>';
                                                            }
                                                                    
                                                                    
                                                            if(isset($_POST['delete_'.$row['id']]))
                                                            {		 
                                                                $que = "delete from products where id = '".$row['id']."' ";
                                                                mysql_query($que);
                                                                echo '<script>window.location.href="pro_report.php";</script>';
                                                            }

                                                        $id++; }

                                                    echo "Number of products: " . mysql_num_rows($res) ;

                                                    
                                                    if(isset($_POST['add_pro']))
                                                    {		

                                                        if(isset($_FILES['img'])){
                                                            echo "<pre>";
                                                            print_r($_FILES);
                                                            echo "</pre>";
                                                            $rand = (rand(1,999999));
                                                            $file_name = $rand.$_FILES['img']['name'];
                                                            $file_tmp = $_FILES['img']['tmp_name'];
                                                            move_uploaded_file($file_tmp,"../../images/products/".$file_name);
                                                        }
                                                        $name=$_POST['name'];
                                                        $img=$file_name;
                                                        $category=$_POST['category'];
                                                        $type=$_POST['type'];
                                                        $oprise=$_POST['oprise'];
                                                        $dprise=$_POST['dprise'];
                                                        $description=$_POST['description'];
                                                        $quantity=$_POST['quantity'];
                                                        $que="Insert into products(name, img,category, type, oprise, dprise, description, quantity, aid) values('".$name."' , '".$img."', '".$category."', '".$type."', '".$oprise."', '".$dprise."', '".$description."', '".$quantity."','".$ur['id']."')";
                                                        mysql_query($que);
                                                        echo "<script> alert('Product data updated Successfully....');</script>";
                                                        echo '<script>window.location.href="my-products.php";</script>';
                                                    }
                                                        ?>
			                                        </tbody>
			                                        <tfoot>
			                                            <tr>
			                                                <th>Action</th>
			                                                <th>ID</th>
			                                                <th>Name</th>
			                                                <th>Category</th>
			                                                <th>Type</th>
			                                                <th>Orignal Prise</th>
			                                                <th>Discounted Prise</th>
			                                                <th>Quantity</th>
			                                                <th>Sale</th>
			                                                <th>Description</th>
			                                                <th>Image</th>
			                                            </tr>
			                                        </tfoot>
			                                    </table>
			                                </div>
										</div>	
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>



            
           
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Page -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../src/dist/js/app-style-switcher.js"></script>
    <script src="../src/dist/js/feather.min.js"></script>
    <script src="../src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../src/dist/js/custom.min.js"></script>
	<script src="../src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../src/dist/js/pages/datatable/datatable-basic.init.js"></script>
	<script src="highlights/highlight.min.js"></script>
	<script>
		hljs.initHighlightingOnLoad();
	</script>
    <!-- End JS -->
</body>

</html>