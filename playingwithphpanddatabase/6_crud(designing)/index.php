	<!-- create,update,delete => use pdo prepare(),execute -->
	<?php require_once 'include/header.php'; ?>
	<a href="7_create.php" class="btn btn-success btn-sm">Create</a>

	<!-- Create Alert Success -->
	<?php 
		if(isset($_GET['create'])){
	?>
		<br><div class="alert alert-success">Create Data Successfully!</div>
	<?php
		}
	 ?>

	 <!-- Delete Alert Success -->
	 <?php 
	 	if(isset($_GET['delete'])){
	 ?>
	 	<div class="alert alert-success">Delete Data Successfully!</div>
	 <?php
	 	}
	  ?>

	   <!-- Update Alert Success -->
	 <?php 
	 	if(isset($_GET['update'])){
	 ?>
	 	<div class="alert alert-success">Update Data Successfully!</div>
	 <?php
	 	}
	  ?>

	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Images</th>
			<th>Name</th>
			<th>Options</th>
			<th></th>

		</tr>
		<?php
		$no = 1;
		$sql = "select * from crud";
		$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $dd){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><img src="images/<?php echo $dd['image']; ?>" width="100px" style="border-radius: 30%;" alt=""></td>
			<td><?php echo $dd['name'] ?></td>
			<td>
				<a href="11_update.php?id=<?php echo $dd['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
			</td>
			<td>
				<a href="10_delete.php?id=<?php echo $dd['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
			</td>
		</tr>	
		<?php
			}
		?>
		
	</table>
	<?php require_once 'include/footer.php' ?>


					