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
        <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">back</button> 
                   <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 

    <button class="btn btn-info" style="float: left; margin: 5px; margin-left: 10px;" onclick="window.location='{{ url('/admin/service') }}'">Add Services</button> 
    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/admin/doctor') }}'">Add Doctor</button>
    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/admin/room') }}'">Add Room</button>
            All Tests
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admin/service') }}" method="POST">
@if ($message = session("message"))
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@endif
@if ($success = session("success"))
<div class="alert alert-success" role="alert">
{{$success[0]}}
<script>
  $(document).ready(function() {
    $("#test_type").val("{{$success[1]}}");
  });
</script>
</div>
@endif

@if ($new_client = session("new_client"))
<div class="alert alert-success" role="alert">
{{$new_client}}
</div>
@endif
@csrf

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Test type</label>
    <div class="col-sm-10">
      <select name="test_type" required="" class="form-control" id="test_type">
      <option value="Service" {{isset($doctor)?($doctor->type=='Service'?'selected':''):''}}>Service</option>
      <option value="Pathology" {{isset($doctor)?($doctor->type=='Pathology'?'selected':''):''}}>Pathology</option>
      <option value="X-RAY" {{isset($doctor)?($doctor->type=='X-RAY'?'selected':''):''}}>X-RAY</option>
      <option value="ULTRA" {{isset($doctor)?($doctor->type=='ULTRA'?'selected':''):''}}>ULTRA</option>
      <option value="ECG" {{isset($doctor)?($doctor->type=='ECG'?'selected':''):''}}>ECG</option>
      </select>
    </div>
    </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="test_name" autofocus="" required="" autocomplete="off" class="form-control" id="test_name" value="{{isset($doctor)?$doctor->name:''}}" placeholder="Test name">
    </div>
    </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Rate</label>
    <div class="col-sm-10">
      <input type="text" name="rate" autocomplete="off" required="" class="form-control" id="rate" value="{{isset($doctor)?$doctor->rate:''}}">
       
    </div>
 
  </div>


  <div class="form-group row">
    <div class="col-sm-12">
        <input type="hidden" name="id" value="{{isset($doctor)?$doctor->id:''}}">

      <button type="submit" class="btn btn-success float-right">{{!isset($doctor)?'Create':'Update'}}</button>
    </div>
  </div>
</form>
   </div>
   <div class="parent" style="width: 60%; float: left;">
<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
  <a href="{{ url('/invice') }}" class="btn btn-info">invoice</a>
<div class="rk" style="float: right; align-items: center;">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="service(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>

<script>
    $(document).ready(function() {
        service(1);
    });
        function dp_fun(page){
        service(page);

    }
</script>

   </div>
</body>
</html>