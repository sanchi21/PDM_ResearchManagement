<?php
/**
 * Created by PhpStorm.
 * User: sanchi
 * Date: 2/4/2015
 * Time: 11:56 AM
 */
require_once("DatabaseControl/DB_Access.php");

if(isset($_GET['id']))
{
// if id is set then get the file with the id from database

    $dba = new DB_Access();
    $id    = $_GET['id'];

    $result = $dba ->downloadFile($id);
    while($row = $result->fetch_assoc())
    {
        $name = $row["Name"].".pdf";
        $size = $row["Size"];
        $type = "application/pdf";
        $content = $row["File_Content"];
        //header("Content-length: $size");
        //header("Content-type: $type");
        header("Content-Disposition: attachment; filename=$name");
        echo $content;
    }

    exit;
}
?>