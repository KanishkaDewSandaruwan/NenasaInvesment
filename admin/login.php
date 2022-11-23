<!DOCTYPE html>
<html lang="en">
<?php 
include '../server/api.php';  

$setting = getAllSettings();
$res = mysqli_fetch_assoc($setting);

$login_image = $res['login_image'];
$login_image_src = "../server/uploads/settings/".$login_image;
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
          <button type="button" onclick="loginAdmin(this.form)" class="login-button">Sign In</button>
        </form>
      </div>
    </div>
    <?php include 'pages/assets.php'; ?>
    <!-- End custom js for this page-->
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
