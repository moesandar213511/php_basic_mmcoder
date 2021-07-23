<?php 
	// two method to connect php with database 
	// 1. mysqli => only connect with mysql db
	// 2. pdo(php data object) => can connect any database
	// $pdo = new PDO(configuration connected database,database username, database password); 3 parameters
	
	$pdo = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder","root","");
	$sql = "select * from users";

	$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); //fetch() => fetch only first one
	// echo "<pre>";
	// print_r($data);
	foreach($data as $dd){
		echo $dd['name']."<br>".$dd['age']."<br>".$dd['location']."<br>";
	}
 ?>