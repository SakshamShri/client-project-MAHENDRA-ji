<div class="as-compare-popup-btn-uniq" id="compare-popup-btn-uniq" style="display:none;" onclick="window.location='compare.php'">
  <span class="as-cart-count-uniq" id="as-cart-count-uniq">0</span>
  <i class="fa-solid fa-scale-balanced"></i>
</div>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <ul class="nav nav-pills nav-justified">

            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    <span>
                        <i class="nav-icon bi bi-house"></i>
                        <span class="nav-text">Home</span>
                    </span>
                </a>
            </li>

            <!-- About Us -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-text">History</span>
                    </span>
                </a>
            </li>

            <!-- Center Button -->
            <li class="nav-item centerbutton">
                <div class="nav-link">
                    <img class="classlogofooter" src="assets/img/logo.png" alt="">

                    <div class="nav-menu-popover justify-content-between">
                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('signin.php');">
                            <i class="bi bi-box-arrow-in-right size-32"></i><span>Sign In</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('profile.php');">
                            <i class="bi bi-person size-32"></i><span>Profile</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('settings.php');">
                            <i class="bi bi-gear size-32"></i><span>Setting</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('signin.php');">
                            <i class="bi bi-box-arrow-right size-32"></i><span>Logout</span>
                        </button>
                    </div>
                </div>
            </li>

            <!-- Faqs -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <i class="nav-icon fa-solid fa-border-all"></i>
                        <span class="nav-text">Categories</span>
                    </span>
                </a>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a class="nav-link" href="my-account.php">
                    <span>
                        <i class="nav-icon bi bi-people"></i>
                        <span class="nav-text">Account</span>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</footer>
<!-- Footer ends -->


    <!-- PWA app install toast message -->
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10">
        <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header">
                <img src="assets/img/favicon32.png" class="rounded me-2" alt="...">
                <strong class="me-auto">Install PWA App</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        Click "Install" to install PWA app & experience indepedent.
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm" id="addtohome">Install</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/newslidejs.js"></script>