<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder","root","");

	$sql = "insert into users(name,age,location) values('aung thu',25,'north dagon')";

	$res = $pdo->prepare($sql);
	$res->execute();
	echo "Success";
 ?>