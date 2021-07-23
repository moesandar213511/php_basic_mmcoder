<?php 
	require '../init.php';

  // echo "<pre>";
  // print_r($_SESSION);
	
	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];

    if(empty($name)){
      setError("Username is required");
    }
    if(!hasError()){
      $res = query('insert into pcategory(slug,name) values(?,?)',[slug($name),$name]);
      if($res){
        setMsg('Category Created Successfully');
      }
    }
  }

    require '../include/header.php';
 ?>
<link rel="stylesheet" href="../assets/css/bootstrap.css" />
<link rel="stylesheet" href="../assets/css/argon-design-system.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/style.css">


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white">Category</h4>
          > All
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <a href="index.php" class="btn btn-sm btn-success">View All Data</a>
        <?php
          showError();
          showMsg();

        ?>
        <form action="" method="POST" class="mt-3">
            <div class="form-group">
              <label for="">Enter Name</label>
              <input type="text" name="name" id="" class="form-control">
            </div>
            <input type="submit" value="Create" class="btn btn-sm btn-warning">
        </form>
      </div>
    </div>
  </div>
  <?php require '../include/footer.php'; ?>

  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.js"></script>