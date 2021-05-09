<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Job It Medical Software</title>
    <script src="{{ asset('/public/vendor/jquery.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
	<style>
	*{margin: 0;padding: 0;outline: 0;}


.headerlogin{
	 background: #9DCB34AA;
    width: 600px;
    margin: 0 auto;
    margin-top: 120px;
    position: relative;
}
.login{
	position: relative;
	margin: 80px;
	padding:  50px 20px;
}

#log{
	 padding: 11px;
    font-size: 20px;
    color: blue;
    width: 269px;
}
#pass{
	 padding: 11px;
    font-size: 20px;
    color: blue;
}
#username{
	 padding: 11px;
    font-size: 20px;
    color: blue;
}

</style>
</head>
<body style="background: url('{{ asset('/public/img/1.jpg') }}') no-repeat fixed center;">
	<h2 style="font-size: 30px; font-family: cursive;color: blue; text-align:center; background: #ddddddAA; padding: 20px">Hospital Management Software By JOB IT</h2>
	<div class="headerlogin">

		<div class="login">
<form action="{{ url('/login') }}" method="POST">
@if ($message = session("message"))
  <div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@endif
@csrf


	<table>
  
  <tr>
    <td><label for="log" style="font-size: 25px;color: blue; ">Login as:</label></td>
    <td><select id="log" name="log" onchange="reg(this.value)">
  <option value="Reception">Reception</option>
  <option value="Manager">Manager</option>
  <option value="Admin">Admin</option>
  {{-- <option value="audi">Doctor</option> --}}
</select></td>
    
  </tr>
  <tr>
    <td><label for="username" autocomplete="off" style="font-size: 25px;color: blue;">Phone number:</label></td>
    <td><input type="text" id="username" name="login" autocomplete="off" placeholder="Phone number"></td>
    
  </tr>
  <tr class="rec">
    <td><label for="pass" style="font-size: 25px;color: blue; ">Password:</label></td>
    <td><input type="password" id="pass" name="pass" autocomplete="off" placeholder="Password"></td>
  </tr>
  @foreach ($admin as $ad)
  <tr class="admin">
    <td><label for="pass" style="font-size: 25px;color: blue; ">Password:</label></td>
    <td><input type="password" id="pass" name="pass{{$ad->id}}" autocomplete="off" placeholder="Password of {{$ad->name}}"></td>
  </tr>
  @endforeach
  <style>
    .admin {
      display: none;
    }
  </style>
<script>
  function reg(v){
    if (v=="Admin") {
      $(".admin").show();
      $(".rec").hide();
    }else{
      $(".admin").hide();
      $(".rec").show();  
    }
  }
</script>
  <tr>
    <td></td>
    <td><input type="submit" value="Login" style="padding: 10px;font-size: 17px;font-weight: bold;"></td>
    
  </tr>
  
</table>
</form>

	</div>
</div>

</body>
</html>