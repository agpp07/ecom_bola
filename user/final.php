<?php
session_start();

unset($_SESSION["cart"]);

$count = 0;

header("Location: products.php");
exit();

?>