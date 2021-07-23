<?php 
// Validation function
	//trim
	//stripslashed
	//stripp_tags
	//htmlspecialchars
	//filter_var

	$name = "   Hello";
	echo "Hey!". trim($name,'o')."<br>";

	$test = "\ \n \t hello";
	echo stripslashes($test)."<br>";	

	$test1 = "<h1>Mingalar Par</h1>";
	echo strip_tags($test1)."<br>"; // delete html tag

	$test2 = "<h2>Moe Sandar</h2>";
	echo htmlspecialchars($test2)."<br>"; // not work html tag, but output it.

	$email = "hello";
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "Email Valid";
	}else{
		echo "No valid";
	}
	echo "<br>";

	$url = "http://ghi.com";
	if(filter_var($url,FILTER_VALIDATE_URL)){
		echo "url is valid";
	}else{
		echo "url is not valid";
	}
 ?>