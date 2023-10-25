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
    <?php include './aanavbar.php'; ?> 



    <div class="sign-body">
        <section class="sign-container container">
            <div class="container-box">
                <div class="row">
                    <div class="col-lg-5 bg">
                        <h6 class="card-title">Welcome to <br>
                            <!-- <span>WSU UPI</span> -->
                            <img class="logo" src="/images/upi.png" alt="">
                        </h6>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-box">
                            <div class="card-body">
                                <h6 class="card-title">Login</h6>

                                <form id="signinform" action="userval.php" method="post" class="row no-gutters" style="max-width: 100%;">

                                    <div class="form-group col-lg-12">
                                        <label for="regemail">Student ID / Student Email</label>
                                        <input type="text" name="regemail" id="regemail" class="form-control"
                                            placeholder="Student ID / Student Email" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>

                                    
                                    <div class="col-md-12 text-align-start">
                                        <button type="submit" class="btn login-btn mb-4">Login</button>
                                    </div>

                                </form>

                                <a href="./forgotpassword.php" class="forgot-password-link">Forgot password?</a>
                                </div>
                        </div>
                    </div> 

                    <?php include './aafooter.php'; ?>


             
                    

                    
    <script>
        $(document).ready(function () {
            $('#signinform').validate({
                rules: {
                    regemail: {
                        required: function (element) {
                          return $(regemail).val().length === 0 ? true : false;
                        },
                        minlength: 5
                    },
                    password: {
                        required: function (element) {
                            return $(password).val().length === 0 ? true : false;
                        }
                    },
                    
                },
            });
        });
    </script>


    <?php if (isset($error_message)): ?>
    <p class="error"><?= $error_message ?></p>
<?php endif; ?>
</body>

</html>