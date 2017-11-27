
<?php
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
        </style>

        <!-- load angular via CDN -->

  
    </head>
    <body>

        <header>
			<nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../index.php" style="color: #F59D1E">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="../index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['username'])) { 
                    echo  '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
               }else{
                echo "<script type='text/javascript'>
                            window.location.href='../index.php'</script>";
           } ?>
                  
                </ul>
              </div>
            </nav>
		</header>

        <div class="container">

            <div class="row" style="margin-top: 100px;">
                <div class="col-md-6">
                    <h3 style="text-align: center; margin-bottom: 50px"><b>Log-In Into Your Account</b></h3>
                    <form action="loginv.php" method="post">
                        <div class="form-group">
                            <table class="table table-inverse">
                              <tbody>
                                <tr>
                                  <td> <label for="username">UserName :</label></td>
                                  <td><input name="username" type="username" class="form-control" id="username" aria-describedby="username" placeholder="FirstName"></td>
                                </tr>
                                <tr>
                                  <td> <label for="password">Password : </label></td>
                                  <td><input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password"></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <table class="table table-inverse">
                            <tr>
                                <td><input type="submit" class="btn btn-warning" value="Continue"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-md-1">
                    <style>
                        .vl {
                            border-left: 4px solid grey;
                            height: 250px;
                        }
                    </style>
                    <div class="vl"></div>
                </div>
                <div class="col-md-5">
                     <img src="../images/login.svg" class="img-rounded" alt="Cinque Terre" width="404" height="236">
                </div>
            </div>


		</div>

    </body>
</html>
