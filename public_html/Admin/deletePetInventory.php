<?php
include("userdb.php");

$pdo = new PDO('mysql:host=localhost;dbname=id21727828_meowoof', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['pet_id'])) {
    $petId = $_GET['pet_id'];

    $stmt = $pdo->prepare("DELETE FROM pet_inventory WHERE pet_id = ?");
    $stmt->execute([$petId]);

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        // Fetch the updated data after deletion
        $stmt = $pdo->query("SELECT * FROM pet_inventory");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data); // Return updated data as JSON
        http_response_code(200); // OK status code
        header("Admin-PetsInventory.php");
        exit(); // Terminate further execution
    } else {
        http_response_code(500); // Internal Server Error status code
        exit(); // Terminate further execution
    }
} else {
    http_response_code(400); // Bad Request status code
    exit(); // Terminate further execution
}
?>