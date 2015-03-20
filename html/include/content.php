<?php

if(isset($category)){	
	$query = "SELECT * FROM shop_item WHERE categoryId LIKE " .$category;	


$result = mysqli_query($db, $query);


$content= '<table>';

while($zeile = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$content .= '<tr>';
		$content .= '<th class="article_img"><a href="/index.php?p=' . $zeile['id']. '">';
		$content .= '<img src="' .$zeile['pictureURL']. '" width="100" height="100"></a>';
		//$content .= $z;
		$content .= '</th>';		
		$content .= '<td class="article_description">';
		$content .= $zeile['name'] . '</br></br>' . $zeile['descriptionShort']. '</br>' . $zeile['price'] . ' €';
		$content .= '</td>';
		$content .= '</tr>';
}
$content .= '</table>';
}

if(isset($product)){
$query = 'SELECT * FROM shop_item WHERE id LIKE ' .$product;

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result, MYSQL_ASSOC);

$content = '<form action="" method="POST">';

$content .= '<div align="center"><img src="' .$row['pictureURL']. '" class="detail_img"></div></br></br></br>';
$content .= '<p id="p">' .$row['description']. '</p>';

$content .= '</br></br><div class="centered">Preis:'. $row['price'] .' €</br>Menge <input type="number" name="quantity" min="1" max="999" value="1" class="quantity"> St&uumlck </br>';
$content .= ' <input type="submit" name="purchase" value="In den Warenkorb" class="centered"> </div>';

$content .= '</form>';
}

if(!isset($product) && !isset($category)){
	$content= '<h1 align="center">Willkommen </br></br>
				im OnlineShop Gewürzheini24.de </br></br></br>
				Wir w&uumlnschen angenehmes Einkaufen </br></br></br>
				Ihr Gew&uumlrzheini24-Team</h1>';	
}
?>