<!DOCTYPE html>
<?PHP
require_once("sessionToLogin.php");
?>

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
      function WRITE_OK(){
                if(document.WRITE_FORM.W_TITLE.value==""){
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
                    <h2 class="title">게시판</h2>
                    <h3 class="title-description">관련 과제 및 요구 사항</a>.</h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
             <FORM  NAME="WRITE_FORM" ACTION="./WRITE_OK.PHP" METHOD="POST" ENCTYPE="multipart/form-data">

            <TABLE   BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="#CCCCCC">
                <TBODY >
                    <TR >
                        <TH ALIGN="CENTER"><LABEL>작성자</LABEL></TH>
                        <TD ><?php echo $_SESSION['id'] ?></TD>
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

