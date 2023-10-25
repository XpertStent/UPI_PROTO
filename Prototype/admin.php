<?php
session_start();
include('sqlconnector.php');

// Check if the user is logged in as an admin (implement this check based on your system's logic)

// Uncomment the next line once you have logic to check if a user is an admin
// if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']) { die('Unauthorized access'); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $upi_id = $_POST['upi_id'];
    $amount_due = $_POST['amount_due'];

    // Password hashing
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database using a prepared statement to prevent SQL injection
    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, mobile_number, email, UPI_ID, amount_due) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $password_hash, $mobile_number, $email, $upi_id, $amount_due]);

    echo "User created successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");  // Date in the past

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        session_unset();
        session_destroy();
    }
    
    

?>


<head>
    <?php include './aaheader.php'; ?>
</head>
<body>
    <h2>Create New User</h2>
    <form method="POST" action="admin.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="mobile_number">Mobile Number:</label>
        <input type="number" name="mobile_number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="upi_id">UPI ID:</label>
        <input type="text" name="upi_id" required><br><br>

        <label for="amount_due">Amount Due:</label>
        <input type="number" name="amount_due" required><br><br>

        <input type="submit" value="Create User">
    </form>
</body>
</html>
