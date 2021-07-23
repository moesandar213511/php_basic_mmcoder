<?php 
	//for 
	//while
	//do while
	//foreach
	
	for($i = 1; $i <= 10; $i++){
		echo $i." ";
	}
	echo "<br>";
	
	//=======================

	$x = 10;
	while($x >= 1){
		echo $x. " ";
		$x--;
	}
	echo "<br>";

	//=======================

	$y = 11;
	do{
		echo $y." ";
		$y++;
	}while($y <= 20);
	echo "<br>";

	//=======================
	
	$arr = ['a','b','c'];
	for($i = 0; $i < count($arr); $i++){
		echo $arr[$i].",";
	}
	echo "<br>";

	//====== foreach loop is good than for loop to output element in array ======//
	
	foreach($arr as $arr_data){
		echo $arr_data.",";
	}
	echo "<br>";

	$arr1 = ['a' => 'A', 'b' => 'B', 'c' => 'C'];

	foreach ($arr1 as $key => $value) {
		echo $key." => ".$value."<br>";
	}
	
 ?>