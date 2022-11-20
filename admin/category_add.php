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

                <div class="col-lg-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal"> Add
                            New</button>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                
                            <form class="form-horizontal form-label-left mt-5" novalidate>
                                <span class="section">Create New Product</span>

                                <div class="item form-group mt-3">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="category_name" class="form-control col-md-7 col-xs-12"
                                            data-validate-length-range="6" data-validate-words="2" name="category_name"
                                            required="required" placeholder="Category Name" type="text">
                                    </div>
                                </div>
                                <div class="item form-group mt-2">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control" required name="file" type="file" id="file">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="category.php" class="btn btn-primary">Back</a>
                                        <button id="send" type="button" onclick="addCategory(this.form)" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>