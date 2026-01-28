<?php
try {
    $conn = mysqli_connect('localhost', 'root', '', 'db_php_11-12');
    // echo "Database connected successfully!";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>