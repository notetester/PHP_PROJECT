<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
$DB_NO=$_GET['V_NO'];
$DB_SQL='SELECT sub,con,date,id FROM notic WHERE bnum ='.$DB_NO;
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);
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

    </HEAD>
    <BODY >

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
               <BUTTON TYPE="BUTTON" value="" ONCLICK="NDELETE_OK()">삭제완료</BUTTON>
               <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP#tabs-2'">목록으로</BUTTON>
            </DIV>

        </FORM>
    </BODY>
</HTML>

