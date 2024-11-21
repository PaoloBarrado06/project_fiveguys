<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$first_name = $last_name = $age = $birthdate = $email = $username = $password = "";
$first_name_err = $last_name_err = $age_err = $birthdate_err = $email_err = $username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = $input_first_name;
    }

    // Validate last name
    $input_last_name = trim($_POST["last_name"]);
    if (empty($input_last_name)) {
        $last_name_err = "Please enter your last name.";
    } else {
        $last_name = $input_last_name;
    }

    // Validate age
    $input_age = trim($_POST["age"]);
    if (empty($input_age)) {
        $age_err = "Please enter your age.";
    } else {
        $age = $input_age;
    }

    // Validate birthdate
    $input_birthdate = trim($_POST["birthdate"]);
    if (empty($input_birthdate)) {
        $birthdate_err = "Please enter your birthdate.";
    } else {
        $birthdate = $input_birthdate;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter your email.";
    } else {
        // Check if email is already used
        $verify_query = mysqli_query($mysqli, "SELECT email FROM accounts WHERE email='$input_email'");
        if (mysqli_num_rows($verify_query) != 0) {
            $email_err = "This email is already in use. Please try another one.";
            echo "<script type='text/javascript'>var emailError = '$email_err';</script>";
        } else {
            $email = $input_email;
        }
    }

    // Validate username
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Please enter your username.";
    } else {
        $username = $input_username;
    }

    // Validate password
    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please enter your password.";
    } else {
        $password = $input_password;
    }

    // Check input errors before inserting in database
    if (empty($first_name_err) && empty($last_name_err) &&
        empty($age_err) && empty($birthdate_err) &&
        empty($email_err) && empty($username_err) &&
        empty($password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO accounts (first_name, last_name, age, birthdate, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $param_first_name, $param_last_name, $param_age, $param_birthdate, $param_email, $param_username, $param_password);

            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_age = $age;
            $param_birthdate = $birthdate;
            $param_email = $email;
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .form-container {
            background-color: #c2e2ff;
            padding: 30px;
            border-radius: 5px;
            max-width: 800px;
            margin: 40px auto;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-submit {
            background-color: #0d3569;
            color: #fff;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #001b40;
            color: white;
        }

        .form-check-label a {
            font-weight: bold;
        }

        .form-header {
            font-size: 1.5rem;
        }

        .form-header span {
            color: #002f6c;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-height: 80%;
            overflow-y: auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .terms-content {
            max-height: 400px;
            overflow-y: auto;
        }

        h1 {
            font-family: 'Lexend';
            font-weight: 700;
            color: #0d3569;
            text-align: center;
            font-size: 45pt;
        }


    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="text-center mb-4 form-header">
                <span>SIGN</span> UP
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="first_name" placeholder="First Name" required class="form-control  <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                        <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="last_name" placeholder="Last Name" required class="form-control  <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                        <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="number" name="age" placeholder="Age" required class="form-control  <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                        <span class="invalid-feedback"><?php echo $age_err; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" name="birthdate" placeholder="Birthday" required class="form-control  <?php echo (!empty($birthdate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthdate; ?>">
                        <span class="invalid-feedback"><?php echo $birthdate_err; ?></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" name="email" placeholder="Email" required class="form-control  <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="username" placeholder="Username" required class="form-control  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="password" name="password" placeholder="Password" required class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required oninput="checkPasswordMatch()">
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="terms">
                    <label class="form-check-label" for="terms">By creating this account, you agree to the <a href="#" id="termsLink">Terms & Conditions</a></label>
                </div>
                
                <a>
                    <button type="submit" id="submitBtn" class="btn btn-submit btn-block">S U B M I T
                    </button>
                </a>
            </form>
        </div>
    </div>

    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="terms-content">
                <h1 style="text-align: center;"> UPLIFT </h1>
                <br><br>
                <h6>1. Acceptance of Terms</h6>
                By accessing or using UPLift, you agree to be bound by these Terms & Conditions, 
                which constitute a legally binding agreement between the User and UPlift. 
                We reserve the right to update or modify these terms at any time without prior notice. 
                Your continued use of UPLift after any such changes constitutes your acceptance of the revised terms.
                <br><br>
                <h6>2. Use of the App</h6>
                You may use UPLift for personal and non-commercial purposes, in accordance with these Terms & Conditions. 
                Any unauthorized use of the app, including but not limited to the modification, distribution, or 
                transmission of the app’s content, is strictly prohibited.
                <br><br>
                <h6>3. User Accounts</h6>
                To access certain features of UPLift, you may be required to create a user account. 
                You are responsible for maintaining the confidentiality of your account information and for all activities 
                that occur under your account. We are not liable for any unauthorized access or use of your account.
                <br><br>
                <h6>4. Intellectual Property</h6>
                All content, features, and functionality of UPLift, including but not limited to text, 
                graphics, logos, icons, and software, are the exclusive property of UPLift 
                and are protected by applicable intellectual property laws. You may not use, copy, or 
                distribute any part of the app without our prior written permission.
                <br><br>
                <h6>5. Limitation of Liability</h6>
                To the fullest extent permitted by applicable law, UPLift and its developers are not liable for any direct, 
                indirect, incidental, or consequential damages arising from the use or inability to use the app, even 
                if we have been advised of the possibility of such damages.
                <br><br>
                <h6>6. Termination</h6>
                We reserve the right to terminate or suspend your access to UPLift at any time, with or without cause or 
                notice. Upon termination, your right to use the app will immediately cease.
                <br><br>
                <h6>7. Contact Information</h6>
                If you have any questions or concerns about these Terms & Conditions, please contact us at <b>uplift@gmail.com</b>, Thank you.
                <br>
            </div>
        
        

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkPasswordMatch() {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
    
            if (password != confirmPassword) {
                document.getElementById('confirmPassword').setCustomValidity('Passwords do not match');
            } else {
                document.getElementById('confirmPassword').setCustomValidity('');
            }
        }
    
        document.querySelector('form').addEventListener('submit', function(event) {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
    
            if (!password || !confirmPassword) {
                event.preventDefault();
                alert('Fill out this field');
            } else if (password !== confirmPassword) {
                event.preventDefault();
                alert('Passwords do not match');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var modal = document.getElementById("termsModal");
            var link = document.getElementById("termsLink");
            var span = document.getElementsByClassName("close")[0];

            link.onclick = function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
          if (!document.getElementById('terms').checked) {
            event.preventDefault();
            alert('You must agree to the Terms & Conditions.');
          }
        });
    </script>
</body>

</html>