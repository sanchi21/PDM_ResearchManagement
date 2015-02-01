<?php
/**
 * Created by PhpStorm.
 * User: sanchi
 * Date: 2/1/2015
 * Time: 2:49 PM
 */

require_once("DB_Connect.php");

class DB_Access
{

    function login($uname)
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $sql = "SELECT * FROM users WHERE First_Name = '$uname'";
        $result = mysqli_query($conn,$sql);
        $num_results = $result->num_rows;
        $row = $result->fetch_assoc();

        $name = ($row['Last_Name']);

        echo "Name , Hi $name";
        return 0;
    }

    function getDetails($name)
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $stmt = $conn->prepare("select address from users where First_Name=?");

        //bind parameter
        $stmt->bind_param("s",$name);

        //execute query
        $stmt->execute();

        //bind result variables
        $stmt->bind_result($addrs);

        //fetch value
        $stmt->fetch();

        return $addrs;
    }
}
?>