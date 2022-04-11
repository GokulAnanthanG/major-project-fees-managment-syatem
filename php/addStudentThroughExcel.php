<?php
include"config.php";
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$count=0;

$fileName= $_FILES["file"]["name"];
$file_ext=pathinfo($fileName,PATHINFO_EXTENSION);
$allowed_ext=['xls','csv','xlsx'];
if(in_array($file_ext,$allowed_ext)){
    $inputFileName =$_FILES["file"]["tmp_name"] ;
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
    //
    $excelData = $spreadsheet->getActiveSheet()->toArray();
  //process
  $batch;
  foreach($excelData as $row){
    if($count>0){
$batch=$row[3];
    }
    else{
        $count=1;
    }
 }//for each
  /*-----*/
 
$tableName="students".$batch;
$staus="SHOW TABLES LIKE '{$tableName}'";
 $res=$con->query($staus);
  if($res->num_rows==1){


    foreach($excelData as $row){
        if($count>0){   
   $sql="INSERT INTO $tableName(regNo,rollNo,name,batch,department,vanOrBusFees,gender,skill,status) 
   VALUES('{$row[0]}','{$row[1]}','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','active')
   ";
   $con->query($sql);
        }
        else{
            $count=1;
        }
     }//for each
     echo 1;
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
   
    foreach($excelData as $row){
        if($count>0){   
   $sql="INSERT INTO $tableName(regNo,rollNo,name,batch,department,vanOrBusFees,gender,skill,status) 
   VALUES('{$row[0]}','{$row[1]}','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','active')
   ";
   $con->query($sql);
        }
        else{
            $count=1;
        }
     }//for each
     echo 1;

   }
   else{
       die("failed to create table");
   }
}
 
 /*-----*/
  
  //end process
}
else{
    echo 555;
}
?>