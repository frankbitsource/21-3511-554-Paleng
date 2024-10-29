<?php
$host = "localhost";
$db_name = "crud_example";
$username = "root"; // default username for XAMPP
$password = "";     // default password is empty

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
