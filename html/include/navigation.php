<?php

$query = "SELECT *  FROM shop_category";

$result = mysqli_query($db, $query);
		
$navigation='<ul>';

while($zeile = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$navigation .=  '<li><a href="/index.php?c=' . $zeile['id'] . '">'. '>>';
		$navigation .= $zeile['name'];
		$navigation .= '</a></li>';
}	
$navigation .= '</ul>';

?>