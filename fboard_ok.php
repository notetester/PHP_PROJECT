<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
?>
</DIV>
<?PHP

date_default_timezone_set('Asia/Seoul');

ERROR_REPORTING(E_ALL);
INI_SET("DISPLAY_ERRORS",1);
$DB_ID=$_POST['W_ID'];
$DB_TITLE=$_POST['W_TITLE'];
$DB_CONTENT=$_POST['W_CONTENT'];
$DB_DATE=DATE('Y-m-d h:i:sa');
$DB_FILE=$_POST['W_FILE'];

ECHO "<H3>작성자 : ".$DB_ID."</H3><BR>";
ECHO "<H3>제목 : ".$DB_TITLE."</H3><BR>";
ECHO "<H3>내용 : ".$DB_CONTENT."</H3><BR>";
ECHO "<H3>날짜 : ".$DB_DATE."</H3><BR>";
ECHO "<H3>날짜 : ".$DB_FILE."</H3><BR>";

$DB_SQL='INSERT INTO fboard(sub,date,con,id,file)VALUES("'.$DB_TITLE.'","'.$DB_DATE.'","'.$DB_CONTENT.'","'.$DB_ID.'","'.$DB_FILE.'")';
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);
IF($DB_RESULT){
    $MSG="정상적으로 글이 등록되었습니다.";
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
