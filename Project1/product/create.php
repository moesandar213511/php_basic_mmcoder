<?php 
    require '../init.php';
    if(!isset($_SESSION['user'])){
    echo setError('Please Login First');
      go('login.php');
    }

    if(isset($_GET['page'])){
      paginateCategory(2);
      die();
    }
    $category = getAll("select * from category");
    // echo "<pre>";
    // print_r($category);
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $category_id = $_REQUEST['category_id'];
      $slug = slug($_REQUEST['name']);
      $name = $_REQUEST['name'];
      $description = $_REQUEST['description'];
      $total_quantity = $_REQUEST['total_quantity'];
      $sell_price = $_REQUEST['sell_price'];
      $buy_price = $_REQUEST['buy_price'];
      $buy_date = $_REQUEST['buy_date'];


      $file = $_FILES['image'];
      // echo "<pre>";
      // print_r($file);
      if(empty($file['name'])){
        setError("Please Choose Image");
      }else{
        //check image size
        //byte kilobyte megabyte => 1024b 1kb, 1024kb 1mb => 1024byte * 1024byte = 1kb * 1kb * 2 = 1mb * 2 = 2mb
        $file_limit_size = 1024 * 1024 * 2;
        $file_size = $file['size'];
        if($file_limit_size < $file_size){
          setError("Image must be 2 MB");
        }
        // image upload
        $img_name =  slug($file['name']); // <or> can use uniqid()
        $tmp_name = $file['tmp_name'];
        $img_path = "../image/".$img_name; 
        move_uploaded_file($tmp_name, $img_path);

        // save to product
        query(
          "insert into product(category_id,slug,name,image,description,total_quantity,sell_price) values(?,?,?,?,?,?,?)",[$category_id,$slug,$name,$img_name,$description,$total_quantity,$sell_price]
        ); 
        $product_id = $conn->lastInsertId();
        
        // save to product
        query("insert into product_buy(product_id,buy_price,total_quantity,buy_date) values(?,?,?,?)",[$product_id,$buy_price,$total_quantity,$buy_date]);
        setMsg('Product Created Successfully');
        
      }

      

    }

    require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white">Product</h4>
          > All
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <a href="../product/index.php" class="btn btn-sm btn-success">View All Data</a>
        <?php 
          showError();
          showMsg();
         ?>
        <form action="" method="POST" enctype="multipart/form-data" class="mt-3 row">
          <div class="col-6">
              <h6 class="text-white">Product Info</h6>
              <!-- Category -->
              <div class="form-group">
                <label for="">Choose Category</label>
                <select name="category_id" id="" class="form-control">
                  <?php
                  foreach($category as $cc){
                    echo "<option value='{$cc->id}'>{$cc->name}</option>";
                  }
                  ?>
                </select>
              </div><br>
                <!-- name -->
                <div class="form-group">
                  <label for="">Enter name</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <!-- image -->
                <div class="form-group">
                  <label for="">Choose Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                <!-- Description -->
                <div class="form-group">
                  <label for="">Enter Description</label>
                  <textarea name="description" class="form-control" cols="3" rows="4"></textarea>
                </div>
          </div>  

           <!-- Product Invertory -->
          <div class="col-6">
            <h6 class="text-white">Invertory</h6>
            <span class="text-primary">
              <span class="fas fa-info-circle text-primary"></span>
              For Sale Info
            </span>

            <div class="form-group">
              <label for="">Sell Price</label>
              <input type="number" class="form-control" name="sell_price">
            </div>
            <span class="text-primary">
              <span class="fas fa-info-circle text-primary"></span>
              For Buy Info
            </span>

            <!-- total quantity -->
            <div class="form-group">
              <label for="">Total Qty</label>
              <input type="number" class="form-control" name="total_quantity">
            </div>
            <!-- buy price -->
            <div class="form-group">
              <label for="">Buy Price</label>
              <input type="number" class="form-control" name="buy_price">
            </div>
            <!-- buy date -->
            <div class="form-group">
              <label for="">Buy Date</label>
              <input type="date" class="form-control" name="buy_date" value="<?php echo date('Y-m-d') ?>">
            </div>
          </div>
          <div class="col-12">
            <input type="submit" value="Create" class="btn btn-warning">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php require '../include/footer.php'; ?>