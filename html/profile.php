<?php
include_once 'db_connect.php';
$articles = 'keine';

if (isset($_SESSION['id']))
{
$success = true;
$userid = $_SESSION['id'];
$query = "SELECT SUM(count) AS total FROM user_cart WHERE userId = ".$userid.";";
$result = $db->query($query);
    
if ($row = $result->fetch_assoc())
    if (isset($row["total"]))
        $articles = $row["total"];
}

$loginFrame="<html>
    <head>
        <title>Profile</title>
    </head>
    
    <body>
        <div>
            <b>Willkommen <i>".$_SESSION['name'].' '.$_SESSION['surname']."</i></b><br>
            <button onclick=\"window.location.href='index.php?cart'\">Warenkorb (".$articles." Artikel)</button><br>
            <button onclick=\"window.location.href='logout.php'\">Ausloggen</button>
        </div>
    </body>
</html>";

?>