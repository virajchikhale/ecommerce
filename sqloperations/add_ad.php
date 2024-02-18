<?php
include('../includes/connection.php');

$id=$_POST['id'];
$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];
$county=$_POST['county'];
$state=$_POST['state'];
$city=$_POST['city'];
$code=$_POST['code'];

$sqlinsert="insert into address(cid, ad1, ad2, county, state, city, code) 
values('".$id."' , '".$ad1."', '".$ad2."', '".$county."', '".$state."', '".$city."', '".$code."')";

$res=mysql_query($sqlinsert);

        
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>