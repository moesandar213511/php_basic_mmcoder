<?php 
	// Video 4 (run php file)
	echo "Hello PHP<br>";
	echo (5+5)."<br>";

	//=================================

	// Video 5 (comment variable datatype)
	// single line comment
	/*
		Multiline comment
	 */
	# comment with hash sign
	
	// variable
	$name = "moelay";
	$age = 24;
	$float = 1.1;
	$isLikeBlack = false;

	$isLikeFruits = ['mango','orange','apple']; // index array
	var_dump($name)."<br>";

	echo "<pre>";
	var_dump($isLikeFruits);
	echo "<br>";

	//==================================

	// Video 6 (operator)
	/*
		Arithmetic operator
		** %

		Assignment operator
		+= etc

		Increment Decrement
		++var;
		var++;

		string operator
		.
		.=
	 */ 
	
	$num1 = 3;
	$num2 = 2;
	echo "$num1 + $num2 = ".($num1 + $num2)."<br>";
	echo $num1 ** $num2."<br>";
	echo $num1 % $num2."<br>";
	echo ($num1 += 1)."<br>";

	$name = "moelay";
	$name1 = 'hello world';

	echo $name." " .$name1."<br>";

	$name .= ' => 24 years old'; // is equal to $name = $name . ' => 24 years old';
	echo $name;

 ?>