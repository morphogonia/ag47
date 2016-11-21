
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="../js/fancybox.js"></script>
	
<?php
include('conection.inc');
$per_page = 6;

if($_GET) {
	$page=$_GET['page'];
}

$start = ($page-1)*$per_page;
$products = "select * from tb_products WHERE arrivals=1 order by id DESC limit $start,$per_page";
$result = @mysql_query($products);

while ($lineb = mysql_fetch_array($result)) {
			
	echo('<div class="modulo floatl">');
			
	if(file_exists('images/'. utf8_encode($lineb['image']) .'')){
	
		echo('<a href="images/'. utf8_encode($lineb['image']) .'" target="_blank" rel="groups" title="CODE: '. utf8_encode($lineb['code']) .' / '. utf8_encode($lineb['precio']) .' / '. utf8_encode($lineb['description']) .'">');
		if(file_exists('images/'. utf8_encode($lineb['thumb']) .'')){
			echo('<img src="images/'. utf8_encode($lineb['thumb']) .'" alt="Ag47 - '. utf8_encode($lineb['description']) .'" width=270 height=265 class="item" />');
		} else {
			echo('<img src="images/nodisponible.gif" width=270 height=265 class="item" />');
		}	
		echo('</a>');
		
	} else {
	
		if(file_exists('images/'. utf8_encode($lineb['thumb']) .'')){
			echo('<img src="images/'. utf8_encode($lineb['thumb']) .'" alt="Ag47 - '. utf8_encode($lineb['description']) .'" width=270 height=265 class="item" />');
		} else {
			echo('<img src="images/nodisponible.gif" width=265 height=265 class="item" />');
		}
						
	}

	echo('<br/><p class="private">CODE: '. utf8_encode($lineb['code']) .' / '. utf8_encode($lineb['precio']) .'</p>');
	
	echo('<a href="private.php" target="_self" class="liarrivals">New arrivals /</a>');
	
	echo('<ul class="tags">');
	$tags = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($lineb['id']) .'" ORDER BY subcategory ASC');
	while ($linec = mysql_fetch_array($tags)) {
		$labels = @mysql_query('SELECT * FROM tb_subcategories WHERE id="'.$linec['subcategory'] .'"');
		$lined = mysql_fetch_array($labels);
		echo('<li><a href="lines.php?id='. utf8_encode($lined['id']) .'" target="_self">'. utf8_encode($lined['label']) .' /</a></li>');
	}
	echo('</ul>');	
			
	echo('<p class="desc clear">'. utf8_encode($lineb['description']) .'</p>');
			
	echo('<div class="clear"></div>');					
	echo('</div>');

}
?>

