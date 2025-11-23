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
      <div class="main-container container">
       <div class="acx-root">
    <div class="acx-header-bar">
      <div class="acx-header-title">My Account</div>
    </div>
    <!-- Personal Information -->
    <div class="acx-section">
      <div class="acx-sec-title">Personal Information</div>
      <div class="acx-row">
        <span class="acx-label-title">Full Name</span><span class="acx-meta-value">Jane Doe</span>
      </div>
      <div class="acx-row">
        <span class="acx-label-title">Phone Number</span>
        <span class="acx-phone-value"><i class="fas fa-phone-alt acx-icon"></i>+1 (XXX) XXX-5678</span>
      </div>
      <div class="acx-row">
        <span class="acx-label-title">Location</span>
        <span class="acx-meta-value"><i class="fas fa-map-marker-alt acx-icon"></i>India</span>
      </div>
      <div class="acx-account-info">To update information, please go to settings or contact support.</div>
    </div>
    <!-- Verification Status -->
    <div class="acx-section">
      <div class="acx-sec-title">Verification Status</div>
      <div class="acx-row">
        <span class="acx-label-title"><i class="fas fa-user-check acx-icon"></i>Account Status</span>
        <span class="acx-status-value">Unverified</span>
      </div>
      <button class="acx-verify-btn">Submit for verification</button>
    </div>
    <!-- Preferences -->
    <div class="acx-section">
      <div class="acx-sec-title">Preferences</div>
      <div class="acx-row">
        <span class="acx-label-title"><i class="fas fa-bell acx-icon"></i>Notification Preferences</span>
        <span class="acx-input-switch">
          <input type="checkbox" checked id="acx-notif-pref"><span class="acx-switch-bg"></span>
          <span class="acx-slider"></span>
        </span>
      </div>
      <div class="acx-row">
        <span class="acx-label-title"><i class="fas fa-globe acx-icon"></i>Language & Region</span>
        <span class="acx-meta-value">English (US)</span>
      </div>
    </div>
    <!-- Privacy & Security -->
    <div class="acx-section">
      <div class="acx-sec-title">Privacy & Security</div>
      <div class="acx-row">
        <span class="acx-label-title"><i class="fas fa-user-secret acx-icon"></i>Anonymity</span>
        <span class="acx-meta-value">Always ON</span>
      </div>
      <div class="acx-account-info">Your votes are never publicly linked to your identity.</div>
      <div class="acx-action"><i class="fas fa-lock acx-icon"></i>Privacy Settings</div>
      <div class="acx-action"><i class="fas fa-key acx-icon"></i>Change Password</div>
      <div class="acx-action"><i class="fas fa-shield-alt acx-icon"></i>Two-Factor Authentication (2FA)</div>
    </div>
    <!-- App Management -->
    <div class="acx-section acx-app-actions">
      <div class="acx-sec-title">App Management</div>
      <div class="acx-action"><i class="fas fa-question-circle acx-icon"></i>Help & Support</div>
      <div class="acx-action"><i class="fas fa-cog acx-icon"></i>Settings</div>
    </div>
    <!-- Appearance -->
    <div class="acx-section">
      <div class="acx-sec-title">Appearance</div>
      <div class="acx-row">
        <span class="acx-label-title"><i class="fas fa-moon acx-icon"></i>Dark Mode</span>
        <span class="acx-input-switch">
          <input type="checkbox" id="acx-darkmode"><span class="acx-switch-bg"></span>
          <span class="acx-slider"></span>
        </span>
      </div>
    </div>
    <!-- Notifications -->
    <div class="acx-section">
      <div class="acx-sec-title">Notifications</div>
      <div class="acx-row">
        <span class="acx-notif-sound-label"><i class="fas fa-volume-up acx-icon"></i>Notification Sounds</span>
        <span class="acx-input-switch">
          <input type="checkbox" checked id="acx-sound"><span class="acx-switch-bg"></span>
          <span class="acx-slider"></span>
        </span>
      </div>
    </div>
    <!-- Danger Zone -->
    <div class="acx-danger-zone">
      <div class="acx-danger-title">Danger Zone</div>
      <div class="acx-danger-desc">Deleting your account is a permanent action and cannot be undone.</div>
      <button class="acx-delete-btn"><i class="fas fa-trash"></i> Delete Account</button>
    </div>
  </div>
      </div>
      <!-- main page content ends -->
      </main>
      <!-- Page ends-->
      <?php include('footer.php'); ?>
      <!-- Required jquery and libraries -->
      <script src="assets/js/newslidejs.js"></script>
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