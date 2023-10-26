


<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include("update_data.php");?>

<nav class="navbar navbar-expand-sm navbvld">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://www.westernsydney.edu.au/">
            <img src="./images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-chevron-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="upper">

                	<div class="user-nav-btn">
                    	<a href="./bank.php" data-bs-toggle="tooltip">
                        <i class="fa fa-user">
                            <span class="bg-success text-white d-none ">1</span>
                        </i>
           
	   <?php if (isset($_SESSION['users']['username'])): ?>
                    <a href="dashboard.php" data-bs-toggle="tooltip"><p>Welcome, <?= $_SESSION['users']['username'] ?>!</p></a>
           <?php else: ?>
                    <a href="index.php" data-bs-toggle="tooltip"><p>Sign In</p></a>
           <?php endif; ?>

                    </a>
		<?php if (isset($_SESSION['users']['username'])): ?>
                    <a href="index.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Log out" class="ms-4">
                       <p>Log out</p>
                    </a>
		<?php endif; ?>
                </div>
            </div>
        

        </div>
    </div>
</nav>
