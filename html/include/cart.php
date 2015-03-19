<?php
session_start ();


$query = "SELECT countWHERE userID like____ FROM user_cart";

$result = mysqli_query($db, $query);

foreach ($result as &$value){
  $count = $count+$value;

  }

 $cart='Sie haben '.$count.' Artikel in Ihrem Warenkorb.;


unset($count);
?>