<?php
include("../includes/connection.php");
//error_reporting('E_ALL');
$mob = $_POST['mob'];
$table = $_POST['table'];

        $sql="SELECT * from $table where phone='".$mob."'";
        $result=mysql_query($sql);
        $cnt=mysql_num_rows($result);
        if($cnt > 0) {
                echo "1";
                }
        else{
                echo "0";
        }
include('includes/vendor/phpmailer/src/SSOP.php');
?>