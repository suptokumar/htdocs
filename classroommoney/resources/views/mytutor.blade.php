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

<div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}">Classroom Money</a>
  <a href="{{ url('/student/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/student/myteachers') }}">Teachers</a>
    <a href="{{ url('/student/tutors') }}" class="active">Tutors</a>
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
<div style="background:#D0E8FF;padding:20px;">
<div style=" width: 100%" class="row">
  <h2 class=" col-sm-6">Find Tutors</h2>
  <div class="rk col-sm-6" style="float: right;">
    Search <input type="search" id="snod410" autocomplete="off" onkeyup="veri_teachers(1)" style="padding: 10px; width: 60%; border: 1px solid #ccc; outline: none;" placeholder="grades  or subjects">
  </div>
</div>
</div>
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">

<div class="all_payments" style="width: 100%">
  
</div>


</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script>
  $(document).ready(function() {
    veri_teachers(1);
  });
  function dp_fun(page){
    veri_teachers(page);
  }
    function veri_teachers(page){
    $.ajax({
      url: '{{ url('/livesearch') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Thumbnail</th> <th scope="col">Time</th> <th scope="col">Duration</th><th scope="col">Subject</th><th scope="col">Grades</th><th scope="col">Description</th><th scope="col">Zoom</th></tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= "<img src='{{ url('/public/image/') }}/"+row['thumbnail']+"' style='width: 100px'>";
        body+= "</td>";
        body+= "<td>";
        body+= row['time'];
        body+= "</td>";
        body+= "<td>";
        body+= row['duration']+" minutes";
        body+= "</td>";

        body+= "<td>";
        body+= row['subject'];
        body+= "</td>";

        body+= "<td>";
        body+= row['grade'];
        body+= "</td>";

        body+= "<td>";
        body+= row['description'];
        body+= "</td>";

        body+= "<td>";
        body+= "<a href='"+row['zoomlink']+"' class='btn btn-primary' target=_blank>visit room</a>";
        body+= "</td>";

        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='6'>";
        body+= "<td>";
        body+= "No Users Found";
        body+= "</td>";
        body+= "</tr>";
      }
      body+= '</tbody></table>';
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      body+=generate_pagination($total, $page, $limit, "dp_fun");
      $(".all_payments").html(body);
    })
    .fail(function() {
      $(".all_payments").html("Network error!");
    })    
  }



</script>
</body>
</html>
