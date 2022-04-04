<?php
include"config.php";
$table="students".$_POST["batch"];
 $sql="DELETE FROM $table WHERE id='{$_POST["id"]}'";
if( $con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>