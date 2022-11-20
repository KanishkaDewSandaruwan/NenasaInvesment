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
                    <h1 class="text-white font-weight-bold">Apply Job List</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Apply Job List</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">   
                <?php
                $job = applyListJob_ID($_REQUEST['job_id']);
                $row3 = mysqli_fetch_assoc($job);
                if(mysqli_num_rows($job) > 0) :
                echo mysqli_num_rows($job);?> Users Applyied</h2>
                <h2><?php echo $row3['job_title']; ?></h2>
                <strong>Closing Date : <?php echo $row3['closing_date']; ?></strong><br>
                <?php endif; ?>
                </div>
            </div>
 

            <ul class="job-listings mb-5">
                <?php

                $job = applyListJob_ID($_REQUEST['job_id']);
                $count =  mysqli_num_rows($job);

                if( $count > 0){

                while ($row3 = mysqli_fetch_assoc($job)) {
                    $apply_id = $row3['apply_id'];
                    $customer_id = $row3['customer_id'];
                    $img = $row3['job_image'];
                    $img_src = "server/uploads/job/" . $img;?>

                    
                    <li class="job-listing d-block d-sm-flex mt-2 pb-3 pb-sm-0 align-items-center">

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">                               
                                <p class="mt-2"><?php echo $row3['name']; ?><br/><?php echo $row3['email']; ?><br/><?php echo $row3['address']; ?> <a href="profile.php?customer_id=<?php echo $row3['customer_id']; ?>"> See More</a> <br>
                                
                                </p>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <a href="admin/download.php?apply_id=<?php echo $row3['apply_id'] ?>">Download Resume</a>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            </div>
                            
                        </div>
                    </li>
                    <?php }  }else{?>
                        <h1>No Data Found</h1>
                    <?php }?>
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
<script src="js/quill.min.js"></script>


<script src="js/bootstrap-select.min.js"></script>

<script src="js/custom.js"></script>



</body>

</html>