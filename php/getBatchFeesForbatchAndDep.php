<?php
include"config.php";
$sql="SELECT  * FROM batchfees WHERE batch='{$_POST["batch"]}' AND department ='{$_POST["department"]}' ";
if($res=$con->query($sql)){
 if($res->num_rows>0){
    $obj=$res->fetch_assoc();
    echo json_encode($obj);
 }   
 else{
     echo json_encode(0);
 }
}
else{
    die(000);
}
?>