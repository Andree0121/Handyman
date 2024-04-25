<?php
// Establish a connection to your MySQL database
$pdo = new PDO('mysql:host=localhost;dbname=handyman_db', 'root', '');

// Check if the job parameter is set
if (isset($_POST['job'])) {
    $selectedJob = $_POST['job'];
    
    // Fetch employees for the selected job
    $stmt = $pdo->prepare("SELECT name FROM employees WHERE job = ?");
    $stmt->execute([$selectedJob]);
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return employees as JSON
    echo json_encode($employees);
} else {
    // Return an empty array if job parameter is not set
    echo json_encode([]);
}
?>
