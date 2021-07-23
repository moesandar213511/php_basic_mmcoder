<form action="" method="POST">
	<p><input type="text" name="name"></p>
	<p><input type="number" name="age"></p>
	<p><input type="text" name="location"></p>
	<p><input type="submit" name="submit" value="create"></p>
</form>

<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder","root","");
	// echo "<pre>";
	// print_r($_POST);
	
	// echo "<pre>";
	// print_r($_SERVER['REQUEST_METHOD']);
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){ // (or) if($_POST['submit']){
		$name = $_POST['name'];
		$age = $_POST['age'];
		$location = $_POST['location'];

		$sql = "insert into users(name,age,location) values(?,?,?)";

		$res = $pdo->prepare($sql);
		$res->execute([$name,$age,$location]);
		echo "Insert Success";
	}

 ?>