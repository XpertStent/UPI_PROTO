<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('sqlconnector.php');

// Check if the user is logged in
if (isset($_SESSION['users']['user_id'])) {
    // Fetch user details based on the user_id stored in the session
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$_SESSION['users']['user_id']]);
    
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user details were fetched successfully
    if ($userDetails) {
        // Update session details with the latest values from the database
        $_SESSION['users']['username'] = $userDetails['username'];
        $_SESSION['users']['mobile_number'] = $userDetails['mobile_number'];
        $_SESSION['users']['email'] = $userDetails['email'];
        $_SESSION['users']['UPI_ID'] = $userDetails['UPI_ID'];
        $_SESSION['users']['amount_due'] = $userDetails['amount_due'];
        // ... Add other fields as needed

        
    } else {
        echo "Error: User details not found!";
    }
} else {
  
}
?>
