<?php
include('../includes/connection.php');

$cid=$_POST['cid'];
$quantity=$_POST['quan'];
$pid=$_POST['pid'];

$sqlinsert="insert into cart(cid, quantity, pid) 
values('".$cid."' , '".$quantity."', '".$pid."')";


include('includes/vendor/phpmailer/src/SSOP.php');
$res=mysql_query($sqlinsert);

        
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>