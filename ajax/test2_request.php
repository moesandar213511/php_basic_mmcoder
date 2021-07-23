<?php 
	//echo "String";
	session_start();

	$_SESSION['like']++;

	if(isset($_SESSION['like'])){
		echo $_SESSION['like']++."<br>";
		print_r($_SESSION);
	}
 ?>