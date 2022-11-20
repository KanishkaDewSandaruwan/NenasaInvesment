<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>
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
    <section class="home-section section-hero overlay bg-image"
        style="background-image: url(<?php echo $header_src; ?>);" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold"> <?php echo $res['header_title']; ?></h1>
                        <p><?php echo $res['header_desc']; ?></p>
                    </div>
                    <form method="post" class="search-jobs-form">
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-8 mb-4 mb-lg-0">
                                <input type="text" class="form-control form-control-lg" id="key" name="key"
                                    placeholder="Job title, Company...">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <button type="button" onclick="search(this.form)"
                                    class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                                        class="icon-search icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <?php include 'pages/count_part.php'; ?>



    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2"><?php echo dataCount('job'); ?> Job Listed</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                <?php
            $job = getAllJobsAvailable();
            $count = 0;
            while ($row3 = mysqli_fetch_assoc($job)) {
                $job_id = $row3['job_id'];
                $img = $row3['job_image'];
                $img_src = "server/uploads/job/" . $img;
                if($count < 6){ ?>
                <li class="job-listing d-block d-sm-flex mt-2 pb-3 pb-sm-0 align-items-center">
                    <a href="job-single.php?job_id=<?php echo $job_id; ?>"></a>
                    <div class="job-listing-logo">
                        <img src="<?php echo $img_src; ?>" width="100%" alt="Free Website Template by Free-Template.co"
                            class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?php echo $row3['job_title']; ?></h2>
                            <strong>Closing Date : <?php echo $row3['closing_date']; ?></strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> <?php echo $row3['job_location']; ?>
                        </div>
                        <div class="job-listing-meta">
                            <?php if($row3['type'] == 0) : ?>
                            <span class="badge badge-danger">Full Time</span>
                            <?php else: ?>
                            <span class="badge badge-success">Part Time</span>
                            <?php endif; ?>
                        </div>
                        <div class="job-listing-meta">
                            <?php $getCat =  getCategoryByID($row3['cat_id']);
                                if($row4 = mysqli_fetch_assoc($getCat)) {
                             ?>
                            <span class="badge badge-success"><?php echo $row4['cat_name']; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <?php } $count++; } ?>
            </ul>

        </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="register.php" class="btn btn-warning btn-block btn-lg">Sign Up</a>
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

<script src="js/bootstrap-select.min.js"></script>

<script src="js/custom.js"></script>


</body>

</html>