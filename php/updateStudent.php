<?php
include"config.php";
 $table="students".$_POST["batch"];
$sql="UPDATE   $table SET vanOrBusFees='{$_POST["vanOrBusFees"]}',skill='{$_POST["skillInOption"]}',status='{$_POST["status"]}' WHERE rollNo='{$_POST["rollNo"]}' 
 ";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>