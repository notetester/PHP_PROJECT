<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <META CONTENT="TXT/HTML"; CHARSET="UTF-8" />
        <TITLE>보안 솔루션 게시판 글 쓰기</TITLE>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.tabs.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.tabs.min.js" type="text/javascript"></script>
        <SCRIPT language=javascript>
            function WRITE_OK(){
                if(document.WRITE_FORM.W_ID.value==""){
                    alert("작성자를 입력해 주세요.");
                    document.WRITE_FORM.W_ID.focus();
                    return;
                }else if(document.WRITE_FORM.W_TITLE.value==""){
                    alert("제목을 입력해 주세요.");
                    document.WRITE_FORM.W_TITLE.focus();
                    return;
                }else if(document.WRITE_FORM.W_CONTENT.value==""){
                    alert("내용을 입력해 주세요.");
                    document.WRITE_FORM.W_CONTENT.focus();
                    return;
                }else{
                    document.WRITE_FORM.submit();
                }
            }
$(function() {
   $( "#Tabs1" ).tabs(); 
});
        </SCRIPT>

    </HEAD>
       <BODY style="background:url(./r.png) repeat-x">
<div id="Tabs1">
<ul>
    <li><a href="#tabs-1">WRITE</a></li>
  </ul>
<div id="tabs-1">

        <FORM  NAME="WRITE_FORM" ACTION="./WRITE_OK.PHP" METHOD="POST" ENCTYPE="multipart/form-data">

            <TABLE   BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="#CCCCCC">
                <TBODY >
                    <TR >
                        <TH ALIGN="CENTER"><LABEL>작성자</LABEL></TH>
                        <TD ><INPUT TYPE="TEXT" NAME="W_ID"  value="">　</INPUT></TD>
                    </TR>
                    <TR>
                        <TH ALIGN="CENTER"><LABEL>제목</LABEL></TH>
                        <TD ><INPUT TYPE="TEXT" NAME="W_TITLE"  value="">　</INPUT></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>내용</LABEL></TH>
                        <TD ><TEXTAREA TYPE="TEXT" NAME="W_CONTENT" COLS="30" ROWS="10"  value="">　</TEXTAREA></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>파일</LABEL></TH>
                        <TD ><INPUT TYPE="FILE" NAME="W_FILE" value="" multiple>　</INPUT></TD>
                    </TR>
                </TBODY>
            </TABLE>
            <DIV ALIGN="CENTER">
                <INPUT TYPE="BUTTON" STYLE="visibility: hidden !important;" value="" ONCLICK="WRITE_OK()">　</INPUT>
                <BUTTON TYPE="BUTTON" value=""  ONCLICK="WRITE_OK()">작성완료</BUTTON>
                <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP'">목록으로</BUTTON>
                <A STYLE="visibility: hidden !important;" HREF="./LIST.PHP">목록</A>
            </DIV>
</DIV>
</DIV>
        </FORM>
    </BODY>
</HTML>
