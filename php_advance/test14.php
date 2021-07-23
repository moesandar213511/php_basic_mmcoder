 <!-- password hash -->

 <?php 
 	$hash = password_hash("hello123",PASSWORD_BCRYPT);
 	echo $hash."<br>";

 	$hashed_password = "$2y$10$/LdVX6DXbWaXS1O9zhbM2uX9pfjM77Jp0iOauMWp4NbV1r857o7iO";
 	if(password_verify("hello123", $hashed_password)){
 		echo "password match";
 	}else{
 		echo "wrong password";
 	}
  ?>