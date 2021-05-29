<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Marksheet | classroommoney</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('/public/js/main.js') }}"></script>

    <script src="{{ asset('/public/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/public/css/dash.css?d') }}">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}">Classroom Money</a>
  <a href="{{ url('/student/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/student/myteachers') }}">Teachers</a>
    <a href="{{ url('/student/tutors') }}">Tutors</a>
  <a href="{{ url('/student/library') }}" class="active">Library</a>

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
<div style="background:#D0E8FF;padding:20px;">
<div style=" width: 100%" class="row">
  <div class="rk col-sm-6" style="float: right;">
    Search <input type="search" id="snod410" autocomplete="off" onkeyup="veri_teachers(1)" style="padding: 10px; width: 60%; border: 1px solid #ccc; outline: none;" placeholder="Search">
  </div>
</div>
</div>
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">

<div class="all_payments" style="width: 100%">

<form action="" method="GET">
  <input type="text" name="s" style="padding: 10px" placeholder="search"><input type="submit" style="padding: 10px;" value="search">
</form>
<style>
  .book {
  width: 300px;
  float: left;
  height: 530px;
  overflow: hidden;
  border: 1px solid #ccc;
  padding: 1%;
  margin: 1%;
}
.book .imgs1 {
  width: 100%;
  height: 300px;
}
</style>
<div class="mainct">
  @foreach ($books as $book)
    <div class="book a{{$book->id}}">
      <button class="btn btn-primary float-right" onclick="delte_it({{$book->id}},this)">Request Purchase</button>
      <img src="{{ url('/public/image/'.$book->thumb) }}" class="imgs1" alt="">
      <h3>{{$book->title}}</h3>
      <p>{{$book->description}}</p>
    </div>
  @endforeach
</div>
<script>
  function delte_it(id,t){
      $.ajax({
        url: '{{ url('/request_perchage') }}',
        type: 'POST',
        data: {id:id,_token:'{{csrf_token()}}'},
      })
      .done(function(data) {
        $(t).html(data);
        $(".a"+t).css('background', '#FFD4D4');
      });
      
    }
</script>
  
</div>

</body>
</html>
