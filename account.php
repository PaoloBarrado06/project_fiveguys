<?php
session_start();
include("config.php");

// Ensure the session variables are set before using them
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$age = isset($_SESSION['age']) ? $_SESSION['age'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$birthdate = isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_dob = $_POST['dob'];
    $new_age = $_POST['age'];

    // Update the database
    $update_query = "UPDATE accounts SET 
                        username='$new_username', 
                        email='$new_email', 
                        password='$new_password', 
                        birthdate='$new_dob', 
                        age='$new_age' 
                    WHERE email='$email'";

    if ($mysqli->query($update_query) === TRUE) {
        // Update session variables
        $_SESSION['username'] = $new_username;
        $_SESSION['email'] = $new_email;
        $_SESSION['password'] = $new_password;
        $_SESSION['birthdate'] = $new_dob;
        $_SESSION['age'] = $new_age;
        header("Location: account.php");
    } else {
        echo "<script>alert('Error updating profile: " . $mysqli->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Uplift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        .input-container {
            margin-bottom: 10px;
            background-color: #d4e0f1;
            padding: 5px;
        }
        .form-control {
            padding: 5px;
        }
        .col-md-6 {
            line-height: 20px;
        }
        .save-btn {
            display: none; /* Hide Save Changes button by default */
        }
        .form-control[readonly] {
            background-color: #fff; /* Ensure input boxes don't turn grey */
        }
    </style>
    
    <script>
        function toggleEditMode() {
            var editButton = document.getElementById('editButton');
            var saveButton = document.getElementById('saveButton');
            var inputs = document.querySelectorAll('.form-control');

            if (editButton.innerText === 'Edit') {
                editButton.innerText = 'Cancel';
                saveButton.style.display = 'inline-block';
                inputs.forEach(function(input) {
                    input.removeAttribute('readonly');
                });
            } else {
                editButton.innerText = 'Edit';
                saveButton.style.display = 'none';
                inputs.forEach(function(input) {
                    input.setAttribute('readonly', 'readonly');
                });
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                input.setAttribute('readonly', 'readonly');
            });
        });
        function confirmChanges(event) { event.preventDefault(); // Prevent default form submission
            var confirmModal = new bootstrap.Modal(document.getElementById('confirm')); 
            confirmModal.show(); 
        }
    </script>
</head>
<body>

    <div class="d-flex">

    
        <nav class="navbar-vertical d-flex flex-column align-items-center">

            <h1 class="title">UP</h1>

            <a class="nav-link" href="dashboard.php">
                <i class="icon bi bi-grid-fill"></i> 
                <h6 class="title1" style="font-size: 10px">Dashboard</h6>
            </a>

            <a class="nav-link" href="calendar.html">
                <i class="icon bi bi-calendar-date"></i> 
                <h6 class="title1" style="font-size: 10px">Calendar</h6>
            </a>

            <a class="nav-link" href="account.php">
                <i class="icon bi bi-gear-fill"></i>
                <h6 class="title1" style="font-size: 10px">Settings</h6>
            </a>

            <a class="nav-link" href="index.php">
                <i class="icon bi bi-box-arrow-right"></i>
                <h6 class="title1" style="font-size: 10px">Logout</h6> 
            </a>
            
        </nav>

        
        <div id="about" class="container">

            <h1 class="title2">LIFT</h1>
            
            <!-- User Information Form -->
            <h1>Account Information</h1>
            <br><br>
            <div class="mt-4">
                <form method="POST" action="">
                    <div class="row g-3">
                        <div class="col-md-6 input-container">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
                        </div>
                        <div class="col-md-6 input-container">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                        </div>
                        <div class="col-md-6 input-container">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" readonly>
                        </div>
                        <div class="col-md-6 input-container">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($birthdate); ?>" readonly>
                        </div>
                        <div class="col-md-6 input-container">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="editButton" class="btn btn-secondary" onclick="toggleEditMode()">Edit</button>
                        <button type="submit" id="saveButton" data-toggle="modal" class="btn btn-primary save-btn">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>

            <!-- End of User Information Form -->

        </div>

    </div>
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    function confirmChanges() { var modal = new bootstrap.Modal(document.getElementById('confirm'), {}); modal.show(); }
    </script>
</body>
</html>
