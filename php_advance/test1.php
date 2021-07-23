<!-- Playing with file -->
<?php 
	// to write
	$file = fopen("hello.txt","w");// resource data type
	fwrite($file,"Hello Mingalar par");

	// to read
	$file = fopen("hello.txt","r");
	echo fread($file,filesize("hello.txt"));
 ?>