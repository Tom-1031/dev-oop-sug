<?php
require_once "../classes/Product.php";

$product = new Product;

$product->store($_POST);
?>