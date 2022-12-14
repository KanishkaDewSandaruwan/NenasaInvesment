<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>


<div class="site-wrap" style="background-color: #497aab;">

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
                    <h1 class="text-white font-weight-bold">Create Account</h1>
                    <div class="custom-breadcrumbs">
                        <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Company</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Create Account</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">

            <form class="p-4 p-md-5 border rounded bg-dark text-white" method="post">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <h3 class="text-white my-5 border-bottom pb-2">Create Account - Company Details</h3>
                        <div class="form-group">
                            <label style="color: white;" for="company-name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="e.g. New York">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-tagline">Tagline (Optional)</label>
                            <input type="text" class="form-control" id="tagline" name="tagline"
                                placeholder="e.g. New York">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="job-description">Company Description (Optional)</label>
                            <textarea id="company_description" name="company_description"></textarea>
                            <script>
                            $('#company_description').summernote({
                                placeholder: 'Company Description',
                                tabsize: 2,
                                height: 120,
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['view', ['fullscreen', 'codeview', 'help']]
                                ]
                            });
                            </script>

                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website">Website (Optional)</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="https://">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-fb">Facebook Username (Optional)</label>
                            <input type="text" class="form-control" id="facbook" name="facbook"
                                placeholder="companyname">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-tw">Twitter Username (Optional)</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                placeholder="@companyname">
                        </div>
                        <div class="form-group">
                            <label style="color: white;" for="company-website-tw">Linkedin Username (Optional)</label>
                            <input type="text" class="form-control" id="lonkdin" name="lonkdin"
                                placeholder="companyname">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website">Login Email</label>
                            <input type="email" class="form-control" id="company_login_email" name="company_login_email"
                                placeholder="company@gmail.com">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-fb">Password</label>
                            <input type="password" class="form-control" id="company_password" name="company_password"
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-fb">Re-Enter Password</label>
                            <input type="password" class="form-control" id="re_company_password"
                                name="re_company_password" placeholder="Re-Enter Password">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-tw">Company Email</label>
                            <input type="email" class="form-control" id="company_admin_email" name="company_admin_email"
                                placeholder="company@gmail.com">
                        </div>
                        <div class="form-group">
                            <label style="color: white;" for="company-website-tw">Company Phone Number</label>
                            <input type="text" class="form-control" id="company_admin_phone" name="company_admin_phone"
                                placeholder="01124567896">
                        </div>

                        <div class="form-group">
                            <label style="color: white;" for="company-website-tw d-block">Upload Logo</label> <br>
                            <input class="form-control" required name="file" type="file" id="file">
                        </div>


                    </div>


                </div>
                <div class="row align-items-center mb-5">

                    <div class="col-lg-8 ml-auto">
                        <div class="row">
                            <div class="col-4">
                                <button type="button" onclick="addCompany(this.form)" class="btn btn-block btn-primary btn-md">Register Company</button>
                            </div>
                            <div class="col-4">
                                <a href="login.php" class="btn btn-block btn-primary btn-md">Login to Post Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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