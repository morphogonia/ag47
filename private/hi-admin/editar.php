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
<h2 id="titulo_linea">Editando pieza</h2>

<div id="insertar" class="clear">

<?php
$id = $_GET['id'];
$producto = @mysql_query("SELECT * FROM tb_products WHERE id = '$id'");
$var_img = mysql_fetch_array($producto);
if(file_exists('../images/'. utf8_encode($var_img['thumb']) .'')){
	echo('<img src="../images/'. utf8_encode($var_img['thumb']) .'" width=270 height=265 />');
} else {
	echo('<img src="../images/nodisponible.gif" width=270 height=265 />');
}	
?>

<br/><br/>
<form enctype="multipart/form-data" action="editar_s.php?id=<? echo utf8_encode($var_img['id']); ?>" method="post">

	<label>Thumbnail:</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/><br/><br/>
	
	<label>Imagen grande:</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/><br/><br/>
		
	<label>Description:</label>
	<input type="text" id="description" name="description" class="requerido" value="<? echo utf8_encode($var_img['description']); ?>"/><br/><br/>
	
	<label>Code:</label>
	<input type="text" id="code" name="code" class="requerido" value="<? echo utf8_encode($var_img['code']); ?>"/><br/><br/>
	
	<label>Precio:</label>
	<input type="text" id="precio" name="precio" class="requerido" value="<? echo utf8_encode($var_img['precio']); ?>"/><br/><br/>				
	
	<label>Orden:</label>
	<?
	$orden = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($var_img['id']) .'"');
	$var_or = mysql_fetch_array($orden);
	echo('<input type="text" id="orden" name="orden" class="requerido" value="'.utf8_encode($var_or['orden']) .'"/><br/><br/>');
	?>
			
	<?
	$label = @mysql_query('SELECT * FROM tb_categories ORDER BY id');
	while ($filab = mysql_fetch_array($label)) {
		echo('<h2 id="titulo_about">' . utf8_encode($filab['label']) . '</h2>');		
		$resultado = @mysql_query('SELECT * FROM tb_subcategories WHERE category ='. utf8_encode($filab['id']));
		while ($fila = mysql_fetch_array($resultado)) {
			echo('<label>' . utf8_encode($fila['label']) . '</label>');	
			echo('<input type="checkbox" name="linea[]" value="' . utf8_encode($fila['id']) . '"');
			$taches = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($var_img['id']) .'" AND subcategory="'. utf8_encode($fila['id']) .'"' );
			while ($cajas = mysql_fetch_array($taches)) {
				echo('checked="checked"');
			}
			echo(' /><br/><hr/><br/>');
		}
	}
	?>
	
	<label class="rojo">New arrivals</label>
	<input type="checkbox" name="arrivals[]" value="1" <? if($var_img['arrivals']=='1') { echo('checked="checked"'); } ?> /><br/><br/>
		
	<input type="submit" class="boton" value="GUARDAR"/>
	
</form>
</div>

<div class="clear"></div>
</div><!-- / WRAPPER -->

</body>
</html>












