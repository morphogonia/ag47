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
$cat= $_GET['cat'];
$page= $_GET['page'];
$prod = $_GET['prod'];

echo('<a href="subcategoria.php?id='.$cat.'&page='.$page.'" class="regresar floatl">Regresar al catálogo</a>');
$title = @mysql_query("SELECT * FROM tb_subcategories WHERE id = '$cat'");
$var_title = mysql_fetch_array($title);
echo('<h2 id="titulo_linea">'. utf8_encode($var_title['label']). '</h2>');
echo('<div class="clear"></div>');

$pieza = @mysql_query("SELECT * FROM tb_products WHERE id = '$prod'");
$var_pieza = mysql_fetch_array($pieza);

echo('<div class="modulo_unit">');

echo('<div id="modulo_unit_left" class="floatl mr10">');
echo('<a href="images/'. $var_pieza['image'] .'" target="_self" rel="groups" title="CODE: '. utf8_encode($var_pieza['code']) .'. '. utf8_encode($var_pieza['description']) .' " >');
echo('<img src="images/'. utf8_encode($var_pieza['image']) .'" alt="Ag47 - '. utf8_encode($var_pieza['description']) .'" width=540 height=330 />');
echo('</a>');
echo('</div>');

echo('<div id="modulo_unit_right" class="floatr">');
echo('<p>CODE: '. utf8_encode($var_pieza['code']) .'</p>');
echo('<p>PRICE: '. utf8_encode($var_pieza['price']) .'</p>');
echo('<p class="clear">'. utf8_encode($var_pieza['description']) .'</p>');

echo('<ul class="tags">');	
$tags = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($var_pieza['id']) .'" ORDER BY subcategory ASC');
while ($linec = mysql_fetch_array($tags)) {
	$labels = @mysql_query('SELECT * FROM tb_subcategories WHERE id="'.$linec['subcategory'] .'"');
	$lined = mysql_fetch_array($labels);
	echo('<li><a href="subcategoria.php?id='. utf8_encode($lined['id']) .'" target="_self">'. utf8_encode($lined['label']) .' /</a></li>');
}
echo('</ul>');
echo('<div class="clear"></div><br/>');				

echo('<a href="https://twitter.com/share" class="twitter-share-button" data-via="Ag47Joyeria" data-count="none">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>');			
			
echo('<a href="http://www.facebook.com/dialog/feed?app_id=178668555600875&link=http://ag47joyeria.com/producto.php?page='.$page.'%26cat='.$cat.'%26prod='.$prod.'&picture=http://ag47joyeria.com/images/'.utf8_encode($var_pieza['thumb']).'&name=Ag47 Joyería Contemporánea&caption='.utf8_encode($var_pieza['description']).'&description=Visita www.ag47joyeria.com para conocer más de nuestra propuesta en joyería contemporánea&redirect_uri=http://ag47joyeria.com/subcategoria.php?id=1" target="_self" class="fb-share-int">');

echo('<img src="interface/icon_fb_share.png"/><span class="share">Share this</span></a>');

echo('<a href="images/'. $var_pieza['image'] .'" target="_self" rel="groups" class="prod" title="CODE: '. utf8_encode($var_pieza['code']) .'. '. utf8_encode($var_pieza['description']) .' " >Ampliar imagen</a>');

echo('</div>');

echo('<div class="clear"></div>');					
echo('</div>');

echo('<h2 id="titulo_linea">Piezas sugeridas:</h2>');

$relations = @mysql_query("SELECT * FROM tb_relations WHERE subcategory = '$var_sugerencia' ORDER BY RAND() LIMIT 3");	
while ($line = mysql_fetch_array($relations)) {
		$products = @mysql_query('SELECT * FROM tb_products WHERE id="'.$line['product'] .'" ORDER BY code ASC');
		while ($lineb = mysql_fetch_array($products)) {
			
			echo('<div class="modulo floatl">');
			echo('<a href="producto.php?page='.$page.'&cat='.$cat.'&prod='. utf8_encode($lineb['id']) .'" target="_self">');
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
