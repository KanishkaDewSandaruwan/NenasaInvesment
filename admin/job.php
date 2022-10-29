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
                                                <th>Job</th>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                                <th>Date</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                $getall = getAllJobs();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $job_id = $row['job_id'];

                                $img = $row['job_image'];
                                $img_src = "../server/uploads/job/" . $img; 
                                  ?>


                                            <tr>
                                                <td>
                                                    <?php echo $row['job_title']; ?><br />
                                                    <?php echo $row['job_location']; ?><br />
                                                    <img width="50px" src='<?php echo $img_src; ?>'>

                                                </td>
                                                <td><?php  if ($row['type'] == "0"){ echo "Full Time"; }else{ echo "Part Time";} ?>
                                                </td>

                                                <td><?php echo $row['job_description']; ?></td>
                                                <td>
                                                    <select
                                                        onchange="updateData(this, '<?php echo $job_id; ?>', 'job_active', 'job', 'job_id');"
                                                        id="job_active <?php echo $job_id; ?>"
                                                        class='form-control norad tx12' name="job_active" type='text'>
                                                        <option value="0"
                                                            <?php if ($row['job_active'] == "0" ) echo "selected" ; ?>>
                                                            Active
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row['job_active'] == "1" ) echo "selected" ; ?>>
                                                            Deactive
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Closing Date : <?php echo $row['closing_date']; ?><br />
                                                    Date : <?php echo $row['date_updated']; ?><br />
                                                </td>

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