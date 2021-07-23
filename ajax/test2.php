<button onclick="like()">Like</button>
<p id="count"></p>

<script>
	function like(){
		var count = document.getElementById("count");
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
			if(req.readyState == 4 && req.status == 200){
				count.innerHTML = req.responseText;
			}
		}

		req.open('GET','test2_request.php');
		req.send();
	}
</script>