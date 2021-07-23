<?php 
	require '../init.php';
	
	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}
  // update category
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      // print_r($_POST);
      $slug = $_GET['slug'];
      $name = $_POST['name'];
      query("update pcategory set name=?,slug=? where slug=?",[$name,slug($name),$slug]);
      go('index.php');

  }

  // check category
  if(isset($_GET['slug'])){
    $slug = $_GET['slug'];
    $category = getOne("select * from pcategory where slug=?", [$slug]);
    if(!$category){
      setError('Category Not Found');
      go('index.php');
      die();
    }
    // print_r($category);

  }else{
    setError('Category Not Not Found');
    go('index.php');
    die();
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
          > Edit
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
          <a href="<?php echo $root.'category/index.php' ?>" class="btn btn-sm btn-success">View All Data</a>
        <?php
          showError();
          showMsg();

        ?>
        <form action="" method="POST" class="mt-3">
            <div class="form-group">
              <label for="name">Enter Name</label>
              <input type="text" name="name" value="<?php echo $category->name; ?>" id=""name class="form-control">
            </div>
            <input type="submit" value="Update" name="update" class="btn btn-sm btn-warning">
        </form>
      </div>
    </div>
  </div>
  <?php require '../include/footer.php'; ?>

  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.js"></script>