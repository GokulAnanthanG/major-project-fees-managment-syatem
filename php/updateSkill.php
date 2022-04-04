<?php
include"config.php";
$encrypted= serialize($_POST["data"]);
 $sql="UPDATE  skill SET  data='{$encrypted}'
 WHERE id='{$_POST["id"]}' 
 ";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>