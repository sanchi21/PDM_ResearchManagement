<?php
/**
 * Created by PhpStorm.
 * User: abhay adm
 * Date: 2/1/2015
 * Time: 12:29 PM
 */

require_once("DatabaseControl/DB_Access.php");

$a = new DB_Access();
$name = $a -> login("Sanchayan");
$addrss = $a->getDetails("Sanchayan");

echo "<br>";
echo "PDM Homepage 12:30";
echo "<br>";
echo "Address\t:\t".$addrss;
?>