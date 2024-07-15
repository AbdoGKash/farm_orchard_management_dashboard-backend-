<?php
include 'connect.php';
header('Content-Type: application/json');

$response = array();

try{
    $input = json_decode(file_get_contents('php://input'), true);
    $username = $input['username'];
    $password = $input['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $response['success'] = true;
        $response['message'] = "You have been logged in successfully.";
        $response['permissions'] = $user['permissions'];
        $response['username'] = $user['username'];
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