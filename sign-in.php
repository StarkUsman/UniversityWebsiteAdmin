<?php 
    session_start();
    include("includes/constants.php");
    include("includes/database-helper.php");
?>
<?php
if (isset($_POST['BtnLogin']))
    {
    $Username = mysqli_real_escape_string($conn, $_POST['TxtUsername']);
    $Password = mysqli_real_escape_string($conn, $_POST['TxtPassword']);
    // $Password = md5($Password);
    $Query = "SELECT * FROM users WHERE email = '$Username' ".
    " AND password = '$Password'";
	    // echo $Query;
		// die;
    $Result = mysqli_query($conn, $Query);
    if (mysqli_num_rows($Result) > 0)
    {
        $mem = mysqli_fetch_object($Result);
        $_SESSION['SESSION_ID'] = $mem->userid;
        $_SESSION['USER_NAME'] = $mem->email;
        $_SESSION['FULL_NAME'] = $mem->firstname . " ". $mem->lastname;
        // echo "Hello";
		header('location: index.php');
        exit();
    }
   else
   {
    ?>
     <script>
			alert('Login Failed, Invalid Credentials');
			window.location.href='sign-in.php?error';
	    </script>
   <?php
}	
}
?>
<!DOCTYPE html>
<html>
  <!-- Mirrored from thememakker.com/templates/swift/university/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 05:36:04 GMT -->
  <head>
    <title>:: Swift - <?php echo SiteTitle;?> Admin ::</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="assets/plugins/bootstrap/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="assets/css/login.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/themes/all-themes.css" />
  </head>
  <body class="login-page authentication">
    <div class="container">
      <div class="card-top"></div>
      <div class="card">
        <h1 class="title">
          <span>Swift University</span>Login
          <span class="msg">Sign in to start your session</span>
        </h1>
        <div class="col-sm-12">
          <form id="sign_in" method="POST">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="zmdi zmdi-account"></i>
              </span>
              <div class="form-line">
                <input
                  type="text"
                  class="form-control"
                  name="TxtUsername"
                  placeholder="Username"
                  id="username"
                  required
                  autofocus
                />
              </div>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="zmdi zmdi-lock"></i>
              </span>
              <div class="form-line">
                <input
                  type="password"
                  class="form-control"
                  name="TxtPassword"
                  placeholder="Password"
                  id="password"
                  required
                />
              </div>
            </div>
            <div class="text-center">
            <button
                  class="btn btn-raised waves-effect g-bg-blush2"
                  name="BtnLogin"
                  type="submit"
                  >Login</button>
              <!-- <a
                href="index.php"
                class="btn btn-raised waves-effect g-bg-blush2"
                name="BtnLogin"
                >SIGN IN</a
              > -->
              <!-- <a href="sign-up.html" class="btn btn-raised waves-effect"
                >SIGN UP</a
              > -->
            </div>
            <!-- <div class="text-center">
              <a href="forgot-password.html">Forgot Password?</a>
            </div> -->
          </form>
        </div>
      </div>
    </div>
    <div class="theme-bg"></div>
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <!-- Custom Js -->
  </body>

  <!-- Mirrored from thememakker.com/templates/swift/university/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 05:36:04 GMT -->
</html>
