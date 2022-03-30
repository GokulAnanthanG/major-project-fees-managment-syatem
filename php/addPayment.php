<?php
include"config.php";
 $sql="INSERT INTO payments(rollNo,batch,sem,regNo,name,department,date,receiptNo,collegeFees,skillFees,busOrVanFees,otherFees,fine)
VALUES('{$_POST["rollNo"]}','{$_POST["batch"]}','{$_POST["sem"]}','{$_POST["regNo"]}','{$_POST["name"]}'
,'{$_POST["department"]}','{$_POST["date"]}','{$_POST["recpNo"]}','{$_POST["collegeFees"]}','{$_POST["skillFees"]}'
,'{$_POST["busOrVanFees"]}','{$_POST["otherFees"]}','{$_POST["fine"]}'
)
";
if($con->query($sql)){
    echo 1;
}
else{
    echo 0;
}
?>