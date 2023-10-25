<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './aaheader.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
        
    if (window.jQuery) {  
   alert('jQuery is loaded');  
} else {
   alert('jQuery is not loaded');
}
<!-- Nice Select CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-nice-select@1.1.0/css/nice-select.css">

</script>
</head>

<body>
<!-- jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Nice Select JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery-nice-select@1.1.0/js/jquery.nice-select.min.js"></script>


    <?php include './aanavbar.php'; ?>

    <section class="profile-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="profile-top-layout">
                        <div class="profile-info">
                            <div class="profile-picture"><img
                                    src="https://66.media.tumblr.com/de62698dc1b7eab4e505358bf0414f13/tumblr_prmny2ZaBb1uua0sto5_540.png"
                                    alt="ananddavis" />
                            </div>
                            <div class="profile-header">
                                <div class="profile-account">
                                    <h4 class="profile-username"><?= $_SESSION['users']['username'] ?></h4>
                                    <h6 class="profile-email"><?= $_SESSION['users']['email'] ?></h6>
                                </div>
                                <div class="profile-edit"><a class="profile-button" href="dashboard.php">Dashboard</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-13">
                    <div class="profile-content">

                        <!-- method -->
                        <div id="method">
                            <div class="content-title">
                                <h2>Connected Banks</h2>
                                <h4>Manage your Banks</h4>
                            </div>

                            <button class="btn btn-add" type="button" data-bs-toggle="collapse"
                                data-bs-target="#addpaymenttoggle" aria-expanded="false"
                                aria-controls="addpaymenttoggle">
                                <span class="p-2">Add New Bank</span> <i class="fa fa-plus"></i>
                            </button>

                            <div class="collapse" id="addpaymenttoggle">
                                
<form method="POST" action="add_bank.php">
    <div class="form-group align-items-center row">
        <label for="bank_name" class="col-sm-2 col-form-label">Bank</label>
        <div class="col-sm-9">
            <select class="custom-select form-control" id="bank_name" name="bank_name">
                <option selected>Select</option>
                
                                                <option value="ANZ LTD.">ANZ (Australia and New Zealand Banking Group
                                                    Limited)</option>
                                                <option value="CommBank">Commonwealth Bank of Australia</option>
                                                <option value="NAB">National Australia Bank (NAB)</option>
                                                <option value="WestPac">Westpac Banking Corporation</option>
                                                <option value="Maquarie">Macquarie Bank Limited</option>
                                                <option value="Suncorp Group">Suncorp Group Limited</option>
                                                <option value="Bendigo and Adelaide Bank LTD.">Bendigo and Adelaide Bank Limited</option>
                                                <option value="AMP Bank LTD.">AMP Bank Limited</option>
                                                <option value="Members Equity Bank">ME Bank (Members Equity Bank Limited)</option>
                                                <option value="ING Australia">ING Bank (Australia)</option>
                                 
            </select>
        </div>
    </div>

    <div class="form-group align-items-center row">
        <label for="account_holder_name" class="col-sm-2 col-form-label">Account Holder's Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="Enter Account Holder's Name" required>
        </div>
    </div>

    <div class="form-group align-items-center row">
        <label for="bsb" class="col-sm-2 col-form-label">BSB</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="bsb" name="bsb" placeholder="Enter BSB" required>
        </div>
    </div>

    <div class="form-group align-items-center row">
        <label for="account_number" class="col-sm-2 col-form-label">Account Number</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="account_number" name="account_number" placeholder="Enter Account number" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-2 col-sm-9">
            <button type="submit" class="btn default-btn">Submit</button>
        </div>
    </div>
</form>


                            </div>





<div class="address-table table-responsive">
                               
<?php
include('sqlconnector.php');
// ... [Your database connection code]

$stmt = $pdo->prepare("SELECT * FROM linked_bank_accounts WHERE user_id = :user_id");
$stmt->execute(['user_id' => $_SESSION['users']['user_id']]);

$bankInfos = $stmt->fetchAll();

