<?php 
	// Exception
	function login($user,$password){
		$d_user = "moe lay";
		$d_pass = "password";

		if($d_user !== $d_pass){
			throw new Exception("Error Processing Request", 1);			
		}
	}

	try{
		login("moon lay","password");
	}catch(Exception $e){
		echo "<pre>";
		print_r($e)."<br>";

		echo "=========================<br>";
		
		echo $e->getMessage()."<br>";
		echo $e->getLine();
	}
 ?>