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
                            <form action="" method="post" id="basicform" class="col-md-6" data-parsley-validate=""
                                enctype="multipart/form-data">

                                <div class="col-md-12">
                                    <label for="current_password" class="form-label">Current Password Name</label>
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password" placeholder="Current Password Name" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password"
                                        placeholder="New Password" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="confirm_new_password" class="form-label">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" name="confirm_new_password"
                                        id="confirm_new_password" placeholder="Confirm New Password" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="email"
                                        value="<?php echo $_SESSION['admin']; ?>" id="email">
                                </div>

                                <div class="form-group mt-3 mt-5">

                                    <button type="button" class="btn btn-primary mr-5"
                                        onclick="changePasswordAdmin(this.form)">Change Password</button>
                                    <button type="button" class="btn btn-primary mr-5"
                                        onclick="window.location.href='index.php'">Home</button>

                                </div>
                            </form>
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