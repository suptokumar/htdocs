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
        <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.history.back()'">back</button> 
        <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 
    <button class="btn btn-info" style="float: left; margin: 5px; margin-left: 10px;" onclick="window.location='{{ url('/admin/service') }}'">Add Tests</button>
    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/admin/doctor') }}'">Add Doctor</button>
    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/admin/room') }}'">Add Room</button>
        Doctors
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admin/doctor') }}" method="POST">
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" autofocus="" required="" class="form-control" value="{{isset($doctor)?$doctor->name:''}}" id="inputEmail3" placeholder="full name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact</label>
    <div class="col-sm-10">
      <input type="text" name="contact" class="form-control" value="{{isset($doctor)?$doctor->contact:''}}" id="inputPassword3" placeholder="contact">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" value="{{isset($doctor)?$doctor->email:''}}" id="inputPassword3" placeholder="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Designation</label>
    <div class="col-sm-10">
      <input type="text" name="designation" class="form-control" value="{{isset($doctor)?$doctor->designation:''}}" id="inputPassword3" placeholder="Designation">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Fees</label>
    <div class="col-sm-10">
      <input type="number" name="fees" required="" class="form-control" value="{{isset($doctor)?$doctor->fees:''}}" id="inputPassword3" placeholder="fees">
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
Search <input type="search" id="snod410" autocomplete="off" onkeyup="doctors(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>

<script>
    $(document).ready(function() {
        doctors(1);
    });
        function dp_fun(page){
        doctors(page);

    }
</script>

   </div>
</body>
</html>