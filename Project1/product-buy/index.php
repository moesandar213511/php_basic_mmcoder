<?php 
	require '../init.php';
  // delete
  if(isset($_GET['action'])){
    $id = $_GET['id'];
    $product_slug = $_GET['product_slug'];
    $product_buy_data = getOne("select * from product_buy where id=?",[$id]);
    $product_data = getOne("select * from product where slug=?",[$product_slug]);
    $total_qty = $product_data->total_quantity - $product_buy_data->total_quantity;
    // echo $total_qty;
    // die($total_qty);
    query("delete from product_buy where id=?",[$id]);
    query("update product set total_quantity=? where slug=?",[$total_qty,$product_slug]);
    setMsg("Product Buy Deleted");
    go("index.php?product_slug=".$product_slug);
    die();
  }

  // get all product buy
  $product_slug = $_GET['product_slug'];
  $product = getOne("select * from product where slug=?",[$product_slug]);
  $product_buy = getAll("select * from product_buy where product_id=?",[$product->id]);
  
  // echo "<pre>";
  // print_r($product_buy);

	require '../include/header.php';
?>

<!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white">Product Buy</h4>
          > All
        </span>
      </div>
    </div>
  </div>

   <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <a href="create.php?product_slug=<?php echo $product_slug; ?>" class="btn btn-warning">Create</a>
        <?php 
          showMsg();
          showError();
         ?>
      	<table class="table table-striped">
          <tr>
            <td>Buy Price</td>
            <td>Buy Quantity</td>
            <td>Buy Date</td>
            <td>
              Option
            </td>
          </tr>
          <?php 
          foreach ($product_buy as $bb) {
          ?>
          <tr class="text-white">
            <td><?php echo $bb->buy_price; ?></td>
            <td><?php echo $bb->total_quantity ?></td>
            <td><?php echo $bb->buy_date ?></td>
            <td>
              <a href="index.php?action=delete&product_slug=<?php echo $product_slug; ?>&id=<?php echo $bb->id; ?>" class="btn btn-sm btn-danger" onclick="confirm('Sure?')">
                <span class="fa fa-trash"></span>
              </a>
            </td>
          </tr>
          <?php 
            }
          ?>
        </table>
      </div>
    </div>
  </div>

<?php '../include/footer.php'; ?>