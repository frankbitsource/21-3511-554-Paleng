<?php
include 'db.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the item from the database
    $query = "DELETE FROM items WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Renumber IDs after deletion
    $renumberQuery = "SET @count = 0; UPDATE items SET id = (@count := @count + 1) ORDER BY id;";
    $conn->exec($renumberQuery);
}

// Redirect back to the index page
header("Location: index.php");
exit();
