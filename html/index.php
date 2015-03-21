<?php
session_start ();

include_once 'db_connect.php';

  if(!$db){
    exit("Verbindungsfehler!");
  }

if(isset($_GET['p'])){
  $product = $_GET['p'];
}
else if(isset($_GET['c'])){
  $category = $_GET['c'];
}
else if(isset($_GET['i'])){
  $info = $_GET['i'];
}


include("include/navigation.php");
include("include/content.php");
include("include/footer.php");
include("loginform.php");

if (isset($_GET["cart"]))
    include('include/cart.php');

/*if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  include("include/cart.php");
}*/

  $template = @file_get_contents('templates/index.html');
  $template = str_replace('{navigation}', $navigation, $template);
  $template = str_replace('{content}', $content, $template);
  $template = str_replace('{loginFrame}', $loginFrame, $template);
  $template = str_replace('{footer}', $footer, $template);
  print($template);
?>