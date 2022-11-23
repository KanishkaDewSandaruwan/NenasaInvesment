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
                                                <th>User</th>
                                                <th>Aditional Details</th>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                $getall = applyListJob_ID($_REQUEST['job_id']);

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $apply_id = $row['apply_id'];
                                  ?>


                                            <tr>
                                                <td>
                                                    <?php echo $row['name']; ?><br />
                                                    <?php echo $row['address']; ?><br />
                                                    <?php echo $row['phone']; ?><br />
                                                    <a href="download.php?apply_id=<?php echo $row['apply_id'] ?>">Download Resume</a>
                                                </td>
                                                <td>
                                                    <?php echo $row['additional_details']; ?>
                                                </td>
                                                <td><?php  if ($row['type'] == "0"){ echo "Full Time"; }else{ echo "Part Time";} ?>
                                                </td>

                                                <td><?php echo $row['job_description']; ?></td>
                                                <td>
                                                    Closing Date : <?php echo $row['closing_date']; ?><br />
                                                    Date : <?php echo $row['date_updated']; ?><br />
                                                </td>
                                                <td> 
                                                    <button type="button"
                                                        onclick="deleteData(<?php echo $row['apply_id']; ?>,'apply', 'apply_id')"
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


    <?php include 'pages/assets.php'; ?>
    <!-- End custom js for this page-->
</body>


<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
</html>