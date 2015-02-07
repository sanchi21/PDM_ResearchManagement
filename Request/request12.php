<html>
<head>

    <link href="css/request.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body></body>
</html>


<?php
require("../DatabaseControl/DB_Connect.php");

   $id = $_GET["id"];

   $extra=$_GET["extra"];

    $dba = new DB_Connect();
    $conn = $dba->getConnection();

    $sql = "UPDATE users SET req_status=0,extra=0 WHERE Staff_ID='$id' ";

    if ($conn->query($sql) === TRUE) {
        echo'<div class="alert alert-info" role="alert">Request Deleted</div>';
    }
    else {
        echo '<script type="text/javascript">alert("Failed")</script>';

    }



?>
