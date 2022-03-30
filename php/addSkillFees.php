<?php
include"config.php";
$encrypted= serialize($_POST["data"]);
  $check="SELECT * FROM skill WHERE batch='{$_POST["batch"]}'";
 $checkRes=$con->query($check);
 if($checkRes->num_rows>0){
     echo 0;
 }
 else{
    $sql="INSERT INTO skill(batch,noOfSkill,data) VALUES('{$_POST["batch"]}','{$_POST["noOfSkill"]}','{$encrypted}')";
    if($con->query($sql)){
        echo 1;
    }
    else{
    die("failed to add skills");
    }
 }
?>