<?php
include"config.php";
$tableName="students".$_POST["batch"];
$staus="SHOW TABLES LIKE '{$tableName}'";
 $res=$con->query($staus);
  if($res->num_rows==1){
   $sql="INSERT INTO $tableName(regNo,rollNo,name,batch,department,vanOrBusFees,gender,skill,status) 
   VALUES('{$_POST["regNo"]}','{$_POST["rollNo"]}','{$_POST["name"]}','{$_POST["batch"]}','{$_POST["department"]}','{$_POST["vanOrBusFees"]}','{$_POST["gender"]}','{$_POST["skill"]}','active')
   ";
if($con->query($sql)){
    echo 1;
}
else
die("failed to add student record");
}
else{
     $createTableQuery="CREATE TABLE $tableName(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    regNo int  NOT NULL,
    rollNo int NOT NULL,
    name varchar(30) NOT NULL,
    batch int NOT NULL,
    department varchar(20) NOT NULL,
    vanOrBusFees int NOT NULL,
    gender varchar(20) NOT NULL,
    skill varchar(20) NOT NULL,
    status varchar(20) NOT NULL,
    fine int DEFAULT 0
    )";
   if($con->query($createTableQuery)){
    $sql="INSERT INTO $tableName(regNo,rollNo,name,batch,department,vanOrBusFees,gender,skill,status) 
   VALUES('{$_POST["regNo"]}','{$_POST["rollNo"]}','{$_POST["name"]}','{$_POST["batch"]}','{$_POST["department"]}','{$_POST["vanOrBusFees"]}','{$_POST["gender"]}','{$_POST["skill"]}','active')
    ";
 if($con->query($sql)){
     echo 1;
 }
 else{
     die("failed to insert record");
 }
   }
   else{
       die("failed to create table");
   }
}

?>