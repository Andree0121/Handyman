<?php
// Establish a connection to your MySQL database
$pdo = new PDO('mysql:host=localhost;dbname=handyman_db', 'root', '');

// Check if the employee parameter is set
if (isset($_POST['employee'])) {
    $selectedEmployee = $_POST['employee'];
    
    // Fetch the photo URL of the selected employee
    $stmt = $pdo->prepare("SELECT photo_path FROM employees WHERE name = ?");
    $stmt->execute([$selectedEmployee]);
    
    // Check if the query returned any rows
    if ($stmt->rowCount() > 0) {
        $photoUrl = $stmt->fetchColumn();
        // Return the photo URL as a JSON object
        echo json_encode(array("photoUrl" => $photoUrl));
    } else {
        // Return a JSON response with an error message
        echo json_encode(array("error" => "Employee not found"));
    }
} else {
    // Return a JSON response with an error message
    echo json_encode(array("error" => "Employee parameter not set"));
}
?>
