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
        <div class="plx-root">
    <div class="plx-header-bar">
      <div class="plx-header-title">Polls</div>
    </div>
    <div class="plx-tabs">
      <button class="plx-tab-btn plx-active" data-tab="Active">Active</button>
      <button class="plx-tab-btn" data-tab="Upcoming">Upcoming</button>
      <button class="plx-tab-btn" data-tab="Closed">Closed</button>
      <button class="plx-tab-btn" data-tab="MyInvitations">My Invitations</button>
    </div>
    <div class="plx-cards-group">
      <!-- ACTIVE -->
      <div class="plx-card plx-visible" data-tab="Active">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Which political party best represents your values?
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-active">Active</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by VOTER Insights<br>
          <span><i class="far fa-calendar-alt"></i>Started: 2 hours ago - Ends: 10/26 18:00</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn">Vote Now</button>
        </div>
      </div>
      <div class="plx-card plx-visible" data-tab="Active Upcoming">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Rating of recent local council decisions
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-soon">Ending Soon</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by Local News Polls<br>
          <span><i class="far fa-calendar-alt"></i>Started: 1 day ago - Ends: 2 hours</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn">Vote Now</button>
        </div>
      </div>
      <div class="plx-card plx-visible" data-tab="Active">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Perception of current economic policies
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-active">Active</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by National Survey<br>
          <span><i class="far fa-calendar-alt"></i>Started: 3 days ago - Ends: 1 week</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn">Vote Now</button>
        </div>
      </div>
      <!-- UPCOMING -->
      <div class="plx-card" data-tab="Upcoming">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Next Gen Transportation Proposal
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-active">Active</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by CityWorks<br>
          <span><i class="far fa-calendar-alt"></i>Starts: Tomorrow - Ends: in 1 week</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn">Vote Now</button>
        </div>
      </div>
      <!-- CLOSED -->
      <div class="plx-card" data-tab="Closed">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Water Usage Regulations Review
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-active" style="color:#e87993;">Closed</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by City Admin<br>
          <span><i class="far fa-calendar-alt"></i>Started: 1 week ago - Ended: 1 day ago</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn" style="background:#e5e7ef;color:#9891d2;cursor:default;">Closed</button>
        </div>
      </div>
      <!-- MY INVITATIONS (example) -->
      <div class="plx-card" data-tab="MyInvitations">
        <div class="plx-card-top">
          <div class="plx-card-title">
            Invited: Neighborhood Budget Allocation
            <span class="plx-badge">Open</span>
            <span class="plx-badge-status plx-status-active">Invited</span>
          </div>
        </div>
        <div class="plx-card-meta">Hosted by Town Hall<br>
          <span><i class="far fa-calendar-alt"></i>Starts: in 3 days</span>
        </div>
        <div class="plx-action-bar">
          <button class="plx-vote-btn">Vote Now</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.querySelectorAll('.plx-tab-btn').forEach(btn => {
      btn.onclick = function() {
        document.querySelectorAll('.plx-tab-btn').forEach(e => e.classList.remove('plx-active'));
        btn.classList.add('plx-active');
        let tab = btn.getAttribute('data-tab');
        document.querySelectorAll('.plx-card').forEach(card => {
          card.classList.remove('plx-visible');
          let types = card.getAttribute('data-tab').split(' ');
          if (types.includes(tab)) card.classList.add('plx-visible');
        });
      }
    });
    window.onload = () => {
      document.querySelector('.plx-tab-btn.plx-active').click();
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