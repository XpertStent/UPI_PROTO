<?php

include 'sqlconnector.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['regemail'];
    $password = $_POST['password'];

    // Fetch stored password hash from the database
    $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE email = :regemail");
    $stmt->execute(['regemail' => $username]);
    $row = $stmt->fetch();

    if ($row && password_verify($password, $row['password_hash'])) {
        // Successful login
               
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :regemail");
        $stmt->execute(['regemail' => $username]);
        $row = $stmt->fetch();
        

        session_start();
        $_SESSION['users'] = $row;
        echo $_SESSION['users']['username'];
        header("Location: otp.php");
     
    } else {
        // Failed login
        
        $message = "The Email or Password is Incorrect! Please try again.";

        echo "<script type='text/javascript'>alert('$message');</script>";
    }




}
?>