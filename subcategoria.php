<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ag47 Joyería Contemporánea</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" />
	<meta name="author" content="Sandra Bermudez @ bulabe.com" />
	<meta name="description" content="Ag47 es una marca mexicana de joyería vanguardista que está al día con las tendencias de moda internacional. Cada pieza es hecha a mano con gran cuidado y profesionalismo"/>
	
	<meta property="og:title" content="Ag47 Joyería Contemporánea" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Ag47 Joyería Contemporánea, marca mexicana de vanguardia. Siempre al día con las tendencias internacionales." />
	<meta property="og:url" content="http://www.ag47joyeria.com" />
	<meta property="og:image" content="http://ag47joyeria.com/ag47joyeria.jpg" />
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,300italic|Terminal+Dosis" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/fancydropdown.js"></script>
	<script type="text/javascript" src="js/animate-bg.js"></script>
	<script type="text/javascript" src="js/jquery.frontendscript.js"></script>
	
	<script type="text/javascript" src="js/jquery.pagination.catalogo.js"></script>
	
		
	<!-- ANALYTICS -->
	<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29567716-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
	</script><!-- / ANALYTICS -->
	
</head>

<body>
<?php include('includes/conection.inc'); ?>
<?php include('includes/header.inc'); ?>

<div id="wrapper">

<?php
$id = $_GET['id'];

$title = @mysql_query("SELECT * FROM tb_subcategories WHERE id = '$id'");
$var_title = mysql_fetch_array($title);
echo('<h2 id="titulo_linea">'. utf8_encode($var_title['label']). '</h2>');

$per_page = 9;
$relations = "SELECT * FROM tb_relations WHERE subcategory = '$id'";
$result = mysql_query($relations);
$count = mysql_num_rows($result);
$pages = ceil($count/$per_page);

echo('<div id="content"></div>');
echo('<div class="clear"></div>');

echo('<div id="pages">');
echo ('<ul id="pagination">');
for($i=1; $i<=$pages; $i++) {
	echo ('<li id="'.$i.'">'.$i.'</li>');
}
echo ('</ul><div class="clear"></div></div>');
?>

<div id="loading"></div>

<div class="clear"></div>
</div><!-- / WRAPPER -->

<?php include('includes/footer.inc'); ?>

</body>
</html>
