<?php
     $conn = mysqli_connect("10.33.64.60", "praktikan_kinan", "psait", "skincare");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM products WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
