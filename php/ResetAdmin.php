<?php
include"config.php";
    $sql="UPDATE  users SET pass='{$_POST["newPassword"]}'
 WHERE userName='{$_POST["userName"]}' AND pass='{$_POST["password"]}'  
 ";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>