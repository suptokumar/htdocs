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

<div class="dash">

@if (Auth::user()->type==2)


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/teacher_update') }}" method="POST" enctype="multipart/form-data">

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
      <label for="name">Teacher's Name <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="name" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group col-md-4">
      <label for="educational_qualifications">Educational Qualifications <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="educational_qualifications" name="educational_qualifications" placeholder="Your Last Qualification"  value="{{$user->educational_qualifications}}">
    </div>
    <div class="form-group col-md-4">
      <label for="subject">Subject <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" value="{{$user->subject}}" id="subject" name="subject" placeholder="What do you teach?">
    </div>
 
  </div>
  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="id_number">National ID <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" value="{{$user->id_number}}" id="id_number" name="id_number" placeholder="National ID">
    </div>
    <div class="form-group col-md-2">
      <label for="id_proof">Id front copy</label>
      <input type="file" class="form-control" id="id_proof" name="id_proof">
      @if ($user->id_proof!='')
      <img src="{{ asset("/public/image/0") }}/{{$user->id_proof}}" alt="">
      @endif
    </div>
    <div class="form-group col-md-4">
      <label for="school">School Name <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="school" value="{{$user->school}}" name="school" placeholder="Use full name of your school">
    </div>
    <div class="form-group col-md-4">
      <label for="school_address">School Address <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="school_address" value="{{$user->school_address}}" name="school_address" placeholder="full address of your school">
    </div>
  </div>
 

  <h4 style="text-align: center">Login Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="email">Email <span style="color: red">*</span></label>
      <input type="email" readonly class="form-control" required="" value="{{$user->email}}" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" value="{{$user->phone}}" id="phone" name="phone" placeholder="Phone">
    </div>
    <div class="form-group col-md-4">
      <label for="password">Password <span style="color: red">*</span></label><br>
      <a href="{{ url('/resetpass') }}">Reset Password?</a>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Update Info</button>
</form>



@endif



@if (Auth::user()->type==3)


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/student_update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  
  <h2>Account Settings</h2>
  <hr>
<div class="dash">
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
      <label for="inputEmail4">Student Name <span style="color: red">*</span></label>
      <input type="text" class="form-control" id="name" name="name" required="" value="{{$user->name}}" placeholder="full name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Gender <span style="color: red">*</span></label>
      <select  class="form-control" required="" id="gender" name="gender">
        <option value="Male" {{$user->gender=='Male'?'selected':''}}>Male</option>
        <option value="Female" {{$user->gender=='Female'?'selected':''}}>Female</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Date of Birth <span style="color: red">*</span></label>
      <input type="date" class="form-control" id="birth" value="{{$user->birth}}" required="" placeholder="birth date" name="birth">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">City</label>
      <input type="text" class="form-control" id="city" value="{{$user->city}}" name="city" placeholder="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">State</label>
      <input type="text" class="form-control"  value="{{$user->state}}" id="state" name="state" placeholder="state">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Country <span style="color: red">*</span></label>
      <input type="text" class="form-control" value="{{$user->country}}" required="" id="country" name="country" placeholder="country">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Address <span style="color: red">*</span></label>
      <textarea class="form-control" id="address" required="" name="address" placeholder="Address">{{$user->address}}</textarea>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Student ID</label>
      <input type="text" class="form-control"  value="{{$user->id_number}}" id="id_number" name="id_number" placeholder="eg. 15">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Id Proof.</label>
      <input type="file" class="form-control"  id="id_proof" name="id_proof">
            @if ($user->id_proof!='')
      <a href="{{ asset("/public/image/0") }}{{$user->id_proof}}" target="_blank"><img src="{{ asset("/public/image/0") }}{{$user->id_proof}}" alt="" style="width: 100px;"></a>
      @endif
    </div>
  </div>
  <h4 style="text-align: center">Family Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Father's Name <span style="color: red">*</span></label>
      <input type="text" class="form-control"  value="{{$user->f_name}}" required="" id="f_name" name="f_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Father's Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" value="{{$user->f_phone}}"  required="" id="f_phone" name="f_phone">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Father's Email <span style="color: red">*</span></label>
      <input type="email" class="form-control" value="{{$user->f_occupation}}"  id="f_occupation" required="" name="f_occupation">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Mother's Name</label>
      <input type="text" class="form-control" value="{{$user->m_name}}" id="m_name" name="m_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Mother's Email</label>
      <input type="email" class="form-control" value="{{$user->m_occupation}}" id="m_occupation" name="m_occupation">
    </div>
  </div>

  <h4 style="text-align: center">Login Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email <span style="color: red">*</span></label>
      <input type="email" readonly="" class="form-control" value="{{$user->email}}" required="" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" value="{{$user->phone}}" required="" id="phone" name="phone" placeholder="Phone">
    </div>
    <div class="form-group col-md-4">
      <label for="password">Password <span style="color: red">*</span></label><br>
      <a href="{{ url('/resetpass') }}">Reset Password?</a>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Update Info</button>
</form>





@endif

</div>

</body>
</html>
