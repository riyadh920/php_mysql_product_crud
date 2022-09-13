<?php
include_once './../../vendor/autoload.php';

use Project\Controllers\Product;

$product = new Product();

$productInfo = $product->details($_GET['id']);

// print_r($productInfo);

?>

<a href="./index.php">List</a>
<h1>Product Info</h1>
<p>Product ID: <?= $productInfo['product_id'] ?></p>
<p>Name: <?= $productInfo['name'] ?></p>