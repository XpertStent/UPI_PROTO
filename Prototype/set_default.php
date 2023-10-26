<?php
session_start();

include("sqlconnector.php");
// Connect to the database
// ... [Your database connection code]

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['account_number'])) {
    $accountId = $_POST['account_number'];
    $userId = $_SESSION['users']['user_id'];
    

    // // Set all bank accounts for this user to not default
    $sql = "UPDATE linked_bank_accounts SET is_default = 0 WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $userId]);

    // Set the selected bank account to default
    $sql = "UPDATE linked_bank_accounts SET is_default = '1' WHERE account_number = :account_number AND user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['account_number' => $accountId, 'user_id' => $userId]);

    // Redirect back to the user's homepage or appropriate page
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
     else {
        // Fallback to a default page if HTTP_REFERER is not set
        header('Location: dashboard.php');
    }
    
    exit;
}

else{echo "failed";}
?>