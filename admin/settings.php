<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pages/head.php" ?>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include "pages/navbar.php" ?>
        <!-- partial -->
        <?php include "pages/navbar2.php" ?>

        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php include "pages/sidebar.php" ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">



                    <div class="row">
                        <div class="col-md-12">
                            <?php
                        $setting = getAllSettings();
                        if($res = mysqli_fetch_assoc($setting)){

                            $img = $res['header_image'];
                            $img_src = "../server/uploads/settings/".$img;

                            $imgs = $res['sub_image'];
                            $imgs_src = "../server/uploads/settings/".$imgs;

                            $about_image = $res['about_image'];
                            $about_image_src = "../server/uploads/settings/".$about_image;
                    ?>
                            <div class="row m-5 p-5 border border-white">
                                <div class="col-md-12">
                                    <h5 class="text-white">Header Settings</h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Header Title</label>
                                    <input type="text" onchange='settingsUpdate(this, "header_title")'
                                        value="<?php echo $res['header_title']; ?>" class="form-control"
                                        name="category_name" id="validationCustom01" placeholder="Header Title"
                                        required>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="product_desc" class="form-label">Header Description</label>
                                    <textarea onchange='settingsUpdate(this, "header_desc")' class="form-control"
                                        id="header_desc" required rows="3"><?php echo $res['header_desc']; ?></textarea>
                                </div>
                                <form class="mt-3" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="hidden" name="field" id="field" value="header_image">
                                        <label for="formFile" class="form-label">Header Image file</label>
                                        <input class="form-control" onchange="uploadSettingImage(this.form);"
                                            name="file" type="file" id="formFile">
                                    </div>

                                    <img class="mt-2" width="50%" src='<?php echo $img_src; ?>'>
                                </form>
                            </div>

                            <div class="row m-5 p-5 border border-white">
                                <div class="col-md-12">
                                    <h5 class="text-white">About Settings</h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">About Title</label>
                                    <input type="text" onchange='settingsUpdate(this, "about_title")'
                                        value="<?php echo $res['about_title']; ?>" class="form-control" id="about_title"
                                        placeholder="About Title" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="product_desc" class="form-label">About Description</label>
                                    <textarea onchange='settingsUpdate(this, "about_desc")' class="form-control"
                                        id="about_desc" required rows="3"><?php echo $res['about_desc']; ?></textarea>
                                </div>

                                <form class="mt-3" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="hidden" name="field" id="field" value="about_image">
                                        <label for="formFile" class="form-label"> About Us Image file</label>
                                        <input class="form-control" onchange="uploadSettingImage(this.form);"
                                            name="file" type="file" id="formFile">
                                    </div>

                                    <img class="mt-2" width="50%" src='<?php echo $about_image_src; ?>'>
                                </form>
                                <!-- <form class="mt-3" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" name="field" id="field" value="header_image">
                                <label for="formFile" class="form-label">Header Image file</label>
                                <input class="form-control" onchange="uploadSettingImage(this.form);" name="file" type="file" id="formFile">
                            </div>
                        </form>
                        <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'> -->
                            </div>


                         

                            <div class="row m-5 p-5 border border-white">
                                <div class="col-md-12">
                                    <h5 class="text-white">Contact Settings</h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Company Phone Number</label>
                                    <input type="text" onchange='settingsUpdate(this, "company_phone")'
                                        value="<?php echo $res['company_phone']; ?>" class="form-control"
                                        id="company_phone" placeholder="Company Phone Number" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Company Email Address</label>
                                    <input type="text" onchange='settingsUpdate(this, "company_email")'
                                        value="<?php echo $res['company_email']; ?>" class="form-control"
                                        id="company_email" placeholder="Company Email Address" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Company Address</label>
                                    <input type="text" onchange='settingsUpdate(this, "company_address")'
                                        value="<?php echo $res['company_address']; ?>" class="form-control"
                                        id="company_address" placeholder="Company Address" required>
                                </div>

                            </div>


                            <div class="row m-5 p-5 border border-white">
                                <div class="col-md-12">
                                    <h5 class="text-white">Subpage Settings</h5>
                                </div>
                
              
                                <form class="mt-3" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="hidden" name="field" id="field" value="sub_image">
                                        <label for="formFile" class="form-label">Subpage Image file</label>
                                        <input class="form-control" onchange="uploadSettingImage(this.form);"
                                            name="file" type="file" id="formFile">
                                    </div>
                                    <img class="mt-2" width="50%" src='<?php echo $imgs_src; ?>'>
                                </form>
                            </div>

                            

                            <?php } ?>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include 'pages/footer.php'; ?>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>

    <?php include 'pages/assets.php'; ?>
    <!-- End custom js for this page-->
</body>
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

</html>