<?php
include"config.php";
$sql="SELECT * FROM logins ORDER BY date DESC";
if($res=$con->query($sql)){
if($res->num_rows>0){
   echo "<table>";
    while($obj=$res->fetch_object()){
       echo"
       <tr>
       <td></td>
       <td>$obj->userName</td>
       <td>$obj->date</td>
       </tr>
       ";
            }//loop
            echo "</table>";
}
else{
    echo 0;
}
}
else{
    die(000);
}
?>