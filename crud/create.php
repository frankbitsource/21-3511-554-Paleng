<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['itemName'];

    $query = "INSERT INTO items (name) VALUES (:name)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $itemName);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error adding item.";
    }
}
?>
