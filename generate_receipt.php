<?php
// Include the TCPDF library
require_once('tcpdf.php');

// Establish a database connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=handyman_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve the job and employee values from the form submission
$selectedJob = isset($_POST['job']) ? $_POST['job'] : null;
$selectedEmployee = isset($_POST['employee']) ? $_POST['employee'] : null;

// Prepare SQL statement to insert form data into the clients table
$stmt = $pdo->prepare("INSERT INTO clients (fullname, address, email, pnum, date, promo, needs, job, employee) 
                       VALUES (:fullname, :address, :email, :pnum, :date, :promo, :needs, :job, :employee)");

// Bind parameters
$stmt->bindParam(':fullname', $_POST['fullname']);
$stmt->bindParam(':address', $_POST['address']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':pnum', $_POST['pnum']);
$stmt->bindParam(':date', $_POST['date']);
$stmt->bindParam(':promo', $_POST['promo']);
$stmt->bindParam(':needs', $_POST['needs']);
$stmt->bindParam(':job', $selectedJob); // Use $selectedJob variable
$stmt->bindParam(':employee', $selectedEmployee); // Use $selectedEmployee variable

// Execute the statement
if ($stmt->execute()) {
    // Generate receipt content
    $receiptContent = "
        <h1>Receipt</h1>
        <p><strong>Full Name:</strong> {$_POST['fullname']}</p>
        <p><strong>Address:</strong> {$_POST['address']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Phone Number:</strong> {$_POST['pnum']}</p>
        <p><strong>Date of Service:</strong> {$_POST['date']}</p>
        <p><strong>Promo Code:</strong> {$_POST['promo']}</p>
        <p><strong>Needs:</strong> {$_POST['needs']}</p>
    ";

    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Receipt');
    $pdf->SetSubject('Receipt');
    $pdf->SetKeywords('Receipt, Handyman');

    // Set default header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Output receipt content
    $pdf->writeHTML($receiptContent, true, false, true, false, '');

    // Close and output PDF
    $pdf->Output('receipt.pdf', 'D');

    // Output JavaScript for alert and redirection
    echo '<script>';
    echo 'alert("Form submitted successfully!");';
    echo 'window.location.href = "ez1.php";'; // Redirect to ez1.php
    echo '</script>';
    exit(); // Stop PHP script execution after redirection
} else {
    echo "Error: Unable to submit form.";
}
?>
