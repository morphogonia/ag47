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
		
	<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.js"></script>
	<script type="text/javascript" src="js/fancybox.js"></script>
		
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
$relations = "select * from tb_relations WHERE subcategory = 0 ORDER BY RAND()";
$result = mysql_query($relations);

while ($line = mysql_fetch_array($result)) {
		$products = @mysql_query('SELECT * FROM tb_products WHERE id="'.$line['product'] .'" ORDER BY code ASC');
		while ($lineb = mysql_fetch_array($products)) {
			
			echo('<div class="modulo floatl">');
			/*echo('<a href="images/'. $lineb['image'] .'" target="_self" rel="groups" title="CODE: '. utf8_encode($lineb['code']) .'. '. utf8_encode($lineb['description']) .' " >');*/
			echo('<a href="producto.php?prod='. utf8_encode($lineb['id']) .'" target="_self">');
			echo('<img src="images/'. utf8_encode($lineb['thumb']) .'" alt="Ag47 - '. utf8_encode($lineb['description']) .'" width=270 height=270 class="item" />');
			echo('</a>');
			echo('<p>CODE: '. utf8_encode($lineb['code']) .'</p>');
			
			echo('<ul class="tags">');	
			$tags = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($lineb['id']) .'" ORDER BY subcategory ASC');
			while ($linec = mysql_fetch_array($tags)) {
				$labels = @mysql_query('SELECT * FROM tb_subcategories WHERE id="'.$linec['subcategory'] .'"');
				$lined = mysql_fetch_array($labels);
				echo('<li><a href="subcategoria.php?id='. utf8_encode($lined['id']) .'" target="_self">'. utf8_encode($lined['label']) .' /</a></li>');
			}
			echo('</ul>');	
			
			echo('<p class="clear">'. utf8_encode($lineb['description']) .'</p>');
			
			echo('<div class="clear"></div>');					
			echo('</div>');
		}
}
?>

<div class="clear"></div>
</div><!-- / WRAPPER -->

<?php include('includes/footer.inc'); ?>

</body>
</html>

