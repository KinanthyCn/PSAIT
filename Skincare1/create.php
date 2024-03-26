<?php
    $conn = mysqli_connect("10.33.35.66", "praktikan_kinan", "psait", "skincare");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $ingredients = $_POST['ingredients']; // Added ingredients field
    $cara_pakai = $_POST['cara_pakai']; // Added cara pakai field
    $jumlah = $_POST['jumlah']; // Added jumlah field

    $sql = "INSERT INTO products (name, brand, description, price, ingredients, cara_pakai, jumlah) VALUES ('$name', '$brand', '$description', '$price', '$ingredients', '$cara_pakai', '$jumlah')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

