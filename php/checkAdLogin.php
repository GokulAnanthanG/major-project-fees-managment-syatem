<?php
include"config.php";
$sql="SELECT * FROM users WHERE userName='{$_POST["userName"]}'AND pass='{$_POST["password"]}' ";
if($res=$con->query($sql)){

    if($res->num_rows>0){
        echo 1;
    }
else{
    echo 0;
}
}
else{
    echo 000;
}
?>