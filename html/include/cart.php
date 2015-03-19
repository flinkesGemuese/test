<?php


$query = "SELECT count FROM user_cart WHERE userID = ".$_SESSION['id'];

$result = mysqli_query($db, $query);



 #$cart='Sie haben '.$count.' Artikel in Ihrem Warenkorb.';


#unset($count);
?>