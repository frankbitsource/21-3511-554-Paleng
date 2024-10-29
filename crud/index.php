<?php
include 'db.php';

// Fetch all items from the database
$query = "SELECT * FROM items";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Items List</h2>
    <a href="create.php" style="display: block; text-align: center;">Add New Item</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['email']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $item['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
