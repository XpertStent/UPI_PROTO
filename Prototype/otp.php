<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './aaheader.php'; ?>
</head>

<body>
    <?php include './aanavbar.php'; ?>

    <div class="sign-body">
        <section class="sign-container container">
            <div class="container-box justify-content-center">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div class="card-body">
                                <h6 class="card-title">ENTER OTP</h6>

                                <form action="otpval.php" method="post" id="otpfprm" class="row no-gutters" style="max-width: 100%;">

                                    <div class="form-group col-lg-12">
                                        <label for="otp">Enter One-Time Password (OTP) To Proceed:</label>
                                        <input type="number" class="form-control" id="otp" name="otp"
                                            placeholder="Enter OTP" required>
                                    </div>

                                    <div class="col-md-12 text-align-start">
                                        <button type="submit" class="btn login-btn mb-4" href="otpval.php">Continue</button>
                                    </div>

                                </form>


                                <p class="already-text">Did not get the OTP?
                                    <a href="./opt.php">Resend OTP</a>
                                </p>

                                <nav class="login-card-footer-nav">
                                    <a href="">Terms of use.</a>
                                    <a href="">Privacy policy</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <?php include './aafooter.php'; ?>


    <!-- page specific js -->

    
    <script>
        $(document).ready(function () {
            $('#otpfprm').validate({
                rules: {
                    otp: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    otp: {
                        required: "Please enter the OTP to continue",
                        minlength: "Pelase enter all 6 digits"
                    }
                },
            });
        });
    </script>


</body>

</html>