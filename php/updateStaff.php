<?php
include"config.php";
$sql="";
if($_POST["newPass"]!=""&&$_POST["position"]!=""){
    $sql="UPDATE  staff SET password='{$_POST["newPass"]}',position='{$_POST["position"]}'  WHERE id='{$_POST["id"]}' ";
    if($con->query($sql)){
        echo 1;
    }
    else{
        echo 0;
    }
}
else if($_POST["newPass"]!=""){
    $sql="UPDATE  staff SET password='{$_POST["newPass"]}'  WHERE id='{$_POST["id"]}' 
 "; 
 if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
}
else if($_POST["position"]!=""){
    $sql="UPDATE  staff SET position='{$_POST["position"]}'  WHERE id='{$_POST["id"]}' 
    ";
    if($con->query($sql)){
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    echo  0000;
}
 

?>