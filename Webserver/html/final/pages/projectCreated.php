<?php
	
	  session_start();
	  $username = $_POST['username'];
	  $projectName = $_POST['projectName'];
	  $PltID = $_POST['PltID'];

	  echo $projectName." ".$username." ".$PltID;

?>