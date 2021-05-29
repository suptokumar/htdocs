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
            <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 

        Admission
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admission') }}" method="POST">
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
    <label for="em_id" class="col-sm-3 col-form-label"> Emergency Id</label>
    <div class="col-sm-5">
      <input type="text" name="em_id" autofocus="" autocomplete="off" class="form-control" value="{{isset($doctor)?$doctor->em_id:''}}" id="em_id" placeholder=" id">
    </div>
    <div class="col-sm-4">
      <a href="javascript:void(0)" class="btn btn-info" onclick="get_em(document.getElementById('em_id').value)">Load data</a>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label"> Name</label>
    <div class="col-sm-9">
      <input type="text" name="name" autofocus="" autocomplete="off" class="form-control" value="{{isset($doctor)?$doctor->name:''}}" id="name" placeholder=" Name" required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-3 col-form-label">Age</label>
    <div class="col-sm-9">
      <input type="text" name="age" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->age:''}}" id="age" placeholder="Age">
    </div>
  </div>
  <div class="form-group row">
    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
    <div class="col-sm-9">
      <input type="text" name="contact" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->contact:''}}" id="contact" placeholder="contact">
    </div>
  </div>
  <div class="form-group row">
    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
    <div class="col-sm-9">
      
      <select name="gender" class="form-control" id="gender">
      	<option value="Male" {{isset($doctor)?$doctor->gender:''}}>Male</option>
      	<option value="Female" {{isset($doctor)?$doctor->gender:''}}>Female</option>
      	<option value="Other" {{isset($doctor)?$doctor->gender:''}}>Others</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="village" class="col-sm-3 col-form-label">Village/Road</label>
    <div class="col-sm-9">
      <input type="text" name="village" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->village:''}}" id="village" placeholder="Village/Road">
    </div>
  </div>
  <div class="form-group row">
    <label for="thana" class="col-sm-3 col-form-label">Thana</label>
    <div class="col-sm-9">
      <input type="text" name="thana" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->thana:''}}" id="thana" placeholder="Thana">
    </div>
  </div>
  <div class="form-group row">
    <label for="district" class="col-sm-3 col-form-label">District</label>
    <div class="col-sm-9">
      <input type="text" name="district" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->district:''}}" id="district" placeholder="District">
    </div>
  </div>
  <div class="form-group row">
    <label for="reffered" class="col-sm-3 col-form-label">Reffered by</label>
    <div class="col-sm-9">
     <input name="reffered" list="browsers" autocomplete="off" class="form-control" id="refone" value="{{isset($doctor)?$doctor->reffered:''}}">
    {{-- <datalist id="browsers">
        
              @foreach ($doc as $d)
                <option value="{{$d->name}}">
                @endforeach
              </datalist>--}}



    </div>
  </div>
  <div class="form-group row">
    <label for="consultant" class="col-sm-3 col-form-label">Doctor</label>
    <div class="col-sm-9">
      <select name="consultant" class="form-control" id="consultant">
                <option value="" {{isset($doctor)?($doctor->con_id==''?'selected':''):''}}>--Select--</option>

      	
        @foreach ($doc as $d)
      	<option value="{{$d->id}}" {{isset($doctor)?($doctor->con_id==$d->id?'selected':''):''}}>{{$d->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <label for="date" class="col-sm-3 col-form-label">Date</label>
    <div class="col-sm-9">
      <input type="date" name="date" class="form-control" value="{{isset($doctor)?$doctor->date:''}}" id="date" placeholder="date">
    </div>
  </div>
  <div class="form-group row">
    <label for="consultant" class="col-sm-3 col-form-label">Room</label>
    <div class="col-sm-9">
      <select name="room" onchange="avg(this.value)" class="form-control" id="room" required="">
                <option value="" {{isset($doctor)?($doctor->room_id==''?'selected':''):''}}>--Select--</option>

      	
        @foreach ($room as $d)
      	<option value="{{$d->id}}" {{isset($doctor)?($doctor->room_id==$d->id?'selected':''):''}}>{{$d->name}}</option>
        @endforeach
      </select>
    </div>
    @foreach ($room as $d)
    <input type="hidden" value="{{$d->cost}}" id="ad1{{$d->id}}">
    @endforeach
  </div>
	<div class="row" style="text-align: center;">
		<div class="col-sm-10">
		</div>
    </div><br>

  <div class="form-group row">
    <label for="total" class="col-sm-3 col-form-label">Daily Amount</label>
    <div class="col-sm-9">
      <input type="text" name="total" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->total:''}}" id="total" placeholder="Total Fee">
    </div>
  </div>
  <div class="form-group row">
    <label for="paid" class="col-sm-3 col-form-label">Paid Amount</label>
    <div class="col-sm-9">
      <input type="text" name="paid" class="form-control" autocomplete="off" value="{{isset($doctor)?$doctor->paid:''}}" id="paid" placeholder="Paid">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-12">
        <input type="hidden" name="id" value="{{isset($doctor)?$doctor->id:''}}">

      <input type="reset" class="btn btn-danger float-left">
      <button type="submit" class="btn btn-success float-right">{{!isset($doctor)?'Create':'Update'}}</button>
    </div>
  </div>
</form>
   </div>
   <div class="parent" style="width: 60%; float: left;">

<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
<div class="rk" style="float: right; align-items: center;">
<button class="btn btn-info"  onclick="printData()">Print</button>
Search <input type="search" id="snod410" autocomplete="off" onkeyup="admission(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
   		<select id="docto10r" onchange="admission(1)"  style="padding: 10px; border: 1px solid #ccc; outline: none;">
     <option value="0">Present Patients</option>
     <option value="1">Discharged Patients</option>
     </select>

<input type="date" id="dt10" autocomplete="off" onchange="admission(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
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
    admission(1);
});
function avg(cost){
	$("#total").val($("#ad1"+cost).val());
}
function dp_fun(page) {
    admission(page);
}

function get_em(id) {
    var urls = url("em_list");
    var token = $("#csrf").val();
    $.ajax({
            url: urls,
            type: "POST",
            data: {
                _token: token,
                id: id
            },
        })
        .done(function(data) {
            var d = JSON.parse(data);
            console.log(d);
            if (d == null) {
                $("form input[type=reset]").click();
                $("form #em_id").val(id);
            } else {
                $("#name").val(d['name']);
                $("#contact").val(d['contact']);
                $("#thana").val(d['thana']);
                $("#age").val(d['age']);
                $("#gender").val(d['gender']);
                $("#district").val(d['district']);
                $("#reffered").val(d['reffered']);
                // $("#consultant").val(d['consultant']);
                $("#village").val(d['village']);
            }
        });
}
function load_token(date,doctor){
	var urls = url("load_token");
    var token = $("#csrf").val();
    $.ajax({
            url: urls,
            type: "POST",
            data: {
                _token: token,
                date: date,
                doctor: doctor
            },
        })
        .done(function(data) {
        	console.log(data);
            var d = JSON.parse(data);

            $("#token").val(d[0]);
            $("#total").val(d[1]);
            
        });
}
</script>

   </div>
</body>
</html>