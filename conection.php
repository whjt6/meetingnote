<?php
$host = 'localhost';
$dbname = 'meetingnote'; // Ganti dengan notemeeting
$username = 'root'; // Sesuaikan jika menggunakan username lain
$password = ''; // Sesuaikan jika ada password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
