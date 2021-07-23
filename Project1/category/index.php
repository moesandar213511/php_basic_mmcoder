<?php 
	require '../init.php';
	
	if(!isset($_SESSION['user'])){
		echo setError('Please Login First');
		go('login.php');
	}

  if(isset($_GET['page'])){
    paginateCategory(2);
    die(); // if following html code continue to work, include html string. So stop  using die()
    // paginateCategory() မှာ die မထည့်ရင် html code တေွပါ ေရာ php ကိုပါ အလုပ်လုပ်တယ်
    // json က html နဲ့ php ကို ဒီတိုင်းနားမလည်ဘူး json encode လုပ်ထားတာကိုပဲ နားလည်တာ အာ့ကြောင့် json encode 
    // လုပ်ထားတာပဲခေါ်လို့ရတာေလ die () ထည့်ရင် html နဲ့ php အလုပ်လုပ်တာကို ဖျက်ချ လိုက်ေတာ့ error မတက်တာပါ 
  }

    //delete
    if(isset($_GET['action'])){
       $slug = $_GET['slug'];
       query("delete from pcategory where slug=?",[$slug]);
       setMsg('Category Deleted Successfully');
    }


    $category = getAll("select * from pcategory order by id desc limit 5");
    // echo "<pre>";
    // print_r($category);

    require '../include/header.php';
 ?>


 <!-- Breadcamp -->
  <div class="container-fluid pr-5 pl-5">
    <div class="row mt-3">
      <div class="col-12">
        <span class="text-white">
          <h4 class="d-inline text-white"><a href="index.php">Category</a></h4>
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
        <?php 
          showMsg(); 
          showError();
        ?>
        <table class="table table-striped text-white mt-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="tblData">
                <?php foreach($category as $cc){ ?>
                <tr>
                    <td><?php echo $cc->name; ?></td>
                    <td>
                        <a href="<?php echo $root.'category/edit.php?slug='.$cc->slug ?>" class="btn btn-sm btn-primary">
                            <span class="fas fa-edit"></span>
                        </a>
                        <a onclick="return confirm('Are you sure to delete?')" href="<?php echo $root.'category/index.php?action=delete&slug='.$cc->slug ?>" class="btn btn-sm btn-danger">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
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
      var page = 1;
      var tblData = $('#tblData');
      var btnFetch = $('#btnFetch');
      btnFetch.click(function(){
          // alert('hello');
         page += 1;
         $.get(`index.php?page=${page}`).then(function(data){
            // console.log(data);
            const d = JSON.parse(data); // JSON.parse => change from json string into javascript know object 
            console.log(d);
            var htmlString = '';

            if(!d.length){
              btnFetch.attr('disabled', 'disabled')
            }

            d.map(function(d){
              // console.log(d);
              htmlString += `<tr>
                    <td>${d.name}</td>
                    <td>
                        <a href="edit.php?slug=${d.slug}" class="btn btn-sm btn-primary">
                            <span class="fas fa-edit"></span>
                        </a>
                        <a onclick="return confirm('Are you sure to delete?')" href="index.php?action=delete&slug=${d.slug} ?>" class="btn btn-sm btn-danger">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>`
            })
            tblData.append(htmlString);
         });
      });
    });
  </script>