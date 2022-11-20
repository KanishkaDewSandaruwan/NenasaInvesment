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

                        <?php if (isset($_SESSION['company']) && isset($_SESSION['customer'])): ?>
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

                        <?php if (isset($_SESSION['company']) && isset($_SESSION['customer'])): ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>


                        <?php elseif (isset($_SESSION['customer'])): ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>
                        <a href="profile.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-user"></span>User Profile</a>


                        <?php elseif (isset($_SESSION['company'])): ?>
                        <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log Out</a>
                        <a href="company_profile.php"
                            class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-user"></span>Company Profile</a>


                        <?php else: ?>
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
                    <h1 class="text-white font-weight-bold">Post A Job</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Post a Job</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">

            <form class="p-4 p-md-5 border rounded" method="post">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                      
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="btn btn-block btn-light btn-md"><span
                                        class="icon-open_in_new mr-2"></span>Preview</a>
                            </div>
                            <div class="col-6">
                                <button type="button" onclick="addJob(this.form)"
                                    class="btn btn-block btn-primary btn-md">Save Job</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-website-tw d-block">Upload Featured Image</label> <br>
                                    <input class="form-control" required name="file" type="file" id="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-title">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title"
                                        placeholder="Enter Title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-location">Location</label>
                                    <input type="text" class="form-control" id="job_location" name="job_location"
                                        placeholder="e.g. New York">

                                    <input type="hidden" class="form-control" id="company_id" name="company_id"
                                        value="<?php echo $_SESSION['company']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-region">Job Region</label>
                                    <select class="selectpicker border rounded" id="type" name="type"
                                        data-style="btn-black" data-width="100%" data-live-search="true"
                                        title="Select Region">
                                        <option value="0">Full Time</option>
                                        <option value="1">Part Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-region">Category</label>
                                    <select id="cat_id" class='form-control norad tx12' name="cat_id" type='text'>
                                        <?php $getall = getAllCategory();
                                while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['cat_id'] ?>">
                                            <?php echo $row['cat_name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-region">Job Publish</label>
                                    <select class="selectpicker border rounded" id="job_active" name="job_active"
                                        data-style="btn-black" data-width="100%" title="Select Region">
                                        <option value="0">Active</option>
                                        <option value="1">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-title">Closing Date</label>
                                    <input type="date" class="form-control" id="closing_date" name="closing_date"
                                        placeholder="Closing Date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job-description">Job Description</label>
                                    <textarea id="job_description" name="job_description"></textarea>
                                    <script>
                                    $('#job_description').summernote({
                                        placeholder: 'Job Description',
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
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row align-items-center mb-5">

                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="btn btn-block btn-light btn-md"><span
                                        class="icon-open_in_new mr-2"></span>Preview</a>
                            </div>
                            <div class="col-6">
                                <button type="button" onclick="addJob(this.form)"
                                    class="btn btn-block btn-primary btn-md">Save Job</button>
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