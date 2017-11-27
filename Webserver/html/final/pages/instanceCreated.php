<?php
	
	  session_start();
	  $username = $_SESSION['username'];
	  $instanceName = $_POST['instanceName'];
	  $instanceName = $username."_".$instanceName;
	  $cpu_core = $_POST['cpu_core'];
	  $memory = $_POST['memory'];

	  echo $instanceName." ".$cpu_core." ".$memory;

?>