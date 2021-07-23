<?php 
     /* 
	Http methods
	GET POST PUT PATCH DELETE

	Super Global Variable => return assoc array
	$_SERVER
	$_GET $_POST
	$_SESSION
	$_COOKIE
      */
	echo "some";
	
	echo "<pre>";
	//print_r($_SERVER['QUERY_STRING']);

	//print_r($_GET[]);
	echo $_GET['name']."<br>"; // localhost/.../test2.php/?name=moesandar&age=24
	

	if(isset($_GET['age'])){
		echo $_GET['age'];
	}else{
		echo "Age is not";
	}
?>