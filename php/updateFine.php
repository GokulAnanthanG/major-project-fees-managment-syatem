<?php
include"config.php";
 $table="students".$_POST["batch"];
$sql="UPDATE   $table SET fine='{$_POST["fine"]}' WHERE rollNo='{$_POST["rollNo"]}' 
 ";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>