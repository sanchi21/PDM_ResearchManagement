<?php
require("../DatabaseControl/DB_Connect.php");

?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>

    <link href="css/request.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="request-body">
    <article class="container-request center-block">
       <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" Action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Request Storage</button>

           <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-sm">


                   <div class="modal-content">

                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title"> Request Storage Space</h4>

                       </div>

                       <div class="modal-body">
                           <img src="small.png" alt="Database" style="width:50px;height:55px">

                               <input type="text" class="form-control" name="userid" id="req"
                                      placeholder="User Id" tabindex="1" value="" /></br>

                           <select class="form-control" name="sltExtra">
                               <option value="1">1GB</option>
                               <option value="3">3GB</option>
                               <option value="5">5GB</option>
                           </select></br>


                        <div class="modal-footer">
                            <button type="submit" name="request"  tabindex="5" class="btn btn-primary" href="#">Request</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>

                    </div>
                   </div>
               </div>
           </div>


       </form>
     </article>
    </div>
</body>
</html>


<?php
if (isset($_POST['request'])) {
    $drop = $_POST['sltExtra'];


    $userid = $_POST['userid'];

    $dba = new DB_Connect();
    $conn = $dba->getConnection();

     $Check1=mysqli_query($conn,"SELECT * FROM users WHERE Staff_ID='$userid'");
     $num_rows = mysqli_num_rows($Check1);

     if($num_rows == 0) {
         //$validNo = "Invalid Staff ID";
         //echo '<script type="text/javascript">alert("' . $validNo . '")</script>';
         echo '<div class="alert alert-danger" role="alert">Invalid Staff ID</div>';
     }
    else {


        $val = "SELECT req_status FROM users WHERE Staff_ID='$userid'";
        $req=mysqli_query($conn,$val);
        $sums = mysqli_fetch_row($req);
        $sum = $sums[0];


        if($sum==1){
           // $InvalidRequest = "Already One Request is Pending";
            //echo '<script type="text/javascript">alert("' . $InvalidRequest. '")</script>';
            echo'<div class="alert alert-info" role="alert">Already One Request Is Pending</div>';
        }
        else {

            $sql = "UPDATE users SET req_status=1,extra='$drop' WHERE Staff_ID='$userid' ";

            if ($conn->query($sql) === TRUE) {
                echo'<div class="alert alert-success" role="alert">Request Sent Successfully</div>';

            } else {
                echo '<div class="alert alert-danger" role="alert">Request Failed</div>' . $conn->error;

            }
        }

  }
    $conn->close();
}
?>
