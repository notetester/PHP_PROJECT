<?php
	session_start();
	if(isset($_SESSION['id']))
		header("location:./LIST.PHP");
?>

<html>
<head>
 <title>kgitbank school affairs information system</title>
 <meta charset="utf-8" >
</head>
 <body bgcolor=white>
 <center>
  <font color=black size=15><br>school affairs information system
  <br><br>

  <form name=frm1 action="login_ok.php" method=post>
   <table cellpadding=2>
   <tr>
    <td colspan=2> <font color=black>LOGIN </td>
   </tr>
   <tr>
    <td><font color=black>ID</td>
    <td><input type=text name="id"></td>
   </tr>
   <tr>
    <td><font color=black>PW</td>
    <td><input type=password name="pw"></td>
   </tr>
   <tr>
    <td colspan=2 align=center>
     <input type=submit value="login">
     <input type=button value="join us" onclick="location.href='membership.php'">
    </td>
   </tr>
</table>
  </form>
 </center>
 </body>
</html>


