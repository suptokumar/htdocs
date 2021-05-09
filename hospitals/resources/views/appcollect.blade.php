<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job It Medical Software</title>
    <link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
    <script src="{{ asset('/public/vendor/jquery.js') }}"></script>
    <script src="{{ asset('/public/vendor/main.js?'.rand()) }}"></script>
    <script src="{{ asset('/public/vendor/admin.js?'.rand()) }}"></script>
</head>
<body>
    <h2 style="text-align: center; margin: 10px">
    <button class="btn btn-info" style="float: left" onclick="window.history.back()">back</button>
            <button class="btn btn-info" style="float: left;" onclick="window.location='{{ url('/') }}'">Menu</button> 

        Collect from {{$user->name}}
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/appoinment/collect') }}" method="POST">
@if ($message = session("message"))
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@endif
@if ($success = session("success"))
<div class="alert alert-success" role="alert">
{{$success}}
</div>
@endif

@if ($new_client = session("new_client"))
<div class="alert alert-success" role="alert">
{{$new_client}}
</div>
@endif
@csrf

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"> Total Amount</label>
    <div class="col-sm-10">
      <input type="text" name="total" autofocus="" class="form-control" readonly="" value="{{$total}}" id="inputEmail3" placeholder=" Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"> Paid Amount</label>
    <div class="col-sm-10">
      <input type="text" name="age" class="form-control" readonly="" value="{{$paid}}" id="inputPassword3" placeholder="Age">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Due Amount</label>
    <div class="col-sm-10">
      <input type="text" name="contact" class="form-control" readonly="" value="{{$total-$paid}}" id="inputPassword3" placeholder="contact">
    </div>
  </div>

  <div class="form-group row">
    <label for="dfa" class="col-sm-2 col-form-label">Collected Now</label>
    <div class="col-sm-10">
      <input type="number" step=".001" name="paid" class="form-control" required="" max="{{$total-$paid}}" id="dfa" placeholder="Currently Paid Amount">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-12">
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="app" value="{{$id}}">

      <button type="submit" class="btn btn-success float-right">Collect</button>
    </div>
  </div>
</form>
   </div>
   <div class="parent" style="width: 60%; float: left;">
<div class="rk" style="float: right; align-items: center;">

Search <input type="search" id="snod410" autocomplete="off" onkeyup="appoinment(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
   		<select id="docto10r" onchange="appoinment(1)"  style="padding: 10px; border: 1px solid #ccc; outline: none;">
     <option value="" {{isset($doctor)?($doctor->consultant==''?'selected':''):''}}>--Select Doctor--</option>

      	
        @foreach ($doc as $d)
      	<option value="{{$d->id}}" {{isset($doctor)?($doctor->consultant==$d->id?'selected':''):''}}>{{$d->name}}</option>
        @endforeach
     </select>

<input type="date" id="dt10" autocomplete="off" onchange="appoinment(1)" value="{{date("Y-m-d")}}" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
<span class="cowen"></span>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
<div class="all_doctors" style="width: 100%">

</div>
</div>

<script>
$(document).ready(function() {
    appoinment(1);
});

function dp_fun(page) {
    appoinment(page);
}
</script>

   </div>
</body>
</html>