<? 
session_start();
if (!isset($_SESSION['logged_admin_in'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ag47 Joyería Contemporánea » Administrator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../../favicon.ico" />
	<meta name="author" content="Sandra Bermudez @ bulabe.com" />
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,300italic|Terminal+Dosis" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../../style.css" type="text/css" />
	<script type="text/javascript" src="../../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../../js/fancydropdown.js"></script>
	<script type="text/javascript" src="../jquery.pagination.lines.js"></script>
</head>

<body>
<?php include('../conection.inc'); ?>

<!-- HEADER -->
<div id="header_id">
	<a href="private.php" target="_self">
		<h1 class="by">by Adriana Gutiérrez</h1>
	</a>	
</div>

<div id="header">
<div class="inside">
	<h1 class="slogan_private"><span class="azul">JOYERÍA CONTEMPORÁNEA /</span>/ ADMINISTRATOR</h1>	
<div class="clear"></div><!-- /clear -->
</div><!-- /inside -->
</div><!-- / header -->

<div id="submenu">
<div class="inside">

<ul id="itemnav">
<li><a href="private.php" target="_self">New arrivals</a></li>
<?php	
$categorias = @mysql_query('SELECT * FROM tb_categories ORDER BY id ASC');
while ($fila = mysql_fetch_array($categorias)) {	
	echo ('<li><a href="#" class="bullet">'. utf8_encode($fila['label']) .'</a>');
	echo ('<ul class="categorias">');
		$subcategorias = @mysql_query('SELECT * FROM tb_subcategories WHERE category='. utf8_encode($fila['id']) .' ORDER BY label ASC');
		while ($fila_int = mysql_fetch_array($subcategorias)) {
			echo ('<li><a href="lines.php?id='. utf8_encode($fila_int['id']) .'" target="_self">'. utf8_encode($fila_int['label']) .'</a></li>');
		}	
	echo ('</ul></li>');		
}
?>
</ul>

<div class="clear"></div><!-- /clear -->
</div><!-- /insidemenu -->
</div><!-- /submenu -->

<a href="logout.php" class="logout">Cerrar sesión</a>

<!-- / HEADER -->

<div id="wrapper">
<a href="categorias_n.php" target="_self" class="insert floatl">Agregar nueva categoría</a>
<div class="clear"></div><!-- /clear -->
<h2 id="titulo_linea">Categorías</h2>


<?
$label = @mysql_query('SELECT * FROM tb_categories ORDER BY id ASC');
while ($filab = mysql_fetch_array($label)) {
	echo('<div id="insertar" class="clear"><h2 id="titulo_about">' . utf8_encode($filab['label']) . '</h2>');		
		$resultado = @mysql_query('SELECT * FROM tb_subcategories WHERE category ='. utf8_encode($filab['id']).' ORDER BY id ASC');
		while ($fila = mysql_fetch_array($resultado)) {
			echo('<form enctype="multipart/form-data" class="myformCat" action="categorias_s.php?id='. utf8_encode($fila['id']) .'" method="post">');
			echo('<label>Nombre:</label>');
			echo('<input type="text" id="caption" name="caption" class="campo" value="'. utf8_encode($fila['label']) .'"/>');
			echo('<input type="submit" class="boton" value="Cambiar nombre" />');
			echo('<div class="clear"></div></form>');
			echo('<a href="categorias_e.php?id='. utf8_encode($fila['id']) .'" target="_self" class="el">Eliminar</a><div class="clear"></div>');
			echo('<div class="clear"></div><br/><hr/><br/>');
		}
	echo('</div>');	
}
?>


<div class="clear"></div>
</div><!-- / WRAPPER -->

</body>
</html>












