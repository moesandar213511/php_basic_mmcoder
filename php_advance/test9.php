 <!-- cookie and session -->
<?php 
	session_start(); // should write before html tag, 
					 // After session is created, session can be called from any file and from anywhere in the server
					 // session is not work if the browser is closed
					 
	//$_SESSION['name'] = 'moelay'; // $_SESSION['key'] = 'value';
	echo $_SESSION['name']."<br>";
	print_r($_SESSION); // output with array style all session in the browser
	//session_destroy(); // to delete all session 
	echo $_SESSION['name'];

	echo "===============================<br>";

	setcookie('name','moesandar',time()+(60*60*24));// setcookie(key,value,expired_date);
	echo "success set"."<br>";				// should write before html tag, 
	echo $_COOKIE['name'];					// After cookie is created, cookie can be called from any file 											and from anywhere in the server 
											// cookie work also after the browser is closed because developer can do expired date.
					 
 ?>