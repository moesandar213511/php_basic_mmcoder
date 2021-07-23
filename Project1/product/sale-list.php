<?php 
	require '../init.php';

	if(isset($_GET['delete'])){
		$product_slug = $_GET['product_slug'];
		$sale_id = $_GET['id'];
		$product_id = getOne("select product_id from product_sale where id=?",[$sale_id])->product_id;

		query("update product set total_quantity=product.total_quantity+1 where id=?", [$product_id]);
		// delete product sale
		query("delete from product_sale where id=?",[$sale_id]);
		setMsg("Sale Deleted Success");
		go('sale-list.php?product_slug='.$product_slug);
		die();
	}


	// get all product sale list
	if(isset($_GET['product_slug']) and !empty($_GET['product_slug'])){
		$product_slug = $_GET['product_slug'];
		$product = getOne("select * from product where slug=?",[$product_slug]);
		// print_r($product);
		$sales = getAll("select * from product_sale where product_id=?",[$product->id]);
		// print_r($sales);
	}

	require '../include/header.php';
?>
	<!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white"><a href="index.php">Product</a></h4>
          > 
          <?php echo $product->name; ?>
          > Sale List
        </span><br>
        <a href="index.php" class="btn btn-sm btn-warning">Back</a>
      </div>
    </div>
  </div>

    <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
      	<?php 
      		showMsg();
      		showError();
      	 ?>
      	<table class="table table-striped text-white mt-2">
      		<tr>
                <th>Sale Price</th>
                <th>Date</th>
                <th>Option</th>
            </tr>
      		<?php 
      			foreach($sales as $s){
      		?>
      			<tr>
	      			<td><?php echo $s->sell_price; ?></td>
	      			<td><?php echo $s->date; ?></td>
	      			<td>
	      				<a class="btn btn-sm btn-danger" href="sale-list.php?delete=true&id=<?php echo $s->id; ?>&product_slug=<?php echo $product_slug; ?>" onclick="return confirm('Sure?')">
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
<?php 
	require '../include/footer.php';
?>