<?php 

    include 'config.php';



if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];

   
   $sql="SELECT * FROM accounts WHERE email='$email' and password='$password'";
   $result=$mysqli->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: dashboard.php");
    exit();
   }
   else{
    echo "<div class='message'>
    <p>Wrong Username or Password</p>
    </div> <br>";
    echo "<a href='index.php'><button class='btn'>Go Back</button>";
   }

}
?>