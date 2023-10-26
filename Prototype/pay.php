<?php      
session_start();

if (isset($_SESSION['transaction']['pay']) && isset($_SESSION['users']['username'])) {
    // ... [Your database connection code]
    include('sqlconnector.php');

    // Ensure the value is an integer
    $subtractValue = (int) $_SESSION['transaction']['pay'];

    // SQL to subtract value from the 'amount_due' column where the name matches the session username
    $sql = "UPDATE users SET amount_due = amount_due - :subtract_value WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['subtract_value' => $subtractValue, 'username' => $_SESSION['users']['username']]);

    if ($success) {
        // Insert into the transactions table
        $sender_UPI_ID = $_SESSION['users']['UPI_ID'];
        $receiver_UPI_ID = "western@upi";
        $amount = $subtractValue;
        $status = "Completed";  // Sample status

        $sql = "INSERT INTO transactions (sender_UPI_ID, receiver_UPI_ID, amount, status) 
                VALUES (:sender_UPI_ID, :receiver_UPI_ID, :amount, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'sender_UPI_ID' => $sender_UPI_ID, 
            'receiver_UPI_ID' => $receiver_UPI_ID, 
            'amount' => $amount, 
            'status' => $status
        ]);

        echo "Transaction Successful!";
        echo $_SESSION['transaction']['pay'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :regemail");
        $stmt->execute(['regemail' => $_SESSION['users']['email']]);
        $row = $stmt->fetch();
        $_SESSION['users'] = $row;
        echo $_SESSION['users']['username'];

        header('location: success.php');
    } else {
        // Transaction failed logic
        $sender_UPI_ID = $_SESSION['users']['UPI_ID'];
        $receiver_UPI_ID = "western@upi";
        $amount = $subtractValue;
        $status = "Failed";  // Sample status

        $sql = "INSERT INTO transactions (sender_UPI_ID, receiver_UPI_ID, amount, status) 
                VALUES (:sender_UPI_ID, :receiver_UPI_ID, :amount, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'sender_UPI_ID' => $sender_UPI_ID, 
            'receiver_UPI_ID' => $receiver_UPI_ID, 
            'amount' => $amount, 
            'status' => $status
        ]);

        echo "Transaction Unsuccessful!";
        echo $_SESSION['transaction']['pay'];
    }
}
else {
    echo "Transaction failed";
    echo $_SESSION['transaction']['pay'];
}
?>
