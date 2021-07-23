<?php 
	require 'init.php';
	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}

  $date = date('Y-m-d');
  // total sale price
  $total_sale = getOne(
      "select sum(sell_price) as sale_price from product_sale where date=?",[$date]
  )->sale_price;
  
  // total buy price
  $total_buy = getOne("select sum(buy_price) as buy_price from product_buy where buy_date=?",[$date])->buy_price;
  // print_r($total_buy);
  
  $net_profit = $total_sale - $total_buy;
  
  // Latest Sale
  $latest_sale = getAll(
      " select product_sale.*,product.name from product_sale
        left join product
        on product.id = product_sale.product_id
        where product_sale.date=?
        order by product_sale.id desc
        limit 5
      ",
      [$date]
  );
  // echo "<pre>";
  // print_r($latest_sale);
  
  $latest_buy = getAll(
    "
      select product_buy.*,product.name from product_buy
      left join product 
      on product.id = product_buy.product_id
      where product_buy.buy_date=?
      order by product_buy.id desc
      limit 5
    ",[$date]
  );
  // echo "<pre>";
  // print_r($latest_buy);
  
  require "include/header.php";

 ?>

  <!-- Content -->
  <div class="container-fluid pr-5 pl-5 mt-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-4">
             <div class="card p-4 text-center bg-success">
                <div>
                  <h5 class="text-white">Total Sale:</h5>
                  <span class="badge badge-warning"><?php echo $total_sale; ?></span>
                </div>
             </div>
          </div> 
          <div class="col-4">
             <div class="card p-4 text-center bg-danger">
                <div>
                  <h5 class="text-white">Total Buy:</h5>
                  <span class="badge badge-warning"><?php echo $total_buy; ?></span>
                </div>
             </div>
          </div> 
          <div class="col-4">
             <div class="card p-4 text-center bg-primary">
                <div>
                  <h5 class="text-white">Net Income:</h5>
                  <span class="badge badge-warning"><?php echo $net_profit; ?></span>
                </div>
             </div>
          </div> 
          <br><br>
          <hr class="w-100 border-gray" />
          <div class="col-6">
            <h4 class="text-success">Latest Sale List</h4>
            <table class="table table-striped">
              <tr class="text-white">
                <td>Product</td>
                <td>Sell Price</td>
              </tr>

              <?php 
              foreach ($latest_sale as $s) :
              ?>

              <tr class="text-white">
                <td><?php echo $s->name; ?></td>
                <td><?php echo $s->sell_price; ?></td>
              </tr>
                
              <?php endforeach ?>
              
            </table> 
          </div>

          <div class="col-6">
            <h4 class="text-success">Latest Buy List</h4>
            <table class="table table-striped">
              <tr class="text-white">
                <td>Product</td>
                <td>Buy Price</td>
              </tr>

              <?php foreach ($latest_buy as $b): ?>
              <tr class="text-white">
                
                <td><?php echo $b->name; ?></td>
                <td><?php echo $b->buy_price; ?></td>
              </tr>
              <?php endforeach ?>

            </table> 
          </div>

        </div>
        <!-- <div class="row">
          <div class="col-12">All Category</div>
        </div>
        <div class="row">
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
          <div class="col-3 p-1">
            <div class="card card-body text-center bg-primary text-white">
              T-Shirt
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 offset-3">
            <div class="card card-body">
              <div class="text-center">
                <a href="" class="btn btn-primary rounded-circle text-white">
                  </a>
                    <a href="" class="btn btn-primary rounded-circle text-white">></a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <?php require "include/footer.php"; ?>