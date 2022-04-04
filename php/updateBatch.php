<?php
include"config.php";
 $sql="UPDATE  batchfees SET  semFees='{$_POST["semFees"]}',otherFeesForSem1='{$_POST["sem1OtherFees"]}',otherFeesForSem2='{$_POST["sem2OtherFees"]}',

otherFeesForSem3='{$_POST["sem3OtherFees"]}',otherFeesForSem4='{$_POST["sem4OtherFees"]}',otherFeesForSem5='{$_POST["sem5OtherFees"]}'
,otherFeesForSem6='{$_POST["sem6OtherFees"]}'
 WHERE id='{$_POST["id"]}' 
 ";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>