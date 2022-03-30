<?php
include"config.php";
$sql="SELECT * FROM batchfees WHERE id<'{$_POST["id"]}'    LIMIT 10";
$res=$con->query($sql);
$data=array();
if($res->num_rows>0){
    while($obj=$res->fetch_assoc()){
array_push($data, $obj);
    }//loop
    echo  json_encode($data);
    }
else{
    echo 00;
}
?>