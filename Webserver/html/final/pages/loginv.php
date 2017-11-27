<?php
	require_once("../include/connect.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT Username, Password FROM Identity WHERE username = '".$username."' AND  password = '".$password."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	   
	   session_start();
	   $_SESSION['username'] = $username;
	   echo "<script type='text/javascript'>alert('login successfully!');
     window.location.href='./services.php'</script>";
	   
	} else {
	     echo "<script type='text/javascript'>alert('login failed!');
    		 window.location.href='./login.php'</script>";
	}

?>