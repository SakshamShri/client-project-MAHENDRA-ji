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
         <!-- Font Awesome for icons -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
         <div class="multi-step-wizard-uniq">
            <!-- 1. Campaign Details -->
            <section class="wizard-step-uniq" id="step-1">
               <div class="wizard-header-uniq">
                  <span>Campaign Details</span>
                  <span class="wizard-verified-uniq"><i class="fa-solid fa-circle-check"></i> Verified</span>
               </div>
               <div class="wizard-body-uniq">
                  <div class="wizard-label-uniq">Poll Type</div>
                  <div class="wizard-polltype-row-uniq">
                     <div class="wizard-polltype-uniq wizard-pt-active-uniq" id="pt-open" onclick="setPollType('open')">
                        <div class="wizard-pt-icon-uniq"><i class="fa-solid fa-globe"></i></div>
                        <div>
                           <div class="wizard-pt-title-uniq">Open Campaign</div>
                           <div class="wizard-pt-desc-uniq">Anyone with the link can vote.</div>
                        </div>
                     </div>
                     <div class="wizard-polltype-uniq" id="pt-invite" onclick="setPollType('invite')">
                        <div class="wizard-pt-icon-uniq"><i class="fa-solid fa-lock"></i></div>
                        <div>
                           <div class="wizard-pt-title-uniq">Invitee-Only Campaign</div>
                           <div class="wizard-pt-desc-uniq">Only invited participants can vote.</div>
                        </div>
                     </div>
                  </div>
                  <div  id="inviteeonlycampaign" style="display: none;">
                     <label class="wizard-input-label-uniq">Campaign Title</label>
                     <input type="text" class="wizard-input-uniq" placeholder="Enter poll title" />
                     <label class="wizard-input-label-uniq">Description</label>
                     <textarea class="wizard-textarea-uniq" placeholder="Add details or context (optional)"></textarea>
                     <label class="wizard-input-label-uniq">Campaign Options</label>
                     <div id="wizard-options-wrap" class="wizard-options-rows-uniq">
                        <div class="wizard-option-row-uniq">
                           <input class="wizard-input-uniq" value="Option 1" />
                           <button class="wizard-remove-opt-uniq" onclick="removeOption(this)"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="wizard-option-row-uniq">
                           <input class="wizard-input-uniq" value="Option 2" />
                           <button class="wizard-remove-opt-uniq" onclick="removeOption(this)"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                     </div>
                     <button class="wizard-addopt-btn-uniq" type="button" onclick="addOption()"><i class="fa-solid fa-plus"></i> Add Option</button>
                  </div>
               </div>
               <div class="wizard-camp-wrap-uniq" id="opencampaign">
                  <div class="wizard-camp-section-uniq">
                     <div class="wizard-camp-header-uniq">Campaign Details</div>
                     <label>
                     <span>Campaign Title</span>
                     <input class="wizard-input-uniq" maxlength="140" placeholder="Enter your campaign question" />
                     <span class="wizard-camp-count-uniq">0/140 characters</span>
                     </label>
                     <label>
                     <span>Description (Optional)</span>
                     <textarea class="wizard-textarea-uniq" maxlength="500" placeholder="Add more details about your campaign"></textarea>
                     <span class="wizard-camp-count-uniq">0/500 characters</span>
                     </label>
                     <div id="wizard-options-wrap" class="wizard-options-wrap-uniq">
                        <div class="wizard-option-row-uniq">
                           <input class="wizard-input-uniq" maxlength="50" placeholder="Option 1" />
                           <span class="wizard-camp-count-uniq">0/50</span>
                        </div>
                        <div class="wizard-option-row-uniq">
                           <input class="wizard-input-uniq" maxlength="50" placeholder="Option 2" />
                           <span class="wizard-camp-count-uniq">0/50</span>
                        </div>
                     </div>
                     <button type="button" class="wizard-add-opt-btn-uniq" onclick="addOption()">
                     <i class="fa-solid fa-plus"></i> Add More Options
                     </button>
                     <label>
                        <span>Duration</span>
                        <select class="wizard-select-uniq">
                           <option>7 Days</option>
                           <option>1 Day</option>
                           <option>3 Days</option>
                           <option>14 Days</option>
                        </select>
                     </label>
                  </div>
                  <div class="wizard-camp-section-uniq">
                     <div class="wizard-camp-header2-uniq">Open Campaign Settings</div>
                     <div class="wizard-set-row-uniq">
                        <span>Show live results to voters <i class="fa-solid fa-circle-info"></i></span>
                        <label class="wizard-switch-uniq">
                        <input type="checkbox" checked />
                        <span class="wizard-slider-uniq"></span>
                        </label>
                     </div>
                     <div class="wizard-set-row-uniq">
                        <span>Allow multiple responses <i class="fa-solid fa-circle-info"></i></span>
                        <label class="wizard-switch-uniq">
                        <input type="checkbox"/>
                        <span class="wizard-slider-uniq"></span>
                        </label>
                     </div>
                     <div class="wizard-set-row-uniq">
                        <span>Lock campaign after deadline <i class="fa-solid fa-circle-info"></i></span>
                        <label class="wizard-switch-uniq">
                        <input type="checkbox" checked/>
                        <span class="wizard-slider-uniq"></span>
                        </label>
                     </div>
                  </div>
                  <div class="wizard-camp-section-uniq">
                     <div class="wizard-camp-header2-uniq">Campaign Preview</div>
                     <div class="wizard-camp-preview-uniq">
                        <strong>Campaign Summary</strong>
                        <div>Campaign Type: Open</div>
                        <div>Title: No title entered</div>
                        <div>No options added</div>
                        <div>Duration: 7 Days</div>
                        <div>Settings: Live Results, Lock After Deadline</div>
                     </div>
                  </div>
                  <div class="wizard-camp-actions-uniq">
                     <button class="wizard-draft-btn-uniq">Save as Draft</button>
                     <button class="wizard-create-btn-uniq">Create Poll</button>
                  </div>
               </div>
               <button class="wizard-next-btn-uniq" onclick="nextStep(2)" id="inviteeonlycampaignbutton" style="display: none;">Next</button>
            </section>
            <!-- 2. Participant Invitation -->
            <section class="wizard-step-uniq" id="step-2" style="display:none;">
               <div class="wizard-header-uniq">
                  <span>Participant Invitation</span>
                  <span class="wizard-verified-uniq"><i class="fa-solid fa-circle-check"></i> Verified</span>
               </div>
               <div class="wizard-body-uniq">
                  <div class="wizard-label-main-uniq">Participant Invitation</div>
                  <div class="wizard-desc-uniq">Invite people to request access to vote.</div>
                  <div class="wizard-small-lbl-uniq">Invitation Title</div>
                  <div class="wizard-titlebox-uniq">Exclusive Access Poll Invitation</div>
                  <div class="wizard-small-lbl-uniq" style="margin-top:11px;">Create Verification Fields</div>
                  <div class="wizard-desc-uniq" style="margin-bottom:8px;">Ask participants to submit identity fields for approval.</div>
                  <div id="wizard-verif-wrap" class="wizard-verifgroup-uniq">
                     <div class="wizard-verif-row-uniq">Full Name <button class="wizard-xbtn-uniq" onclick="removeVerif(this)"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-verif-row-uniq">Phone Number <button class="wizard-xbtn-uniq" onclick="removeVerif(this)"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-verif-row-uniq">Email Address <button class="wizard-xbtn-uniq" onclick="removeVerif(this)"><i class="fa-solid fa-xmark"></i></button></div>
                  </div>
                  <button class="wizard-addverif-btn-uniq" onclick="addVerif()">+ Add Verification Field</button>
                  <div class="wizard-small-lbl-uniq" style="margin-top:11px;">Invitation Link</div>
                  <div class="wizard-link-wrap-uniq">
                     <input type="text" class="wizard-link-input-uniq" value="https://pollwiz.app/invite/gh2j3k45m" readonly />
                     <div class="wizard-link-btncluster-uniq">
                        <button class="wizard-linkbtn-uniq"><i class="fa-regular fa-copy"></i> Copy Link</button>
                        <button class="wizard-linkbtn-uniq"><i class="fa-solid fa-share-from-square"></i> Share</button>
                     </div>
                  </div>
               </div>
               <div class="wizard-bottom-row-uniq">
                  <button type="button" class="wizard-back-btn-uniq wizard-main-btn-uniq" onclick="prevStep()">
                    <i class="fa-solid fa-arrow-left"></i> Back
                  </button>
                  <button class="wizard-next-btn-uniq" onclick="nextStep(3)">Send Invitations & Continue</button>
               </div>
            </section>
            <!-- 3. Approve Participants -->
            <section class="wizard-step-uniq" id="step-3" style="display:none;">
               <div class="wizard-header-uniq">
                  <span>Approve Participants</span>
                  <span class="wizard-verified-uniq"><i class="fa-solid fa-circle-check"></i> Verified</span>
               </div>
               <div class="wizard-body-uniq">
                  <div class="wizard-label-main-uniq">Approve Participants</div>
                  <div class="wizard-desc-uniq">Review participant requests and allow only trusted users to join voting.</div>
                  <input class="wizard-input-uniq" type="search" placeholder="Search participants..." style="margin-bottom:12px;">
                  <div style="color:#979abb; font-size:13px;margin-bottom:8px;">Total Requests: 5</div>
                  <div id="wizard-participants-list">
                     <div class="wizard-appr-row-uniq"><img src="https://i.pravatar.cc/150?img=32"><span>Alice Smith</span> <span class="wizard-statusbadge-uniq">Pending</span><button class="wizard-ptick-uniq"><i class="fa-solid fa-check"></i></button><button class="wizard-xbtn-uniq"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-appr-row-uniq"><img src="https://i.pravatar.cc/150?img=5"><span>Bob Johnson</span> <span class="wizard-statusbadge-uniq">Pending</span><button class="wizard-ptick-uniq"><i class="fa-solid fa-check"></i></button><button class="wizard-xbtn-uniq"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-appr-row-uniq"><img src="https://i.pravatar.cc/150?img=11"><span>Charlie Brown</span> <span class="wizard-statusbadge-uniq">Pending</span><button class="wizard-ptick-uniq"><i class="fa-solid fa-check"></i></button><button class="wizard-xbtn-uniq"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-appr-row-uniq"><img src="https://i.pravatar.cc/150?img=8"><span>Diana Prince</span> <span class="wizard-statusbadge-uniq">Pending</span><button class="wizard-ptick-uniq"><i class="fa-solid fa-check"></i></button><button class="wizard-xbtn-uniq"><i class="fa-solid fa-xmark"></i></button></div>
                     <div class="wizard-appr-row-uniq"><img src="https://i.pravatar.cc/150?img=41"><span>Eve Adams</span> <span class="wizard-statusbadge-uniq">Pending</span><button class="wizard-ptick-uniq"><i class="fa-solid fa-check"></i></button><button class="wizard-xbtn-uniq"><i class="fa-solid fa-xmark"></i></button></div>
                  </div>
                  <div style="margin-top:18px;display:flex;align-items:center;gap:10px;">
                     <label style="color:#989ace;font-size:13px;cursor:pointer;">Auto-approve participants who match verification fields</label>
                     <label class="wizard-switch-uniq"><input type="checkbox"><span class="slider"></span></label>
                  </div>
               </div>
               <div class="wizard-bottom-row-uniq">
                  <button type="button" class="wizard-back-btn-uniq wizard-main-btn-uniq" onclick="prevStep()">
                    <i class="fa-solid fa-arrow-left"></i> Back
                  </button>
                  <button class="wizard-next-btn-uniq" onclick="nextStep(4)">Next</button>
               </div>
            </section>
            <!-- 4. Schedule & Launch -->
            <section class="wizard-step-uniq" id="step-4" style="display:none;">
               <div class="pwiz-schedule-launch">
                  <div class="pwiz-sl-header">
                     <div class="pwiz-sl-title">Schedule & Launch</div>
                     <div class="pwiz-sl-sub">Choose when this campaign should start and end.</div>
                  </div>
                  <!-- Start/End Date Section -->
                  <div class="pwiz-sl-box">
                     <label class="pwiz-sl-label">
                        Start Date & Time
                        <div class="pwiz-sl-field">
                           <i class="fa-regular fa-calendar pwiz-sl-icon"></i>
                           <input type="datetime-local" class="pwiz-sl-input">
                        </div>
                     </label>
                     <label class="pwiz-sl-label">
                        End Date & Time
                        <div class="pwiz-sl-field">
                           <i class="fa-regular fa-clock pwiz-sl-icon"></i>
                           <input type="datetime-local" class="pwiz-sl-input">
                        </div>
                     </label>
                  </div>
                  <!-- Campaign Settings -->
                  <div class="pwiz-sl-box">
                     <div class="pwiz-sl-setting">
                        <div class="pwiz-sl-setting-title">Notify Participants When Campaign Starts</div>
                        <div class="pwiz-sl-setting-desc">Send a notification to approved participants when the campaign goes live.</div>
                        <label class="pwiz-switch">
                        <input type="checkbox" checked>
                        <span class="pwiz-slider"></span>
                        </label>
                     </div>
                     <div class="pwiz-sl-setting">
                        <div class="pwiz-sl-setting-title">Auto-start when minimum participants approved</div>
                        <div class="pwiz-sl-setting-desc">Voting will automatically start once the minimum number of participants are approved.</div>
                        <label class="pwiz-switch">
                        <input type="checkbox">
                        <span class="pwiz-slider"></span>
                        </label>
                     </div>
                  </div>
                  <!-- Campaign Preview -->
                  <div class="pwiz-sl-box">
                     <div class="pwiz-sl-preview-heading">Campaign Preview</div>
                     <div class="pwiz-sl-preview">
                        <div class="pwiz-sl-preview-title">Team Project Feedback <span class="pwiz-sl-tag">Invitee-Only Campaign</span></div>
                        <div class="pwiz-sl-preview-meta">
                           <ul>
                              <li>5 Options</li>
                              <li>Duration: 1 Day</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="wizard-bottom-row-uniq">
                  <button type="button" class="wizard-back-btn-uniq wizard-main-btn-uniq" onclick="prevStep()">
                    <i class="fa-solid fa-arrow-left"></i> Back
                  </button>
                  <button class="wizard-main-btn-uniq" onclick="nextStep(5)">Start Poll</button>
               </div>
            </section>
            <!-- 5. No Participants Yet -->
            <section class="wizard-step-uniq" id="step-5" style="display:none;">
               <div class="wizard-body-uniq" style="padding-top:38px;">
                  <div class="wizard-label-main-uniq">No Participants Yet</div>
                  <div class="wizard-desc-uniq">Looks like no one has requested to join your invite-only poll yet. Share the invitation link to get started!</div>
               </div>
               <div class="wizard-bottom-row-uniq">
                  <button class="wizard-next-btn-uniq" onclick="nextStep(6)">Next</button>
               </div>
            </section>
            <!-- 6. Campaign is Live -->
            <section class="wizard-step-uniq" id="step-6" style="display:none;">
               <div class="wizard-body-uniq" style="padding-top:38px;text-align:center;">
                  <div class="wizard-live-icon-uniq"><i class="fa-solid fa-circle-check"></i></div>
                  <div class="wizard-live-title-uniq">Your Campaign is Live</div>
                  <div class="wizard-desc-uniq">Congratulations! Your campaign is now active and visible to participants.</div>
                  <button class="wizard-main-btn-uniq" style="margin-top:40px;" onclick="window.location='campaign.php'">View Votings</button>
               </div>
            </section>
         </div>
      </div>
      <!-- main page content ends -->
      </main>
      <!-- Page ends-->
      <?php include('footer.php'); ?>
      <!-- Required jquery and libraries -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/campaign.js"></script>
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