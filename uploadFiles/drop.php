<?php
	$str = file_get_contents('php://input');
	$filename = md5(time()).'.jpg';
	$path = "upload/".$filename;
	file_put_contents($path,$str);
	echo $path;

?>
