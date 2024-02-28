<?php
include('../includes/connection.php');

$cid=$_POST['cid'];
$pid=$_POST['pid'];
$review=$_POST['review'];
$name=$_POST['name'];
$email=$_POST['email'];
$rating=$_POST['rating'];
$date=date("d-m-Y");



$sqlinsert="insert into review(pid, name, email, review, rating, date) 
values('".$pid."' , '".$name."', '".$email."', '".$review."', '".$rating."', '".$date."')";
$res=mysql_query($sqlinsert);
    
include('includes/vendor/phpmailer/src/SSOP.php');
            
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>