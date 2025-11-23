<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="generator" content="">
      <?php include('title.php'); ?>
      <!-- Google fonts-->
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
      <!-- bootstrap icons -->
      <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">
      <!-- swiper carousel css -->
      <link rel="stylesheet" href="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">
      <!-- style css for this template -->
      <link href="assets/css/style.css" rel="stylesheet" id="style">
   </head>
   <body class="body-scroll" data-page="index">
      <?php include('header.php'); ?>
      <!-- main page content -->
      <div class="main-container container pt-0">
          <div class="hsx-root">
    <div class="hsx-header-bar">
      <div class="hsx-header-title">
        <button class="hsx-header-back" onclick='window.location="index.php"'><i class="fas fa-chevron-left"></i></button>
        Help & Support
      </div>
    </div>

    <div class="hsx-section-title">Frequently Asked Questions</div>
    <div class="hsx-faq-list">
      <div class="hsx-faq-item">
        <div class="hsx-faq-ques">
          How does the PSI (Profile Sentiment Index) work?
          <span class="hsx-faq-arrow"><i class="fas fa-chevron-down"></i></span>
        </div>
        <div class="hsx-faq-ans">
          PSI is a metric that combines feedback and data analytics to reflect overall profile sentiment.
        </div>
      </div>
      <div class="hsx-faq-item">
        <div class="hsx-faq-ques">
          What is SMPS (Social Media Presence Score)?
          <span class="hsx-faq-arrow"><i class="fas fa-chevron-down"></i></span>
        </div>
        <div class="hsx-faq-ans">
          SMPS quantifies your activity and influence across social platforms.
        </div>
      </div>
      <div class="hsx-faq-item">
        <div class="hsx-faq-ques">
          How can I ensure my votes are anonymous?
          <span class="hsx-faq-arrow"><i class="fas fa-chevron-down"></i></span>
        </div>
        <div class="hsx-faq-ans">
          All voting is anonymous and no personal data is linked with votes.
        </div>
      </div>
      <div class="hsx-faq-item">
        <div class="hsx-faq-ques">
          How do I submit for profile verification?
          <span class="hsx-faq-arrow"><i class="fas fa-chevron-down"></i></span>
        </div>
        <div class="hsx-faq-ans">
          Submit documents and request verification through your profile settings.
        </div>
      </div>
      <div class="hsx-faq-item">
        <div class="hsx-faq-ques">
          Can I change my vote after it has been cast?
          <span class="hsx-faq-arrow"><i class="fas fa-chevron-down"></i></span>
        </div>
        <div class="hsx-faq-ans">
          Votes are final for the set period; you can vote again after that period expires.
        </div>
      </div>
    </div>

    <div class="hsx-contact-card">
      <div class="hsx-contact-title">Contact Support</div>
      <div class="hsx-contact-desc">Reach out to our team for personalized assistance.</div>
      <div class="hsx-contact-row">
        <span class="hsx-contact-icon"><i class="fas fa-envelope"></i></span>
        <span>Email Support</span>
        <span class="hsx-contact-email">support@voter.com</span>
        <span class="hsx-contact-arrow"><i class="fas fa-chevron-right"></i></span>
      </div>
      <div class="hsx-contact-row">
        <span class="hsx-contact-icon"><i class="fas fa-comment-alt"></i></span>
        <span>Live Chat</span>
        <span class="hsx-contact-arrow"><i class="fas fa-chevron-right"></i></span>
      </div>
      <div class="hsx-contact-row">
        <span class="hsx-contact-icon"><i class="fas fa-snowflake"></i></span>
        <span>Visit Help Center</span>
        <span class="hsx-contact-arrow"><i class="fas fa-chevron-right"></i></span>
      </div>
    </div>

    <div class="hsx-bug-card">
      <div class="hsx-bug-title">Report a Bug</div>
      <div class="hsx-bug-desc">Found an issue? Please help us by describing it below.</div>
      <form>
        <div class="hsx-form-row">
          <label class="hsx-bug-label">Subject</label>
          <input type="text" class="hsx-bug-input" placeholder="Brief title of the bug" />
        </div>
        <div class="hsx-form-row">
          <label class="hsx-bug-label">Description</label>
          <textarea class="hsx-bug-textarea" placeholder="Provide detailed steps to reproduce, what happened, and what you expected."></textarea>
        </div>
        <button class="hsx-submit-btn" type="submit">Submit Report</button>
      </form>
    </div>
  </div>
  <script>
    // FAQ accordion JS
    document.querySelectorAll('.hsx-faq-item').forEach((item) => {
      item.addEventListener('click', function() {
        this.classList.toggle('hsx-active');
      });
    });
  </script>
      </div>
      <!-- main page content ends -->
      </main>
      <!-- Page ends-->
      <?php include('footer.php'); ?>
      <!-- Required jquery and libraries -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/jquery-3.3.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>
      <!-- cookie js -->
      <script src="assets/js/jquery.cookie.js"></script>
      <!-- Customized jquery file  -->
      <script src="assets/js/main.js"></script>
      <script src="assets/js/color-scheme.js"></script>
      <!-- PWA app service registration and works -->
      <script src="assets/js/pwa-services.js"></script>
      <!-- Chart js script -->
      <script src="assets/vendor/chart-js-3.3.1/chart.min.js"></script>
      <!-- Progress circle js script -->
      <script src="assets/vendor/progressbar-js/progressbar.min.js"></script>
      <!-- swiper js script -->
      <script src="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>
      <!-- page level custom script -->
      <script src="assets/js/app.js"></script>
   </body>
</html>