<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'aaheader.php'; ?>
</head>

<body>
    <?php include 'aanavbar.php'; ?>


    <div class="section-product">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <nav aria-label="breadcrumb" class="breadcrumb-box">
                        <ol class="breadcrumb container">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Charges and Payments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuition and SSAF Payments</li>
                        </ol>
                    </nav>

                    <div class="product-details-container">
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <h3 class="title">Tuition Fees</h3>

                                <div class="price">
                                    <div class="sell-price"><b>$<?= $_SESSION['users']['amount_due']?></b></div>

                                </div>

                                <a href="#" class="text-danger">See payment pdf</a>

                                <div class="desc">
                                    <ul>
                                        <li>
                                            Pay your Statement of Account (Tax Invoice) issued by the University for
                                            your Tuition fees.
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="col-lg-6 justify-content-center">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="product-highlights">
                        <div class="row highlight-row">
                            <div class="col-sm-12">
                               
                            <div class="product-details-container pt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center ">
                                            <a href="./checkout.php" class="add-to-cart-btn">
                                                Pay Now.
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include './aafooter.php'; ?>


    <!-- page specific js -->

    <script type="text/javascript">
        $(document).ready(function () {

            $('.specsSelect').niceSelect();

        });
    </script>


</body>

</html>