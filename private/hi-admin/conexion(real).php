<?php
function conectarse(){
		if(!($link=mysql_connect('mysql.ag47joyeria.com','ag47user','4g47us3r'))){
			echo 'el servidor no se ha conectado';
			exit();		
			}
		if(!mysql_select_db('dbag47private',$link)){
			echo 'la base de datos no se ha conectado';
			exit();
			}
		return $link;		
		}
		$link= conectarse();
		
		mysql_close($link);
?>