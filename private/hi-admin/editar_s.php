<? 
session_start();
if (!isset($_SESSION['logged_admin_in'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ag47 Joyer&iacute;a Contempor&aacute;nea » Administrator</title>
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
	<h1 class="slogan_private"><span class="azul">JOYER&Iacute;A CONTEMPOR&Aacute;NEA /</span>/ ADMINISTRATOR</h1>	
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
		$subcategorias = @mysql_query('SELECT * FROM tb_subcategories WHERE category='. utf8_encode($fila['id']) .' ORDER BY id ASC');
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

<a href="logout.php" class="logout">Cerrar sesi&oacute;n</a>

<!-- / HEADER -->

<div id="wrapper">
<h2 id="titulo_linea">Editando pieza</h2>

<?
require('conexion.php');
$link = conectarse();
$id = $_GET['id'];

mysql_query("DELETE FROM tb_relations WHERE product = '$id'", $link);

/**/

if (!empty($_FILES['ufile']['size'][0])) {
	$f1=$_FILES['ufile']['name'][0];
	$path1= "../images/".$_FILES['ufile']['name'][0];
	copy($_FILES['ufile']['tmp_name'][0], $path1);
	$filesize1=$_FILES['ufile']['size'][0];
	mysql_query("UPDATE tb_products SET thumb = '$f1' WHERE id = $id", $link);
}

if (!empty($_FILES['ufile']['size'][1])) {
	$f2=$_FILES['ufile']['name'][1];
	$path2= "../images/".$_FILES['ufile']['name'][1];
	copy($_FILES['ufile']['tmp_name'][1], $path2);
	$filesize2=$_FILES['ufile']['size'][1];
	mysql_query("UPDATE tb_products SET image = '$f2' WHERE id = $id", $link);
}

/**/

$description=$_POST['description'];
$code=$_POST['code'];
$precio=$_POST['precio'];
$linea=$_POST['linea'];

if (isset($_POST['arrivals'])) {
	$arrivals = 1;
} else {
	$arrivals = 0;
}

$orden=$_POST['orden'];

/**/

mysql_query("UPDATE tb_products SET description = '$description', code = '$code', precio = '$precio', arrivals = '$arrivals', orden = '$orden'  WHERE id = $id", $link);

foreach ($linea as $l) {
	mysql_query("INSERT INTO tb_relations VALUES('$l','$id', '$orden')", $link);
}

print '<meta http-equiv="refresh" content="1; url=editar.php?id='.$id.'.php">';
echo ("<h1 id='h1advice'>La pieza ha sido modificada</h1>");
?>

<div class="clear"></div>
</div><!-- / WRAPPER -->

</body>
</html>


