<?php
include"config.php";
 $table="students".$_POST["batch"];
 $sql="SELECT * FROM $table WHERE regNo='{$_POST["regNo"]}'";
if($res=$con->query($sql)){

    if($res->num_rows>0){
        $stafData=array();
        $data=$res->fetch_object();
        array_push($stafData,$data);
        echo json_encode($stafData);
    }
else{
    echo 0;
}
}
else{
    echo 000;
}
?>