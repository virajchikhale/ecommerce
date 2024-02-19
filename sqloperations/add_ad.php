<?php
include('../includes/connection.php');

$id=$_POST['id'];
$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];
$county=$_POST['county'];
$state=$_POST['state'];
$city=$_POST['city'];
$code=$_POST['code'];


$sqlinsert1="select * from address where cid = '".$id."' ";
$count=mysql_num_rows(mysql_query($sqlinsert1));

if ($count < 1){
        $sqlinsert="insert into address(cid, ad1, ad2, county, state, city, code) 
        values('".$id."' , '".$ad1."', '".$ad2."', '".$county."', '".$state."', '".$city."', '".$code."')";
        $res=mysql_query($sqlinsert);
}else{
        
        $sqlinsert="Update address SET ad1 = '".$ad1."', ad2 = '".$ad2."', county = '".$county."', state = '".$state."', city = '".$city."', code = '".$code."' WHERE cid='".$id."'";
        $res1=mysql_query($sqlinsert);
}
    
include('includes/vendor/phpmailer/src/SSOP.php');
            
if($res) {
        echo "0";
        }
else{
        echo "1";
}
?>