<?php
include"config.php";
$sql="SELECT * FROM payments WHERE batch='{$_POST["batch"]}' AND sem='{$_POST["sem"]}' order by date DESC LIMIT 50 ";
if($res=$con->query($sql)){
    if($res->num_rows>0){
        $arrayData=array();
        while($data=$res->fetch_assoc()){
             array_push($arrayData,$data);
        }
        echo json_encode($arrayData);
    }
    else{
        echo 0;
    }
}
else{
    echo 000;
}
?>