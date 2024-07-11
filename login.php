<?php
include 'connect.php';
$response = array();

try{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $response['success'] = true;
        $response['message'] = "You have been logged in successfully.";
        $response['permissions'] = $user['permissions'];
    } else {
        $response['success'] = false;
        $response['message'] = "Incorrect username or password.";
    }
}
catch (PDOException $e){
    $response['success'] = false;
    $response['message'] = "Database connection error:" . $e->getMessage();
}
echo json_encode($response);

?>