<?php 
	// Video 8 (function and scope)
	$hello = 'hello'; // global scope
	function showName($name = 'default'){
		echo $name;
		echo $hello; // global scope // can use declare global keyword
		$n = 'world'; // local scope
	}
	showName('strr');
	echo $n."<br>"; // local scope

	//=====================================

	// Video 9 (index and assoc array)
	// index array , associative array
	
	$userData = [
		'name' => 'Moe Sandar',
		'age' => 24,
		'isLikeBlack' => true,
		'likeColour' => ['red','green','blue'] // index array style
	];
	echo $userData['name'];

	echo "<pre>";
	var_dump($userData['likeColour']);
	echo "<br>";

	echo($userData['likeColour']['0']);
	echo "<br>";

	//=====================================

	// Video 10 (string number array functions)
	// string function
	// math function
	// array function
	
	$str = "string";
	echo strlen($str)."<br>";
	echo strrev($str)."<br>";
	echo round(0.2)."<br>";
	echo round(0.5)."<br>";
	echo rand(1,100)."<br>"; // random output within range 1 to 100
	$arr = ['b','a','c'];
	sort($arr);
	print_r($arr);
 ?>