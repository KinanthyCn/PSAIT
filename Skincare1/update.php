<?php
    $conn = mysqli_connect("10.33.64.60", "praktikan_kinan", "psait", "skincare");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $ingredients = $_POST['ingredients']; // Added ingredient field
        $cara_pakai = $_POST['cara_pakai']; // Added cara pakai field
        $jumlah = $_POST['jumlah']; // Added jumlah field

        $sql = "UPDATE products SET name='$name', brand='$brand', description='$description', price='$price', ingredients='$ingredients', cara_pakai='$cara_pakai', jumlah='$jumlah' WHERE id=$id"; // Updated SQL query

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        form input, form textarea {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <input type="text" name="brand" value="<?php echo $row['brand']; ?>" required>
        <textarea name="description" required><?php echo $row['description']; ?></textarea>
        <input type="number" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>
        <input type="text" name="ingredients" value="<?php echo $row['ingredients']; ?>" required> <!-- Added input field for ingredients -->
        <input type="text" name="cara_pakai" value="<?php echo $row['cara_pakai']; ?>" required> <!-- Added input field for cara pakai -->
        <input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required> <!-- Added input field for jumlah -->
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
