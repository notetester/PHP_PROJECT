<DIV STYLE="visibility: hidden !important;">
<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
require_once("sessionToLogin.php");
?>
</DIV>
<?PHP

date_default_timezone_set('Asia/Seoul');

ERROR_REPORTING(E_ALL);
INI_SET("DISPLAY_ERRORS",1);
$DB_ID=$_SESSION['id'];
if(!isset($_POST['W_CONTENT'])){
        echo "<script>alert('please access normally');</script>";
        echo "<meta http-equiv='Refresh' content='0; URL=LIST.PHP'>";
        exit("");
}
$DB_TITLE= htmlspecialchars($_POST['W_TITLE']);
$DB_CONTENT= strip_tags($_POST['W_CONTENT'],"<img><a><br><div><p>");
$prevented_attribute = array("on","On","ON","oN");
$DB_CONTENT= str_replace($prevented_attribute,"0n",$DB_CONTENT);
$DB_DATE=DATE('Y-m-d h:i:sa');
$FILE_DIR = './upload/';
$FILE_NAME = $_FILES['W_FILE']['name'];
$FILE_TMP = $_FILES['W_FILE']['tmp_name'];

$DB_CALL_SNUM='SELECT bnum FROM board ORDER BY bnum DESC LIMIT 1';
$DB_RESULT_SNUM=$DB_CONNECT->QUERY($DB_CALL_SNUM);
$DB_SNUM=$DB_RESULT_SNUM->FETCH_ASSOC();
$DB_OLD_SNUM=$DB_SNUM['bnum'];
$DB_NEW_SNUM=$DB_OLD_SNUM + 1;

$FILE_PATH = $FILE_DIR.$DB_NEW_SNUM.".1";

move_uploaded_file($FILE_TMP, $FILE_PATH);

ECHO "<H3>작성자 : ".$DB_ID."</H3><BR>";
ECHO "<H3>제목 : ".$DB_TITLE."</H3><BR>";
ECHO "<H3>내용 : ".$DB_CONTENT."</H3><BR>";
ECHO "<H3>날짜 : ".$DB_DATE."</H3><BR>";

ECHO "==================================";
ECHO "<H3>이전 게시글 번호 : ".$DB_OLD_SNUM."</H3><BR>";
ECHO "<H3>이번 게시글 번호 : ".$DB_NEW_SNUM."</H3><BR>";
ECHO "==================================";

ECHO "<H3>파일기본경로 : ".$FILE_DIR."</H3><BR>";
ECHO "<H3>파일이름 : ".$FILE_NAME."</H3><BR>";
ECHO "<H3>파일임시 : ".$FILE_TMP."</H3><BR>";
ECHO "<H3>파일경로 : ".$FILE_PATH."</H3><BR>";
ECHO "<H3>파일사이즈 : ".$_FILES['W_FILE']['size']."</H3><BR>";
ECHO "<H3>파일에러여부 : ".$_FILES['W_FILE']['error']."</H3><BR>";

$DB_SQL='INSERT INTO board(bnum,sub,date,con,id,file)VALUES("'.$DB_NEW_SNUM.'","'.$DB_TITLE.'","'.$DB_DATE.'","'.$DB_CONTENT.'","'.$DB_ID.'","'.$FILE_NAME.'")';
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);
IF($DB_RESULT){
    $MSG="정상적으로 글이 등록되었습니다.";
    ECHO "<H3>상태 : ".$MSG."</H3><BR>";
}ELSE{
    $MSG=MYSQLI_ERROR($DB_CONNECT);
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
