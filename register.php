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
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url(<?php echo $subheader_src; ?>);" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Register Customer</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Register Customer</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <h2 class="mb-4">Sign Up To JobBoard</h2>
                    <form action="#" class="p-4 border rounded">

                        <div class="form-floating mb-3">
                            <label for="floatingText">Full name</label>
                            <input type="text" class="form-control" id="floatingText" name="name" placeholder="jhondoe">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="name@example.com">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingText">Phone Number</label>
                            <input type="text" class="form-control" id="floatingText" name="phone"
                                placeholder="0753664078">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingText">NIC Number</label>
                            <input type="text" class="form-control" id="floatingText" name="nic"
                                placeholder="862545789V">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingText">Address</label>
                            <input type="text" class="form-control" id="floatingText" name="address"
                                placeholder="Address">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingText">Gender</label>
                            <select class="form-control" name="gender" id="gender" aria-label="Default select example">
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>

                        <div class="form-floating mb-4">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>

                        <div class="form-floating mb-4">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control" name="conf_password" id="conf_password"
                                placeholder="Password">
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="button" onclick="addCustomer(this.form)" value="Register"
                                    class="btn px-4 btn-primary text-white">
                                <a href="login.php" class="btn px-4 btn-primary text-white">Login</a>
                                <a href="create-profile.php" class="btn px-4 btn-primary text-white">Register
                                    Company</a>
                            </div>
                        </div>

                    </form>
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