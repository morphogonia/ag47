<?php
require('conexion.php');
$id = $_GET['id'];
$link = conectarse();

mysql_query("DELETE FROM tb_products WHERE id = '$id'", $link);
mysql_query("DELETE FROM tb_relations WHERE product = '$id'", $link);

print '<meta http-equiv="refresh" content="1; url=private.php">';
?>




