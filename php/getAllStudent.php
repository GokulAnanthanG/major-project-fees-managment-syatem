<?php
include"config.php";
$batch="students".$_POST["batch"];
$sql="SELECT * FROM $batch  ORDER BY department ASC";
if($res=$con->query($sql)){
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
}
else{
    echo 00;
}
?>