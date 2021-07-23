<?php 
	require '../init.php';
	
	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}

  // product_sale
  if(isset($_GET['sale']) and !empty($_GET['sale'])){
    $product_slug = $_GET['product_slug'];

    $product = getOne("select * from product where slug=?",[$product_slug]);

    $date = date('Y-m-d');
    $sell_price = $product->sell_price;
    $update_total_qty = $product->total_quantity - 1;
    $update_id = $product->id;

    query("update product set total_quantity=? where slug=?",[$update_total_qty,$product_slug]);
    query("insert into product_sale(product_id,sell_price,date) values(?,?,?)",[$update_id,$sell_price,$date]);
      setMsg("Sale Created Success");
      go("index.php");
      die();
  }

  // paginate
	if(isset($_GET['page'])){
		paginateProduct(2);
		die();
	}

	if(isset($_GET['search'])){
		$search = $_GET['search'];
		$product = getAll("select * from product where name like '%$search%' order by id limit 2");
	}else{
		$search = '';
		$product = getAll("select * from product order by id desc limit 2");
	}

	
    require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white"><a href="index.php">Product</a></h4>
          > All
        </span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <a href="create.php" class="btn btn-sm btn-warning">Create</a>
        <form action="" method="GET" class="mt-2">
            <input type="text" value="<?php echo $search; ?>" name="search" class="btn bg-white">
            <button type="submit" class="btn btn-primary">
              <span class="fa fa-search"></span>
            </button>

            <?php 
            	if(!empty($search)){
        			echo '<a href="index.php" class="btn btn-danger">Clear Search</a>';
            	}
            ?>
        </form>
        <?php 
        	showError();
        	showMsg();
         ?>
        <table class="table table-striped text-white mt-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Sale Price</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody id="tblData">
            	<?php 
            	foreach ($product as $p) {
            	?>
            		<tr>
	            		<td><?php echo $p->name ?></td>
	            		<td><?php echo $p->total_quantity ?></td>
	            		<td><?php echo $p->sell_price ?></td>
	            		<td>
	            			<!-- View -->
	            			<a href="detail.php?slug=<?php echo $p->slug; ?>" class="btn btn-sm btn-success">
	            			    <span class="fa fa-eye"></span>
	            		    </a>
	            		    <!-- Edit -->
	            			<a href="edit.php?slug=<?php echo $p->slug; ?>" class="btn btn-sm btn-primary">
	            			    <span class="fa fa-edit"></span>
	            		    </a>
	            		    <!-- Delete -->
	            			<a href="" class="btn btn-sm btn-danger">
	            			    <span class="fa fa-trash"></span>
	            		    </a>

	            		    <a href="<?php echo $root.'product-buy/index.php?product_slug='.$p->slug; ?>" class="btn btn-sm btn-outline-danger">
	            		    	Buy
	            		    </a>
	            		    <a href="index.php?product_slug=<?php echo $p->slug; ?>&sale=true" class="btn btn-sm btn-outline-success">
	            		    	Sale
	            		    </a>
                      <a href="sale-list.php?product_slug=<?php echo $p->slug; ?>&sale=true" class="btn btn-sm btn-success">Sale List</a>

	            	    </td>
	            	</tr>
            	<?php	
            	} 
            	?>
            	
            </tbody>
        </table>

        <div class="text-center">
            <button class="btn btn-warning" id="btnFetch">
                <span class="fas fa-arrow-down"></span>
            </button>
        </div>
      </div>
    </div>
  </div>
  <?php 
 	require '../include/footer.php'; 
  ?> 

  <script>
  	$(function(){
  		// alert('hello');
  		page = 1;
  		var tblData = $('#tblData');
  		var btnFetch = $('#btnFetch');
  		btnFetch.click(function(){
  			page += 1;
  			// console.log(page);
  			var search = "<?php echo $search ?>";
  			var url = `index.php?page=${page}`

  			if(search){
  				url += `&search=${search}`;
  			}

  			$.get(url).then(function(data){
  				// console.log(data);
  				const d = JSON.parse(data);
  				console.log(d);
  				
  				var htmlString = '';

  				if(!d.length){
  					btnFetch.attr('disabled','disabled')
  				}

  				d.map(function(d){
  					htmlString += `<tr>
	            		<td>${d.name}</td>
	            		<td>${d.total_quantity}</td>
	            		<td>${d.sell_price}</td>
	            		<td>
	            			<!-- View -->
	            			<a href="detail.php?slug=${d.slug}" class="btn btn-sm btn-success">
	            			    <span class="fa fa-eye"></span>
	            		    </a>
	            		    <!-- Edit -->
	            			<a href="edit.php?slug=${d.slug}" class="btn btn-sm btn-primary">
	            			    <span class="fa fa-edit"></span>
	            		    </a>
	            		    <!-- Delete -->
	            			<a href="" class="btn btn-sm btn-danger">
	            			    <span class="fa fa-trash"></span>
	            		    </a>

	            		    <a href="<?php echo $root; ?>product-buy/index.php?product_slug=${d.slug}" class="btn btn-sm btn-outline-danger">
	            		    	Buy
	            		    </a>

	            		    <a href="index.php?product_slug=${d.slug}&sale=true" class="btn btn-sm btn-outline-success">
	            		    	Sale
	            		    </a>

                      <a href="sale-list.php?product_slug=${d.slug}&sale=true" class="btn btn-sm btn-success">Sale List</a>

	            	    </td>
	            	</tr>`
  				});
  				tblData.append(htmlString);
  			});
  		});
  	});
  </script>
 
<!--  
SELECT product.*,
pcategory.name as cat_name,
(SELECT count(id) FROM product_sale WHERE product.id = product_sale.product_id) as product_sale
FROM `product`
LEFT JOIN pcategory 
ON pcategory.id = product.category_id 
WHERE product.slug = '60e9b60bd3b2c-some'-->
