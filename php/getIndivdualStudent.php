<?php
include"config.php";
$batch="students".$_POST["batch"];
 $sql="SELECT * FROM $batch WHERE batch='{$_POST["batch"]}' AND rollNo='{$_POST["rollNo"]}' ";
if($res=$con->query($sql)){
if($res->num_rows>0){
    $obj=$res->fetch_assoc();
    echo json_encode($obj);
}
else
{
echo json_encode(0);
}
}else{
 die(000);
}
 ?>