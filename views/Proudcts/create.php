<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Categories</title>
</head>

<body>
    <div style="width: 500px; margin:0 auto;">

        <?php
        session_start();

        if (isset($_SESSION['errors'])) {
            // print_r($_SESSION['errors']);
            echo '<ul>';
            foreach ($_SESSION['errors'] as $key => $error) {
                echo '<li>The ' . $key .' ' . $error . '</li>';
            }
            echo '</ul>';
        }
        ?>

        <a href="./index.php">List</a>
        <form action="./store.php" method="post">
            <input 
                type="text" 
                name="product_id" 
                value="<?= $_SESSION['old']['product_id'] ?? null ?>"
                placeholder="Enter product ID"
            ><br>
            <?= $_SESSION['errors']['product_id'] ?? null ?> <br>

            <input 
                type="text" 
                name="name" 
                value="<?= $_SESSION['old']['name'] ?? null ?>" 
                placeholder="Enter product Name"
            ><br>
            <?= $_SESSION['errors']['name'] ?? null ?>

            <button>Add</button>
        </form>

        <?php
            if (isset($_SESSION['errors'])) {
                unset($_SESSION['errors']);
            }
        ?>

    </div>
</body>

</html>