<?php
$path = 'C:/Users/lathi/Downloads/pbkk1/database/database.sqlite';
try {
    $pdo = new PDO('sqlite:' . $path);
    echo "Database connection successful.";
} catch (PDOException $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
}
