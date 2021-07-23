<?php 
	require '../init.php';

  // isset, !empty, !
  
  // echo "<pre>";
  // print_r($_SESSION['user']);

  if(!isset($_SESSION['user'])){
    echo setError('Please Login First');
    go('login.php');
  }

  if(isset($_SESSION['user']) and !empty($_SESSION['user'])){
    $session = $_SESSION['user'];
    $s_id = $session->id;
    $s_name = $session->name;
    $s_email = $session->email;
    $s_password = $session->password;
    $select_user = getOne("select * from user where id=?",[$s_id]);
    // print_r($select_user);
  }

  if(($_SERVER['REQUEST_METHOD'] == "POST")){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $e_password = password_hash($password, PASSWORD_BCRYPT);

        if(empty($name)){
            setError("Please Enter Username");
        }

        if(empty($email)){
            setError("Please Enter email");
        }

        if(empty($password)){
          setError("Please Enter Password");
        }

        if(!empty($name) and !empty($email) and !empty($password)){

          $update_account = query("update user set name=?,email=?,password=? where id=?",[$name,$email,$e_password,$s_id]);
          setMsg("Account Updated Successfully");
          // go('update.php?id='.$id);
          go('edit.php');
          die();
        }  
    }

  require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white">My Account</h4>
          > Edit
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <?php
          showError();
          showMsg();

        ?>
        <form action="" method="POST" class="mt-3">
            <!-- name -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="<?php echo $select_user->name; ?>" id=""name class="form-control">
            </div>
            <!-- email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="<?php echo $select_user->email; ?>" class="form-control" />
            </div>
            <!-- password -->
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" value="<?php echo $select_user->password; ?>" class="form-control" />
            </div>
            <input type="submit" value="Update" class="btn btn-primary" /> 
        </form>
      </div>
    </div>
  </div>
  <?php require '../include/footer.php'; ?>

<!-- use Illuminate\Support\Facades\Hash;
Route::get('test',function(){
    echo Hash::make("admin123");
}); -->