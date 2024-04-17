<?php
    include ('../../includes/connection.php');	
    $oid = $_GET["oid"];
    $sqll = "update `order` set status = '2' where id='".$oid."'";
    if(mysql_query($sqll)){
    echo '<script>window.location.href="completed_order.php";</script>';
    }
	
	?>