<?php
include"config.php";
$sql="SELECT * FROM staff WHERE userName='{$_POST["userName"]}'AND password='{$_POST["password"]}' ";
if($res=$con->query($sql)){

    if($res->num_rows>0){
        $stafData=array();
        $date=date("M,d,Y h:i:s A");
        $log="INSERT INTO logins(userName,date) VALUES('{$_POST["userName"]}','{$date}')";
$con->query($log);
        array_push($stafData,$date);
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