<?php
include 'connect.php';
header('Content-Type: application/json');

$response = array();

try{
    $input = json_decode(file_get_contents('php://input'), true);
    $userId = $input['user_id'];
    $stmt = $pdo->prepare("SELECT * FROM orchards WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $userId]);
    $orchards = $stmt->fetchAll();
    if ($orchards) {
        $_SESSION['user_id'] = $userId;
        $response['orchards'] = array();
        
        foreach ($orchards as $orchard) {
            $orchard_data = array(
                'id' => $orchard['id'],
                'user_id' => $orchard['user_id'],
                'orchard_name' => $orchard['orchard_name'],
                'crop_type' => $orchard['crop_type'],
                'area' => $orchard['area'],
                'water_level' => $orchard['water_level'],
                'pest_status' => $orchard['pest_status']
            );
            $response['orchards'][] = $orchard_data;
        }
    } else {
        $response['success'] = false;
        $response['message'] = "error.";
    }
}
catch (PDOException $e){
    $response['success'] = false;
    $response['message'] = "Database connection error:" . $e->getMessage();
}
echo json_encode($response);
?>
