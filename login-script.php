<?php
	include("includes/database-helper.php");
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
        $_SESSION['SESSION_ID'] = $mem->accesstoken;
        $_SESSION['USER_NAME'] = $mem->email;
        $_SESSION['FULL_NAME'] = $mem->firstname . " ". $mem->lastname;
		header('location:index.php');
		exit();
    }
   else
   {
?>
    <script>
        alert("Invalid Credentials")
    //    swal("Sorry ,Your Credentials are not matched!",{
    //        icon: "error",
    //        buttons: false,
    //        type: "error",
    //        timer:1000,
    //    });
   </script>
<?php
    }	
}
?>