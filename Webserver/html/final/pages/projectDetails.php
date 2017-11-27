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

            <div class="row" style="margin-top: 100px;">
                <div class="col-md-6">
                    <h3 style="text-align: center; margin-bottom: 50px"><b>Instance Details</b></h3>
                    <form action="/cgi-bin/launchPaas.py" method="post">

                    	<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
                        <div class="form-group">
                            <table class="table table-inverse">
                              <tbody>
                                <tr>
                                  <td> <label for="projectName">Project Name :</label></td>
                                  <td><input name="projectName" type="text" class="form-control" id="projectName" aria-describedby="projectName" value="<?php echo $_SESSION['project_name']; ?>" readonly></td>
                                </tr>
                                <tr>
                                  <td> <label for="cpu_core">Platform : </label></td>
                                  <td>


                                  	<?php



                                  	$sql = "SELECT * from Paltforms ";

							        $result = mysqli_query($conn, $sql);
							   
							        if (mysqli_num_rows($result) > 0) {
							        	echo '<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="PltID">';
							        while($row = mysqli_fetch_assoc($result)) {
							        	
							            
							            echo "<option value='".$row['PltID']."'>".$row['Info']."</option>"; 

							        }
							        echo '</select>';
							      }

							      ?>
								    

								  </td>
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
                            height: 350px;
                        }
                    </style>
                    <div class="vl"></div>
                </div>
                <div class="col-md-5">
                     <img src="../images/instance.png" class="img-rounded" alt="Cinque Terre" width="504" height="336">
                </div>
            </div>


		</div>

    </body>
</html>
