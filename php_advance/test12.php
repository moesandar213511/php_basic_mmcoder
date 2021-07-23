<!-- redirect -->
<?php 
	//header("Location:http://google.com");
	
	function redirect($path){
		header("Location:{$path}");
	}
	redirect("http://apkpure.com"); // php file or url link
 ?>