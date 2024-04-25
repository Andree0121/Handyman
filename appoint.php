<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Services | Appointment</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500&family=Poppins:ital,wght@0,400;0,500;1,400;1,500&family=Roboto:ital,wght@1,700&family=Rowdies&family=Ubuntu:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2e6c203cf8.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js" defer></script> 
</head>
    <!-- Icons -->
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Rubik+Scribble&family=Varela+Round&display=swap');
    </style>
<body>
<div class="blur-bg"></div>
    <div class="forms-container">
        <div class="form-left">
            <h1>What services you need?</h1>
            
                <div class="select-container">
                <select id="jobSelect" class="form-select" name="job" required> 
                <option selected disabled>Select Job Category</option>
        <?php
                // Establish a connection to your MySQL database
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=handyman_db', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }

                // Retrieve distinct job categories from the database
                $stmt = $pdo->query("SELECT DISTINCT job FROM employees");

                // Check if the query executed successfully
                if ($stmt) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['job'] . '">' . $row['job'] . '</option>';
                    }
                } else {
                    echo "Error: " . $pdo->errorInfo()[2]; // PDO error info returns an array
                }
        ?>        
        </select>

        <select id="employeeSelect" class="form-select" name="employee" required>
            <option selected disabled>Select Employee</option>
        </select>
        </div> 

            <br>  <br>
        <div class="image-container">
            <img id="employeePhoto" src="images/default_photo.png" alt="Employee Image">
        </div>
            
        <!-- Add button to show the right form -->
        <button id="showRightFormButton" type="button"><i class="fa-solid fa-circle-arrow-right fa-2x" style="color: #246489"></i></button> 
        </div>
        <script>
        //Next Button
        var showRightFormButton = document.getElementById("showRightFormButton");

        showRightFormButton.addEventListener("click", function () {
                // Get the selected job and employee
                var selectedJob = document.getElementById("jobSelect").value;
                var selectedEmployee = document.getElementById("employeeSelect").value;

                // Log the selected values to debug
                console.log("Selected job:", selectedJob);
                console.log("Selected employee:", selectedEmployee);

                // Check if both job and employee are selected
                if (selectedJob && selectedEmployee) {
                // Set the selected job and employee in the hidden input fields
                document.getElementById("hiddenJob").value = selectedJob;
                document.getElementById("hiddenEmployee").value = selectedEmployee;

                // Hide the left form
                document.querySelector(".form-left").style.display = "none";
                // Show the right form
                document.querySelector(".form-right").style.display = "block";
            } else {
                // Prompt the user to select both a job and an employee before proceeding
                alert("Please select both a job and an employee before proceeding.");
            }
        });

            // Disable the button initially
            showRightFormButton.disabled = true;

            // Add event listener to the employee dropdown
            document.getElementById("employeeSelect").addEventListener("change", function () {
            // Enable the button if employee is selected
            showRightFormButton.disabled = this.value === '';
        });
        </script>

        <div class="form-right" style="display: none;">
            <h1>Personal Details</h1>
            <form action="submit.php" method="post">
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="pnum" placeholder="Phone Number" required>
                <label for="date">Date of inspection and service (Your prefer date)</label>
                <input type="date" name="date" required>
                <input type="text" id="promo" placeholder="Promo Code (If you have one)" name="promo">
                <textarea id="needs" name="needs" rows="4" placeholder="Describe your needs" required></textarea>
                <!-- Inside the right form -->
                <input type="hidden" id="hiddenJob" name="job">
                <input type="hidden" id="hiddenEmployee" name="employee">

                <div class="button-container">   
                        <button id="showLeftFormButton" type="button"><i class="fa-solid fa-circle-arrow-left fa-2x" style="color: #246489"></i></button> 
                        <button id="btnSubmit" type="submit"><i class="fa-solid fa-download fa-lg" style="color: #246489"></i> Submit</button>
                </div>
                </form>
                
                <form action="clear.php" method="post">
                    <button id="btnLogout" type="submit"><i class="fa-solid fa-right-from-bracket fa-lg" style="color: #DA9235"></i> Logout</button>    
                </form>
        </div>
    </div>


        <script>
            //Back button
            document.getElementById("showLeftFormButton").addEventListener("click", function () {
            // Hide the right form
            document.querySelector(".form-right").style.display = "none";
            // Show the left form
            document.querySelector(".form-left").style.display = "block";
            });
        </script>



    <!-- NAVIGATION BAR SA HULI DAPAT NAKALAGAY AMPOTA -->
    <div class="nav-pane">
        <a id="section-1" href="index.php #home"><img id="logo1" src="images/favicon.png" alt=""></a>
        <a id="section-0" href="devs.php"><img id="logo1" src="images/company logo-white.png" alt=""></a>
        <a id="section-0" href=""></a>
        <a id="section-0" href=""></a>
        <a id="section-0" href=""></a>
        <a id="section-0" href=""></a>
        <a id="section-0" href=""></a>
        <a id="section-0" href=""></a>
        <a id="section-2" href="index.php">Home</a>
        <a id="section-3" href="index.php">About</a>
        <a id="section-4" href="services.php">Services</a>
        <a id="section-5" href="handymen.php">Handymen</a>
        <a id="section-6" href="appoint.php">Appoint</a>
    </div>

    <!--FOOTER CONTENT-->
    <footer>
        <div class="footer-container">
            <div class="flex-container">
                <a href="https://www.facebook.com/profile.php?id=100083662747852"><img id="facebook" src="images/facebook.png" alt=""></a>
                <a href="https://www.facebook.com/profile.php?id=100083662747852"><img id="twitter" src="images/twitter.png" alt=""></a>
                <a href="https://www.facebook.com/profile.php?id=100083662747852"><img id="insta" src="images/instagram.png" alt=""></a>
            </div>
            <div class="footer-content">
                <a href="index.php"><img id="logo" src="images/favicon.png" alt=""></a>
                <a href="devs.php"><img id="logo2" src="images/company logo.png" alt=""></a>
                <p class="footer-context">&copy; 2023 Araa Company, Inc. Araa Company, HANDYMAN, and any associated logos are tradmarks, service marks, and/or registered trademarks of Araa Company, Inc.</p>
                <a href="devs.php" class="devs">The Devs</a>
            </div>
        </div>
    </footer>
</body>
</html>
