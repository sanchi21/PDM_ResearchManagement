<?php
require("../DatabaseControl/DB_Connect.php");

?>

<?php

$dba = new DB_Connect();
$conn = $dba->getConnection();
$sql = mysqli_query($conn,"SELECT * FROM users WHERE req_status=1");
$count =mysqli_num_rows($sql);

$conn->close();

?>


<html>
<head>

    <link href="css/request.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
      <div class="request-body">
        <article class="container-request center-block">
          <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" Action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">

              <button class="btn btn-primary" type="submit" name="abc">
                 Requests <span class="badge"><?php echo $count;?> </span>
              </button>

          </form>
        </article>
      </div>
</body>
</html>

<?php
if (isset($_POST['abc'])) {
    $dba = new DB_Connect();
    $conn = $dba->getConnection();
    $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE req_status=1");
    $count1 = mysqli_num_rows($sql1);
    $count=0;


    $details=mysqli_query($conn, "SELECT First_Name,Last_Name,Staff_ID,extra FROM users WHERE req_status=1");

    while ($row=mysqli_fetch_array($details)) {
        $First_Name = $row['First_Name'];
        $Last_Name = $row['Last_Name'];
        $Staff_ID = $row['Staff_ID'];
        $extra = $row['extra'];


        echo'
        <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" >
        <div class="panel panel-primary" style="width:50% ">
             <div class="panel-heading" ><h4><b>Request For storage</b></h4></div>
               <div class="panel-body">
                    <h4>' . $First_Name . ' ' . $Last_Name . ' has requested ' . $extra . ' GB of extra storage space</h4>
               </div>
               <div class="panel-footer">
                    <a href="request.php?id=' . $Staff_ID . '&extra=' . $extra . '" role="button" name="Acc_request" action="request.php" tabindex="5" class="btn btn-info"  >Accept </a>
                    <a href="request12.php?id=' . $Staff_ID . '&extra=' . $extra . '" role="button" name="Del_request" action="request12.php" tabindex="5" class="btn btn-info" >Delete Request </a>
               </div>


        </div>
        </form>
        ';

    }
    $conn->close();
}

?>




