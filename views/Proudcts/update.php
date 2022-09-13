<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Only Post Request Allowed Here';
    die();
}

include_once './../../vendor/autoload.php';

use Project\Controllers\Product;

$product = new Product();

// echo '<pre>';
// print_r($_POST);

$product->update($_POST, $_GET['id']);

header('Location: ./index.php');
