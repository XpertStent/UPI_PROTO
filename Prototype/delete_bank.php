<?php
session_start();
include('sqlconnector.php');

if (isset($_POST['account_number']) && isset($_SESSION['users']['user_id'])) {
    $account_number = $_POST['account_number'];
    $userId = $_SESSION['users']['user_id'];

    // Prepare DELETE statement
    $stmt = $pdo->prepare("DELETE FROM linked_bank_accounts WHERE account_number = :account_number AND user_id = :userId");
    
    // Execute DELETE statement
    $stmt->execute([':account_number' => $account_number, ':userId' => $userId]);
}

// Redirect back to the original page
if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
} else {
    // Fallback to a default page if HTTP_REFERER is not set
    header('Location: dashboard.php');
}
?>
