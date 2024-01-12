<?php
include("userdb.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pet_id'])) {
    $petId = $_GET['pet_id'];

    $query = "SELECT * FROM pet_inventory WHERE pet_id = $petId"; // Adjust query as per your database structure

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return the pet details in JSON format
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Pet details not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>