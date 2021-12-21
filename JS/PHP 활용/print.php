<?php


	$mysqli = new mysqli("164.125.36.78", "ID(학번)", "비밀번호", "DB이름","DB포트");

	
if ($mysqli->connect_errno){

		echo "Failed to connect to MySQL";

	}

?>
	<h1>$_SERVER</h1>
<?php

	
	
	
foreach ( $_SERVER as $key => $value)
 
		print("<p> $key is $value </p>");


?>	
	<h1>$_ENV</h1>	
<?php


	
foreach ( $_ENV as $key => $value)
 
		print("<p> $key is $value </p>");


?>