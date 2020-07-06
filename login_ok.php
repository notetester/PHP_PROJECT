<?php
session_start();
require_once("DBCONNECT.PHP");

$id = mysqli_real_escape_string($DB_CONNECT,$_POST['id']);
$pw = mysqli_real_escape_string($DB_CONNECT,$_POST['pw']);

$sql = "SELECT * FROM member where id='".$id."' and pass='".$pw."'";
$result = $DB_CONNECT->query($sql);
$row = $result->fetch_assoc();


if(!$result->num_rows){
 echo "<script>alert('ID or PW is wrong')</script>";
echo "<meta http-equiv='Refresh' content='0; URL=login.php'>";

}
else{
  $_SESSION["id"]=$row['id'];
  header("location: ./LIST.PHP");

}
?>


