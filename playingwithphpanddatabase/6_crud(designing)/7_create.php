	<?php require_once 'include/header.php'; ?>
	
	<a href="index.php" class="btn btn-dark btn-sm">Back</a>
	<div class="card">
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
			    <div class="form-group">
			    	<label for="">Enter Username</label>
			    	<input type="text" name="username" class="form-control" id="">
			    </div>
			    <div class="form-group">
			    	<label for="">Choose Image</label>
			    	<input type="file" name="image" class="form-control" id="">
			    </div><br>
			    <input type="submit" name="submit" class="btn btn-danger" value="Create">
		    </form>
		</div>
	</div>

	<?php 
		// echo "<pre>";
		// print_r($_SERVER); // REQUEST_METHOD is get method before submit the form with post method
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){ // <or> if($_POST['submit'])
			// echo "<pre>";
			// print_r($_FILES); 
			$username = $_POST['username'];
			$imgname = uniqid()."_".$_FILES['image']['name'];
			$tmpname = $_FILES['image']['tmp_name'];
			$path = "images/".$imgname;

			// upload file
			move_uploaded_file($tmpname, $path);
			
			// insert file
			$sql = "insert into crud(name,image) values(?,?)";
			$res = $pdo->prepare($sql);
			$res->execute([$username,$imgname]);
			
			// redirect to index.php
			header('Location:index.php?create=success');
		}

	 ?>
	<?php require_once 'include/footer.php' ?>
							
					