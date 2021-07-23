<form action="" method="POST">
	<p>
		<input type="text" name="name" placeholder="Name">	
	</p>
	<p>
		<input type="text" name="content" placeholder="Content">
	</p>
	<p>
		<input type="submit" name="submit" value="submit">
	</p>
</form>

<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$content = $_POST['content'];

		$file_name = $name.".txt";
		
		// to write
		$file = fopen($file_name,"w");// resource data type
		fwrite($file,$content);
		//to read
		$file_read = fopen($file_name,"r");
		echo fread($file_read,filesize($file_name));


	}
 ?>