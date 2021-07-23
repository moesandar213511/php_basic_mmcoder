<!-- Multiple file upload -->

<form action="" method="POST" enctype="multipart/form-data">
	<p>
		<input type="file" name="image[]" multiple>
	</p>
	<p>
		<input type="submit" name="upload" value="Upload">
	</p>
</form>

<?php 
	if(isset($_POST['upload'])){
		echo "<pre>";
		print_r($_FILES);

		$file = $_FILES;
		foreach ($file as $img) {
			print_r($img);
			foreach ($img['name'] as $k => $img_name) {
				$tmp_name = $img['tmp_name'][$k];
				$target_file = 'image/'.$img_name;
				move_uploaded_file($tmp_name,$target_file);
				echo "success";
			}
		}
	}
 ?>