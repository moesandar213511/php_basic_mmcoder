<!-- upload file -->
<form action="" method="POST" enctype="multipart/form-data">
	<p>
		<input type="file" name="image">
	</p>
	<p>
		<input type="submit" name="upload" value="Upload">
	</p>
</form>

<?php 
	//move_uploaded_file($tmp, destination) // $tmp = temp path, /image/test.png = image directory
	if(isset($_POST['upload'])){
		echo "<pre>";
		print_r($_FILES['image']);

		$img_name = $_FILES['image']['name'];
		$target_file = "image/".$img_name;
		$tmp = $_FILES['image']['tmp_name'];

		if(move_uploaded_file($tmp,$target_file)){
			echo "Upload Successfully";
		}else{
			echo "Something wrong.Please try again!!";
		}
	}

 ?>