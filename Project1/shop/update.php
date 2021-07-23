<?php 
	require '../init.php';

  if(!isset($_SESSION['user'])){
    echo setError('Please Login First');
    go('login.php');
  }

  $id = $_GET['id'];
  // echo $id;
  if($id > 1 or $id < 1){
    $id = 1;
    $shop = getOne("select * from shop where id=?",[$id]);
  }else{
    $shop = getOne("select * from shop where id=?",[$id]);
  }
  // print_r($shop);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $update_shop = query("update shop set name=? where id=?",[$name,$id]);
    setMsg("Shop Updated Successfully");
    // go('update.php?id='.$id);
    go('index.php');
    die();
  }

  require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white">Shop</h4>
          > Edit
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
          <a href="<?php echo $root.'shop' ?>" class="btn btn-sm btn-success">View Shop</a>
        <?php
          showError();
          showMsg();

        ?>
        <form action="" method="POST" class="mt-3">
            <div class="form-group">
              <label for="name">Enter Shop Name</label>
              <input type="text" name="name" value="<?php echo $shop->name; ?>" id=""name class="form-control">
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