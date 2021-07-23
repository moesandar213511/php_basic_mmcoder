<!-- form select radio checkbox handling -->
<form action="" method="GET">
	<p>
		<input type="checkbox" name="fruit[]" value="Mango">Mango
		<input type="checkbox" name="fruit[]" value="Apple">Apple
		<input type="checkbox" name="fruit[]" value="Orange">Orange
	</p>
	<p>
		<input type="radio" name="gender" value="male">
		<input type="radio" name="gender" value="female">
	</p>
	<p>
		<select name="color[]" multiple id="">
			<option value="red">RED</option>
			<option value="green">Green</option>
			<option value="blue">Blue</option>
		</select>
	</p>
	<input type="submit" value="submit">
</form>

<?php 
	echo "<pre>";
	print_r($_GET);
	//print_r($_GET['fruit']);
	echo "=============================<br>";
	
	if(isset($_GET['fruit'])){
		//print_r($_GET['fruit']);
		$fruits = $_GET['fruit'];
		foreach ($fruits as $fruit) {
			echo $fruit."<br>";
		}
	}
	
	echo "<br>";
	echo(isset($_GET['fruit']['0'])); // if fruit is, echo 1 (true). 

	echo "=============================<br>";


	if(isset($_GET['gender'])){
		echo($_GET['gender']);
	}

	echo "=============================<br>";


	if(isset($_GET['color'])){
		//print_r($_GET['color']);
		foreach ($_GET['color'] as $color) {
			echo $color."<br>";		
		}
	}
 ?>