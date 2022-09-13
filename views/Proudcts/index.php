<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body>

    <?php
    include_once './../../vendor/autoload.php';

    use Project\Controllers\Product;

    $productObj = new Product();

    $products = $productObj->index();

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>

    <a href="./create.php">Create </a>
    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>SL</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 0;
            foreach ($products as $product) { ?>
                <tr>
                    <td><?= ++$sl ?></td>
                    <td><?= $product['product_id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td>
                        <a href="show.php?id=<?= $product['id'] ?>">Show</a>
                        <a href="edit.php?id=<?= $product['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are You Sure Want to Delete ?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>