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

<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div style="width: 100%;max-width: 1000px;padding: 20px;margin: 0px auto;">
	
    Search <input type="search" id="snod410" autocomplete="off" onkeyup="veri_teachers(1)" style="padding: 10px; width: 60%; border: 1px solid #ccc; outline: none;">
<div class="all_payments">
  
</div>
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
    $("body,html").animate({scrollTop:0}, 500);
  }
  function veri_teachers(page){
    $.ajax({
      url: '{{ url('/teacher/requests') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
    	console.log(data);
     var d = JSON.parse(data);
     let body = "";
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
      body += '<div class="row" id="bcmc'+row["id"]+'" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "<div class='col-sm-8'>"+row['content']+"<br>"+row['created_at']+"</div>";
        body+="<div class='col-sm-4'>";
        body+= " <button class='btn btn-primary' onclick="+row['script']+"("+row['id']+",this)>Accept</button>";
        body+= " <button class='btn btn-danger' onclick=deleteit("+row['id']+",this)>Delete</button>";
        body+= "</div>";
      body+= '</div>';

      }
      if (d[0]=='') {
      body += '<div class="row" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "No Requests";
        body+= "</div>";
      }
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      if (d[0]!=''){
      body+=generate_pagination($total, $page, $limit, "dp_fun");
      }
      $(".all_payments").html(body);
    })
    .fail(function() {
      veri_teachers(page);
    })    
  }






function accept_student(id,t){

      $.ajax({
        url: "{{ url('/accept_student') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $(t).html(data);
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}

function deleteit(id,t){

      $.ajax({
        url: "{{ url('/delete_request') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $("#bcmc"+id).fadeOut();
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}
</script>
</body>
</html>
