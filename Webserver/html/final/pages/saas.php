

<?php

   require_once("../include/connect.php");
        session_start();
        if(!isset($_SESSION['username'])){
            session_destroy();
        }
    
?>


<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>{{ Websitename }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="UTF-8">

        <!-- load bootstrap and fontawesome via CDN -->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <style>
            html, body, input, select, textarea
            {
                font-size: 1.05em !important;
            }
            b:hover {
                color: #F59D1E;   
            }
        </style>

        <!-- load angular via CDN -->

  
    </head>
    <body>

        <header>
			<nav class="navbar navbar-inverse"  data-spy="affix" data-offset-top="197">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../index.php" style="color: #F59D1E">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../index.php">Home</a></li>
                </ul>
               <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['username'])) { 
                        echo "<script type='text/javascript'>
                            window.location.href='../index.php'</script>";
                       }else{
                        echo  '<li><a href="services.php">Services</a></li>';
                        echo  '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['username'].'</a></li>';
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>';
                } ?>
                  
                </ul>
              </div>
            </nav>
		</header>

        <div class="container">
            <h1 style="text-align: center;letter-spacing: 2px;font-size: 60px;color: #F59D1E"><b>WELCOME TO SOFTWARE AS A SERVICE (SaaS)</b></h1>

            <div class="row" style="margin-top: 50px">

                <?php

                $username = $_SESSION['username'];

                $sql = "SELECT Username from SAAS where Username = '".$username."'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    echo '<div class="col-md-5" style="margin-left: 50px">
                <form action="#">
                  <button type="button" class="btn btn-outline-primary btn-lg btn-block disabled"><span style="font-size: 30px"><br>Service is<br> already Activated</span></button>
                </form>
              </div>';

                }

                else{
                    echo '  <div class="col-md-5" style="margin-left: 50px">
                <form action="/cgi-bin/createSUser.py" method="post">
                <input type="hidden" value="'.$username.'" name="username">
                  <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span style="font-size: 110px">Activate</span></button>
                </form>
              </div>';
                }

                ?> 
            

              <div class="col-md-1"></div>

               
               <a href="https://drive.google.com/open?id=0B7UkhJMGCNILbkxVVmsxdkxyeHM"><div class="col-md-5" style="height: 170px;display: block;background-color: #F0F0F0">
                    <div style="text-align: center;letter-spacing: 5px;padding-top: 50px;font-size: 30px;color: black"><b>SaaS</b></div>
                    <small style="padding-left: 120px;color: black;font-size: 15px">(Click here to download software)</small>
                </div>
              </a>

            </div>

		    </div>

    </body>
</html>
