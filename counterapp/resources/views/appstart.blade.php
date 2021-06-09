<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>App</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .btn {
        background: red !important;
border: 1px solid red !important;
margin: 5px;
    }

    .alert {
    color: white;
    background-color: #d79922;
    border-color: #d79922;
    font-weight: bold;
}
</style>
</head>
<body style="background:#efe2ba;">
	<div class="container">
		<div class="image_part">
			<div class="imagebg" style="background:url({{ url('/public/img/user.png') }}) 50% 50% / 100% 100%; margin: 5px auto; height: 150px; width: 150px; border-radius: 100px;"></div>
			<div class="form" style="max-width: 400px; margin: 0 auto;">
			<h2 style="text-align: center; font-family: tahoma; font-size: 18px;">Select Category</h2>
				<select name="" id="category" class="form-control">
					<option value="MOBILE NUMBER">MOBILE NUMBER</option>
					<option value="HOUSE UNIT NUMBER">HOUSE UNIT NUMBER</option>
					<option value="CAR LICENSE PLATE">CAR LICENSE PLATE</option>
					<option value="MEMBERSHIP NUMBER">MEMBERSHIP NUMBER</option>
				</select><br>
			<div style="text-align: center;">
			<button onclick="next_step()" class="btn btn-success" style="width: 330px;">Next</button>
			</div>
			</div>
			<div class="form2" style="max-width: 400px; margin: 0 auto; display: none;">
			<h2 style="text-align: center; font-family: tahoma; font-size: 18px;">Type Number</h2>
				<div class="numberchecker"></div>

				<input type="text" id="number" onkeyup="removeit()" class="form-control"><br>
			<div style="text-align: center;">
			<button onclick="submit()" class="btn btn-success" style="width: 330px;">Submit</button>
			</div>
			</div>
			<div class="interputer">
				
			</div>
			<div style="text-align: center;">
	<a class="btn link" href="{{ url('/logout') }}">Logout</a>
			</div>
				
		</div>
	</div>

	<script>

		function next_step(){
			$(".form").slideUp(200);
			$(".form2").fadeIn(200);
		}
		function removeit(){
			$(".numberchecker").html("");
		}
		
		function submit(){
			var number = $("#number").val();
			var category = $("#category").val();
			if (Number(number)==0) {
				$(".numberchecker").html("<div class='alert alert-danger'>The number is not valid</div><br>");
				return false;
				
			}else{
				$(".form2").fadeOut('slow', function() {
			$.ajax({
				url: '{{ url('/get_result') }}',
				type: 'POST',
				data: {number: number,category: category,_token: "{{csrf_token()}}"},
			})
			.done(function(data) {
				$(".interputer").html(data);
			})
			.fail(function(){
			     location.reload();
			});
			
				
					
				});
			}
		}
		function back(){
			$(".interputer").html("");
			$(".form").show(200);
			$(".form2").hide(200);
			$(".form2 input").val("");
		}
	</script>
</body>
</html>