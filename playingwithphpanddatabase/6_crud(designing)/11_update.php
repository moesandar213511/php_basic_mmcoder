	<?php 
		require_once 'include/header.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql = "select * from crud where id = ?";
			$res = $pdo->prepare($sql);
			$res->execute([$id]);
			$data = $res->fetch(PDO::FETCH_ASSOC);
			// echo "<pre>";
			// print_r($data);
		}
	?>
	
	<a href="index.php" class="btn btn-dark btn-sm">View All Data</a>
	<div class="card">
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
			    <div class="form-group">
			    	<label for="">Enter Username</label>
			    	<input type="text" name="username" value="<?php echo $data['name'] ?>" class="form-control" id="">
			    </div>
			    <div class="form-group">
			    	<label for="">Choose Image</label>
			    	<input type="file" name="image" class="form-control" id="">
			    	<img src="images/<?php echo $data['image']; ?>" width="100px" style="border-radius: 20%;" alt="">
			    </div><br>
			    <input type="submit" name="submit" class="btn btn-danger" value="Update">
		    </form>
		</div>
	</div>

	<?php 
		// echo "<pre>";
		// print_r($_SERVER); // REQUEST_METHOD is get method before submit the form with post method
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$name = $_POST['username'];
			// echo "<pre>";
			// print_r($_FILES);
			if(($_FILES['image']['tmp_name']) != NULL){ // <or> if(($_FILES['image']['tmp_name']) != ""){ 
				// echo "image";
				$tmp_name = $_FILES['image']['tmp_name'];
				$img_name = uniqid()."_".$_FILES['image']['name'];
				$path = "images/".$img_name;
				unlink('images/'.$data['image']);
				move_uploaded_file($tmp_name,$path);
			}else{
				// echo "no image";
				$img_name = $data['image'];
			}

			// update query
			$sql = "update crud set name=?,image=? where id=?";
			$res = $pdo->prepare($sql);
			$res->execute([$name,$img_name,$id]);

			// redirect index.php
			header("Location:index.php?update=success");
		}

	 ?>
	<?php require_once 'include/footer.php' ?>
							
					