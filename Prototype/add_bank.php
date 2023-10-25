<?php
session_start();

// Verify if the user is logged in
if (!isset($_SESSION['users']['user_id'])) {
    die("You must be logged in to add a bank.");
}

// Connect to the database
include('sqlconnector.php');

// Retrieve POST data
$bank_name = $_POST['bank_name'];
$account_holder_name = $_POST['account_holder_name'];
$bsb = $_POST['bsb'];
$account_number = $_POST['account_number'];

// Validate the retrieved data (e.g., check lengths, formats, etc.)
// ...

// Insert the data into the database
$stmt = $pdo->prepare("INSERT INTO linked_bank_accounts (user_id, bank_name, account_holder_name, BSB_code, account_number) VALUES (:user_id, :bank_name, :account_holder_name, :bsb, :account_number)");
$result = $stmt->execute([
    'user_id' => $_SESSION['users']['user_id'],
    'bank_name' => $bank_name,
    'account_holder_name' => $account_holder_name,
    'bsb' => $bsb,
    'account_number' => $account_number
]);

// Provide feedback to the user
if ($result) {
    echo "Bank added successfully!";
    // Consider redirecting the user to another page after successful addition
    header("Location: bank.php");
} else {
    echo "Failed to add the bank. Please try again.";
}

?>



