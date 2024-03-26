<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare Products CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 800px;
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
            margin-bottom: 20px;
        }

        form input, form textarea {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #ff69b4; /* Warna pink */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff69b4; /* Warna pink */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Skincare Products CRUD</h1>

        <form action="create.php" method="POST">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="text" name="brand" placeholder="Brand" required>
            <input type="text" name="ingredients" placeholder="Ingredients">
            <input type="text" name="how_to_use" placeholder="How to Use">
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <textarea name="description" placeholder="Description"></textarea>
            <input type="number" name="price" step="0.01" placeholder="Price" required>
            <button type="submit">Add Product</button>
        </form>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Ingredients</th>
                <th>How to Use</th>
                <th>Jumlah</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
                $conn = mysqli_connect("10.33.35.66", "praktikan_kinan", "psait", "skincare");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['brand']."</td>";
                        echo "<td>".$row['ingredients']."</td>";
                        echo "<td>".$row['how_to_use']."</td>";
                        echo "<td>".$row['jumlah']."</td>";
                        echo "<td>".$row['description']."</td>";
                        echo "<td>".number_format($row['price'], 0, ',', '.')."</td>";
                        echo "<td><a href='update.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No products found</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>

