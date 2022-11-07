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
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Emp ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>NIC</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>Permision</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Emp ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>NIC</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                $getall = getAllcustomers();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $customer_id = $row['customer_id'];
                                  ?>


                                            <tr>
                                                <td>#<?php echo $row['customer_id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['nic']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php if ($row['gender']=="1"){ echo "Male"; }else{ echo "Female";} ?>
                                                </td>
                                                <td>
                                                    <select
                                                        onchange="updateData(this, '<?php echo $customer_id; ?>', 'permision', 'customer', 'customer_id');"
                                                        id="permision <?php echo $customer_id; ?>"
                                                        class='form-control norad tx12' name="permision" type='text'>
                                                        <option value="0"
                                                            <?php if ($row['permision'] == "0" ) echo "selected" ; ?>>
                                                            Deactive
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row['permision'] == "1" ) echo "selected" ; ?>>
                                                            Active
                                                        </option>
                                                    </select>
                                                </td>
                                                <td> <button type="button"
                                                        onclick="deleteData(<?php echo $row['customer_id']; ?>,'customer', 'customer_id')"
                                                        class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </td>
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
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
</html>