<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Register</title>
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
  <a href="{{url('/teacher_register')}}" class="btn btn-success"><span class="fa fa-user"></span> <span class="wo">{{ __('Teacher Register') }}</span></a>
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





<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/student_register') }}" method="POST" enctype="multipart/form-data">
  @csrf
  
  <h2>Quick Registration</h2>
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
      <input type="text" class="form-control" id="name" name="name" required="" placeholder="full name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Gender <span style="color: red">*</span></label>
      <select  class="form-control" required="" id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Date of Birth <span style="color: red">*</span></label>
      <input type="date" class="form-control" id="birth" required="" placeholder="birth date" name="birth">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">City</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">State</label>
      <input type="text" class="form-control"  id="state" name="state" placeholder="state">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Country <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="country" name="country" placeholder="country">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Address <span style="color: red">*</span></label>
      <textarea class="form-control" id="address" required="" name="address" placeholder="Address"></textarea>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Student ID</label>
      <input type="text" class="form-control"  id="id_number" name="id_number" placeholder="eg. 15">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Id Proof.</label>
      <input type="file" class="form-control"  id="id_proof" name="id_proof">
    </div>
  </div>
  <h4 style="text-align: center">Family Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Father's Name <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="f_name" name="f_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Father's Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="f_phone" name="f_phone">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Father's Email <span style="color: red">*</span></label>
      <input type="email" class="form-control" id="f_occupation" required="" name="f_occupation">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Mother's Name</label>
      <input type="text" class="form-control" id="m_name" name="m_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Mother's Email</label>
      <input type="email" class="form-control" id="m_occupation" name="m_occupation">
    </div>
  </div>

  <h4 style="text-align: center">Login Details</h4>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email <span style="color: red">*</span></label>
      <input type="email" class="form-control" required="" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Phone <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" id="phone" name="phone" placeholder="Phone">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password <span style="color: red">*</span></label>
      <input type="password" class="form-control" required="" id="password" name="password" placeholder="Password">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Sign in</button>
</form>



</div>



</body>
</html>