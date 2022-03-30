<?php
include"config.php";
$sql="SELECT receiptNo FROM payments ORDER BY receiptNo DESC";
$res=$con->query($sql);
if($res->num_rows>0){
$data=$res->fetch_object();
echo json_encode($data->receiptNo);
}else{
    echo 0;
}
?>