<?php
$dsn = 'mysql:host=localhost;dbname=company';
$username = 'root';
$password = 'password';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
}
?>