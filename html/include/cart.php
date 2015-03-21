<?php
//include ('include/functions.php');

$content = '<h1>Ihr Warenkorb</h1>';

$query = "SELECT userId, itemId, count FROM user_cart WHERE userId = ".$_SESSION["id"].";";

$result = $db->query($query);

$content.= '<table>';

$totalCost = 0;

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    $query = "SELECT name, pictureURL, descriptionShort, price FROM shop_item WHERE id = ".$row["itemId"];
    $result2 = $db->query($query);
    $item = $result2->fetch_assoc();
    
    $cost = $row['count'] * $item['price'];
    $totalCost += $cost;
    
    
    
	$content .= '<tr><form action="index.php?cart&itemId='.$row['itemId'].'" method="POST">';
	$content .= '<th class="article_img"><a href="index.php?p=' . $row['itemId']. '">';
	$content .= '<img src="' .$item['pictureURL']. '" width="100" height="100"></a>';
	$content .= '</th>';		
    
	$content .= '<td><b>'.$item['name'] . '</b></br>' . $item['descriptionShort'].'<br>Preis: '.$item['price'].'€</td>';
    
    $content .= '<td ><b>Menge: </b><input type="number" name="count" min="1" max="999" value='.$row["count"].'><input type="submit" name="updateCnt" value="&Auml;ndern" ></br>';
    $content .= '<b>Gesamt: </b>'.$cost.'€</br><br>';
    $content .= '<input type="submit" name="deleteItem" value="Entfernen">';
	$content .= '</td>';
    
	$content .= '</form></tr>';
}

$content .= '</table><hr><table><form action="index.php?cart" method=POST>';
$content .= '<td>Preis (excl. MWST): '.$totalCost.'€<br>MWST (19%): '.round($totalCost*0.19, 2).'€<br>Preis (inlk. MWST): '.round($totalCost*1.19, 2).'€</td>';
$content .= '<td><input type="submit" name="completeOrder" value="BESTELLEN"></td></table>';

?>