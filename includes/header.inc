
<div id="header_id">
	<a href="index.php" target="_self">
		<h1 class="by">by Adriana Gutiérrez</h1>
	</a>	
</div>

<div id="header">
<div class="inside">

<div id="first_nav">
	<ul id="nav">
		<li><a href="index.php" target="_self">Inicio</a></li>
		<li><a href="ag47.php" target="_self">Sobre Ag47</a></li>
		<li><a href="subcategoria.php?id=1" target="_self">Catálogo</a></li>
		<li><a href="presskit.php" target="_self">Presskit</a></li>		
		<li><a href="donde.php" target="_self">Dónde comprar</a></li>
		<li><a href="contacto.php" target="_self">Contacto</a></li>
		<li><a href="newsletter.php" target="_self">Newsletter</a></li>
	</ul>
	<div class="clear"></div>
</div><!-- /first_nav -->
<div class="clear"></div><!-- /clear -->

<div id="socialmedia">
	<ul>
		<li class="tw"><a href="http://www.twitter.com/Ag47Joyeria" target="_blank">Twitter</a></li>
		<li class="fb"><a href="http://www.facebook.com/Ag47Joyeria" target="_blank">Facebook</a></li>		
	</ul>
	<div class="clear"></div><!-- /clear -->
</div><!-- /socialmedia -->

<h1 class="slogan"><span class="azul">JOYERÍA CONTEMPORÁNEA /</span>/ LIMITED EDITION DESIGNS</h1>	

<div class="clear"></div><!-- /clear -->
</div><!-- /inside -->
</div><!-- / header -->

<div id="submenu">
<div class="inside">
<ul id="itemnav">
<li>Catálogo:</li>		
<?php
$categorias = @mysql_query('SELECT * FROM tb_categories ORDER BY id ASC');
	while ($fila = mysql_fetch_array($categorias)) {		
	echo ('<li><a href="#" class="bullet">'. utf8_encode($fila['label']) .'</a>');
		echo ('<ul class="categorias">');
		$subcategorias = @mysql_query('SELECT * FROM tb_subcategories WHERE category="'.$fila['id'] .'" ORDER BY id ASC');
			while ($fila_int = mysql_fetch_array($subcategorias)) {
				echo ('<li><a href="subcategoria.php?id='. utf8_encode($fila_int['id']) .'" target="_self">'. utf8_encode($fila_int['label']) .'</a></li>');
			}
		echo ('</ul></li>');
	}
?>
</ul>
<div class="clear"></div><!-- /clear -->
</div><!-- /insidemenu -->
</div><!-- /submenu -->

<div id="header_fixed">
<ul class="extra_nav">
	<li><a href="english/index.php" target="_self">English version</a></li>
	<li><a href="http://ag47joyeria.com/private" target="_self">Private content</a></li>
</ul>
<div class="clear"></div><!-- /clear -->
</div><!-- / footer_fixed -->


