<?php
// Database connection
$servername = 'localhost';
$username = 'id21727828_meowoof2023';
$password = 'Sns@1234';

try {
    $con = new PDO("mysql:host=$servername;dbname=id21727828_meowoof", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<br>' . $e->getMessage();
}

$pet_details = []; // Initialize the variable as an empty array

if (isset($_POST['submitSearch'])) {
    if (!empty($_POST['search'])) {
        $search = trim($_POST['search']); // Trim the search term to remove extra whitespace
        // Prepare the SQL statement to search the pet_inventory table for multiple columns in a case-insensitive manner
        $stmt = $con->prepare("SELECT * FROM pet_inventory WHERE LOWER(pet_name) LIKE LOWER(:search) OR LOWER(pet_age) LIKE LOWER(:search) OR LOWER(pet_breed) LIKE LOWER(:search) OR LOWER(pet_gender) LIKE LOWER(:search) OR LOWER(pet_adoptionfee) LIKE LOWER(:search)");
        // Bind the search parameter (converted to lowercase and trimmed)
        $stmt->bindValue(':search', '%' . strtolower($search) . '%', PDO::PARAM_STR);
        $stmt->execute();
        $pet_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $searchErr = "Please enter the information";
    }
}
?>