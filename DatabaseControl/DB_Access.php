<?php
/**
 * Created by PhpStorm.
 * User: sanchi
 * Date: 2/1/2015
 * Time: 1:21 PM
 */

class DB_Access
{
    private $host;
    private $user;
    private $pass;
    private $dataBase;
    private conn;

    void __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dataBase = "";
    }

    function getConnection()
    {
        try {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dataBase);
        }
        catch(Exception e)
        {
            echo "Connection Error!";
        }
    }
}

?>