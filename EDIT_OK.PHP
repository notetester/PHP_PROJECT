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

if(!isset($_POST['E_NO'])){
  echo"<script>alert('please access normally');</script>";
  echo "<meta http-equiv='Refresh' content='0; URL=LIST.PHP'>";
  exit("");
}
$db_sql = 'select id from board where bnum="'.$_POST['E_NO'].'"';
$db_result = $DB_CONNECT->query($db_sql);
$db_row = $db_result->fetch_assoc();
$DB_NO=$_POST['E_NO'];
$DB_ID=$db_row['id'];
$DB_TITLE=htmlspecialchars($_POST['E_TITLE']);
$DB_CONTENT= strip_tags($_POST['E_CONTENT'],"<img><a><br><div><p>");
$prevented_attribute = array("on","On","ON","oN");
$DB_CONTENT= str_replace($prevented_attribute,"0n",$DB_CONTENT);
date_default_timezone_set('Asia/Seoul');
$DB_DATE=DATE('Y-m-d h:i:sa');
$FILE_DIR = './upload/';


if($_SESSION['id']!==$DB_ID && $_SESSION['id']!=="admin")
        exit("same id is needed");

ECHO "==================================";
ECHO "<H3>현재 수정 게시글 번호 : ".$DB_NO."</H3><BR>";
ECHO "==================================";

ECHO "<H3>작성자 : ".$DB_ID."</H3><BR>";
ECHO "<H3>제목 : ".$DB_TITLE."</H3><BR>";
ECHO "<H3>내용 : ".$DB_CONTENT."</H3><BR>";
ECHO "<H3>날짜 : ".$DB_DATE."</H3><BR>";

if($_FILES['E_FILE']['error']==4){
    $MSG="파일을 수정하지 않았습니다.";
    ECHO "<H3>파일수정여부 : ".$MSG."</H3><BR>";
    $DB_SQL='SELECT file,bnum FROM board WHERE bnum='.$DB_NO;
    $DB_RESULT=$DB_CONNECT->query($DB_SQL);
    $DB_ROW = $DB_RESULT->fetch_assoc();
    $FILE_NAME=$DB_ROW['file'];
}else if($_FILES['E_FILE']['error']==0){
    $MSG="파일을 수정했습니다.";
    ECHO "<H3>파일수정여부 : ".$MSG."</H3><BR>";
    $DB_SQL='SELECT file,bnum FROM board WHERE bnum='.$DB_NO;
    $DB_RESULT=$DB_CONNECT->query($DB_SQL);
    $DB_ROW = $DB_RESULT->fetch_assoc();
    $FILE_ORIGINAL_PATH = $FILE_DIR.$DB_ROW['bnum'].".1";
    $FILE_NAME = $_FILES['E_FILE']['name'];
    $FILE_TMP = $_FILES['E_FILE']['tmp_name'];

    $delete_file = unlink($FILE_ORIGINAL_PATH);

    if($delete_file ==1){
       echo "원본 파일 삭제";
    }
    else{
       echo "원본 파일 삭제 실패";
    }

    $FILE_PATH = $FILE_DIR.$DB_NO.".1";

    move_uploaded_file($FILE_TMP, $FILE_PATH);

    ECHO "<H3>파일기본경로 : ".$FILE_DIR."</H3><BR>";
    ECHO "<H3>파일이름 : ".$FILE_NAME."</H3><BR>";
    ECHO "<H3>파일임시 : ".$FILE_TMP."</H3><BR>";
    ECHO "<H3>파일경로 : ".$FILE_PATH."</H3><BR>";
    ECHO "<H3>파일사이즈 : ".$_FILES['E_FILE']['size']."</H3><BR>";
    ECHO "<H3>파일에러여부 : ".$_FILES['E_FILE']['error']."</H3><BR>";
    
}else{
    $MSG="파일 수정 오류";
    ECHO "<H3>파일수정여부 : ".$MSG."</H3><BR>";
    ECHO "==================================";
    ECHO "<H3>파일기본경로 : ".$FILE_DIR."</H3><BR>";
    ECHO "<H3>파일이름 : ".$FILE_NAME."</H3><BR>";
    ECHO "<H3>파일임시 : ".$FILE_TMP."</H3><BR>";
    ECHO "<H3>파일경로 : ".$FILE_PATH."</H3><BR>";
    ECHO "<H3>파일사이즈 : ".$_FILES['E_FILE']['size']."</H3><BR>";
    ECHO "<H3>파일에러여부 : ".$_FILES['E_FILE']['error']."</H3><BR>";
    $DB_SQL='SELECT file,bnum FROM board WHERE bnum='.$DB_NO;
    $DB_RESULT=$DB_CONNECT->query($DB_SQL);
    $DB_ROW = $DB_RESULT->fetch_assoc();
    $FILE_NAME=$DB_ROW['file'];
}

$DB_SQL='UPDATE board SET sub="'.$DB_TITLE.'",date="'.$DB_DATE.'",con="'.$DB_CONTENT.'",file="'.$FILE_NAME.'" WHERE bnum="'.$DB_NO.'"';
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);
IF($DB_RESULT){
    $MSG="정상적으로 글이 수정되었습니다.";
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
