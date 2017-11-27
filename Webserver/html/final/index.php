
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

        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />

        <!-- load bootstrap and fontawesome via CDN -->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <style>
            html, body, input, select, textarea
            {
                font-size: 1.05em !important;
            }
            .abc:hover{
                border: solid 1px #E1E1E1;
                
            }
        </style>

        <!-- load angular via CDN -->

  
    </head>
    <body>

        <header>
			<nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#" style="color: #F59D1E">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['username'])) { 
                    echo  '<li><a href="pages/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="pages/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
               }else{
                echo  '<li><a href="pages/services.php">Services</a></li>';
                echo  '<li><a href="#"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['username'].'</a></li>';
                 echo '<li><a href="pages/logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>';
           } ?>
                  
                </ul>
              </div>
            </nav>
		</header>

       <!--  <div style="height: 100px">
            <h1 style="text-align: center;text-transform: uppercase;color: #F59D1E;margin-top: 100px;font-size: 50px">Welcome To Cloud Services</h1>
            <div>
                <hr size="10px" width="70%" style="height:1px;border:none;color:#333;background-color:#333;">
            </div>
        </div> -->
        
        <section>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="images/2.jpg" alt="Los Angeles" style="width:100%;height: 500px;">
                  </div>

                  <div class="item">
                    <img src="images/5.jpg" alt="Chicago" style="width:100%;height: 500px;">
                  </div>
                
                  <div class="item">
                    <img src="images/6.jpg" alt="New york" style="width:100%;height: 500px;">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </section>
        <div style="height: 40px;margin-top: 10px">
            
                

            
        </div>


        <section>
             <h1 style="text-align: center;text-transform: uppercase;color: #F59D1E;font-size: 40px">services provided are</h1>

                <div>
                <hr size="10px" width="50%" style="height:1px;border:none;color:#333;background-color:#333;">
                </div>
              
            <div class="container">

                <div class="row">

                    <div class="col-md-4 abc" style="height: 400px;display: block;">
                        <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 40px;color: black"><b>IaaS</b></div>
                        <p style="padding-left: 30px;color: black;font-size: 25px">(Infrastucture as a Service)</p>
                        <p style="text-align: center;padding-top: 10px">IaaS provides you basic virtual compute infrastructure resources like CPU, Memory, Disk Storage attached to blank VMs with allowing you to install OS</p>
                        <div style="padding-top: 20px;padding-left: 110px">
                            <a href="https://en.wikipedia.org/wiki/IAAS"><button type="button" class="btn btn-info">More About IaaS</button></a>
                        </div>
                    </div>

                     <div class="col-md-4 abc" style="height: 400px;display: block;">
                        <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 40px;color: black"><b>PaaS</b></div>
                        <p style="padding-left: 55px;color: black;font-size: 25px">(Platform as a Service)</p>
                        <p style="text-align: center;padding-top: 10px">PaaS provides pre-installed web and database servers so that you can publish and run web application without worrying about server setup.</p>
                        <div style="padding-top: 20px;padding-left: 110px">
                           <a href="https://en.wikipedia.org/wiki/Platform_as_a_service"> <button type="button" class="btn btn-info">More About PaaS</button></a>
                        </div>
                    </div>
                    
                     <div class="col-md-4 abc" style="height: 400px;display: block;">
                        <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 40px;color: black"><b>SaaS</b></div>
                        <p style="padding-left: 55px;color: black;font-size: 25px">(Software as a Service)</p>
                        <p style="text-align: center;padding-top: 10px">SaaS is a software delivery model here users are not responsible for supporting the application or any of the components.</p>
                        <div style="padding-top: 45px;padding-left: 110px">
                            <a href="https://en.wikipedia.org/wiki/Software_as_a_service"><button type="button" class="btn btn-info">More About SaaS</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer style="height: 270px;background-color: #0F111C">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="text-align: center;color: white;">
                        <h2 style="text-align: center;color: white"><b>WebSite Name</b></h2>

                        <hr size="10px" width="50%" style="height:1px;border:none;color:#333;background-color:white;">
                        <h3>Created By</h3>

                        <a href="" style="text-align: center;color: white;">Aniket Baad<b>(2015BCS062)</b></a><br>
                        <a href="" style="text-align: center;color: white;">Ankush Khobragade<b>(2015BCS070)</b></a><br>
                        <a href="" style="text-align: center;color: white;">Rajat Dabade<b>(2015BCS056)</b></a>
                    </div>
                    <div class="col-md-6" style="text-align: center;color: white;padding-top: 90px">
                        <h4 style="font-size: 40px">Guided By</h4>
                         <a href="" style="text-align: center;color: white;"><b>Prof.Sandeep Rathod</b></a><br>
                    </div>
                </div>
            </div>
            <p style="text-align: center;color: white;padding-top: 20px">&copy;Walchand College Of Engineering,Sangli</p>
        </footer>

    </body>
</html>
