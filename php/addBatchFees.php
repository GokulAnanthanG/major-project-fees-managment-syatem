<?php
include"config.php";
$check="SELECT batch,department FROM batchfees WHERE batch='{$_POST["batch"]}' AND department ='{$_POST["department"]}' ";
$checkRes=$con->query($check);
if($checkRes->num_rows>0){
    echo 0;
}
else{
    $sql="INSERT INTO batchFees(batch,department,semFees,otherFeesForSem1,otherFeesForSem2,otherFeesForSem3,otherFeesForSem4,otherFeesForSem5,otherFeesForSem6)
    VALUES('{$_POST["batch"]}','{$_POST["department"]}','{$_POST["semFees"]}','{$_POST["otherFeesForSem1"]}','{$_POST["otherFeesForSem2"]}','{$_POST["otherFeesForSem3"]}','{$_POST["otherFeesForSem4"]}','{$_POST["otherFeesForSem5"]}','{$_POST["otherFeesForSem6"]}')
    ";
    if($con->query($sql)){
        echo 1;
    }
    else{
        die("failed to insert");
    }
}//check else
?>