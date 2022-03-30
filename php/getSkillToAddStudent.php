<?php
include"config.php";
$sql="SELECT * FROM skill WHERE  batch='{$_POST["batch"]}'";
$res=$con->query($sql);
 if($res->num_rows>0){
   $data= $res->fetch_object();
echo json_encode(unserialize($data->data));
    }
else{
    echo 0;
}
?>