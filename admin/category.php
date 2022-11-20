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
                        <a class="btn btn-primary" href="category_add.php" > Add
                            New</a>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Cat ID</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cat ID</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                            $getall = getAllCategory();

                            while($row=mysqli_fetch_assoc($getall)){

                                $cat_id = $row['cat_id'];
                                $img = $row['cat_image'];
                                $img_src = "../server/uploads/category/".$img;?>
                                            <tr>
                                                <td>#<?php echo $row['cat_id']; ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="cat_name  <?php echo $cat_id; ?>" type="text"
                                                            name="cat_name"
                                                            onchange="updateData(this, '<?php echo $cat_id; ?>', 'cat_name', 'category', 'cat_id');"
                                                            value="<?php echo $row['cat_name']; ?>"
                                                            data-parsley-trigger="change" required=""
                                                            placeholder="Enter Category Name" autocomplete="off"
                                                            class="form-control">
                                                    </div>
                                                </td>


                                                <td>


                                                    <form class="w-20" enctype="multipart/form-data" method="POST">
                                                        <div class="mb-3">
                                                            <input class="form-control"
                                                                value="<?php echo $row['cat_id'] ?>" name="id"
                                                                type="hidden" id="id">
                                                            <input class="form-control" value="cat_id" name="id_fild"
                                                                type="hidden" id="id_fild">
                                                            <input class="form-control" value="category" name="table"
                                                                type="hidden" id="table">
                                                            <input class="form-control" value="cat_image" name="field"
                                                                type="hidden" id="field">
                                                            <input onchange="uploadImage(this.form);"
                                                                class="form-control" name="file" type="file"
                                                                id="formFile">
                                                        </div>
                                                    </form>
                                                    <img width="200px" src='<?php echo $img_src; ?>'>

                                                </td>

                                                <td><button type="button"
                                                        onclick="deleteDataCategory(<?php echo $row['cat_id']; ?>,'category', 'cat_id')"
                                                        class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                    </button></td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
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