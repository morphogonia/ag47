<?php
function conectarse(){
		if(!($link=mysql_connect('localhost:8888','root','root'))){
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