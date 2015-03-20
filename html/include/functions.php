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


?>