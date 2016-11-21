<?php
$bdconex = @mysql_connect('mysql.ag47joyeria.com','ag47user','4g47us3r');

if (!$bdconex) {
	echo '<h1>Por el momento la base de datos no está disponible.</h1> ';
	exit();
}

if (! @mysql_select_db('dbag47website', $bdconex)){
	echo '<h1>ERROR3: Imposible localizar la base de datos en este momento.</h1>';
	exit();
}
?>

