<?php
include_once './../../vendor/autoload.php';

use Project\Controllers\Product;

$product = new Product();

$product->destroy($_GET['id']);

header('Location: ./index.php');