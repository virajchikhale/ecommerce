<?php
include('../includes/connection.php');

$id=$_POST['id'];

$sqlinsert="delete from cart WHERE id='".$id."'" ;


$res=mysql_query($sqlinsert);

        
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>