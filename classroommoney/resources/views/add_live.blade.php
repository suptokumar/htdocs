<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student | classroommoney</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('/public/js/main.js') }}"></script>

    <script src="{{ asset('/public/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/public/css/dash.css?d') }}">
</head>
<body>
@if (Auth::user()->type==3)
<div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}" class="active">Classroom Money</a>
  <a href="{{ url('/student/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/student/myteachers') }}">Teachers</a>
  <a href="{{ url('/student/tutors') }}">Tutors</a>
  <a href="{{ url('/student/library') }}">Library</a>
  <div class="dropdown">
    <button class="dropbtn">Account 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{ url('/invest') }}">Fee submission</a>
      <a href="{{ url('/balance') }}">My balance</a>
      <a href="{{ url('/earning') }}">Earning Records</a>
            <a href="{{ url('/student/teach') }}">My Teachers</a>

      <a href="{{ url('/settings') }}">Settings</a>
    </div>
  </div> 
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif
@if (Auth::user()->type==2)
  <div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}">Classroom Money</a>
  <a href="{{ url('/teacher/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/teacher/mystudents') }}">Students</a>
  <a href="{{ url('/teacher/requests') }}" class="active">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/liveadd') }}" method="POST" enctype="multipart/form-data">

  @csrf
      <a href="{{ url('/') }}" class="btn btn-danger">< Home</a>
      <br>

  <h2>Live Class</h2>
  <hr>

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
  <div class="form-row">
  	
    <div class="form-group col-md-6">
      <label for="subject">Subject <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="subject" name="subject">
    </div>

    <div class="form-group col-md-6">
      <label for="zoomlink">Zoom link <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="zoomlink" name="zoomlink">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="duration">Duration(minutes) <span style="color: red">*</span></label>
      <select class="form-control" required=""  id="duration" name="duration">
      	<option value="15">15</option>
      	<option value="30">30</option>
      	<option value="45">45</option>
      	<option value="60">60</option>
      	<option value="90">90</option>
      	<option value="120">120</option>
      </select>
    </div>
  <div class="form-group col-md-6">
      <label for="grade">Grade/Class <span style="color: red">*</span></label>
      <select class="form-control" required=""  id="grade" name="grade">
      	<option value="5th">5th</option>
      	<option value="6th">6th</option>
      	<option value="7th">7th</option>
      	<option value="8th">8th</option>
      	<option value="9th">9th</option>
      	<option value="10th">10th</option>
      	<option value="11th">10th</option>
      	<option value="12th">12th</option>
      	<option value="Others">Others</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="time">Starting Time <span style="color: red">*</span></label>


          <div class="input-group date form_datetime" required data-date="{{date("Y-m-d")}}T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" name="time" required id="dtp_input1" value="" /><br/>
            </div>

    <div class="form-group col-md-6">
      <label for="description">Description <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="description" name="description">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="thumbnail">Thumbnail <span style="color: red">*</span></label>
      <input type="file" class="form-control" required=""  id="thumbnail" name="thumbnail">
    </div>
  </div>


    <button type="submit" class="btn btn-primary">Create Live</button>

</form>
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<script type="text/javascript" src="{{ url('/public') }}/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <link href="{{ url('/public') }}/js/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script>
	
$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 1,
        showMeridian: 1
    });
</script>

</body>
</html>
