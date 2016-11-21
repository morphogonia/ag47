<?php
$bdconex = @mysql_connect('localhost','root','root');

if (!$bdconex) {
	echo '<h1>Por el momento la base de datos no est‡ disponible.</h1> ';
	exit();
}

if (! @mysql_select_db('dbag47private', $bdconex)){
	echo '<h1>ERROR3: Imposible localizar la base de datos en este momento.</h1>';
	exit();
}
?>

