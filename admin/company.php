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
                                                <th>Company Name</th>
                                                <th>TagLines</th>
                                                <th>Description</th>
                                                <th>Social Meadia</th>
                                                <th>Permision</th>
                                                <th>Contact</th>
                                                <th>Date</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                $getall = getAllCompany();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $company_id = $row['company_id'];

                                $img = $row['company_logo'];
                                $img_src = "../server/uploads/company/" . $img; 
                                  ?>


                                            <tr>
                                                <td>
                                                    <?php echo $row['company_name']; ?><br/><br/>
                                                    <img width="50px" src='<?php echo $img_src; ?>'>
                                                </td>
                                                <td><?php echo $row['tagline']; ?></td>
                                                <td><?php echo $row['company_description']; ?></td>
                                                <td>
                                                    <?php echo $row['website']; ?><br />
                                                    <?php echo $row['facbook']; ?><br />
                                                    <?php echo $row['twitter']; ?><br />
                                                    <?php echo $row['lonkdin']; ?><br />
                                                </td>
                                                <td>
                                                    <select
                                                        onchange="updateData(this, '<?php echo $company_id; ?>', 'permision', 'company', 'company_id');"
                                                        id="permision <?php echo $company_id; ?>"
                                                        class='form-control norad tx12' name="permision" type='text'>
                                                        <option value="1"
                                                            <?php if ($row['permision'] == "0" ) echo "selected" ; ?>>
                                                            Active
                                                        </option>
                                                        <option value="2"
                                                            <?php if ($row['permision'] == "1" ) echo "selected" ; ?>>
                                                            Deactive
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <?php echo $row['company_login_email']; ?><br />
                                                    <?php echo $row['company_admin_email']; ?><br />
                                                    <?php echo $row['company_admin_phone']; ?><br />
                                                    <?php echo $row['company_login_email']; ?><br />
                                                </td>
                                                <td><?php echo $row['date_updated']; ?></td>
                                                <td> <button type="button"
                                                        onclick="deleteData(<?php echo $row['company_id']; ?>,'company', 'company_id')"
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