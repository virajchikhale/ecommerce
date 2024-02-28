<?php
include('../includes/connection.php');

$id=$_POST['id'];


$sqlinsert="delete from cart where cid = '".$id."'";
$res=mysql_query($sqlinsert);
    
include('includes/vendor/phpmailer/src/SSOP.php');
            
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>