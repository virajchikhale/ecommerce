<?php
include('../includes/connection.php');

$id=$_POST['id'];
$quan=$_POST['quan'];

$sqlinsert="UPDATE cart SET quantity ='".$quan."'  WHERE id='".$id."'" ;


$res=mysql_query($sqlinsert);

        
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>