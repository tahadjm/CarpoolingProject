<?php
$host = 'localhost';
$dbname = 'mini-projet';
$dbusername = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $d) {
    echo "Connection failed " . $d->getMessage();
}
?>
