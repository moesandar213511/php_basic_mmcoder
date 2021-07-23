<?php 
	// convert array to json
	$arr = [
		'name' => 'myo thant kyaw',
		'age' => 24
	];
	echo json_encode($arr); // convert array to json
							// return string. So can output with echo. 
	echo "<br>";
	
	// convert json to php array
	$json = '{"name":"myo thant kyaw","age":24}'; // json string {"key":"value"}
	echo "<pre>";
	print_r(json_decode($json))."<br>"; // convert json to php array
								 // return array.
	$data = json_decode($json);
	echo $data->name." and ".$data->age; // style which php call object ( -> )
	
	$arr1 = [
		[
			'name' => 'moon lay',
			'age' => 25
		],
		[
			'name' => 'moe lay',
			'age' => 22
		]
	];
 ?>