<?php

// $dsn = "pgsql:host=localhost;port=5432;;dbname=postgres";
// $user = "postgres";
// $pass = "abzo.123.com.*#@";
// $option = array(
//    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
// );
// $countrowinpage = 9;
// try {
//    $con = new PDO($dsn, $user, $pass, $option);
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    header("Access-Control-Allow-Origin: *");
//    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
//    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
//    include "functions.php"; //include "../functions.php";
// //    if (!isset($notAuth)) {
//     //echo "Connected successfully to database.";

// //    }
// } catch (PDOException $e) {

//    echo "Connection failed: " . $e->getMessage();
// }







$dbhost = 'localhost'; 
$port = '5432';
$dbname = 'postgres'; 
$dbuser = 'postgres'; 
$dbpass = 'abzo.123.com.*#@'; 

try {
    $pdo = new PDO("pgsql:host=$dbhost;port=$port;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "The database was connected successfully";
} catch (PDOException $e) {
    die("Database connection error:" . $e->getMessage());
}
?>