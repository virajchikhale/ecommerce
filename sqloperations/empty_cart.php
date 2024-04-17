<?php
include('../includes/connection.php');

$id=$_POST['id'];

$res = mysql_query("select * from cart where cid='".$id."'");
while($row = mysql_fetch_array($res))
{    
        $pid = $row['pid'];
        $quantity = $row['quantity'];
        $date = date("d-m-y");
        $sqlinsert2="insert into `order`(pid, cid, date, quantity) 
        values('".$pid."' , '".$id."', '".$date."', '".$quantity."')";
        $res1=mysql_query($sqlinsert2);
}


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