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
  <div class="dropdown">
    <button class="dropbtn">Account 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{ url('/invest') }}">Invest</a>
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
  <a href="{{ url('/') }}" class="active">Classroom Money</a>
  <a href="{{ url('/teacher/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/teacher/mystudents') }}">Students</a>
  <a href="{{ url('/teacher/requests') }}">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif

<div>

<div class="dash" style="max-width: 1000px; margin: 10px auto; padding: 10px;">
  <h2>Details of {{$user->name}}</h2>
  <hr>

@if ($type==3)



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
      <label for="inputEmail4">Student Name</label>
      <input type="text" class="form-control" id="name" readonly="" name="name" value="{{$user->name}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Gender</label>
      <input type="text" class="form-control" id="name" readonly="" name="name" value="{{$user->gender}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Date of Birth </label>
      <input type="text" class="form-control" id="name" readonly="" name="name" value="{{$user->birth}}" placeholder="Empty">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">City</label>
      <input type="text" class="form-control" readonly="" id="name" name="name" value="{{$user->city}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">State</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->state}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Country <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->country}}" placeholder="Empty">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Address <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->address}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Student ID</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->id_number}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Id Proof.</label>
      <a href="{{ asset("/public/image/0") }}{{$user->id_proof}}" target="_blank"><img src="{{ asset("/public/image/0") }}{{$user->id_proof}}" alt="" style="width: 100px;"></a>
    </div>
  </div>
  <h4 style="text-align: center">Family Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Father's Name</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->f_name}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Father's Email</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$user->f_occupation}}" placeholder="Empty">
    </div>
    @if (Auth::user()->type==1)
    	
    <div class="form-group col-md-4">
      <label for="inputPassword4">Father's Phone</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$user->f_phone}}" placeholder="Empty">
    </div>
    @endif
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Mother's Name</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->m_name}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Mother's Email</label>
      <input type="text" class="form-control" id="name" readonly name="name" value="{{$user->f_occupation}}" placeholder="Empty">
    </div>
  </div>

  <h4 style="text-align: center">Contact Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email </label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->email}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->phone}}" placeholder="Empty">
    </div>
  </div>
@endif

@if ($type==2)
<h4 style="text-align: center">Personal Details</h4>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Teacher's Name</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->name}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="educational_qualifications">Educational Qualifications</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->educational_qualifications}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="subject">Subject <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->subject}}" placeholder="Empty">
    </div>
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="id_number">National ID </label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->id_number}}" placeholder="Empty">
    </div>
@if (Auth::user()->type==1)
    <div class="form-group col-md-2">
      <label for="id_proof">Id front copy. <span style="color: red">*</span></label>
      <a href="{{ asset("/public/image/0") }}{{$user->id_proof}}" target="_blank"><img src="{{ asset("/public/image/0") }}{{$user->id_proof}}" alt="" style="width: 100px;"></a>
    </div>
@endif
    <div class="form-group col-md-4">
      <label for="school">School Name</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->school}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="school_address">School Address</label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->school_address}}" placeholder="Empty">
    </div>
  </div>
 

  <h4 style="text-align: center">Contact Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="email">Email <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->email}}" placeholder="Empty">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" readonly id="name" name="name" value="{{$user->phone}}" placeholder="Empty">
    </div>
  </div>

@endif




</div>

</body>
</html>
