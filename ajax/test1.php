<!-- ajax => ajax with javascript 
		  => to run asynchronous text => to finish process without reload.
		  => can also communicate between client and server
-->
<?php 
	session_start();
 ?>

 <a href="test1.php?like=some">
	Like
	<?php 
		echo $_SESSION['like']."<br>";

		echo "<pre>";
		print_r($_SESSION);

	 ?> 
</a>

<?php 
	if(isset($_GET['like'])){
		$_SESSION['like']++;
	}
	echo "==============================<br>";
 ?>

 <button onclick="fetchServer()">Fetch</button>
 <p id="text"></p>
 <script>
 	function fetchServer(){
 		var req = new XMLHttpRequest();

 		req.onreadystatechange = function(){
 			//req.readyState
 			//req.responseText
 			//console.log(req.responseText);
 			var pT = document.getElementById("text");
 			if(req.readyState == 4){
 				pT.innerHTML = req.responseText;
 			}else{
 				pT.innerHTML = "error";
 			}
 		}
 		req.open("GET","http://localhost/php_basic_mmcoder/ajax/note.txt");
 		req.send();
 	}
 </script>

