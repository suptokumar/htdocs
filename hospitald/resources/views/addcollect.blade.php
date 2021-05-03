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
    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 

        Collect from {{$user->name}}
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admission/collect') }}" method="POST">
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

      <button type="submit" class="btn btn-success float-right">Collect</button>
    </div>
  </div>
</form>
   </div>
   <div class="parent" style="width: 60%; float: left;">
<div class="search" style="width: 100%; padding: 2%; overflow: hidden">

<div class="rk" style="float: right; align-items: center;">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="prev_details3(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
<input type="hidden" value="{{$user->id}}" id="em_id">

<button class="btn btn-danger float-left" onclick="exportTableToExcel('done1','{{$user->name}}')">Download in Excel</button>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>

<script>
    $(document).ready(function() {
        prev_details3(1);
    });
        function dp_fun(page){
        prev_details3(page);

    }
</script>

   </div>
</body>
</html>