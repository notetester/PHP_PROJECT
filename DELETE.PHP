<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
require_once("sessionToLogin.php");
$DB_NO=$_GET['V_NO'];
$DB_SQL='SELECT sub,con,date,id FROM board WHERE bnum ='.$DB_NO;
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

if(!isset($_GET['V_NO'])){
        header("location:./LIST.PHP");
        exit("v_no is needed");
}

$DB_ROW=$DB_RESULT->FETCH_ASSOC();
ECHO $DB_ROW['id'];
?>
</DIV>
<HTML>
    <HEAD>
        <META CONTENT="TXT/HTML"; CHARSET="UTF-8" />
        <TITLE>보안 솔루션 게시판 글 쓰기</TITLE>
        <SCRIPT language=javascript>
            function DELETE_OK(){
                    document.DELETE_FORM.submit();
            }

        </SCRIPT>
<style>
div.substance{
			background-color: white;
		
			position:absolute; width:700px; height:1000px; top:50%; 
			left:50%; margin-left:-350px; margin-top:-150px;" 

		}
</style>
    </HEAD>
    <BODY backgound="wood.jpg">
<div class="substance">
        <FORM NAME="DELETE_FORM" ACTION="./DELETE_OK.PHP" METHOD="POST">
        <INPUT TYPE="HIDDEN" STYLE="visibility: hidden !important;" NAME="D_NO" value="<?PHP ECHO $DB_NO ?>">　</INPUT>
        <TABLE WIDTH="1200" BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="#CCCCCC">
            <TBODY>
                    <TR>
                        <TH><LABEL>작성자</LABEL></TH>
                        <TD><?PHP ECHO $DB_ROW['id'] ?></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>제목</LABEL></TH>
                        <TD><?PHP ECHO $DB_ROW['sub'] ?></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>내용</LABEL></TH>
                        <TD><?PHP ECHO $DB_ROW['con'] ?></TD>
                    </TR>
                </TBODY>
           </TABLE>
           <DIV ALIGN="CENTER">
               <BUTTON TYPE="BUTTON" value="" ONCLICK="DELETE_OK()">삭제완료</BUTTON>
               <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP'">목록으로</BUTTON>
            </DIV>
</div>
        </FORM>
    </BODY>
</HTML>

