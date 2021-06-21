<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link rel="stylesheet" href="https:////code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <script src="{{ asset('/public/js/jquery.js') }}"></script>
  {{-- <link rel="stylesheet" href="{{ asset('/public/css/dash.css?'.rand()) }}"> --}}
</head>
<body>
  <div class="header">
<header style="background: #364667" id="bg_no">

    {{-- <img src="{{ url('/public/img/onlineBD.PNG') }}" style="width: 150px" alt=""> --}}
    <span style="font-size: 25px !important; margin: 10px;float: left;font-weight: bold;text-shadow: 1px 1px 1px red;color: lightgreen;">Classroom Money</span>
  <a href="{{url('/')}}" class="btn btn-success"><span class="fa fa-location-arrow"></span> <span class="wo">{{ __('Login') }}</span></a>
  <a href="{{url('/student_register')}}" class="btn btn-success"><span class="fa fa-user"></span>  <span class="wo">{{ __('Student Register') }}</span></a>
  <a href="{{url('/teacher_register')}}" class="btn btn-success"><span class="fa fa-user"></span> <span class="wo">{{ __('Teacher/Tutor Register') }}</span></a>
    <a href="{{url('/contact')}}" class="btn btn-success"><span class="fa fa-user"></span> <span class="wo">{{ __('Support/ inquiry') }}</span></a>

</header>
<style>
    header#bg_no {
    position: fixed;
    width: 100%;
    z-index: 1000;
    color: white;
    text-align: right;
    top: 0;
}
#bg_no a{
    margin: 15px 10px 15px 10px;
}

</style>
  </div>
<div class="dash">




<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/teacher_register') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Quick Registration</h2>
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
    <div class="form-group col-md-2">
      <label for="type">Tutor/Teacher? <span style="color: red">*</span></label>
      <select name="type" id="type" class="form-control" required="">
        <option value="2">Teacher</option>
        <option value="4">Tutor</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="name">Teacher's Name <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="name" name="name" placeholder="full name">
    </div>
    <div class="form-group col-md-4">
      <label for="educational_qualifications">Educational Qualifications <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="educational_qualifications" name="educational_qualifications" placeholder="Your Last Qualification">
    </div>
    <div class="form-group col-md-4">
      <label for="subject">Subject <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="subject" name="subject" placeholder="What do you teach?">
    </div>
 
  </div>
  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="id_number">TAB teacher/ tutor id <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="id_number" name="id_number"  value="{{$auto}}" readonly="">
    </div>
    <div class="form-group col-md-2">
      <label for="id_proof">Id front copy. <span style="color: red">*</span></label>
      <input type="file" class="form-control" required="" id="id_proof" name="id_proof">
    </div>
    <div class="form-group col-md-4">
      <label for="school">School Name/Collage <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="school" name="school" placeholder="Use full name of your school">
    </div>
    <div class="form-group col-md-4">
      <label for="school_address">School Address <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="school_address" name="school_address" placeholder="full address of your school">
    </div>
  </div>
 

  <h4 style="text-align: center">Login Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="email">Email <span style="color: red">*</span></label>
      <input type="email" class="form-control" required="" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="phone" name="phone" placeholder="Phone">
    </div>
    <div class="form-group col-md-4">
      <label for="password">Password <span style="color: red">*</span></label>
      <input type="password" class="form-control" required="" id="password" name="password" placeholder="Password">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Sign in</button>
</form>



</div>



</body>
</html>