?>
<?php
if ($bankInfos) {
    echo '<table class="table table-light table-borderless">';
    echo '<tbody>';

    foreach ($bankInfos as $bankInfo) {
        echo '<tr class="address-row row">';
        echo '<td class="address col-sm-8">';
        echo '<strong>' . htmlspecialchars($bankInfo['bank_name']) . '</strong><br>';
        echo htmlspecialchars($bankInfo['account_holder_name']) . '<br>';
        echo htmlspecialchars($bankInfo['BSB_code']);
        echo htmlspecialchars(- $bankInfo['account_number']) . '<br>';
        echo '</td>';

        echo '<td class="address-btns col-sm-4">';

        // Check if this bank account is the default one
        if ($bankInfo['is_default']) {  // Assuming 'is_default' is a column that stores 1 for default bank and 0 otherwise
            echo '<button class="btn btn-sm btn-success" disabled><span>Default</span><i class="fa fa-star"></i></button>';
        } else {
            echo '<form action="set_default.php" method="post" style="display:inline;">';
            echo '<input type="hidden" name="account_number" value="' . $bankInfo['account_number'] . '">';
            echo '<button type="submit" class="btn btn-sm btn-warning"><span>Make Default</span><i class="far fa-star"></i></button>';
            echo '</form>';
        }

        // Delete button (assuming you'll add functionality for this later)

        echo '<input type="hidden" name="account_number" value="' . $bankInfo['account_number'] . '">';
        echo '<button type="button" data-account-number="' . $bankInfo['account_number'] . '" class="btn btn-sm btn-danger delete-account"><span>Delete</span><i class="fa fa-trash"></i></button>';


        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '<br>';

} else {
    echo '<table class="table table-light table-borderless">';
    echo '<tbody>';
    echo '<b>';
    echo "You have no linked bank information. Click the above button to add bank account.";
    echo '</b>';
    echo "</td>";   
    echo '</tbody>';
    echo '</table>';
    echo '<br>';
  
}

?>

</div>
</div>
<div id="history">
                            <div class="content-title">
                                <h2> Payment History</h2>
                                <h3>Your transaction history is shown below.</h3>
                            </div>

                            <div class="orders-container">
                                <div class="row orders-row">
                                    <div class="col-12">




<?php
// Fetching transactions for the logged-in user
$currentUserUPI = $_SESSION['users']['UPI_ID'];
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE sender_UPI_ID = :sender_UPI_ID ORDER BY transaction_timestamp DESC");
$stmt->execute(['sender_UPI_ID' => $currentUserUPI]);

$transactions = $stmt->fetchAll();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Timestamp</th>
            <th>Sender_UPI</th>
            <th>Receiver_UPI</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($transactions as $transaction) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($transaction['transaction_timestamp']) . '</td>';
            echo '<td>' . htmlspecialchars($transaction['sender_UPI_ID']) . '</td>';
            echo '<td>' . htmlspecialchars($transaction['receiver_UPI_ID']) . '</td>';
            echo '<td>$' . htmlspecialchars($transaction['amount']) . '</td>';
            echo '<td>' . htmlspecialchars($transaction['status']) . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

                                    </div>
                                </div>

                            </div>




                                <br>

                            </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './aafooter.php'; ?>
    <script>
$(document).ready(function() {
  $('custom-select').niceSelect();
});
</script>

    <script>
       // $('.custom-select').niceSelect();
        
$(document).ready(function() {
    $('.delete-account').on('click', function() {
        var accountNumber = $(this).data('account-number');
        var confirmation = confirm('Are you sure you want to delete this bank account?');
        if (confirmation) {
            $.post('delete_bank.php', { account_number: accountNumber }, function(response) {
                // Handle the response from your PHP script here
                // For example, you might want to reload the page or remove the deleted account from the table
                location.reload();
            });
        }
    });
});




    </script>
    <script>
  $(document).ready(function() {
    // Save scroll position before page unload
    $(window).on('beforeunload', function() {
      localStorage.setItem('scrollPosition', $(window).scrollTop());
    });

    // Scroll to the saved position when page is loaded
    if (localStorage.getItem('scrollPosition') !== null) {
      $(window).scrollTop(localStorage.getItem('scrollPosition'));
    }
  });
</script>

</body>

</html>