<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Only Post Request Allowed Here';
    die();
}

include_once './../../vendor/autoload.php';

use Project\Controllers\Product;

$product = new Product();

if (!$product->store($_POST)) {
    header('Location: ./create.php');
} else {
    header('Location: ./index.php');
}
