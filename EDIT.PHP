<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
require_once("sessionToLogin.php");
$DB_NO=$_GET['V_NO'];
$DB_SQL='SELECT bnum,sub,con,date,id,file FROM board WHERE bnum='.$DB_NO;
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

if(!$_GET['V_NO']){
	header("location:./LIST.PHP");
	exit("v_no is needed");
}

$DB_ROW=$DB_RESULT->FETCH_ASSOC();

$FILE_DIR = "./upload/";
$beforeLocation = "./VIEW.PHP?V_NO=" . $DB_NO;

if($_SESSION['id']!==$DB_ROW['id'] && $_SESSION['id']!=="admin"){
        header("location:".$beforeLocation);
        exit("same id is needed");
}
?>


</DIV>
<html>


<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>보안 솔루션 게시판 글 쓰기</title>   

<meta name="description" content="Insert Your Site Description" /> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->



<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>

<!-- Analytics -->
<script type="text/javascript">
      function EDIT_OK(){
                if(document.EDIT_FORM.E_TITLE.value==""){
                    alert("제목을 입력해 주세요.");
                    document.EDIT_FORM.E_TITLE.focus();
                    return;
                }else if(document.EDIT_FORM.E_CONTENT.value==""){
                    alert("내용을 입력해 주세요.");
                    document.EDIT_FORM.E_CONTENT.focus();
                    return;
                }
      document.EDIT_FORM.submit();
            }


  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'Insert Your Code']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- End Analytics -->

</head>


<BODY>
	


<!-- Header -->

<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page" align="center">
	<div class="container">
    	<!-- Title Page -->
<div align="right">
            <?php echo "ID : ". $_SESSION['id'] ?>
            <a href="./logout.php"><img src="./logout.gif"></a>
	</div>
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">수정</h2>
                    <h3 class="title-description">수정할 내용을 입력해주 세요</a>.</h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
             <FORM NAME="EDIT_FORM" ACTION="./EDIT_OK.PHP" METHOD="POST" ENCTYPE="multipart/form-data">
        <INPUT TYPE="HIDDEN" STYLE="visibility: hidden !important;" NAME="E_NO" value="<?PHP ECHO $DB_NO ?>">　</INPUT>
        <TABLE BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="#CCCCCC">
            <TBODY>
                    <TR>
                        <TH ><LABEL>작성자</LABEL></TH>
                        <TD><?PHP ECHO $DB_ROW['id'] ?></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>제목</LABEL></TH>
                        <TD><INPUT TYPE="TEXT" NAME="E_TITLE" value="<?PHP ECHO $DB_ROW['sub'] ?>">　</INPUT></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>내용</LABEL></TH>
                        <TD><TEXTAREA TYPE="TEXT" NAME="E_CONTENT" COLS="30" ROWS="10" value="<?PHP ECHO $DB_ROW['con'] ?>"><?PHP ECHO $DB_ROW['con'] ?></TEXTAREA></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>파일 원본</LABEL></TH>
                        <TD><a href="<?PHP ECHO $FILE_DIR.$DB_ROW['bnum'].'.1' ?>" download="<?php echo $DB_ROW['file'] ?>" > <?PHP ECHO $DB_ROW['file'] ?><a></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>파일 수정</LABEL></TH>
                        <TD><INPUT TYPE="FILE" NAME="E_FILE" value="">　</INPUT></TD>
                    </TR>
                </TBODY>
           </TABLE>
           <DIV ALIGN="CENTER">
               <BUTTON TYPE="BUTTON" value="" ONCLICK="EDIT_OK()">수정완료</BUTTON>
               <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP'">목록으로</BUTTON>
            </DIV>
</DIV>
</DIV>
        </FORM>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->





<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/waypoints.js"></script> <!-- WayPoints -->
<script src="_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="_include/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="_include/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->

</body>
</html>

