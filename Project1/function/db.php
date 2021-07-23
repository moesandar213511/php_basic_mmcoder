<?php 
	$conn = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// $sql = "insert into user(slug,name,email,password) value(?,?,?,?)";
	// $stmt = $conn->prepare($sql);
	// $stmt->execute([
	// 	'slug',
	// 	'user two',
	// 	'usertwo@gmail.com',
	// 	password_hash('password', PASSWORD_BCRYPT)
	// ]);

	function query($sql, $paras = []){
		global $conn;
		$stmt = $conn->prepare($sql);
		return $stmt->execute($paras);
	}

	function getAll($sql, $paras = []){
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt -> execute($paras);
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	function getOne($sql, $paras = []){
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->execute($paras);
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	// $data = getOne("select * from user");
	// echo "<pre>";
	// print_r($data);


 ?>