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
        <div class="svx-root">
    <div class="svx-header-bar">
      <div class="svx-header-title">Saved</div>
      <div class="svx-tabs">
        <button class="svx-tab-btn" data-tab="Profiles">Profiles</button>
        <button class="svx-tab-btn svx-active" data-tab="Polls">Polls</button>
        <button class="svx-tab-btn" data-tab="Comparisons">Comparisons</button>
      </div>
    </div>
    <div class="svx-cards-group">
      <!-- Example cards (add more data-tab types as needed) -->
      <div class="svx-card svx-visible" data-tab="Polls">
        <div class="svx-card-content">
          <div class="svx-card-title">AI Ethics Policy Update <span class="svx-poll-label">Poll</span></div>
          <div class="svx-card-meta">250 votes, ends in 2h</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
      <div class="svx-card svx-visible" data-tab="Polls">
        <div class="svx-card-content">
          <div class="svx-card-title">Local City Council Vote <span class="svx-poll-label">Poll</span></div>
          <div class="svx-card-meta">150 votes, closed</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
      <div class="svx-card svx-visible" data-tab="Polls">
        <div class="svx-card-content">
          <div class="svx-card-title">Global Climate Action <span class="svx-poll-label">Poll</span></div>
          <div class="svx-card-meta">320 votes, active</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
      <div class="svx-card svx-visible" data-tab="Polls">
        <div class="svx-card-content">
          <div class="svx-card-title">Public Transit Expansion <span class="svx-poll-label">Poll</span></div>
          <div class="svx-card-meta">80 votes, upcoming</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
      <!-- Example placeholder for other tab -->
      <div class="svx-card" data-tab="Profiles">
        <div class="svx-card-content">
          <div class="svx-card-title">Demo Profile Example</div>
          <div class="svx-card-meta">Lorem ipsum for profile</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
      <div class="svx-card" data-tab="Comparisons">
        <div class="svx-card-content">
          <div class="svx-card-title">Comparison Example</div>
          <div class="svx-card-meta">Sample comparison data</div>
        </div>
        <div class="svx-card-action">
          <button class="svx-open-btn">Open</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Tab filter
    document.querySelectorAll('.svx-tab-btn').forEach(btn => {
      btn.onclick = function() {
        document.querySelectorAll('.svx-tab-btn').forEach(e => e.classList.remove('svx-active'));
        btn.classList.add('svx-active');
        let tab = btn.getAttribute('data-tab');
        document.querySelectorAll('.svx-card').forEach(card => {
          card.classList.remove('svx-visible');
          let tabs = card.getAttribute('data-tab').split(' ');
          if (tabs.includes(tab)) card.classList.add('svx-visible');
        });
      }
    });
    // On load, default to Polls
    window.onload = () => {
      document.querySelector('.svx-tab-btn.svx-active').click();
    };
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