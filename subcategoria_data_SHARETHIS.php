
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "680750aa-dfa2-4bee-99cc-92910e40a997"}); </script>

<?php
include('includes/conection.inc');
$per_page = 9;

if($_GET) {
	$page=$_GET['page'];
}

$start = ($page-1)*$per_page;
$id = $_GET['id'];

$relations = "select * from tb_relations WHERE subcategory ='$id' limit $start,$per_page";
$result = mysql_query($relations);

while ($line = mysql_fetch_array($result)) {
		$products = @mysql_query('SELECT * FROM tb_products WHERE id="'.$line['product'] .'" ORDER BY code ASC');
		while ($lineb = mysql_fetch_array($products)) {
			
			echo('<div class="modulo floatl">');
			echo('<a href="producto.php?page='.$page.'&cat='.$id.'&prod='. utf8_encode($lineb['id']) .'" target="_self">');
			echo('<img src="images/'. utf8_encode($lineb['thumb']) .'" alt="Ag47 - '. utf8_encode($lineb['description']) .'" width=270 height=270 class="item" />');
			echo('</a>');
			echo('<p>CODE: '. utf8_encode($lineb['code']) .'');
			echo(' / '. utf8_encode($lineb['price']) .'</p>');
			
			echo('<ul class="tags">');	
			$tags = @mysql_query('SELECT * FROM tb_relations WHERE product="'. utf8_encode($lineb['id']) .'" ORDER BY subcategory ASC');
			while ($linec = mysql_fetch_array($tags)) {
				$labels = @mysql_query('SELECT * FROM tb_subcategories WHERE id="'.$linec['subcategory'] .'"');
				$lined = mysql_fetch_array($labels);
				echo('<li><a href="subcategoria.php?id='. utf8_encode($lined['id']) .'" target="_self">'. utf8_encode($lined['label']) .' /</a></li>');
			}
			echo('</ul>');	
			
			echo('<p class="clear">'. utf8_encode($lineb['description']) .'</p>');
			
			echo('<div class="mod_social">');
			echo("<span class='st_twitter'></span>");
			echo("<span class='st_facebook'></span>");
			echo("<span class='st_email'></span>");
			echo('</div>');
			
			echo('<div class="clear"></div>');					
			echo('</div>');
		}
}



?>

