 <?php

        require_once("../include/connect.php");
        session_start();
        $username = $_SESSION['username'];
        $instanceName = $_POST['instance_name'];
        $_SESSION['instance_name'] = $instanceName;
        $instanceName = $username."_".$instanceName;

        $flg = 0;
        
       

        $sql = "SELECT InstDetails.name from InstDetails INNER JOIN IaasUsers ON IaasUsers.Username = '".$username."' WHERE IaasUsers.InstID = InstDetails.InstId ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            
             if(!strcmp($instanceName, $row["name"]))
             {
                $flg = 1;
                break;
             }

        }
      }

        if($flg == 1){
          echo "<script type='text/javascript'>alert('Instance Name Is Already Exist Please Enter Another Instance Name!');
     window.location.href='./iaas.php'</script>";
        }

        else
        {
             echo "<script type='text/javascript'>window.location.href='./instDetails.php'</script>";
        }


    ?>