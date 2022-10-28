<footer class="site-footer">

<a href="#top" class="smoothscroll scroll-top">
  <span class="icon-keyboard_arrow_up"></span>
</a>

<div class="container">
  <div class="row mb-5">
   
    <div class="col-6 col-md-3 mb-4 mb-md-0">
      <h3>Company</h3>
      <ul class="list-unstyled">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-6 col-md-3 mb-4 mb-md-0">
      <h3>Account</h3>
      <ul class="list-unstyled">
        <?php if(isset($_SESSION['customer'])) : ?>
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="joblist.php">Apply List</a></li>
        <?php else : ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="col-6 col-md-3 mb-4 mb-md-0">

    </div>
    <div class="col-6 col-md-3 mb-4 mb-md-0">
      <h3>Contact Us</h3>
      <div class="footer-social">
        <a href="<?php echo $res['link_facebook']; ?>"><span class="icon-facebook"></span></a>
        <a href="<?php echo $res['link_twiiter']; ?>"><span class="icon-twitter"></span></a>
        <a href="<?php echo $res['link_instragram']; ?>"><span class="icon-instagram"></span></a>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-12">
      <p class="copyright">Nenasa Insvenment</a> &copy; <script>
                    document.write(new Date().getFullYear())
                    </script>. All Right Reserved.</p>
    </div>
  </div>
</div>
</footer>


<!-- toast -->
<script src="admin/plugin/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="admin/plugin/iziToast-master/dist/css/iziToast.min.css">
<!-- endbuild -->

<!-- Simple table -->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

<script src="https://kit.fontawesome.com/6e8b05f9c5.js" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

<script src="admin/js/include/alerts.js"></script>
<script src="admin/js/include/validation.js"></script>
<script src="admin/js/include/homejs.js"></script>
<script src="admin/js/include/upload.js"></script>
<script src="admin/js/include/add.js"></script>
<script src="admin/js/include/delete.js"></script>

<script src="admin/js/include/admin.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="styles" />