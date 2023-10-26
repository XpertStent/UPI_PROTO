<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

  <?php include 'aaheader.php'; ?>


<body>

  <?php include './aanavbar.php'; ?>
  <section class="section-category-list">
    <div class="container bg-light p-4">
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-main" type="submit">Search</button>
      </form>
    </div>
  </section>

 
  <br><br>
  <section class="section-category-list">
    <div class="container p-0">
      <div class="row m-0">
        <div class="col-6">
          
          <div class="card h-100">
            <div class="card-body">
              <h4 class="v2-section-title justify-content-start ps-0"><span class="ps-0">Your Due Payments </span>
              </h4>
              <div class="list-group list-group-flush ">
              <?php if ($_SESSION['users']['amount_due']>0): ?>
	 	      
                <a href="SSAF.php" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1">Tution Fees</p>
                    <small class="text-danger "> Due </small>
                  </div>
                </a>
                <?php else: ?>
                <?php endif; ?>
                <a href="#.php" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1">Parking Permit Payment Renewal</p>
                    <small class="text-muted">in 20 days</small>
                  </div>
                </a>

              </div>
            </div>
          </div>

        </div>

        <div class="col-6">
          
          <div class="card">
            <div class="card-body">
              <h4 class="v2-section-title justify-content-start ps-0"><span class="ps-0">Account Overview 
                </span>
              </h4>
              <p class="card-text"> Current Amount Due as at <b id="dateTime"></b><b>.</b> <h4>$<?= $_SESSION['users']['amount_due']; ?></h4></p>
           
            </div>
          </div>

        </div>

        <div class="section-category-list">
          
          
              <h4 class="v2-section-title justify-content-start pt-5 pb-4 ps-0"><span class="ps-0">Bank Details 
                </span>
              </h4>
              <a href="bank.php" class="list-group-item d-flex justify-content-between align-items-center">
              Edit Bank Details
            </a></p>
              
        

        </div>

      </div>
    </div>
  </section>

  <section class="section-category-list">

    <div class="container">
      <h4 class="v2-section-title justify-content-start pt-5 pb-4 ps-0"><span class="ps-1">CHARGES AND PAYMENTS</span></h4>

      <div class="row justify-content-start">


        <div class="col-4">
          <div class="list-group list-group-flush pay-type-card">
            <h4 class=" p-3">Tuition and Payments:</h4>
            <a href="SSAF.php" class="list-group-item d-flex justify-content-between align-items-center">
              Statement of Account - Tuition and SSAF Payments
              <span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" title="You have one payment due"><i
                  class="fa fa-user"></i></span>
            </a>
          </div>
        </div>

        <div class="col-4">
          <div class="list-group list-group-flush pay-type-card">
            <h4 class=" p-3">Proof of Enrolment</h4>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Proof of Enrolment Letter
            </a>
          </div>
        </div>

        <div class="col-4">
          <div class="list-group list-group-flush pay-type-card">
            <h4 class=" p-3">International Student Services:</h4>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              International Student Letters
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              International Student Tuition Fees (commencing students)
            </a>
          </div>
        </div>

        <div class="col-4">
          <div class="list-group list-group-flush pay-type-card">
            <h4 class=" p-3">Authentication and Verification</h4>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Authentication of documents for DFAT
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Award Verification Service
            </a>
          </div>
        </div>

        <div class="col-4">
          <div class="list-group list-group-flush pay-type-card">
            <h4 class=" p-3">Fees and Fines</h4>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Exam Electronic Device Fine
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Late application fee
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Non Attendance Fee
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Exam Supervision Payment
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
              Smoking Penalty
            </a>
          </div>
        </div>


      </div>

    </div>

  </section>


  <!-- blog -->
  <section class="section-blog-list mt-5">
    <div class="container">
      <h4 class="v2-section-title justify-content-start ps-1"><span class="ps-1">Related Posts</span></h4>

      <div class="row g-4 row-cols-1 row-cols-md-4 row-cols-lg-3 m-0">

        <div class="col">
          <div class="card blog-card">
            <img
              src="https://www.utep.edu/extendeduniversity/utepconnect/blog/august-2018/ways-to-afford-your-return-to-school.jpg"
              class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="blog-card-title">Scholarships and Discounts: Maximizing Savings in Education</h5>
              <p class="blog-card-text">Learn how our payment portal empowers students to explore various
                scholarship opportunities and discounts, making higher education more accessible and
                affordable. Find out how you can make the most of these financial aids.</p>
              <a href="#" class="btn btn-black-outline stretched-link">Read More</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blog-card">
            <img src="https://img.staticmb.com/mbcontent/images/uploads/2023/7/Exploring-10-90-payment-plan-option.jpg"
              class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="blog-card-title">The Future of Financial Aid: Exploring Payment Plans</h5>
              <p class="blog-card-text">In this blog post, we explore the flexible payment plans offered
                through our university's payment portal. We discuss the benefits of spreading tuition
                costs over time and how it eases the financial burden on students and their families.</p>
              <a href="#" class="btn btn-black-outline stretched-link">Read More</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blog-card">
            <img src="https://thehabershamschool.org/wp-content/uploads/2023/01/Tuition-1024x576.png"
              class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="blog-card-title">Streamlining Tuition Payments: A Digital Revolution</h5>
              <p class="blog-card-text">Discover how our university's payment portal is revolutionizing
                the way students pay their tuition fees. We delve into the user-friendly features and
                enhanced security measures that make the payment process seamless and stress-free.</p>
              <a href="#" class="btn btn-black-outline stretched-link">Read More</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>


  <?php include './aafooter.php'; ?>


 <script>
        function formatDate(date) {
            let day = date.getDate();
            let month = date.getMonth() + 1; // months are zero-based
            let year = date.getFullYear().toString().substr(-2); // get last two digits of year

            // Add leading zeros
            day = day < 10 ? '0' + day : day;
            month = month < 10 ? '0' + month : month;

            return day + '/' + month + '/' + year;
        }

        document.getElementById('dateTime').innerText = formatDate(new Date());
</script>



</body>
</html>
