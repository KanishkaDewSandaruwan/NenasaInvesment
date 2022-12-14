<!DOCTYPE html>
<html lang="en">
<?php 
include 'server/api.php';  

$setting = getAllSettings();
$res = mysqli_fetch_assoc($setting);

$login_image = $res['login_image'];
$login_image_src = "server/uploads/settings/".$login_image;
?>

<head>
   
</head>

<body>
<div class="full-screen-container">
      <div class="login-container">
        <h3 class="login-title">Welcome</h3>
        <form>
          <div class="input-group">
            <label>Email</label>
            <input type="email"   name="email" id="email" />
          </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password"  name="password" id="password"/>
          </div>
          <button type="button" onclick="login(this.form)" class="login-button">Sign In</button>
        </form>
      </div>
    </div>
    <!-- End custom js for this page-->
    
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
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap');

* {
  box-sizing: border-box;
  font-family: 'Quicksand', sans-serif;
}

html,
body {
  margin: 0;
}

.full-screen-container {
  background-image: url('<?php echo $login_image_src; ?>');
  height: 100vh;
  width: 100vw;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-container {
  background-color: hsla(201, 100%, 6%, 0.6);
  padding: 50px 30px;
  min-width: 400px;
  width: 50%;
  max-width: 600px;
}

.login-title {
  color: #fff;
  text-align: center;
  margin: 0;
  margin-bottom: 40px;
  font-size: 2.5em;
  font-weight: normal;
}

.input-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.input-group label {
  color: #fff;
  font-weight: lighter;
  font-size: 1.5em;
  margin-bottom: 7px;
}

.input-group input {
  font-size: 1.5em;
  padding: 0.1em 0.25em;
  background-color: hsla(201, 100%, 91%, 0.3);
  border: 1px solid hsl(201, 100%, 6%);
  outline: none;
  border-radius: 5px;
  color: #fff;
  font-weight: lighter;
}

.input-group input:focus {
  border: 1px solid hsl(201, 100%, 50%);
}

.login-button {
  padding: 10px 30px;
  width: 100%;
  border-radius: 5px;
  background: hsla(201, 100%, 50%, 0.1);
  border: 1px solid hsl(201, 100%, 50%);
  outline: none;
  font-size: 1.5em;
  color: #fff;
  font-weight: lighter;
  margin-top: 20px;
  cursor: pointer;
}

.login-button:hover {
  background-color: hsla(201, 100%, 50%, 0.3);
}

.login-button:focus {
  background-color: hsla(201, 100%, 50%, 0.5);
}

</style>

<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
</html>
