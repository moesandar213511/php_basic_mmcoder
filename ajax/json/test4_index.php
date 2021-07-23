<?php 
	// convert array to json
	$arr = [
		[
			'name' => 'moon lay',
			'age' => 25
		],
		[
			'name' => 'moe lay',
			'age' => 22
		]
	];

	$json = '{"name":"moon lay","age":24}';
	echo json_encode($arr); // convert array to json
							// return string. So can output with echo. 
	echo "<br>";
 ?>