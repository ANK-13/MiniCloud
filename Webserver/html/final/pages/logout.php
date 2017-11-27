<?php
	
	session_start();
	unset($_SESSION['username']);
	session_destroy();
	echo "<script type='text/javascript'>alert('Successfully logout!');
     window.location.href='../index.php'</script>";

?>