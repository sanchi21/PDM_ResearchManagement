<?php
/**
 * Created by PhpStorm.
 * User: sanchi
 * Date: 2/1/2015
 * Time: 2:49 PM
 */

require_once("DatabaseControl/DB_Connect.php");

class DB_Access
{

    function login($uname,$pass)
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $sql = "SELECT First_Name from users where Staff_ID='$uname' and Password='$pass'";

        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
        $username="Error";
        if($count>0)
        {
            $username = mysqli_fetch_row($result);
        }

        return $username;
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

    function getRoots()
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $result = $conn->query("select Name from storage where Folder='root'");

        return $result;
    }

    function getFiles($root)
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $result = $conn->query("select * from storage where Folder='".$root."'");

        return $result;
    }

    function downloadFile($id)
    {
        $dba = new DB_Connect();
        $conn = $dba->getConnection();
        $result = $conn->query("SELECT * FROM storage WHERE File_ID = '".$id."'");

        return $result;
    }
}
?>