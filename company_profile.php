<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>
<?php include 'pages/company.php'; ?>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="index.php">Nenasa Invesment</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="index.php" class="nav-link active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="job-listings.php">Job Listings</a></li>
                        <li><a href="contact.php">Contact</a></li>

                        <?php if(isset($_SESSION['company']) && isset($_SESSION['customer'])) : ?>
                        <li><a href="company_profile.php">Company</a></li>
                        <li><a href="profile.php">User</a></li>
                        <?php endif; ?>
                        <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
                        <li class="d-lg-none"><a href="login.php">Log In</a></li>
                    </ul>
                </nav>

                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        <a href="post-job.php"
                            class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-add"></span>Post a Job</a>

                        <?php if(isset($_SESSION['company']) && isset($_SESSION['customer'])) : ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>


                        <?php elseif(isset($_SESSION['customer'])) : ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>
                        <a href="profile.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-user"></span>User Profile</a>


                        <?php elseif(isset($_SESSION['company'])) : ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>
                        <a href="company_profile.php"
                            class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-user"></span>Company Profile</a>


                        <?php else : ?>
                        <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log In</a>
                        <a href="register.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Register</a>
                        <?php endif; ?>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                            class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url(<?php echo $subheader_src; ?>);" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Company Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Company Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
$getall = getCompanyById($_SESSION['company']);
$row=mysqli_fetch_assoc($getall);


$img = $row['company_logo'];
$img_src = "server/uploads/company/" . $img; 

$company_id = $row['company_id']; ?>
    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 mt-5">
                <a href="company_joblist.php" class="btn btn-primary btn-lg mt-2">Job List</a>
                <a href="company_joblist.php" class="btn btn-primary btn-lg mt-2">Job Apply List</a>
                <a href="admin/getSales_report.php" class="btn btn-primary btn-lg mt-2">Today Apply Report</a>
                <a href="admin/getSales_report_month.php" class="btn btn-primary btn-lg mt-2">Monthly Apply Report</a>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold"><a href="edit_company_profile.php">Edit Profile</a></p>
                        <img width="300px" src="<?php echo $img_src; ?>" alt="">
                        <p class="mb-0 font-weight-bold mt-3">Company Name</p>
                        <p class="mb-4"></i><?php echo $com['company_name']; ?></p>.

                        <p class="mb-0 font-weight-bold">Your Tagline</p>
                        <p class="mb-4"></i><?php echo $com['tagline']; ?></p>

                        <p class="mb-0 font-weight-bold">Company Description</p>
                        <p class="mb-4"><?php echo $com['company_description']; ?></p>

                        <p class="mb-0 font-weight-bold">Admin Email Address</p>
                        <p class="mb-4"><?php echo $com['company_admin_email']; ?></p>

                        <p class="mb-0 font-weight-bold"> Admin Phone Number</p>
                        <p class="mb-4"><?php echo $com['company_admin_phone']; ?></p>
                        <p class="mb-0 font-weight-bold"> Website</p>
                        <p class="mb-4"><a href="<?php echo $com['website']; ?>"><?php echo $com['website']; ?></a></p>
                        <p class="mb-0 font-weight-bold"> Facebook</p>
                        <p class="mb-4"><a href="<?php echo $com['facbook']; ?>"><?php echo $com['facbook']; ?></a></p>
                        <p class="mb-0 font-weight-bold"> Twitter</p>
                        <p class="mb-4"><a href="<?php echo $com['twitter']; ?>"><?php echo $com['twitter']; ?></a></p>
                        <p class="mb-0 font-weight-bold"> Linkdin</p>
                        <p class="mb-4"><a href="<?php echo $com['lonkdin']; ?>"><?php echo $com['lonkdin']; ?></a></p>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'pages/footer.php'; ?>

</div>

<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/stickyfill.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>

<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/quill.min.js"></script>


<script src="js/bootstrap-select.min.js"></script>

<script src="js/custom.js"></script>



</body>

</html>