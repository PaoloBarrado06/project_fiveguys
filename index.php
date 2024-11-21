<?php 

    include 'config.php';



if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $id = '';

   
   $sql="SELECT * FROM accounts WHERE email='$email' and password='$password'";
   $result=$mysqli->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    $_SESSION['age']=$row['age'];
    $_SESSION['birthdate']=$row['birthdate'];
    $_SESSION['id']=$row['id'];
    header("Location: feeling.php");
    exit();
   }
   else{
    header("Location: errorpage.php");
    exit();
   }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        h1 {
            font-family: 'Lexend';   
            font-weight: 700;   
            color: #0d3569;
            text-align: center;
            font-size: 45pt;
        }

        .btn-login {
            background-color: #0d3569;
            color: #fff;
            border-radius: 5px;
        }

        .btn-login:hover {
            background-color: #001b40;
            color: white;
        }

        .message{
            text-align: center;
            background: #f9eded;
            padding: 15px 0px;
            border:1px solid #699053;
            border-radius: 5px;
            margin-bottom: 10px;
            color: red;
        }

    </style>

  </head>
  <body>
    <section>
        <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm" style="min-width: 350px; background-color: #c2e2ff;">
                        <div class="card-body">
                            <h1> UPLIFT </h1>
                            <form method="POST" action="">
                                <div class="field input-group my-4">
                                    <span class="input-group-text" id="email-addon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" id="email" class="form-control py-2" placeholder="Email ID" aria-describedby="email-addon" required>
                                </div>
                                
                                <div class="field input-group my-4">
                                    <span class="input-group-text" id="password-addon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control py-2" placeholder="Password" aria-describedby="password-addon" required>
                                </div>
                                
                                <input type="submit" id="btnLogin" class="btn btn-primary btn-login w-100" style="background-color: #0d3569; border: none;" value="L O G I N " name="signIn">
                                <a href="register.php" class="text-decoration-none small">Gusto mo ng account?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>