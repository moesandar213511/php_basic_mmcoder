<?php 
	require_once('include/header.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		// delete image in the folder 
		$sql_select = "select * from crud where id = ?";
		$result = $pdo->prepare($sql_select);
		$result->execute([$id]);
		$delete_img = $result->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($delete_img);
		unlink('images/'.$delete_img['image']);

		// delete image name in the database
		$sql = "delete from crud where id =?";
		$res = $pdo->prepare($sql)->execute([$id]);
		header("Location:index.php?delete=success");
	}
 ?>