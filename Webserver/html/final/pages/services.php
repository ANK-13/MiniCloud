
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
            b:hover {
                color: #F59D1E;   
                }
            .abc:hover{
                border :#C5C5C5 solid 1px;
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
                        echo  '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['username'].'</a></li>';
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>';
                } ?>
                  
                </ul>
              </div>
            </nav>
        </header>

        <div class="container" style="margin-left: 150px">
            <h1 style="text-align: center;letter-spacing: 2px;;text-transform: uppercase;font-size: 60px;color: #F59D1E"><b>Services Provided By Us!</b></h1>

            <h3 style="text-align: center;text-transform: uppercase">Click on any service to move on....</h3>    
            <div class="row" style="margin-top: 70px">


                <a href="iaas.php"><div class="col-md-3 abc" style="height: 200px;display: block;background-color: #F0F0F0">
                    <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 30px;color: black"><b>IaaS</b></div>
                    
                    <p style="padding-left: 40px;color: black;font-size: 15px">(Infrastucture as a Service)</p>

                </div></a>


            <div class="col-md-1"></div>


                <a href="paas.php"><div class="col-md-3 abc" style="height: 200px;display: block;background-color: #F0F0F0">
                    <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 30px;color: black"><b>PaaS</b></div>
                    <small style="padding-left: 50px;color: black;font-size: 15px">(Platfrom as a Service)</small>
                </div></a>


            <div class="col-md-1"></div>


                <a href="saas.php"><div class="col-md-3 abc" style="height: 200px;display: block;background-color: #F0F0F0">
                    <div style="text-align: center;letter-spacing: 5px;padding-top: 70px;font-size: 30px;color: black"><b>SaaS</b></div>
                    <small style="padding-left: 50px;color: black;font-size: 15px">(Software as a Service)</small>
                </div></a>


            </div>
        </div>

    </body>
</html>
