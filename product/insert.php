<?php
    session_start();

    if (!isset($_SESSION['loggedin'])){
        header('Location: login.php');
        exit;
    }
    
    require '../functions.php';

    if (isset($_POST["isubmit"])) {
        $check = addProduct($_POST, $_FILES);
        if ($check > 0) {
            echo "
                <script>
                    alert('Succesfully added the product!');
                    document.location.href = '../index.php';
                </script>
            ";
        } else if ($check !== 0) {
            echo "
                <script>
                    alert('Failed adding the product..');
                    document.location.href = '../index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Product</title>
</head>
<body>
    <a href="../index.php">← Go Back</a>
    <br>

    <h1>Adding New Product</h1>

    <form method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="iname">Product Name : </label>
                <input type="text" name="iname" id="iname" required>
            </li>
            <li>
                <label for="ibrand">Brand : </label>
                <input type="text" name="ibrand" id="ibrand" required>
            </li>
            <li>
                <label for="icategory">Category : </label>
                <input type="text" name="icategory" id="icategory" required>
            </li>
            <li>
                <label for="iseller">Seller's Name : </label>
                <input type="text" name="iseller" id="iseller" required>
            </li>
            <li>
                <label for="iprice">Price : </label>
                <input type="number" name="iprice" id="iprice" required>
            </li>
            <li>
                <label for="iimage">Product Image : </label><br>
                <input type="file" name="iimage" id="iimage" required>
            </li>

            <br>
            <button type="submit" name="isubmit">Add Product</button>
        </ul>
    </form>
    
</body>
</html>