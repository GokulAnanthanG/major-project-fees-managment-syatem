<?php
include"config.php";
$sql="SELECT * FROM payments WHERE rollNo='{$_POST["rollNo"]}' AND batch='{$_POST["batch"]}' AND  sem='{$_POST["sem"]}'  ";
if($res=$con->query($sql)){
if($res->num_rows>0){
    $data=array();
    while($obj=$res->fetch_assoc()){
        array_push($data, $obj);
            }//loop
            echo json_encode($data);
}
else{
    echo 0;
}
}
else{
    die(000);
}
?>