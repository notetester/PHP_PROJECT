<!DOCTYPE html>
<?PHP
REQUIRE_ONCE("DBCONNECT.PHP");
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
	

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">	
    <div class="overlay"></div>

    <div class="slider-text">
		<H1>KGitbank</h1>

    </div>   
	
	<div class="control-nav">
        <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
        <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>

        <ul id="slide-list">
		  </ul>
        
        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>

</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="#home-slider">Home</a></li>
                <li><a href="#work">Board</a></li>
                <li><a href="#about">Notice</a></li>


            </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page" align="center" >
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
               <H3 ALIGN="CENTER">BOARD</H3>
        <TABLE WIDTH="100%" BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="white">
            <THEAD>
                <TR>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">번호</TH>
                    <TH WIDTH="400" BGCOLOR="#CCCCCC">제목</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">작성자</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">작성일</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">조회수</TH>
                </TR>
            </THEAD>
            <TBODY>
                <?PHP
                    $DB_SQL='SELECT * FROM board ORDER BY bnum DESC';
                    $DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

		    date_default_timezone_set('Asia/Seoul');	

                    WHILE($DB_ROW=$DB_RESULT->FETCH_ASSOC()) {
                        $DATETIME=EXPLODE(' ',$DB_ROW['date']);
                        $DATE=$DATETIME[0];
                        $TIME=$DATETIME[1];
                        IF($DATE==DATE('Y-m-d')){
                            $DB_ROW['date']=$TIME;
                        }ELSE{
                            $DB_ROW['date']=$DATE;
                        };
                ?>
                <TR>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['bnum'];?></TD>
                    <TD ALIGN="CENTER"><A HREF="./VIEW.PHP?V_NO=<?PHP ECHO $DB_ROW['bnum'];?>"><?PHP ECHO $DB_ROW['sub'];?></A></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['id'];?></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['date'];?></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['bcounter'];?></TD>
                </TR>
                <?PHP
                    };
                ?>
            </TBODY>
        </TABLE>
        <DIV ALIGN="CENTER">
        <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='WRITE.PHP'">글쓰기</BUTTON>
</div>

        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->

<!-- About Section -->
<div id="about" class="page-alternate" align="center">
<div class="container">
    <!-- Title Page -->
<div align="right">
            <?php echo "ID : ". $_SESSION['id'] ?>
            <a href="./logout.php"><img src="./logout.gif"></a>
	</div>
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">공지 사항</h2>
                <h3 class="title-description">주기적으로 확인해 주시기 바랍니다.</h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
           <H3 ALIGN="CENTER">NOTICE</H3>
        <TABLE WIDTH="100%" BORDER="1" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="1" BGCOLOR="white">
            <THEAD>
                <TR>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">번호</TH>
                    <TH WIDTH="400" BGCOLOR="#CCCCCC">제목</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">작성자</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">작성일</TH>
                    <TH WIDTH="200" BGCOLOR="#CCCCCC">조회수</TH>
                </TR>
            </THEAD>
            <TBODY>
                <?PHP
                    $DB_SQL='SELECT * FROM notic ORDER BY bnum DESC';
                    $DB_RESULT=$DB_CONNECT->QUERY($DB_SQL);

		    date_default_timezone_set('Asia/Seoul');	

                    WHILE($DB_ROW=$DB_RESULT->FETCH_ASSOC()) {
                        $DATETIME=EXPLODE(' ',$DB_ROW['date']);
                        $DATE=$DATETIME[0];
                        $TIME=$DATETIME[1];
                        IF($DATE==DATE('Y-m-d')){
                            $DB_ROW['date']=$TIME;
                        }ELSE{
                            $DB_ROW['date']=$DATE;
                        };
                ?>
                <TR>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['bnum'];?></TD>
                    <TD ALIGN="CENTER"><A HREF="./NVIEW.PHP?V_NO=<?PHP ECHO $DB_ROW['bnum'];?>"><?PHP ECHO $DB_ROW['sub'];?></A></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['id'];?></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['date'];?></TD>
                    <TD ALIGN="CENTER"><?PHP ECHO $DB_ROW['bcounter'];?></TD>
                </TR>
                <?PHP
                    };
                ?>
            </TBODY>
        </TABLE>
        <DIV ALIGN="CENTER">
	<?php
		if($_SESSION['id']=="admin"){
	?>
        <BUTTON TYPE="BUTTON" value="" ONCLICK="location.href='NWRITE.PHP'">글쓰기</BUTTON>
	<?php
		}
	?>
</div>
</div>


    <!-- End People -->
</div>
</div>



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

