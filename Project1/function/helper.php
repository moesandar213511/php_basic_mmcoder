<?php 
	// echo "<pre>";
	// print_r($_SESSION);

	function setError($message){
		$_SESSION['errors'] = [];
		$_SESSION['errors'][] = $message;
		// echo "<pre>";
		// print_r($_SESSION);
	}


	function showError(){
		if(isset($_SESSION['errors'])){
			$errors = $_SESSION['errors'];
			$_SESSION['errors'] = [];
			// echo "<pre>";
			// print_r($errors);
			if(count($errors)){
				foreach ($errors as $e) {
	 				echo "<div class='alert alert-danger'>$e</div>";
				}
			}
		}
	}

	function setMsg($message){
		$_SESSION['message'] = [];
		$_SESSION['message'][] = $message;
		// echo "<pre>";
		// return print_r($_SESSION);
	}

	function showMsg(){
		if(isset($_SESSION['message'])){
			$errors = $_SESSION['message'];
			$_SESSION['message'] = [];
			// echo "<pre>";
			// print_r($_SESSION['message']);
			if(isset($_SESSION['message']) and count($errors)){
				foreach ($errors as $e) {
	 				echo "<div class='alert alert-success'>$e</div>";
				}
			}
		}
	}

	function hasError(){
		$errors = $_SESSION['errors'];
		if(count($errors)){
			return true;
		}
		return false;
	}

	function go($path){
		header("Location:$path");
	}

	function slug($str){
		return uniqid().'-'.str_replace(' ','-',$str);
	}

	function paginateCategory($record_per_page){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			if($page <= 0){
				$page = 2;
			}
		}else{
			$page = 2;
		}
		// echo $page;
		
		// /*
		//  1 = 0,2
		//  2 = 2,2
		//  3 = 4,2
		//  4 = 6,2
		//  5 = 8,2
		// /*
		$start = ($page-1)*$record_per_page;
		$limit = "$start,$record_per_page";
		$sql = "select * from pcategory limit $limit";
		$data = getAll($sql);
		echo json_encode($data); //convert array to json
	}

	function paginateProduct($record_per_page){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			if($page <= 0){
				$page = 2;
			}
		}else{
			$page = 2;
		}
		// echo $page;
		
		// /*
		//  1 = 0,2
		//  2 = 2,2
		//  3 = 4,2
		//  4 = 6,2
		//  5 = 8,2
		// /*
		$start = ($page-1)*$record_per_page;
		$limit = "$start,$record_per_page";
		$sql = "select * from product ";
		if(isset($_GET['search']) and !empty($_GET['search'])) {
			$search = $_GET['search'];
			$sql .= "where name LIKE '%$search%' ";
		}
		$sql .= "order by id desc limit $limit";
		$data = getAll($sql);
		echo json_encode($data); //convert array to json
	}
 ?>

