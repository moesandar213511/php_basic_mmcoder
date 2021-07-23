<?php 
	// use preparestatment because of security
	$pdo = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder","root","");
	
	$user_id = $_GET['user_id'];

	$sql = "select * from users where id=?";

	$res = $pdo->prepare($sql);
	$res->execute([$user_id]);
	$data = $res->fetch(PDO::FETCH_ASSOC);

	// echo "<pre>";
	// print_r($data);
	if($data){
		echo $data['name'];	
	}else{
		echo "Data not found";
	}
 ?>