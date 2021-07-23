<?php 
	// Video 7 (conditional operator)
	
	/*
		==
		===
		!= <>
		!===
	 */
	
	$username = 'moelay';
	$username = 'eilay';

	echo $username."<br>";

	//echo ($username == 'moelay');
	if($username == 'eilay'){ // is equal to if($username != 'moelay')
		//code
		echo "OK this is true<br>";
	}else{
		//wrong condition
		echo "No It is not<br>";
	}


	$age = '18';
	if($age === 18){ // ====  test not only value and datatype 
		echo 'it is 18<br>';
	}else{
		echo 'No<br>';
	}

	// ? = ternary
	$isLogin = false;
	$login = ($isLogin) ? 'it is login' : 'it is not login';
	echo $login."<br>";

	$isTest = 'MOE';
	$test = $isTest ?? 'No value in $isTest';
	echo $test."<br>";


	// ?? => Null coalescing
	$isNull = null; // nothing, no data value
	$null = $isNull ?? 'Sorry NO';
	echo $null;
 ?>