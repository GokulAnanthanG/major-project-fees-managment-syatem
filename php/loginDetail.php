
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Management System</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
</head>
<body>


<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  <!--jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(()=>{
            try {
  if(JSON.parse(localStorage.getItem("FMSUsEr")).pos!="nimda"){
   window.location.href="../index.html";
  }
} catch (error) {
  window.location.href="../index.html";
}
        })
    </script>
    
</body>
</html>

<?php
include"config.php";
$sql="SELECT * FROM logins ORDER BY date DESC";
if($res=$con->query($sql)){
if($res->num_rows>0){
   echo "<table class='table table-dark'>";
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