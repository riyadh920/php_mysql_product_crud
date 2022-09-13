<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once './../../vendor/autoload.php';

    use Project\Controllers\Product;

    $product = new Product();

    $productInfo = $product->details($_GET['id']);

    // print_r($productInfo);

    ?>

    <div style="width: 500px; margin:0 auto;">
        <a href="./index.php">List</a>

        <form action="./update.php?id=<?= $productInfo['id'] ?>" method="post">
            <input name="product_id" value="<?= $productInfo['product_id'] ?>" placeholder="Enter Product ID">
            <input name="name" value="<?= $productInfo['name'] ?>" placeholder="Enter Product Name">
            <button>Update</button>
        </form>
    </div>
</body>

</html>