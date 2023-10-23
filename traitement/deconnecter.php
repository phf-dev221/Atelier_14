<?php 
session_start();
$decn = $_SESSION["user"];
$_SESSION['deconnecte']=$decn;
session_unset();
session_destroy();
header('location: ../home.php');
exit();

?>