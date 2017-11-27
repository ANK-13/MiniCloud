 <?php

        require_once("../include/connect.php");
        session_start();
        $username = $_SESSION['username'];
        $projectName = $_POST['project_name'];
        $_SESSION['project_name'] = $projectName;
        $projectName = $username."_".$projectName;
        $flg = 0;
        
       

        $sql = "SELECT Containers.ContName from Containers INNER JOIN PAASUsers ON PAASUsers.Username = '".$username."' WHERE PAASUsers.ContID = Containers.ContId ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            
             if(!strcmp($projectName, $row["ContName"]))
             {
                $flg = 1;
                break;
             }

        }
      }

        if($flg == 1){
          echo "<script type='text/javascript'>alert('Application already exicts with this name!');
     window.location.href='./paas.php'</script>";
        }

        else
        {
             echo "<script type='text/javascript'>window.location.href='./projectDetails.php'</script>";
        }


    ?>