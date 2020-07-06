<DIV STYLE="visibility: hidden !important;">
<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
require_once("sessionToLogin.php");
?>
</DIV>
<?PHP
ERROR_REPORTING(E_ALL);
INI_SET("DISPLAY_ERRORS",1);

if(!isset($_GET['V_NO'])){
        echo "<script>alert('please access normally');</script>";
        echo "<meta http-equiv='Refresh' content='0; URL=LIST.PHP'>";
        exit("");
}
$DB_NO=$_GET['V_NO'];
$beforeLocation="./VIEW.PHP?V_NO=".$DB_NO;

$DB_SQL='select id,file,bnum from board where bnum='.$DB_NO;
$DB_RESULT=$DB_CONNECT->query($DB_SQL);
$DB_ROW = $DB_RESULT->fetch_assoc();

if( $_SESSION['id']!==$DB_ROW['id'] && $_SESSION['id']!="admin"){
   echo "<script>alert('you don\'t have permission');</script>";
        echo "<meta http-equiv='Refresh' content='0; URL=" .$beforeLocation ."'>";
        exit("");   
}

if($DB_ROW['file']!==""){
   $FILE_PATH = "./upload/".$DB_ROW['bnum'].".1";
   $delete_file = unlink($FILE_PATH);
   if($delete_file ==1)
      echo "file was deleted";
   else
      echo "deleting file is failed";
}

$DB_SQL='DELETE FROM board WHERE bnum="'.$DB_NO.'"';
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

IF($DB_RESULT){
    $MSG="정상적으로 글이 삭제되었습니다.";
    ECHO "<H3>상태 : ".$MSG."</H3><BR>";
}ELSE{
    $MSG=MYSQLI_ERROR();
    ECHO "<H3>상태 : ".$MSG."</H3><BR>";
}


?>
<DIV STYLE="visibility: hidden !important;">
<?PHP
ECHO $DB_SQL;
?>
</DIV>
<BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP'">목록으로</BUTTON>
<?PHP
header("location:./LIST.PHP");
?>
</DIV>
