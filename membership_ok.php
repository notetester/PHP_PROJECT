<?php
require_once("DBCONNECT.PHP");

extract($_POST);

 if($user_id==""){
  echo"<script>alert('ID 입력을 해주세요.');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
 return false;
}

 if($nick==""){
  echo"<script>alert('별칭 입력을 해주세요.');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
  return false;
 }

 if($name==""){
  echo"<script>alert('이름 입력을 해주세요.');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
  return false;  
}

 if($user_pw==""){
  echo"<script>alert('write pw please');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
  return false; 
}

 if($user_pw2==""){
  echo"<script>alert('write pw please');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
  return false; 
}



 if($user_pw!=$user_pw2){
  echo"<script>alert('비밀번호를 정확히 입력해주세요.');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
  return false;
 }

 if($snum==""){
 echo"<script>alert('학번을 입력해주세요.');</script>";
 echo "<meta http-equiv='Refresh' content='0; URL=membership.php'>";
 return false;
 }


 $query="insert into member(id,pass,snum,name,nick) values('$user_id','$user_pw','$snum','$name','$nick')";
#$result=mysql_query($query,$DB_CONNECT);
 $result=$DB_CONNECT->QUERY($query);
 echo "<script>alert('회원가입을 축하드립니다.');</script>";
 echo "<meta http-equiv='refresh' content='1; URL=login.php'>";

?>


