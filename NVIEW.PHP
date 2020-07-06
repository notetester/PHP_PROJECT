<DIV STYLE="visibility: hidden !important;">
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
require_once("sessionToLogin.php");
$DB_NO=$_GET['V_NO'];
$DB_SQL='SELECT * FROM notic WHERE bnum='.$DB_NO;
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

if(!isset($_GET['V_NO'])){
        header("location:./LIST.PHP");
       # exit("v_no is needed");
	return false;
}

if(!is_numeric($DB_NO)){
	echo "<script>alert('You can\'t sql injection!');</script>";
	echo "<meta http-equiv='Refresh' content='0; URL=LIST.PHP'>";
	exit("");
}
$DB_ROW=$DB_RESULT->FETCH_ASSOC();
$DB_CONTENT= strip_tags($DB_ROW['con'],"<img><a><br><div><p>");

$bcounter = $DB_ROW['bcounter']+1;

echo $bcounter;
$DB_SQL='update notic set bcounter = "'.$bcounter.'"WHERE bnum='.$DB_NO;
$DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

?>
<?php
	$FILE_DIR = "./Nupload/";
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
                    <h2 class="title">NOTICE</h2>
                    <h3 class="title-description">게시글 확인</a>.</h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
               <TABLE  BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="white">
						
                    <TR>
                        <TH WIDTH="100px"><LABEL>작성자</LABEL></TH>
                        <TD WIDTH="300px"><?PHP ECHO $DB_ROW['id'] ?></TD>
                    </TR>
                    <TR>
                        <TH><LABEL>제목</LABEL></TH>
                        <TD><?PHP ECHO $DB_ROW['sub'] ?></TD>
                    </TR>
                    <TR>
                        <TH height="100px"><LABEL>내용</LABEL></TH>
                        <TD><?PHP ECHO $DB_CONTENT ?></TD>
                    </TR>
		    <TR>
                        <TH height="100px"><LABEL>파일</LABEL></TH>
                        <TD><a href="<?PHP ECHO $FILE_DIR.$DB_ROW['bnum'].".1" ?>" download="<?php echo $DB_ROW['file'] ?>"> <?PHP ECHO $DB_ROW['file'] ?><a></TD>
                    </TR>
                
            </TABLE>
            <BR>
            <DIV ALIGN="CENTER">
		<?php 
			if($_SESSION['id'] == "admin"){
		?>
                <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='NEDIT.PHP?V_NO=<?PHP ECHO $DB_NO;?>'">수정하기</BUTTON>
                <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='NDELETE_OK.PHP?V_NO=<?PHP ECHO $DB_NO;?>'">삭제하기</BUTTON>
		<?php
			}
		?>
                <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='LIST.PHP'">목록으로</BUTTON>
            </DIV>
</DIV>
        <!-- End Portfolio Projects -->
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

