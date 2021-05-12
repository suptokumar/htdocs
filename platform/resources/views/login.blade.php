<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link rel="stylesheet" href="https:////code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <script src="{{ asset('/public/js/jquery.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('/public/css/dash.css?d') }}">
	<link rel="icon" href="{{asset("/logo_transparent.png")}}">
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">

</head>
<body>
	<div class="header">
<header style="background: #2c736c" id="bg_no">
    {{-- <img src="{{ url('/public/img/onlineBD.PNG') }}" style="width: 150px" alt=""> --}}
    <span style="font: 26px Merienda !important;font-weight: bold;color: smoke; float: left; padding: 10px">Knowledge House</span>
	{{-- <a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> <span class="wo">{{ __('Home') }}</span></a> --}}
	{{-- <a href="{{url('/logout')}}"><span class="glyphicon glyphicon-user"></span>  &nbsp &nbsp <span class="wo">{{ __('Logout') }}</span></a> --}}
</header>
	</div>
	<div class="dash">

	<style>
  .{{$active}}{
    background: black;
  }
</style>

<style>
	.page-content .grid > article:first-child{
  grid-column: 1 / -1;
    margin-top: 60px;

}
</style>
<section>


<style>
	
/* STRUCTURE */
body {
    background:#e1e9e5;
    height: 100%;
}
.btn-success {
    color: #fff;
    background-color: #a8a8a8;
    border: 1px solid #c4c4c4;
    border-radius: 19px;
    float: right;
    margin: -6px 45px;
}
.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
  margin: 10px auto;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

</style>
<div style="padding-top:100px">
<div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{asset("/logo_transparent.jpg")}}" style="width: 150px" id="icon" alt="User Icon" />
    </div>
@if ($message = session("message"))
	<div class="alert alert-success" role="alert">
  {{$message}}
</div>
@endif
    <!-- Login Form -->
    <form action="{{ url('/login') }}" method="POST">
    			@csrf
@if ($message = session("error"))
	<div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@endif
@if($errors->any())
    {{ implode('', $errors->all(':message')) }}
@endif
      <input type="text" id="login" class="fadeIn second" autocomplete="off" name="login" placeholder="email / phone number">
      <input type="password" id="password" class="fadeIn third" autocomplete="off" name="pass" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
      <input type="hidden" value="" name="redirect">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <a href="{{ url("/register") }}" class="btn btn-success">Register</a>
      <a class="underlineHover" href="#">Forgot Password?</a>
      
    </div>

  </div>





</div>


<script src="{{ asset('/public/js/admin.js?') }}"></script>
</div>
</body>
</html>