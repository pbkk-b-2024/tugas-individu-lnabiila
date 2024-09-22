<?php
$path = 'C:/Users/lathi/Downloads/pbkk1/database/database.sqlite';
if (file_exists($path)) {
    echo "File exists at: " . realpath($path);
} else {
    echo "File does not exist.";
}
