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
    <button class="btn btn-info" style="float: left" onclick="window.location='{{ url('/') }}'">back</button>
            <button class="btn btn-info" style="float: left;" onclick="window.location='{{ url('/') }}'">Menu</button> 

        Emergency
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/emergency') }}" method="POST">
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
    <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" autofocus="" autocomplete="off" class="form-control" value="{{isset($doctor)?$doctor->name:''}}" id="inputEmail3" placeholder=" Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
    <div class="col-sm-10">
      <input type="text" name="age" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->age:''}}" id="inputPassword3" placeholder="Age">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact</label>
    <div class="col-sm-10">
      <input type="text" name="contact" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->contact:''}}" id="inputPassword3" placeholder="contact">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      
      <select name="gender" class="form-control" id="inputPassword3">
      	<option value="Male" {{isset($doctor)?$doctor->gender:''}}>Male</option>
      	<option value="Female" {{isset($doctor)?$doctor->gender:''}}>Female</option>
      	<option value="Other" {{isset($doctor)?$doctor->gender:''}}>Others</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Village/Road</label>
    <div class="col-sm-10">
      <input type="text" name="village" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->village:''}}" id="inputPassword3" placeholder="Village/Road">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Thana</label>
    <div class="col-sm-10">
      <input type="text" name="thana" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->thana:''}}" id="inputPassword3" placeholder="Thana">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">District</label>
    <div class="col-sm-10">
      <input type="text" name="district" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->district:''}}" id="inputPassword3" placeholder="District">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <input type="date" name="date" class="form-control" value="{{isset($doctor)?$doctor->contact:''}}" id="inputPassword3" placeholder="date">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Time</label>
    <div class="col-sm-10">
      <input type="hidden" name="time" class="form-control" value="{{ date("Y-m-d H:i:s") }}" id="inputPassword3" placeholder="time">
      <h3 class="time"></h3>
      <script>
        setInterval(function(){
          var d = new Date();
          var n = d.toLocaleTimeString();
          document.querySelector(".time").innerHTML = n;
        },1);
      </script>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Consultant</label>
    <div class="col-sm-10">
      <select name="consultant" class="form-control" id="inputPassword3">
      <option value="" {{isset($doctor)?($doctor->consultant==''?'selected':''):''}}>--Select--</option>

      	
        @foreach ($doc as $d)
      	<option value="{{$d->name}}" {{isset($doctor)?($doctor->consultant==$d->name?'selected':''):''}}>{{$d->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="refone" class="col-sm-2 col-form-label">Reffered by</label>
    <div class="col-sm-10">
     <input name="reffered" list="browsers" autocomplete="off" class="form-control" id="refone" value="{{isset($doctor)?$doctor->reffered:''}}">
     <datalist id="browsers">

      @foreach ($doc as $d)
        <option value="{{$d->name}}">
        @endforeach
      </datalist>
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
  <button class="btn btn-info"  onclick="printData()">Print</button>

<div class="rk" style="float: right; align-items: center;">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="emargency(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>
<script>
  function printData()
{
   var divToPrint=document.getElementById("bmw");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML+"<style>table{border-collapse:collapse;} td{border: 1px solid #ccc; padding: 10px; max-width: 10%;}.opt{display:none;}</style>");
   newWin.print();
   newWin.close();
}







</script>
<script>
    $(document).ready(function() {
        emargency(1);
    });
        function dp_fun(page){
        emargency(page);

    }
</script>

   </div>
</body>
</html>