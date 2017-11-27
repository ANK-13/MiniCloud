

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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            /* The Close Button */
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .modal-header {
                padding: 2px 16px;
                background-color: #000000;
                color: white;
            }

            .modal-body {padding: 2px 16px;}

            .modal-footer {
                padding: 2px 16px;
                background-color: #000000;
                color: white;
            }
            form{
              display: inline;
              padding: 0px;
            }
        </style>

  

  
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
            <h1 style="text-align: center;letter-spacing: 2px;;font-size: 50px;color: #F59D1E"><b>WELCOME TO INFRASTUCTURE AS A SERVICE (IaaS)</b></h1>

            

            <div style="margin-top: 50px"><button id="myBtn" class="btn btn-primary btn-lg"><spam class="glyphicon glyphicon-refresh"></spam>Create Instance</button></div>

            <!-- Creating Model -->

              <div id="myModal" class="modal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close">&times;</span>
                      <h2>Your Instance Details</h2>
                    </div>
                    <div class="modal-body">
                      <form action="createInstance.php" method="post">
                      <label>Name Of Instance</label>
                      <input type="text" name="instance_name" required>
                      <input type="submit" name="submit" value="Create Instance">
                      </form>
                    </div>
                    <div class="modal-footer">
                      <h3></h3>
                    </div>
                  </div>

                </div>

            <!-- Ending Model -->


            <!-- script For model -->

              <script>
                  
                  var modal = document.getElementById('myModal');

                 
                  var btn = document.getElementById("myBtn");

                  
                  var span = document.getElementsByClassName("close")[0];

                  btn.onclick = function() {
                      modal.style.display = "block";
                  }

                  span.onclick = function() {
                      modal.style.display = "none";
                  }

                  window.onclick = function(event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }
                  </script>

            <!-- script end For model -->


            <div style="margin-top: 30px">
              <h2 style="text-align: center;font-size: 40px">YOUR INSTANCES DETAILS</h2>
                
    <?php

        $username = $_SESSION['username'];

        
       

        $sql = "SELECT InstDetails.InstId, InstDetails.name, InstDetails.CPU, InstDetails.Memory, InstDetails.state, Images.Image FROM ((InstDetails INNER JOIN Images ON InstDetails.image = Images.ImageId) INNER JOIN IaasUsers ON InstDetails.InstId = IaasUsers.InstID) where IaasUsers.Username='".$username."'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          echo '
                <table class="table" style="margin-top: 30px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Instance Id</th>
                      <th scope="col">CPU</th>
                      <th scope="col">Memory(KiB)</th>
                      <th scope="col">OS Type</th>
                      <th scope="col">State</th>
                      <th scope="col">Operation</th>
                    </tr>
                  </thead>
                  <tbody>';

                  
                  
            
        while($row = mysqli_fetch_assoc($result)) {
            
             

            echo "<tr>
                      <th scope=".'row'.">".str_replace($_SESSION['username']."_", "", $row["name"])."</th>
                      <td>".$row["InstId"]."</td>
                      <td>".$row["CPU"]."</td>
                      <td>".$row["Memory"]."</td>
                      <td>".$row["Image"]."</td>
                      <td>".$row["state"]."</td>
                      <td>";

                     
                          if($row["state"] == 0){

                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."@".'" name ="operation"> ';
                            echo '<button type="submit" class="btn btn-danger disabled" role="button" aria-disabled="true"><span class="glyphicon glyphicon-off"></span></button>';
                            echo '</form>';



                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."$".'" name ="operation"> ';
                            echo '<button type="submit"  class="btn btn-success disabled" role="button" aria-disabled="true"><span class="glyphicon glyphicon-repeat"></span></button>';
                            echo '</form>';

   //                          echo "<form action='text.php' action='post'>";
   //                          echo '<input type="hidden" value="'.$row["name"]."@".'" name ="operation"> ';
   // echo   '<a href="#" class="btn btn-success" role="button" aria-disabled="true"><span class="glyphicon glyphicon-repeat"></span>';
   //                          echo '</form>';



                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."^".'" name ="operation"> ';
  echo '    <button type="submit" class="btn btn-primary" role="button" aria-disabled="true"><span class="glyphicon glyphicon-play-circle"></span></button>';
                            echo '</form>';


                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."&".'" name ="operation"> ';
  echo '   <button type="submit" class="btn btn-warning" role="button" aria-disabled="true"><span class="glyphicon glyphicon-trash"></span></button>';
                            echo '</form>';
                            

  echo '   <button type="submit" class="btn btn-success disabled" role="button" aria-disabled="true">IP</button>';
                          }



                          else{
                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."@".'" name ="operation"> ';
                            echo '<button type="submit" class="btn btn-danger" role="button" aria-disabled="true"><span class="glyphicon glyphicon-off"></span></button>';
                            echo '</form>';



                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."$".'" name ="operation"> ';
                            echo '<button type="submit"  class="btn btn-success" role="button" aria-disabled="true"><span class="glyphicon glyphicon-repeat"></span></button>';
                            echo '</form>';

   //                          echo "<form action='text.php' action='post'>";
   //                          echo '<input type="hidden" value="'.$row["name"]."@".'" name ="operation"> ';
   // echo   '<a href="#" class="btn btn-success" role="button" aria-disabled="true"><span class="glyphicon glyphicon-repeat"></span>';
   //                          echo '</form>';



                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."^".'" name ="operation"> ';
  echo '    <button class="btn btn-primary disabled" role="button" aria-disabled="true"><span class="glyphicon glyphicon-play-circle"></span></button>';
                            echo '</form>';


                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."&".'" name ="operation"> ';
  echo '   <button type="submit" class="btn btn-warning" role="button" aria-disabled="true"><span class="glyphicon glyphicon-trash"></span></button>';
                            echo '</form>';

                            echo "<form action='/cgi-bin/operations.py' action='get'>";
                            echo '<input type="hidden" value="'.$row["name"]."*".'" name ="operation"> ';
  echo '   <button type="submit" class="btn btn-success" id="delay" role="button" aria-disabled="true">IP</button>';
                            echo '</form>';

                          }


                      echo "</td>
                    </tr>";
                    

        }

        echo "</form>";

          echo ' </tbody>
                </table>';

        } else {
            echo '<h3 style="text-align: center;color: black">No Instance found</h3>
                 
            </div>';
        }

    ?>


            
		</div>

<!-- <script type="text/javascript">
  $('#delay').delay(20000).queue(function(){
      $(this).removeClass("disabled");
  });
</script> -->

    </body>
</html>
