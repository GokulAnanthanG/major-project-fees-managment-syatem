<?php
include"config.php";
 $sql="SELECT * FROM  staff WHERE  id='{$_POST["id"]}' ";
if($res=$con->query($sql)){
$data=array();
if($res->num_rows>0){
    while($obj=$res->fetch_assoc()){
array_push($data, $obj);
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