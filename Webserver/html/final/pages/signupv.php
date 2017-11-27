<?php 
  
   require_once("../include/connect.php");


  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "INSERT INTO Identity VALUES ('$username', '$password', '$email')";
    
  if (mysqli_query($conn, $sql)) {
     echo "<script type='text/javascript'>alert('Signup successfully!');
     window.location.href='../index.php'</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);



?>