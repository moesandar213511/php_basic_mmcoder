<?php 
	require '../init.php';

	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}
	
	$shop = getOne("select * from shop");

    require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white"><a href="index.php">Shop</a></h4>
          > All
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <!-- <a href="create.php" class="btn btn-sm btn-warning">Create</a> -->
        <?php 
          showMsg(); 
          showError();
        ?>
        <table class="table table-striped text-white mt-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="tblData">
                <tr>
                    <td><?php echo $shop->name; ?></td>
                    <td>
                    	<a href="update.php?id=<?php echo $shop->id; ?>" class="btn btn-sm btn-primary">
                            <span class="fas fa-edit"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php 
 require '../include/footer.php'; 
  ?> 

