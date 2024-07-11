<?php
$dbhost = 'localhost'; 
$port = '5432';
$dbname = 'postgres'; 
$dbuser = 'postgres'; 
$dbpass = 'abzo.123.com.*#@'; 

try {
    $pdo = new PDO("pgsql:host=$dbhost;port=$port;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "The database was connected successfully";
} catch (PDOException $e) {
    die("Database connection error:" . $e->getMessage());
}
?>