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
  <a href="{{ url('/teacher/mymarksheet') }}" class="active">Marksheet</a>
  <a href="{{ url('/teacher/mystudents') }}">Students</a>
  <a href="{{ url('/teacher/requests') }}">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif

<div>

<div class="dash">

@if (Auth::user()->type==2)


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/add_marks') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Account Settings</h2>
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

  <h4 style="text-align: center">Personal Details</h4>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="subject">Subject<span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly="" id="subject" name="subject" value="{{$user->subject}}">
    </div>
    <div class="form-group col-md-4">
      <label for="mark">Marks <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="mark" name="mark" placeholder="Marks">
    </div>
    <div class="form-group col-md-4">
      <label for="attend">Miss Attentends <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="attend" name="attend" placeholder="Attentends">
    </div>
<input type="hidden" name="student" value="{{$id}}">

  <button type="submit" class="btn btn-primary">Add</button>
</form>






@endif

</div>

</body>
</html>
