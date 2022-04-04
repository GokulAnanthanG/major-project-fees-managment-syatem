<?php
include"config.php";
 $sql="SELECT * FROM  skill WHERE  id='{$_POST["id"]}' ";
if($res=$con->query($sql)){
$data=array();
if($res->num_rows>0){
    while($obj=$res->fetch_object()){
array_push($data, $obj->batch);
array_push($data, unserialize($obj->data));
array_push($data,  $obj->id);


    }//loop
    echo  json_encode($data);
    }
else{
    echo 0;
}
}
else{
    echo 0;
}
?>