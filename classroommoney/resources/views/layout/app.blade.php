<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link rel="stylesheet" href="https:////code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <script src="{{ asset('/public/js/jquery.js') }}"></script>
  {{-- <link rel="stylesheet" href="{{ asset('/public/css/dash.css?'.rand()) }}"> --}}
</head>
<body>
  <div class="header">
<header style="background: #f0f0f0" id="bg_no">

<span style="font-size: 25px !important; margin: 10px;float: left;font-weight: bold;text-shadow: 1px 1px 1px #848484;color: #000000;">Classroom Money</span>
<ul class="nav nav-pills justify-content-center">
  <li class="nav-item">
    <a class="nav-link @yield("1")" href="{{ url('/') }}">Admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield("2")" href="{{ url('/admin/teachers') }}">Teacher Verifications</a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield("3")" href="{{ url('/admin/withdrawal') }}">Withdrawal Requests</a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield("4")" href="#">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link @yield("4")" href="{{ url('/logout') }}">Logout</a>
  </li>
</ul>

</header>
<style>
    header#bg_no {
    width: 100%;
    z-index: 1000;
    color: white;
    top: 0;
}
#bg_no a{
    margin: 15px 10px 15px 10px;
}

</style>
  </div>

	<style>
  .@yield("active"){
    background: black;
  }
</style>

@yield("content")

   


	<script src="{{ asset('/public/js/dash.js?'.rand()) }}"></script>
  <script src="{{ asset('/public/js/main.js?'.rand()) }}"></script>

  @yield("script")

</body>
</html>