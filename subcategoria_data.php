
<?php
include('includes/conection.inc');
$per_page = 9;

if($_GET) {
	$page=$_GET['page'];
}

$start = ($page-1)*$per_page;
$id = $_GET['id'];

$relations = "select * from tb_relations WHERE subcategory ='$id' order by product desc limit $start,$per_page";
$result = mysql_query($relations);

while ($line = mysql_fetch_array($result)) {
		$products = @mysql_query('SELECT * FROM tb_products WHERE id="'.$line['product'] .'" ORDER BY id DESC');
		while ($lineb = mysql_fetch_array($products)) {
			
			echo('<div class="modulo floatl">');
			echo('<a href="producto.php?page='.$page.'&cat='.$id.'&prod='. utf8_encode($lineb['id']) .'" target="_self">');
			echo('<img src="images/'. utf8_encode($lineb['thumb']) .'" alt="Ag47 - '. utf8_encode($lineb['description']) .'" width=270 height=270 class="item" />');
			echo('</a>');
			echo('<p>CODE: '. utf8_encode($lineb['code']) .'');
			echo(' / PRICE: '. utf8_encode($lineb['price']) .'</p>');
			
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
			
			echo('<a href="https://twitter.com/share" class="twitter-share-button" data-via="Ag47Joyeria" data-count="none">Tweet this</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>');			
			
			echo('<a href="http://www.facebook.com/dialog/feed?app_id=178668555600875&link=http://ag47joyeria.com/producto.php?page='.$page.'%26cat='.$id.'%26prod='. utf8_encode($lineb['id']) .'&picture=http://ag47joyeria.com/images/'.utf8_encode($lineb['thumb']).'&name=Ag47 Joyería Contemporánea&caption='.utf8_encode($lineb['description']).'&description=Visita www.ag47joyeria.com para conocer más de nuestra propuesta en joyería contemporánea&redirect_uri=http://ag47joyeria.com/subcategoria.php?id=1" target="_self" class="fb-share">');
			echo('<img src="interface/icon_fb_share.png"/><span class="share">Share this</span></a>');
			
			echo('</div>');
			
			echo('<div class="clear"></div>');					
			echo('</div>');
		}
}

?>


