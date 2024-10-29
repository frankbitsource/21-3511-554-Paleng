<?php
include 'db.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the item from the database
    $query = "SELECT * FROM items WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    // If item not found, redirect to index page
    if (!$item) {
        header("Location: index.php");
        exit();
    }
} else {
    // If ID is not set, redirect to index page
    header("Location: index.php");
    exit();
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['itemName'];

    // Update query
    $query = "UPDATE items SET name = :name WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $itemName);
    $stmt->bindParam(':id', $id);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating item.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .cancel-button {
            background-color: #dc3545;
        }
        .cancel-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h2>Edit Item</h2>
    <form action="" method="post">
        <input type="text" name="itemName" value="<?= htmlspecialchars($item['name']) ?>" required />
        <button type="submit">Save</button>
        <a href="index.php" class="cancel-button" style="padding: 10px 15px; text-decoration: none; color: white; border-radius: 4px;">Cancel</a>
    </form>
</body>
</html>
