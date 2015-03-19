<?php
include_once 'db_connect.php';
$articles = 'keine';

if (isset($_SESSION['id']))
{

$userid = $_SESSION['id'];
$query = "SELECT count(*) FROM user_cart WHERE `userid` = $userid;";
    

//if($result = mysqli_query($db, $query))
//{
//    if ($row = $result->fetch_object();)
//}
}

$loginFrame="<html>
    <head>
        <title>Profile</title>
    </head>
    
    <body>
        <div>
            <b>Willkommen <i>".$_SESSION['name'].' '.$_SESSION['surname']."</i></b><br>
            <b>Sie haben ".$articles." Artikel im Warenkorb.</b><br>
            <button onclick=\"window.location.href='logout.php'\">Ausloggen</button>
        </div>
    </body>
</html>";

?>