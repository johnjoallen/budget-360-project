<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>

<!-- meta -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="budget calculator, budget 360, credycare, personal budgeting, household budgeting, irish, ireland" />
  <meta name="title" content="Budget 360" />
  <meta name="description" content="The budget calculator with Budget 360 will help you implement personal budgeting and is a select service offered byCredyCare." />
  <title>Budget Calculator - Budget 360 - CredyCare - Ireland</title>
  <link href="http://www.credycare.ie/templates/credecare/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  
<!-- css -->
<link rel="stylesheet" href="http://www.credycare.ie/templates/credecare/css/styles.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="libs/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<?php
    $user = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/MSIE 7.0/',$user)){
            echo('<link rel="stylesheet" href="budget360.ie.css" type="text/css" />');
     } else {
         echo('<link rel="stylesheet" href="budget360.css" type="text/css" />');
     }
     ?>
<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=5838714; 
var sc_invisible=1; 
var sc_security="ff102386"; 
</script>
<script type="text/javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript>
<div class="statcounter"><a title="hit counter joomla" href="http://www.statcounter.com/joomla/" target="_blank"><img class="statcounter" src="http://c.statcounter.com/5838714/0/ff102386/1/" alt="hit counter joomla" ></a></div></noscript>
<!-- End of StatCounter Code -->
<!-- Start of Google Analytics Code -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
	var pageTracker = _gat._getTracker("UA-16210327-1");
	pageTracker._trackPageview();
} catch(err) {}
</script>
<!-- End of Google Analytics Code -->

<!-- javascript -->
<script src="libs/jquery.js" type="text/javascript"></script>
<script src="libs/jquery.validate.js" type="text/javascript"></script>
<script src="libs/budget360functions.js" type="text/javascript"></script>
<script src="libs/budget360.js" type="text/javascript"></script>
<script type="text/javascript" language='javascript' src='libs/FusionCharts.js'></script>
<script type="text/javascript" src="libs/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="libs/fancybox/jquery.fancybox-1.3.1.js"></script>
<script src="libs/jquery.bgiframe.js" type="text/javascript"></script>
<script src="libs/jquery.dimensions.js" type="text/javascript"></script>
<script src="libs/jquery.tooltip.js" type="text/javascript"></script>
<script src="libs/jquery.printarea.js" type="text/javascript"></script>
<script type="text/javascript">
<?php
if(isset($_GET['msg'])){
echo("$(document).ready(function(){\n");
echo("$('#onloadselector').trigger('click');\n");
echo('});');
}
if($_SESSION['display'] == 0){
    if($_SESSION['lifeprotectiontotal'] == 0 || $_SESSION['mortgageprotectiontotal'] == 0 || $_SESSION['insurancetotal'] == 0 || $_SESSION['healthinsurancetotal'] == 0){
        echo("$(document).ready(function(){\n");
        echo("$('#onloadselector').trigger('click');\n");
        echo('});');
    }
}
?>
</script>
<link rel="shortcut icon" href="/templates/credecare/favicon.ico" />
<link rel="icon" type="image/gif" href="/templates/credecare/animated_favicon.gif" />
<!--[if IE 6]>
<style>#topmenu ul li {margin: 0 1px;}</style>
<![endif]-->
</head>
<body>
	<!-- wrap -->
	<div id="wrap">
		<!-- head -->
		<div id="head">
			<div id="logo"><h1><a href="/index.php" title="CredyCare Credit :: Budget Calculator - Budget 360 - CredyCare - Ireland">CredyCare Credit :: Budget Calculator - Budget 360 - CredyCare - Ireland</a></h1></div>
			<div id="callus">Call now us on  01 669 1078</div>
			<div id="social"><p><a href="http://twitter.com/credycare" target="_blank"><img src="http://www.credycare.ie/images/twitter.png" border="0" alt="Twitter" /></a> <a href="http://www.facebook.com/pages/Dublin-2/CredyCare-Credit-Debt-Care-Solutions/115086755183746?ref=ts" target="_blank"><img src="http://www.credycare.ie/images/facebook.png" border="0" alt="FaceBook" /></a> <a href="http://www.linkedin.com/companies/credycare" target="_blank"><img src="http://www.credycare.ie/images/linkedin.png" border="0" alt="Linkedin" /></a></p></div>
<div id="topmenu">			
	<ul class="menu">
		<li class="item1"><a href="http://www.credycare.ie/"><span>Home</span></a></li>
		<li class="item28"><a href="http://www.credycare.ie/articles"><span>Articles</span></a></li>
		<li class="item15"><a href="http://www.credycare.ie/faq"><span>FAQ</span></a></li>
		<li class="item14"><a href="http://www.credycare.ie/moneycoach"><span>Moneycoach</span></a></li>
		<li id="current" class="active item13"><a href="http://budget360.credycare.ie"><span>Budget 360</span></a></li>
		<li class="item24"><a href="http://www.credycare.ie/about"><span>About</span></a></li>
	</ul>
</div>                			
</div>
<!-- /head -->