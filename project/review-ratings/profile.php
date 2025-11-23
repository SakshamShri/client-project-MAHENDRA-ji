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
         <!-- Cover -->
         <div class="s2-cover"></div>
         <div class="container text-center">
            <!-- Profile Image -->
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" class="s2-profile-pic fade-in" />
            <!-- Name + Verified -->
            <h3 class="fw-bold mt-2 fade-in">Sarah Chen <span class="s2-verify">✔ Verified</span></h3>
            <!-- Role Tag -->
            <div class="s2-role fade-in">Environmental Advocate</div>
            <!-- Subtitle -->
            <p class="text-muted fade-in">Author & Public Speaker</p>
            <!-- STATS 1 Row -->
            <div class="row g-3 mt-3 fade-in">
               <div class="col-6 col-md-3 offset-md-3">
                  <div class="s2-box">
                     <i class="fa-solid fa-chart-line s2-icon"></i>
                     <p class="text-muted small">PSI Score</p>
                     <h4 class="fw-bold">8.7</h4>
                  </div>
               </div>
               <div class="col-6 col-md-3">
                  <div class="s2-box">
                     <i class="fa-solid fa-wave-square s2-icon"></i>
                     <p class="text-muted small">SMPS Score</p>
                     <h4 class="fw-bold">64/100</h4>
                  </div>
               </div>
            </div>
            <!-- STATS 2 Row -->
            <div class="row g-3 mt-2 fade-in">
               <div class="col-4">
                  <div class="s2-box">
                     <i class="fa-solid fa-users s2-icon"></i>
                     <p class="text-muted small">Followers</p>
                     <h5>1.2M</h5>
                  </div>
               </div>
               <div class="col-4">
                  <div class="s2-box">
                     <i class="fa-solid fa-chart-line s2-icon"></i>
                     <p class="text-muted small">30-day Trend</p>
                     <h5>+0.3</h5>
                  </div>
               </div>
               <div class="col-4">
                  <div class="s2-box">
                     <i class="fa-solid fa-users s2-icon"></i>
                     <p class="text-muted small">Followers</p>
                     <h5>1.2M</h5>
                  </div>
               </div>
            </div>
            <!-- Vote + Follow Buttons -->
            <div class="row mt-4 mb-5 fade-in">
               <div class="col-12 mb-2">
                  <button class="s2-vote" onclick="window.location='my-vote.php'"><i class="fa-solid fa-thumbs-up"></i> Vote</button>
               </div>
               <div class="col-12 mb-2">
                  <button class="s2-follow" onclick="window.location='following.php'"><i class="fa-regular fa-user"></i> Follow</button>
               </div>
               <div class="col-12">
                  <button class="s2-follow bg-black" onclick="window.location='campaign.php'"><i class="fa-solid fa-square-poll-vertical"></i> Create New Poll</button>
               </div>
            </div>
         </div>
         <div class="ovw-container">
            <div class="vs-filter-tabs-box">
               <button class="vs-filter-btn active" data-target="vs-overview-box">Overview</button>
               <button class="vs-filter-btn" data-target="vs-about-box">About</button>
               <button class="vs-filter-btn" data-target="vs-media-box">Media</button>
               <button class="vs-filter-btn" data-target="vs-social-box">Social Accounts</button>
               <button class="vs-filter-btn" data-target="vs-achievements-box">Achievements</button>
               <button class="vs-filter-btn" data-target="vs-announcements-box">Announcements</button>
               <button class="vs-filter-btn" data-target="vs-editprofile-box">Manage Profile</button>
            </div>
            <!-- ABOUT CARD -->
            <div class="vs-tab-pane" id="vs-overview-box" style="display:block;">
               <div class="ovw-card">
                  <div class="ovw-title">About Sarah</div>
                  <div class="ovw-about-text">
                     Sarah is a leading advocate for environmental sustainability, a renowned author, and an inspiring public speaker. Her work focuses on raising awareness about climate change and promoting actionable solutions for a greener future.
                  </div>
                  <div class="ovw-readmore">Read more</div>
               </div>
               <!-- PSI SNAPSHOT -->
               <div class="ovw-card">
                  <div class="ovw-title">PSI Snapshot</div>
                  <div class="ovw-psi-top">
                     <div class="ovw-psi-score-circle">
                        <div class="ovw-psi-score-text">8.7</div>
                        <div class="ovw-psi-sub">/10</div>
                     </div>
                     <div class="ovw-psi-list">
                        <p class="ovw-green">✔ Rank #50</p>
                        <p class="ovw-green">✔ Top 10% globally</p>
                        <p class="ovw-red">⬇ Moved down 2 spots</p>
                     </div>
                  </div>
                  <div class="ovw-chart-box">
                     <canvas id="ovwChart"></canvas>
                  </div>
                  <div class="ovw-bottom-stats">
                     <div class="ovw-stat-item">
                        <div class="ovw-stat-title">Top 5%</div>
                        <div style="font-size:12px;color:#777;">Overall Rank</div>
                     </div>
                     <div class="ovw-stat-item">
                        <div class="ovw-stat-title">Rank #1</div>
                        <div style="font-size:12px;color:#777;">Sports Cat.</div>
                     </div>
                     <div class="ovw-stat-item">
                        <div class="ovw-stat-title">+0.3</div>
                        <div style="font-size:12px;color:#777;">30-Day Change</div>
                     </div>
                  </div>
               </div>
               <!-- SMPS BOX -->
               <!-- <div class="ovw-card ovw-smps-card">
                  <h3>Social Media Popularity Score</h3>
                  <div class="ovw-smps-score">SMPS: 64/100</div>
                  <div class="crypto-card">
                     <div class="header">
                        <span class="logo">All</span>
                        <span class="open">Business →</span>
                     </div>
                     <fieldset class="crypto-switch">
                        <input type="radio" id="bitcoin" name="crypto" checked />
                        <label for="bitcoin"> User </label>
                        <input type="radio" id="ethereum" name="crypto" />
                        <label for="ethereum"> Business </label>
                        <input type="radio" id="solana" name="crypto" />
                        <label for="solana"> Categories </label>
                        <input type="radio" id="tether" name="crypto" />
                        <label for="tether"> accounts </label>
                        <div class="slider"></div>
                     </fieldset>
                     <canvas id="cryptoChart" height="120"></canvas>
                     </div>
                     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <div class="ovw-smps-small">Reliability: 34%</div>
                  <div class="ovw-smps-small">(Based on: Active Platforms: 2 - Adjusted Avg. Platforms: 4)</div>
                  <div class="ovw-smps-icons">
                     <img src="https://cdn-icons-png.flaticon.com/512/1384/1384031.png">
                     <img src="https://cdn-icons-png.flaticon.com/512/1384/1384017.png">
                     <img src="https://cdn-icons-png.flaticon.com/512/1384/1384012.png">
                     <img src="https://cdn-icons-png.flaticon.com/512/3256/3256013.png">
                  </div>
                  </div> -->
               <div class="smps-card-uniq">
                  <div class="smps-score-header-uniq">
                     <span class="smps-meta-uniq">SOCIAL MEDIA POPULARITY SCORE</span>
                     <span class="smps-score-change-uniq"><i class="fas fa-arrow-down"></i> 0.3</span>
                  </div>
                  <div class="smps-score-main-uniq">SMPS: <span class="smps-score-num-uniq">64/100</span></div>
                  <div class="smps-icons-row-uniq">
                     <span class="smps-icon-uniq"><i class="fas fa-globe"></i> <i class="fas fa-wave-square fa-lg jdjhjsdf" style="color:#38a1f7; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fab fa-youtube"></i> <i class="fas fa-minus fa-lg jdjhjsdf" style="color:#cd7373; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fab fa-instagram"></i> <i class="fas fa-wave-square fa-lg jdjhjsdf" style="color:#38a1f7; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fab fa-facebook-f"></i> <i class="fas fa-minus fa-lg jdjhjsdf" style="color:#cd7373; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fab fa-x-twitter"></i> <i class="fas fa-minus fa-lg jdjhjsdf" style="color:#cd7373; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fab fa-linkedin-in"></i> <i class="fas fa-minus fa-lg jdjhjsdf" style="color:#cd7373; margin:0 10px;"></i></span>
                     <span class="smps-icon-uniq"><i class="fas fa-chart-line"></i> <i class="fas fa-minus fa-lg jdjhjsdf" style="color:#cd7373; margin:0 10px;"></i></span>
                  </div>
                  <div class="smps-reliability-row-uniq">
                     <div class="smps-reliability-pie-uniq">
                        <svg viewBox="0 0 36 36">
                           <circle class="reli-chart-bg-uniq" cx="18" cy="18" r="16" />
                           <path class="reli-chart-fg-uniq"
                              d="M18 2
                              a 16 16 0 0 1 0 32"
                              />
                        </svg>
                        <span class="smps-reli-perc-uniq">34%</span>
                     </div>
                     <span class="smps-reli-label-uniq">Reliability</span>
                     <span class="smps-last-update-uniq">Last Updated: 24.11.25</span>
                  </div>
                  <div class="crypto-card">
                     <fieldset class="crypto-switch">
                        <div class="smps-radio-wrap-uniq">
                           <input type="radio" id="bitcoin" name="crypto" checked />
                           <label for="bitcoin">1D</label>
                           <input type="radio" id="ethereum" name="crypto" />
                           <label for="ethereum">1M</label>
                           <input type="radio" id="solana" name="crypto" />
                           <label for="solana">3M</label>
                           <input type="radio" id="tether" name="crypto" />
                           <label for="tether">6M</label>
                        </div>
                        <!-- <div class="slider"></div> -->
                     </fieldset>
                     <canvas id="cryptoChart" height="120"></canvas>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <div class="smps-metrics-row-uniq">
                     <div class="smps-metric-uniq">
                        <span class="smps-metric-main-uniq">Top 5%</span>
                        <span class="smps-metric-sub-uniq">Overall Rank</span>
                     </div>
                     <div class="smps-metric-uniq">
                        <span class="smps-metric-main-uniq">#1</span>
                        <span class="smps-metric-sub-uniq">Sports Category Rank</span>
                     </div>
                     <div class="smps-metric-uniq">
                        <span class="smps-metric-main-uniq">+0.3</span>
                        <span class="smps-metric-sub-uniq">30-Day Change</span>
                     </div>
                  </div>
               </div>
               <!-- KEY HIGHLIGHTS -->
               <div class="ovw-title">Key Highlights</div>
               <div class="ovw-key-box">
                  <div class="ovw-key-card">
                     <div class="ovw-key-value">1.2M</div>
                     <div class="ovw-key-label">Followers</div>
                  </div>
                  <div class="ovw-key-card">
                     <div class="ovw-key-value">High</div>
                     <div class="ovw-key-label">Activity Level</div>
                  </div>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-about-box">
               <div class="profile-container-unik">
                  <div class="profile-section-unik">
                     <h2 class="profile-title-unik">Personal & Brand Details</h2>
                     <div class="profile-row-unik">
                        <p class="label-unik">Category</p>
                        <p class="value-unik">Public Figure, Activist</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Tagline</p>
                        <p class="value-unik">Advocating for sustainable living and community empowerment.</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Bio</p>
                        <p class="value-unik">
                           A passionate advocate dedicated to fostering environmental consciousness and social justice.
                           With a background in community organizing and public policy, I strive to inspire action and
                           build resilient communities worldwide.
                        </p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Interests</p>
                        <p class="value-unik">
                           Environmental conservation, renewable energy, social equity, urban gardening, digital advocacy.
                        </p>
                     </div>
                  </div>
                  <div class="profile-section-unik">
                     <h2 class="profile-title-unik">Location & Work Areas</h2>
                     <div class="profile-row-unik">
                        <p class="label-unik">Base Location</p>
                        <p class="value-unik">New York City, USA</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Work Regions</p>
                        <p class="value-unik">North America, Europe, Southeast Asia</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Travel Frequency</p>
                        <p class="value-unik">Frequent (4–6 international trips/year)</p>
                     </div>
                  </div>
                  <div class="profile-section-unik">
                     <h2 class="profile-title-unik">Professional Information</h2>
                     <div class="profile-row-unik">
                        <p class="label-unik">Industry</p>
                        <p class="value-unik">Non-profit, Public Advocacy, Sustainability</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Specializations</p>
                        <p class="value-unik">
                           Environmental policy, community development, stakeholder engagement,
                           public speaking, campaign management.
                        </p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Experience</p>
                        <p class="value-unik">12+ years in non-profit leadership and strategic partnerships.</p>
                     </div>
                     <div class="profile-row-unik">
                        <p class="label-unik">Current Role</p>
                        <p class="value-unik">Executive Director, Green Earth Alliance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-media-box">
               <div class="media-scroll-wrapper-unik">
                  <div class="media-grid-unik">
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=1" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=2" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=3" class="media-img-unik" alt="">
                        <p class="media-title-unik">Podcast Recording</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=4" class="media-img-unik" alt="">
                        <p class="media-title-unik">Keynote Event<br>Highlights</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=5" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2022</div>
                        <img src="https://picsum.photos/400/300?random=6" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik media-more-card-unik">
                        <button class="media-more-btn-unik" onclick="window.location='media.php'">View More</button>
                     </div>
                  </div>
               </div>
               <div class="media-scroll-wrapper-unik">
                  <div class="media-grid-unik">
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=1" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=2" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=3" class="media-img-unik" alt="">
                        <p class="media-title-unik">Podcast Recording</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=4" class="media-img-unik" alt="">
                        <p class="media-title-unik">Keynote Event<br>Highlights</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=5" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2023</div>
                        <img src="https://picsum.photos/400/300?random=6" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik media-more-card-unik">
                        <button class="media-more-btn-unik" onclick="window.location='media.php'">View More</button>
                     </div>
                  </div>
               </div>
               <div class="media-scroll-wrapper-unik">
                  <div class="media-grid-unik">
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=1" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=2" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=3" class="media-img-unik" alt="">
                        <p class="media-title-unik">Podcast Recording</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=4" class="media-img-unik" alt="">
                        <p class="media-title-unik">Keynote Event<br>Highlights</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=5" class="media-img-unik" alt="">
                        <p class="media-title-unik">Behind the Scenes:<br>New Project</p>
                     </div>
                     <div class="media-card-unik">
                        <div class="media-year-unik">2024</div>
                        <img src="https://picsum.photos/400/300?random=6" class="media-img-unik" alt="">
                        <p class="media-title-unik">Workshop Day<br>Success</p>
                     </div>
                     <div class="media-card-unik media-more-card-unik">
                        <button class="media-more-btn-unik" onclick="window.location='media.php'">View More</button>
                     </div>
                  </div>
               </div>
               <!-- Your Media Section -->
               <div class="media-scroll-wrapper-unik">
                  <div class="media-grid-unik">
                     <div class="media-card-unik">
                        <iframe class="newiframes222 open-video" 
                           src="https://www.youtube.com/embed/VCPGMjCW0is"
                           allowfullscreen></iframe>
                     </div>
                     <div class="media-card-unik">
                        <iframe class="newiframes222 open-video" 
                           src="https://www.youtube.com/embed/QsY8fnvMn6c?si=Dk47UWHH5WrNwBH-"
                           allowfullscreen></iframe>
                     </div>
                     <div class="media-card-unik">
                        <iframe class="newiframes222 open-video" 
                           src="https://www.youtube.com/embed/VCPGMjCW0is"
                           allowfullscreen></iframe>
                     </div>
                     <div class="media-card-unik">
                        <iframe class="newiframes222 open-video" 
                           src="https://www.youtube.com/embed/QsY8fnvMn6c?si=Dk47UWHH5WrNwBH-"
                           allowfullscreen></iframe>
                     </div>
                     <div class="media-card-unik media-more-card-unik">
                        <button class="media-more-btn-unik" onclick="window.location='media.php'">View More</button>
                     </div>
                  </div>
               </div>
               <!-- Popup -->
               <div class="video-popup-overlay-unik" id="videoPopupOverlay"></div>
               <div class="video-popup-box-unik" id="videoPopupBox">
                  <span class="video-close-unik" id="closeVideoPopup">✖</span>
                  <iframe id="popupVideoFrame" class="video-popup-iframe-unik"
                     src=""
                     allowfullscreen></iframe>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-social-box">
               <div class="social-list-unik">
                  <div class="social-item-unik">
                     <div class="social-left-unik">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" class="social-icon-unik">
                        <div>
                           <p class="social-name-unik">Instagram</p>
                           <p class="social-status-unik connected-unik">Connected</p>
                        </div>
                     </div>
                     <span class="arrow-unik">›</span>
                  </div>
                  <div class="social-item-unik">
                     <div class="social-left-unik">
                        <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" class="social-icon-unik">
                        <div>
                           <p class="social-name-unik">YouTube</p>
                           <p class="social-status-unik notconnected-unik">Not Connected</p>
                        </div>
                     </div>
                     <span class="arrow-unik">›</span>
                  </div>
                  <div class="social-item-unik">
                     <div class="social-left-unik">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" class="social-icon-unik">
                        <div>
                           <p class="social-name-unik">Facebook</p>
                           <p class="social-status-unik connected-unik">Connected</p>
                        </div>
                     </div>
                     <span class="arrow-unik">›</span>
                  </div>
                  <div class="social-item-unik">
                     <div class="social-left-unik">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" class="social-icon-unik">
                        <div>
                           <p class="social-name-unik">Twitter (X)</p>
                           <p class="social-status-unik connected-unik">Connected</p>
                        </div>
                     </div>
                     <span class="arrow-unik">›</span>
                  </div>
                  <div class="social-item-unik">
                     <div class="social-left-unik">
                        <img src="https://cdn-icons-png.flaticon.com/512/3536/3536505.png" class="social-icon-unik">
                        <div>
                           <p class="social-name-unik">LinkedIn</p>
                           <p class="social-status-unik notconnected-unik">Not Connected</p>
                        </div>
                     </div>
                     <span class="arrow-unik">›</span>
                  </div>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-achievements-box">
               <div class="award-container-unique">
                  <div class="award-card-unique">
                     <div class="award-icon-unique">🏅</div>
                     <div class="award-content-unique">
                        <h3 class="award-title-unique">National Literary Award</h3>
                        <span class="award-year-unique">2023</span>
                        <p class="award-desc-unique">
                           Recognized for outstanding contribution to contemporary literature with the novel 'Echoes of Tomorrow'.
                        </p>
                     </div>
                  </div>
                  <div class="award-card-unique">
                     <div class="award-icon-unique">📘</div>
                     <div class="award-content-unique">
                        <h3 class="award-title-unique">Pinnacle Research Grant</h3>
                        <span class="award-year-unique">2022</span>
                        <p class="award-desc-unique">
                           Awarded a prestigious grant for groundbreaking research in quantum computing, advancing theoretical frameworks.
                        </p>
                     </div>
                  </div>
                  <div class="award-card-unique">
                     <div class="award-icon-unique">🌐</div>
                     <div class="award-content-unique">
                        <h3 class="award-title-unique">Global Innovation Challenge Winner</h3>
                        <span class="award-year-unique">2021</span>
                        <p class="award-desc-unique">
                           Led a team to victory in the annual Global Innovation Challenge, presenting a sustainable energy solution.
                        </p>
                     </div>
                  </div>
                  <div class="award-card-unique">
                     <div class="award-icon-unique">⭐</div>
                     <div class="award-content-unique">
                        <h3 class="award-title-unique">Distinguished Service Medal</h3>
                        <span class="award-year-unique">2020</span>
                        <p class="award-desc-unique">
                           Honored for prolonged and exceptional service in community development and advocacy programs.
                        </p>
                     </div>
                  </div>
                  <div class="award-card-unique">
                     <div class="award-icon-unique">🚀</div>
                     <div class="award-content-unique">
                        <h3 class="award-title-unique">Emerging Leader Award</h3>
                        <span class="award-year-unique">2019</span>
                        <p class="award-desc-unique">
                           Acknowledged as a rising star in the tech industry for pioneering advancements in AI ethics.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-announcements-box">
               <div class="updates-wrapper-unique">
                  <!-- Card 1 -->
                  <div class="update-card-unique">
                     <h3 class="update-title-unique">Upcoming Live Q&A Session!</h3>
                     <p class="update-text-unique">
                        Join me next Friday, June 26th at 7 PM EST for a live Q&A session online! I will be discussing exciting new projects and answering your burning questions. Set your reminders!
                     </p>
                     <div class="update-meta-unique">
                        <span class="update-date-unique">June 20, 2024 • 10:30 AM</span>
                        <span class="update-share-icon-unique">🔗</span>
                     </div>
                  </div>
                  <!-- Card 2 -->
                  <div class="update-card-unique">
                     <h3 class="update-title-unique">New Podcast Episode Available Now!</h3>
                     <img src="https://images.unsplash.com/photo-1588702547919-26089e690ecc?auto=format&fit=crop&w=800&q=80" 
                        class="update-image-unique" alt="podcast">
                     <p class="update-text-unique">
                        Excited to share the latest episode of 'The Innovator’s Mindset,' where we dive deep into sustainable tech solutions. Tune in on your favorite podcast platform!
                     </p>
                     <div class="update-meta-unique">
                        <span class="update-date-unique">June 19, 2024 • 08:30 AM</span>
                        <span class="update-share-icon-unique">🔗</span>
                     </div>
                  </div>
                  <!-- Card 3 -->
                  <div class="update-card-unique">
                     <h3 class="update-title-unique">Charity Initiative Update: Project Green Earth</h3>
                     <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80" 
                        class="update-image-unique" alt="tree">
                     <p class="update-text-unique">
                        Our Project Green Earth initiative has successfully funded 500 new tree plantings this month! Thank you to everyone who contributed. Let's keep the momentum going!
                     </p>
                     <div class="update-meta-unique">
                        <span class="update-date-unique">June 18, 2024 • 01:15 PM</span>
                        <span class="update-share-icon-unique">🔗</span>
                     </div>
                  </div>
                  <!-- Card 4 -->
                  <div class="update-card-unique">
                     <h3 class="update-title-unique">Celebrating a Milestone: 1 Million Followers!</h3>
                     <p class="update-text-unique">
                        I'm incredibly grateful to reach 1 million followers across all my platforms! Your support means the world to me. Here's to many more exciting journeys together!
                     </p>
                     <div class="update-meta-unique">
                        <span class="update-date-unique">June 16, 2024 • 08:00 PM</span>
                        <span class="update-share-icon-unique">🔗</span>
                     </div>
                  </div>
                  <!-- Card 5 -->
                  <div class="update-card-unique">
                     <h3 class="update-title-unique">Exclusive Behind-the-Scenes Look!</h3>
                     <p class="update-text-unique">
                        Get a sneak peek into the making of my upcoming documentary series. Exclusive photos and videos are now live in the “Media” section of my profile!
                     </p>
                     <div class="update-meta-unique">
                        <span class="update-date-unique">June 15, 2024 • 11:55 AM</span>
                        <span class="update-share-icon-unique">🔗</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="vs-tab-pane" id="vs-editprofile-box">
               <div class="settings-wrapper-unique">
                  <!-- Item 1 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">✏️</div>
                        <div>
                           <h3 class="settings-title-unique">Edit Profile</h3>
                           <p class="settings-desc-unique">Update your personal details, bio, and contact information</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <div class="settings-item-unique glowing-border" id="openPollPopup">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">📊</div>
                        <div>
                           <h3 class="settings-title-unique">Create New Poll</h3>
                           <p class="settings-desc-unique">Create an open or invite-only poll (Verified users only)</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique"><i class="fa-solid fa-lock"></i></span>
                  </div>
                  <!-- Popup -->
                  <div class="poll-popup-overlay-unique" id="pollPopupOverlay"></div>
                  <div class="poll-popup-box-unique" id="pollPopupBox">
                     <h2 class="poll-popup-title-unique">Create New Poll</h2>
                     <p class="poll-popup-text-unique">
                        Choose whether your poll is open to everyone or invite-only.  
                        Verified users can participate.
                     </p>
                     <button class="poll-verify-btn-unique">Verify Now ✔️</button>
                     <button class="poll-close-btn-unique" id="closePollPopup">Close</button>
                  </div>
                  <!-- Item 2 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">🖼️</div>
                        <div>
                           <h3 class="settings-title-unique">Manage Media</h3>
                           <p class="settings-desc-unique">Add, remove, or organize your photos and videos</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <!-- Item 3 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">👥</div>
                        <div>
                           <h3 class="settings-title-unique">Connect Social Accounts</h3>
                           <p class="settings-desc-unique">Link or unlink your social media profiles</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <!-- Item 4 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">🏆</div>
                        <div>
                           <h3 class="settings-title-unique">Add Achievement</h3>
                           <p class="settings-desc-unique">Showcase your accomplishments and milestones</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <!-- Item 5 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">📢</div>
                        <div>
                           <h3 class="settings-title-unique">Add Announcement</h3>
                           <p class="settings-desc-unique">Share important news and updates with your audience</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <!-- Item 6 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">✔️</div>
                        <div>
                           <h3 class="settings-title-unique">Submit for Verification</h3>
                           <p class="settings-desc-unique">Verify your profile for enhanced credibility</p>
                        </div>
                     </div>
                     <span class="badge-pending-unique">Pending</span>
                     <span class="settings-arrow-unique">›</span>
                  </div>
                  <!-- Item 7 -->
                  <div class="settings-item-unique">
                     <div class="settings-left-unique">
                        <div class="settings-icon-unique">📊</div>
                        <div>
                           <h3 class="settings-title-unique">Insights</h3>
                           <p class="settings-desc-unique">View your profile performance and audience analytics</p>
                        </div>
                     </div>
                     <span class="settings-arrow-unique">›</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- main page content ends -->
      </main>
      <!-- Page ends-->
      <?php include('footer.php'); ?>
      <!-- Required jquery and libraries -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/nextjs.js"></script>
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