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
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="company_profile.php" class="btn btn-primary">Back to Profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 mt-5">
                    <form action="#" class="" method="post">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-primary">Company Profile Settings</h4>
                        </div>

                        <div class="form-group">
                            <label for="company-name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","company_name", "company", "company_id")'
                                value="<?php echo $row['company_name']; ?>" placeholder="e.g. New York">
                        </div>

                        <div class="form-group">
                            <label for="company-tagline">Tagline (Optional)</label>
                            <input type="text" class="form-control" id="tagline" name="tagline"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","tagline", "company", "company_id")'
                                value="<?php echo $row['tagline']; ?>" placeholder="e.g. New York">
                        </div>

                        <div class="form-group mt-5">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="mb-3">
                                        <textarea id="company_description" name="company_description"><?php echo $row['company_description']; ?></textarea>
                                        
                                        <input class="form-control" value="<?php echo $row['company_id'] ?>" name="id" type="hidden" id="id">
                                        <input class="form-control" value="company" name="table" type="hidden" id="table">
                                        <input class="form-control" value="company_id" name="id_field" type="hidden" id="id_field">
                                        <input class="form-control" value="company_description" name="field" type="hidden" id="field">
                                        <button type="button" onclick="changeHomeDescription(this.form)"
                                            class="btn btn-primary">Update Description</button>
                                    </div>
                                </form>
                                <script>
                                $('#company_description').summernote({
                                    placeholder: 'Article Content',
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
                            <label for="company-website">Website (Optional)</label>
                            <input type="text" class="form-control" id="website" name="website"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","website", "company", "company_id")'
                                value="<?php echo $row['website']; ?>" placeholder="https://">
                        </div>

                        <div class="form-group">
                            <label for="company-website-fb">Facebook Username (Optional)</label>
                            <input type="text" class="form-control" id="facbook" name="facbook"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","facbook", "company", "company_id")'
                                value="<?php echo $row['facbook']; ?>" placeholder="companyname">
                        </div>

                        <div class="form-group">
                            <label for="company-website-tw">Twitter Username (Optional)</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","twitter", "company", "company_id")'
                                value="<?php echo $row['twitter']; ?>" placeholder="@companyname">
                        </div>
                        <div class="form-group">
                            <label for="company-website-tw">Linkedin Username (Optional)</label>
                            <input type="text" class="form-control" id="lonkdin" name="lonkdin"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","lonkdin", "company", "company_id")'
                                value="<?php echo $row['lonkdin']; ?>" placeholder="companyname">
                        </div>

                        <div class="form-group">
                            <label for="company-website">Login Email</label>
                            <input type="email" class="form-control" id="company_login_email" name="company_login_email"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","company_login_email", "company", "company_id")'
                                value="<?php echo $row['company_login_email']; ?>" placeholder="company@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="company-website-tw">Company Email</label>
                            <input type="email" class="form-control" id="company_admin_email" name="company_admin_email"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","company_admin_email", "company", "company_id")'
                                value="<?php echo $row['company_admin_email']; ?>" placeholder="company@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="company-website-tw">Company Phone Number</label>
                            <input type="text" class="form-control" id="company_admin_phone" name="company_admin_phone"
                                onchange='updateDataFromHome(this, "<?php echo $company_id; ?>","company_admin_phone", "company", "company_id")'
                                value="<?php echo $row['company_admin_phone']; ?>" placeholder="01124567896">
                        </div>

                        <div class="form-group">
                            <label for="company-website-tw d-block">Upload Logo</label> <br>
                            <div class="form-group mt-3">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="mb-3" style="background-color: black;">
                                        <input class="form-control" value="<?php echo $row['company_id'] ?>" name="id"
                                            type="hidden" id="id">
                                        <input class="form-control" value="company_id" name="id_fild" type="hidden"
                                            id="id_fild">
                                        <input class="form-control" value="company" name="table" type="hidden"
                                            id="table">
                                        <input class="form-control" value="company_logo" name="field" type="hidden"
                                            id="field">
                                        <input onchange="uploadImageCompany(this.form);" class="form-control"
                                            name="file" type="file" id="formFile">
                                    </div>

                                    <img width="50%" src='<?php echo $img_src; ?>'>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center experience mt-5">
      
                            <a href="change_password_company.php" class="border px-3 p-1 add-experience text-primary"><i
                                    class="fa fa-lock"></i>&nbsp;Change Password</a>
                            <button class="btn btn-primary text-white btn-md border px-3 p-1 add-experience"
                                onclick="deleteDataFromHome(<?php echo $row['company_id']; ?>, 'company', 'company_id')"><i
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