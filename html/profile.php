<?php
session_start();// Starting Session
include_once 'db_connect.php';
$articles = 'keine';

if (!isset($_SESSION['id']))
{
    
    //echo 'Keine Session';
    header("location: loginform.php");
}
else
{

$userid = $_SESSION['id'];
$query = "SELECT count(*) FROM user_cart WHERE `userid` = $userid;";
    

//if($result = mysqli_query($db, $query))
//{
//    if ($row = $result->fetch_object();)
//}
}

?>

<html>
    <head>
        <title>Profile</title>
    </head>
    
    <body>
        <div>
            <b>Willkommen <i><?php echo $_SESSION['name'].' '.$_SESSION['surname']; ?></i></b><br>
            <b>Sie haben <?php echo $articles ?>Artikel im Warenkorb.</b><br>
            <b><a href='logout.php'>Ausloggen</a></b>
        </div>
    </body>
</html>