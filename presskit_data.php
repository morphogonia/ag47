<?php

include('includes/conection.inc');
$per_page = 15;

if($_GET) {
	$page=$_GET['page'];
}

$start = ($page-1)*$per_page;


$sql = "select * from tb_presskit order by id ASC limit $start,$per_page";
$result = mysql_query($sql);

while($line = mysql_fetch_array($result)) {

	$pages = @mysql_query('SELECT * FROM tb_pages WHERE portada="'. $line["id"] .'" ORDER BY id ASC');
	
	$lineb = mysql_fetch_array($pages);
	echo('<div class="presskit">');
	echo('<a href="images/presskit/'. $lineb['image'] .'" target="_self" rel="groups">');
	echo('<img src="images/presskit/'. $line['image'] .'"/>');
	echo('</a>');

	while ($lineb = mysql_fetch_array($pages)) {
		echo('<a href="images/presskit/'. $lineb['image'] .'" target="_self" rel="groups"></a>');
	}

	echo('</div>');
}

?>

<script type="text/javascript" src="js/fancybox.js"></script>

