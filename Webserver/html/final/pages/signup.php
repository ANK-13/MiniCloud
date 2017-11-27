


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
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
              </div>
            </nav>
		</header>


    <div class="row" style="margin-top: 100px;">
            <div class="col-md-6">
                <h3 style="text-align: center; margin-bottom: 50px"><b>Create an Account</b></h3>
                <form action="signupv.php" method="POST">
                    <div class="form-group">
                        <table class="table table-inverse">
                          <tbody>
                            <tr>
                              <td> <label for="username">UserName :</label></td>
                              <td><input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="FirstName" required></td>
                            </tr>
                             <tr>
                              <td><label for="exampleInputEmail1">Email address :</label></td>
                              <td><input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required></td>
                            </tr>
                              <tr>
                              <td> <label for="password">Password : </label></td>
                              <td><input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password" required></td>
                            </tr>
                              <tr>
                              <td> <label for="passwordconfirm">PasswordConfirm : </label></td>
                              <td><input type="password" class="form-control" id="passwordconfirm" aria-describedby="passwordconfirm" placeholder="PasswordConfirm" required></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <table class="table table-inverse">
                        <tr>
                            <td><input name="submit" type="submit" class="btn btn-warning" value="Continue"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-1">
                <style>
                    .vl {
                        border-left: 4px solid grey;
                        height: 400px;
                    }
                </style>
                <div class="vl"></div>
            </div>
            <div class="col-md-5">
                 <img src="../images/signup.jpg" class="img-rounded" alt="Cinque Terre" width="504" height="336">
            </div>
        </div>
                

    </body>
</html>


