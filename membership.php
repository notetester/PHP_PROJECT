<html>
 <head>
 <title>membership!</title>
 </head>
 <body>
 <center>
 <form action=membership_ok.php method=post>
 <table cellpadding=2 cellspacing=2>
 <tr>
  <td colspan=2 align=center><b> 회 &nbsp;원&nbsp; 가 &nbsp;입</td></b>
 </tr>
 <tr>
   <td align=center>ID</td>
   <td><input type=text name=user_id maxlength=15>&nbsp;&nbsp;
 <tr>
  <td align=center>비밀번호</td>
  <td><input type=password name=user_pw maxlength=20></td>
 </tr>
 <tr>
  <td align=center>비밀번호 확인</td>
  <td><input type=password name=user_pw2 maxlength=20></td>
 </tr>
 <tr>
  <td align=center> 이름</td>
  <td><input type=text name=name maxlength=30></td>
 </tr>
 <tr>
  <td align=center> 별칭</td>
  <td><input type=text name=nick maxlength=30></td>
 </tr>
 <tr>
   <td align=center>학번</td>
   <td><input type=number name=snum maxlength=30></td>
 </tr>
 <tr> <td colspan=2 align=center><input type=submit value="가입하기">&nbsp;&nbsp;
  <input type=reset value="다시작성">&nbsp;&nbsp;
  <input type=button value="취소" onclick="history.back();">
 </td>
 </tr>
 </table>
 </form>
 <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0
 name="ifrm1"></iframe>
 </body>
</html>


