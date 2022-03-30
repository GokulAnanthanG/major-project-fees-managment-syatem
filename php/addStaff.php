<?php
include"config.php";
$sql="INSERT INTO staff(name,userName,password,position) VALUES('{$_POST['name']}','{$_POST['userName']}','{$_POST['password']}','{$_POST['position']}') ";
if($con->query($sql)){
    echo 1;
}
else{
    die("failed to add the staff");
}
?>