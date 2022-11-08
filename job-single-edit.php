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
                    <h1 class="text-white font-weight-bold">Change Job</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Change Job</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
$getall = jobListJob_ID($_REQUEST['job_id']);
$row=mysqli_fetch_assoc($getall);
$img = $row['job_image'];
$img_src = "server/uploads/job/" . $img; 
$job_id = $row['job_id']; ?>

    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="single_job_apply_list.php?job_id=<?php echo $job_id; ?>" class="btn btn-primary">Apply List</a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="company_joblist.php" class="btn btn-primary">Job List</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 mt-5">
                    <form action="#" class="" method="post">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-primary">Company Profile Settings</h4>
                        </div>

                        <div class="form-group">
                            <label for="job-title">Job Title</label>
                            <input type="text" class="form-control" id="job_title" name="job_title"
                                onchange='updateDataFromHome(this, "<?php echo $job_id; ?>","job_title", "job", "job_id")'
                                value="<?php echo $row['job_title']; ?>" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="job-location">Location</label>
                            <input type="text" class="form-control" id="job_location" name="job_location"
                                onchange='updateDataFromHome(this, "<?php echo $job_id; ?>","job_location", "job", "job_id")'
                                value="<?php echo $row['job_location']; ?>" placeholder="e.g. New York">
                        </div>

                        <div class="form-group">
                            <label for="job-region">Job Region</label>
                            <select
                                onchange="updateDataFromHome(this, '<?php echo $job_id; ?>', 'type', 'job', 'job_id');"
                                id="type <?php echo $job_id; ?>" class='form-control norad tx12'
                                name="type" type='text'>
                                <option value="0" <?php if ($row['type'] == "0" ) echo "selected" ; ?>>
                                    Full Time
                                </option>
                                <option value="1" <?php if ($row['type'] == "1" ) echo "selected" ; ?>>
                                    Part Time
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job-region">Job Publish</label>
                            <select
                                onchange="updateDataFromHome(this, '<?php echo $job_id; ?>', 'job_active', 'job', 'job_id');"
                                id="job_active <?php echo $job_id; ?>" class='form-control norad tx12'
                                name="job_active" type='text'>
                                <option value="0" <?php if ($row['job_active'] == "0" ) echo "selected" ; ?>>
                                    Active
                                </option>
                                <option value="1" <?php if ($row['job_active'] == "1" ) echo "selected" ; ?>>
                                    Deactive
                                </option>
                            </select>
                        </div>




                        <div class="form-group">
                            <label for="job-title">Closing Date</label>
                            <input type="date" class="form-control" id="closing_date" name="closing_date"
                                onchange='updateDataFromHome(this, "<?php echo $job_id; ?>","closing_date", "job", "job_id")'
                                value="<?php echo $row['closing_date']; ?>" placeholder="Closing Date">
                        </div>

                        <div class="form-group mt-5">
                            <form enctype="multipart/form-data" method="POST">
                                <div class="mb-3">
                                    <textarea id="job_description"
                                        name="job_description"><?php echo $row['job_description']; ?></textarea>

                                    <input class="form-control" value="<?php echo $row['job_id'] ?>" name="id"
                                        type="hidden" id="id">
                                    <input class="form-control" value="job" name="table" type="hidden" id="table">
                                    <input class="form-control" value="job_id" name="id_field" type="hidden"
                                        id="id_field">
                                    <input class="form-control" value="job_description" name="field" type="hidden"
                                        id="field">
                                    <button type="button" onclick="changeDescriptionJobs(this.form)"
                                        class="btn btn-primary">Update Description</button>
                                </div>
                            </form>
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

                        <div class="form-group">
                            <label for="company-website-tw d-block">Upload Logo</label> <br>
                            <div class="form-group mt-3">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="mb-3" style="background-color: black;">
                                        <input class="form-control" value="<?php echo $row['job_id'] ?>" name="id"
                                            type="hidden" id="id">
                                        <input class="form-control" value="job_id" name="id_fild" type="hidden"
                                            id="id_fild">
                                        <input class="form-control" value="job" name="table" type="hidden" id="table">
                                        <input class="form-control" value="job_image" name="field" type="hidden"
                                            id="field">
                                        <input onchange="uploadImageJob(this.form);" class="form-control" name="file"
                                            type="file" id="formFile">
                                    </div>

                                    <img width="50%" src='<?php echo $img_src; ?>'>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center experience mt-5">

                            <a href="company_joblist.php" class="border px-3 p-1 add-experience text-primary"><i
                                    class="fa fa-lock"></i>&nbsp; Back</a>
                            <button class="btn btn-primary text-white btn-md border px-3 p-1 add-experience"
                                onclick="deleteDataFromHome(<?php echo $row['job_id']; ?>, 'company', 'job_id')"><i
                                    class="fa fa-trash"></i>&nbsp;Delete</button>
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