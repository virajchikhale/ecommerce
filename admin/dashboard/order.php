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
                        
                        <li class="nav-small-cap"><span class="hide-menu">Orders</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="order.php"
                        aria-expanded="false"><i data-feather="bar-chart-2" class="feather-icon"></i>
							<span class="hide-menu">Order Report</span></a>
						</li>
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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-0">Order Report</h4>
                    <div class="ml-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Admin</li>
                                <li class="breadcrumb-item text-muted" aria-current="page">Order Report</li>
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




            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden">
							<div class="row justify-content-center bg-light p-3">
								<div class="col-md-12">
									<div class="card shadow-sm">
										<div class="p-4 text-center">
											<div class="table-responsive">
			                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
			                                        <thead>
			                                            <tr>
			                                                <th>Action</th>
			                                                <th>ID</th>
			                                                <th>PID</th>
			                                                <th>CID</th>
			                                                <th>Quantity</th>
			                                                <!-- <th>Available Quantity</th> -->
			                                                <th>Date of order</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
                                                        <?php
                                                                    include ('../../includes/connection.php');
                                                                    $ur = mysql_fetch_array(mysql_query("select * from admin_reg where email='".$_SESSION["user"]."'"));
                                                                    $res = mysql_query("select * from `order`");
                                                                    $id = 1;
                                                                    while($row = mysql_fetch_array($res))
                                                                    {
                                                                ?>
			                                            <tr>
                                                        
                                                        <th scope="row">
                                                            <label class="control control--checkbox">
                                                            <a class="btn btn-sm btn-success" target="_blank" href="invoice.php?oid=<?php echo $id;?>" style="color:rgb(10,10,10)">Pack</a>
                                                            <div class="control__indicator"></div>
                                                            </label>
                                                        </th>
                                                            <td><?php echo $id;?></td>
                                                            <td><?php echo $row['pid']; ?></td>
                                                            <td><?php echo $row['cid']; ?></td>
                                                            <td><?php echo $row['quantity']; ?></td>
                                                            <!-- <td><?php echo $row['quantity']; ?></td> -->
                                                            <td><?php echo $row['date']; ?></td>	
			                                            </tr>
                                                        <?php 
                                                        $id++; }
                                                    echo "Number of Orders: " . mysql_num_rows($res) ;
                                                        ?>
			                                        </tbody>
			                                        <tfoot>
			                                            <tr>
			                                                <th>Action</th>
			                                                <th>ID</th>
			                                                <th>PID</th>
			                                                <th>CID</th>
			                                                <th>Quantity</th>
			                                                <!-- <th>Available Quantity</th> -->
			                                                <th>Date of order</th>
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
                All Rights Reserved. Designed and Developed by <a
                    href="#">Government Polytechnic Awasari</a>.
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
