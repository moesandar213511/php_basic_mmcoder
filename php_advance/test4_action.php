<?php 
	echo "<pre>";
	print_r($_POST)."<br>";

	if(isset($_POST['name']) && isset($_POST['password'])){
		echo ($_POST['name'])." => ".$_POST['password'];
	}else{
		echo "Something wrong.Please login in again";
	}
	
 ?>