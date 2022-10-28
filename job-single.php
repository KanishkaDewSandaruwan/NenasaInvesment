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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="job-listings.php" class="nav-link active">Job Listings</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
                        <li class="d-lg-none"><a href="login.php">Log In</a></li>
                    </ul>
                </nav>

                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        <a href="post-job.php"
                            class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-add"></span>Post a Job</a>
                        <?php if(isset($_SESSION['customer'])) : ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                        class="mr-2 icon-lock_outline"></span>Log Out</a>
                        <a href="profile.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-user"></span>Profile</a>
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
                    <h1 class="text-white font-weight-bold">Job Details</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Job Details</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $getallCp2 = getJobById($_REQUEST['job_id']);
    $row3 = mysqli_fetch_assoc($getallCp2);

    $job_id = $row3['job_id'];

    $img = $row3['job_image'];
    $img_src = "server/uploads/job/" . $img; 

    $imgcompany = $row3['company_logo'];
    $imgcompany_src = "server/uploads/company/" . $imgcompany; 
    
    ?>

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img width="100px" src="<?php echo $imgcompany_src; ?>" alt="Image">
                        </div>
                        <div>
                            <h2>
                                <?php echo $row3['job_title']; ?>
                            </h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>
                                    <?php echo $row3['company_name']; ?>
                                </span>
                                <span class="m-2"><span class="icon-room mr-2"></span>
                                    <?php echo $row3['job_title']; ?>
                                </span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span>
                                    <?php if($row3['type'] == 0) : ?>
                                    <span class="text-primary">Full Time</span>
                                    <?php else: ?>
                                    <span class="text-success">Part Time</span>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"><img width="100%" src="<?php echo $img_src; ?>" alt="Image"
                                class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Job
                            Description</h3>
                        <?php echo $row3['job_description']; ?>
                    </div>




                    <div class="row mb-5">

                        <div class="col-6">
                            <a href="apply.php?job_id=<?php echo $job_id; ?>" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Published on:</strong>
                                <?php echo $row3['date_updated']; ?></li>
                            <li class="mb-2"><strong class="text-black">Employment Status:</strong>
                                <?php if($row3['type'] == 0) : ?>
                                <span class="badge badge-body">Full Time</span>
                                <?php else: ?>
                                <span class="badge badge-body">Part Time</span>
                                <?php endif; ?>
                            </li>
                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?php echo $row3['closing_date']; ?></li>
                            <li class="mb-2"><strong class="text-black">Company Email:</strong> <?php echo $row3['company_admin_email']; ?></li>
                            <li class="mb-2"><strong class="text-black">Company Phone:</strong> <?php echo $row3['company_admin_phone']; ?></li>
                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?php echo $row3['closing_date']; ?></li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                        <div class="px-3">
                            <a href="<?php echo $row3['website']; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-web"></span></a>
                            <a href="<?php echo $row3['facbook']; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="<?php echo $row3['twitter']; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="<?php echo $row3['lonkdin']; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
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

<script src="js/bootstrap-select.min.js"></script>

<script src="js/custom.js"></script>


</body>

</html>