<?php 
        require ('init.php');

        if(isset($_SESSION['user'])){
            go('index.php');
        }
        // $errors = []; // validate
        if(($_SERVER['REQUEST_METHOD'] == "POST")){
            // echo "<pre>";
            // print_r($_REQUEST); <OR> print_r($_POST);
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            
            // start validate
            // if(empty($password)){
            //   $errors[] = "Enter email";
            // }
            // 
            // if(!count($errors)){
              // login process
            
            // end validate
            
            if(empty($email)){
                setError("Please Enter email");
            }

            if(empty($password)){
              setError("Please Enter Password");
            }

            $user = getOne(
                'select * from user where email=?',[$email]
            );

            if(!$user){
                setError('Email Not Found');
            }
            if($user){
                $var = password_verify($password, $user->password);
                if(!$var){
                    setError("Wrong Password");
                }
            }

            if(!hasError()){
                $_SESSION['user'] = $user;
                go("index.php");
            }
        }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/argon-design-system.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container text-center mt-5">
      <div class="row">
        <div class="col-4 offset-4">
          <div class="card">
            <div class="card-header bg-dark text-white">Login</div>
            <div class="card-body">
                <?php 
                    // start validate
                    // foreach($errors as $e){
                    //   echo  "<div class='alert alert-danger'>$e</div>";
                    
                    // }
                    // end validate
                    showError();
                ?>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Enter Email</label>
                  <input type="email" name="email" class="form-control" />
                </div>
                <!-- password -->
                <div class="form-group">
                  <label for="password">Enter Password</label>
                  <input type="password" name="password" class="form-control" />
                </div>
                <input type="submit" value="Login" class="btn btn-primary" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>






