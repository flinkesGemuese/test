<?php
include_once('db_connect.php');

if (isset($_POST["purchase"]))
{
    
    if (!isset($_SESSION['id']))
    {
        echo "<script type='text/javascript'>alert('Sie sind nicht eingeloggt!');</script>";
        return;
    }

    # Artikel werden in den Warenkorb verschoben
    $itemId = $_GET["p"];
    $count = $_POST["quantity"];
    
    echo "<script type='text/javascript'>alert('".$count." Artikel dem Warenkorb hinzugefügt.');</script>";
    $query = 'REPLACE INTO user_cart (userId, itemId, count) VALUES ('. $_SESSION['id'].','.$itemId.','.$count.');';
    $db->query($query);
}

// Cart functions

if (isset($_POST["updateCnt"]))
{
    if (!isset($_SESSION['id']))
    {
        echo "<script type='text/javascript'>alert('Sie sind nicht eingeloggt!');</script>";
        return;
    }
    
    $itemId = $_GET['itemId'];
    $query = 'UPDATE user_cart SET count = '.$_POST['count'].' WHERE userId = '.$_SESSION['id'].' AND itemId = '.$itemId.';';
    //echo "<script type='text/javascript'>alert('".$query."');</script>";
    $db->query($query);
}

if (isset($_POST["deleteItem"]))
{
    if (!isset($_SESSION['id']))
    {
        echo "<script type='text/javascript'>alert('Sie sind nicht eingeloggt!');</script>";
        return;
    }

    $itemId = $_GET['itemId'];
    $query = 'DELETE FROM user_cart WHERE userId = '.$_SESSION['id'].' AND itemId = '.$itemId.';';
    //echo "<script type='text/javascript'>alert('".$query."');</script>";
    $db->query($query);
}

if (isset($_POST["completeOrder"]))
{
    if (!isset($_SESSION['id']))
    {
        echo "<script type='text/javascript'>alert('Sie sind nicht eingeloggt!');</script>";
        return;
    }
    
    $query = "SELECT userId, itemId, count FROM user_cart WHERE userId = ".$_SESSION["id"].";";

    $result = $db->query($query);
    
    $newId = 1;
    $query = "SELECT MAX(id) AS newId, CURDATE() as date FROM orders;";
    $result2 = $db->query($query);
    $row = $result2->fetch_assoc();
    $newId += $row['newId'];
    $date = $row['date'];
    
    $orderQuery = "";
    $totalCost = 0;
    $hasData = FALSE;
    
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        $hasData = TRUE;
        $query = "SELECT name, pictureURL, descriptionShort, price FROM shop_item WHERE id = ".$row["itemId"];
        $result2 = $db->query($query);
        $item = $result2->fetch_assoc();
        
        $cost = $row['count'] * $item['price'];
        $totalCost += $cost;
        
        $orderQuery = 'INSERT INTO order_details (`orderId`, `itemId`, `count`, `price`) VALUES ("'.$newId.'", "'.$row['itemId'].'", "'.$row['count'].'", "'.$cost.'"); ';
    }
    
    if ($hasData === TRUE)
    {
    
        $orderInfo = 'INSERT INTO orders (`id`, `userId`, `date`, `totalPrice`) VALUES ("'.$newId.'", "'.$_SESSION['id'].'", "'.$date.'", "'.$totalCost.'"); ';
        $db->query($orderInfo);
        
        if ($db->query($orderQuery) === TRUE) {
            echo "<script type='text/javascript'>alert('Bestellung war Erfolgreich!');</script>";
        } 
        
        $deleteQuery = "DELETE FROM user_cart WHERE userId = ".$_SESSION['id'].";";
        $db->query($deleteQuery);
    }
    
    
    //echo "<script type='text/javascript'>alert('".$orderQuery.$result."');</script>";
}
?>