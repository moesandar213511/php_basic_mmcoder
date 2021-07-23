<?php 
	//and &&, or ||
	
	$time = 7;

	if($time >= 6 and $time <= 10){
		echo 'Good Morning';
	}elseif($time >= 12 and $time <= 15){
		echo "Good Afternoon";
	}else{
		echo "Good Evening";
	}
	echo "<br>";


	$likeFruit = "mango";
	switch ($likeFruit) {
		case 'mango':
			echo "I like Mango";
			break;
		case 'apple':
			echo "I like Apple";
			break;
		case 'orange':
			echo "I like Orange";
			break;
		case 'piapple':
			echo "I like piapple";
			break;
		
		default:
			echo "I don't like any fruits";
			break;
	}
 ?>