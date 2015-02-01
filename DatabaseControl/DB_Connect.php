<?php
/**
 * Created by PhpStorm.
 * User: sanchi
 * Date: 2/1/2015
 * Time: 1:21 PM
 */

class DB_Connect
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dataBase = "pdm";

    //Get Connection
    function getConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dataBase);

        //check connection
        if ($conn->connect_error) {
            die("Connection Failed : " . $conn->connect_error);
        }

        return $conn;
    }

}
?>