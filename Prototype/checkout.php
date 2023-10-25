<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './aaheader.php'; ?>
    
</head>

<body>
    <?php include './aanavbar.php'; ?>


    <div class="section-product">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <nav aria-label="breadcrumb" class="breadcrumb-box">
                        <ol class="breadcrumb container">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Charges and Payments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuition Payments</li>
                        </ol>
                    </nav>

                    <div class="product-details-container">
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <h3 class="title">Tuition Payment</h3>

                                <div class="price">
                                    <div class="sell-price"><b>$<?= $_SESSION['users']['amount_due']?></b></div>
                                </div>
                                <a href="#" class="text-danger">See payment pdf</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-checkout">
        <div class="container">
            <div class="row checkout-page-row">

                <div class="col-12 ">
                    <h4 class="v2-section-title justify-content-start ps-0"><span class="ps-1">PAYMENTS</span></h4>
                </div>

                <div class="col-lg-8">
                    <form method="POST" id="payform" class="checkout-form mt-3 px-3 px-sm-2 px-md-4">

                        <div class="mb-4 ml-3 checkout-form-section-title flex-wrap">
                            <div class="d-flex align-items-center ">
                                <span class="">1</span>
                                <h2 class="">Payment Information</h2>
                            </div>

                        </div>

                        <div class="checkout-details-form">
                            <div class="form-group row">
                                <label for="amt" class="col-md-2 offset-md-1 col-form-label">Enter Amount </label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="amt" name="amt"
                                        placeholder="Enter Payable Amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adname" class="col-md-2 offset-md-1 col-form-label">UPI ID </label>
                                <div class="col-md-9">
                                <input type="text" value="<?php echo $_SESSION['users']['UPI_ID']; ?>" class="form-control" id="upid" name="upid" readonly>
                                </div>
                            </div>
                           
                        </div>

                        <br><br>

                        <div class=" py-3">
                            <div class="mb-4 ml-3 checkout-form-section-title">
                                <span class="">2</span>
                                <h2 class="">Account Preference</h2>
                            </div>
                            <div class="form-group row m-0">
                                    <section class="profile-container m-0">
                                        <div class="profile-content border-0 pt-0" style="min-height: auto;">
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
            echo '<button class="btn btn-sm btn-success" disabled><span>Selected</span><i class="fa fa-star"></i></button>';
            

        } else {
            //echo '<a href = "bank.php"><button type="button" class="btn btn-sm btn-danger"><span>Make Default in Accounts Page.</span><i class="fa fa-star"></i></button></a>';
            echo '<input type="hidden" name="account_number" value="' . $bankInfo['account_number'] . '">';
            echo '<button type="button" data-account-number="' . $bankInfo['account_number'] . '" class="btn btn-sm btn-warning default-account"><span>Select</span><i class="fa fa-check"></i></button>';
        }



        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

} else {
    
    echo '<a href = "bank.php"><button type="button" class="btn btn-sm btn-warning"><span>Setup in Accounts Page.</span><i class="fa"></i></button></a>';
         
    }


?>
                                            </div>
                                        </div>
                                    </section>
                            </div>
                        </div>


                        <div class="d-flex justify-content-center"><br>
                        <?php if (!$bankInfos): ?>
                            <a href="bank.php"><p class="text-danger">You need to select a default bank account before making a payment.</a></p></div><div class="d-flex justify-content-center">
                        <?php endif; ?>
                            <br>
                            <button type="submit" id="submit_otp" class="btn btn-sumbit w-100" <?php if (!$bankInfos) echo 'disabled'; ?>>Continue</button>

                        </div>
                        <br>
                        <a href="dashboard.php" class="btn btn-dark ">Cancel</a>

                    </form>
                </div>

            </div>
        </div>
    </section> 





    <?php include './aafooter.php'; ?>

    <script>
    // When the "Continue" button is clicked, set the form action to 'payotp.php' and validate the form
    document.getElementById('submit_otp').addEventListener('click', function() {
        document.getElementById('payform').action = 'payotp.php';

        $('#payform').validate({
            rules: {
                amt: {
                    required: true,
                    max: <?= $_SESSION['users']['amount_due']?>,
                    min: 1,
                },
                uiid: {
                    required: true,
                }
            },
            messages: {
                amt: {
                    required: "Please enter amount to continue",
                    max: "Please enter amount less than $" + <?= $_SESSION['users']['amount_due']?>
                },
                uiid: {
                    required: "This field is required.",
                }
            },
        });
    });

    // Attach the event listener to all buttons with the class "set_default"
    // When any "select" button is clicked, set the form action to 'set_default.php' and store the current scroll position in sessionStorage
    $(document).ready(function() {
    $('.default-account').on('click', function() {
        var accountNumber = $(this).data('account-number');
        $.post('set_default.php', { account_number: accountNumber }, function(response) {
                // Handle the response from your PHP script here
                // For example, you might want to reload the page or remove the deleted account from the table
                location.reload();
            });
       
    });
});



    // On page load, retrieve the stored scroll position and set the page's scroll position to that value
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