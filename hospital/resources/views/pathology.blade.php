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

        Room
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admin/room') }}" method="POST">
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">Room Name</label>
    <div class="col-sm-10">
      <input type="text" name="test_name" required="" class="form-control" id="test_name" value="{{isset($doctor)?$doctor->name:''}}">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
      <select name="type" class="form-control" id="type">
        <option {{isset($doctor)?($doctor->type=='Single Bed'?'selected':''):''}} value="Single Bed">Single Bed</option>
        <option {{isset($doctor)?($doctor->type=='Double Bed'?'selected':''):''}} value="Double Bed">Double Bed</option>
        <option {{isset($doctor)?($doctor->type=='Cabin'?'selected':''):''}} value="Cabin">Cabin</option>
        <option {{isset($doctor)?($doctor->type=='AC'?'selected':''):''}} value="AC">AC</option>
      </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Rate</label>
    <div class="col-sm-10">
      <input type="text" name="rate" required="" class="form-control" id="rate" value="{{isset($doctor)?$doctor->cost:''}}">
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
<div class="rk" style="float: right; align-items: center;">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="pathology(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>

<script>
    $(document).ready(function() {
        pathology(1);
    });
        function dp_fun(page){
        pathology(page);

    }
</script>

   </div>
</body>
</html>