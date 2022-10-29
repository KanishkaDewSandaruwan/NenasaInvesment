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
                    <h1 class="text-white font-weight-bold">Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
$getall = getAllcustomerById($_SESSION['customer']);
$row=mysqli_fetch_assoc($getall);
$customer_id = $row['customer_id']; ?>
    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                   <a href="joblist.php" class="btn btn-primary">My Appllication</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 mt-5">
                    <form action="#" class="" method="post">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-primary">Profile Settings</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text"
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","name", "customer", "customer_id")'
                                    class="form-control" id="name" placeholder="Your name"
                                    value="<?php echo $row['name']; ?>">
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text"
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","phone", "customer", "customer_id")'
                                    class="form-control" id="phone" placeholder="enter phone number"
                                    value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><input type="text"
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","address", "customer", "customer_id")'
                                    class="form-control" id="address" placeholder="enter address"
                                    value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text" disabled
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","nic", "customer", "customer_id")'
                                    id="nic" class="form-control" placeholder="Enter NIC"
                                    value="<?php echo $row['nic']; ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="email"
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","email", "customer", "customer_id")'
                                    value="<?php echo $row['email']; ?>"
                                    id="email" class="form-control" placeholder="Enter Email Address"
                                    >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <select
                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","gender", "customer", "customer_id")'
                                    id="gender <?php echo $customer_id; ?>" class='form-control norad tx12'
                                    name="gender" type='text'>
                                    <option value="1" <?php if ($row['gender']=="1") echo "selected"; ?>>
                                        Male</option>
                                    <option value="0" <?php if ($row['gender']=="0") echo "selected"; ?>>
                                        Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center experience mt-5">
                            <a class="border px-3 p-1 add-experience text-primary" id="change"
                                href="change_email.php"><i class="fa fa-lock"></i>&nbsp;Change Email</a>
                            <a href="change_password.php" class="border px-3 p-1 add-experience text-primary"><i
                                    class="fa fa-lock"></i>&nbsp;Change Password</a>
                            <button class="btn btn-primary text-white btn-md border px-3 p-1 add-experience"
                                onclick="deleteDataFromHome(<?php echo $row['customer_id']; ?>, 'customer', 'customer_id')"><i
                                    class="fa fa-trash"></i>&nbsp;Delete</button>
                        </div>


                    </form>
                </div>
                <div class="col-lg-5 ml-auto">
                <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Name</p>
                        <p class="mb-4"></i><?php echo $row['name']; ?></p>.

                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4"></i><?php echo $row['address']; ?></p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#"><?php echo $row['phone']; ?></a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-4"><a href="#"><?php echo $row['email']; ?></a></p>

                        <p class="mb-0 font-weight-bold"> NIC Number</p>
                        <p class="mb-4"><a href="#"><?php echo $row['nic']; ?></a></p>

                        <p class="mb-0 font-weight-bold">Gender</p>
                        <p class="mb-0"><a href="#"><?php if ($row['gender']=="1") echo "Male"; else echo "Female"; ?></a></p>

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