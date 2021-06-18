<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{Auth::user()->type==4?"Tutor":(Auth::user()->type==2?"Teacher":"Student")}} | classroommoney</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('/public/js/main.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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
  <a href="{{ url('/') }}" class="active">Classroom Money</a>
  <a href="{{ url('/teacher/mymarksheet') }}">Marksheet</a>
  <a href="{{ url('/teacher/mystudents') }}">Students</a>
    <a href="{{ url('/addbooks') }}">Add Books</a>

  <a href="{{ url('/teacher/requests') }}">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif
<div class="row gm_mg">
  @if (Auth::user()->type==3)
  <div class="col-sm-3">
    <div>
    <h2>My Earning</h2>
    <h2>${{$earning}}</h2>
  </div>
  </div>
  <div class="col-sm-3">
    <div>
    <h2>Avarage Grades</h2>
    <h2>{{$avggrade}}</h2>
  </div>
  </div>
  <div class="col-sm-3">
    <div>
    <h2>Teachers</h2>
    <h2>{{$all_teachers}}</h2>
  </div>
  </div>
  @endif
  @if (Auth::user()->type!=4)
    
  <div class="col-sm-3">
    <div>
    <h2>Upcoming Tasks</h2>
    <h2>{{date("Y/m/d",time()+86400*90)}}</h2>
  </div>
  </div>
  @endif
</div>
@if (Auth::user()->type==4)
<div class="container"> 
<a href="{{ url('/add_live') }}" class="btn btn-primary">Add Live Class</a>
<a href="{{ url('/addbooks') }}" class="btn btn-primary">Add Books</a>
<a href="{{ url('/logout') }}" class="btn btn-danger">Log out</a>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div style="width: 100%;max-width: 1000px;padding: 20px;margin: 0px auto;">
<div class="all_payments">
  
</div>
</div>



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
      url: '{{ url('/mylivelist') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Photo</th><th scope="col">Time</th> <th scope="col">Duration</th><th scope="col">Subject</th><th scope="col">Description</th><th scope="col">Zoom</th> <th scope="col">Status</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['description'];
        body+= "</td>";

        body+= "<td>";
        body+= "<a href='"+row['zoomlink']+"' target=_blank>Visit Room</a>";
        body+= "</td>";

        body+= "<td>";
        body+= row['status']==0?"pending":(row['status']==1?"Published":(row['status']==2?"Timeout":"Rejected"));
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        
        // body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";
        body+= " <button class='btn btn-danger' time='5' onclick='deleteit("+row['id']+",this)'  data-do='0'>Delete</button>";
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





function deleteit(id,t){
if (confirm("Are you sure you want to delete it?")) {

      $.ajax({
        url: "{{ url('/deleteclass') }}",
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

}

</script>



</div>
@else

<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div style="width: 100%;max-width: 1000px;padding: 20px;margin: 0px auto;">
<div class="all_payments">
  
</div>
</div>

@endif
</div>
@if (Auth::user()->type!=4)
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
      url: '{{ url('/notifications') }}',
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
        body+= " <button class='btn btn-danger' onclick=deleteit("+row['id']+",this)>Delete</button>";
        body+= "</div>";
      body+= '</div>';

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
        url: "{{ url('/delete_notifications') }}",
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
@endif

</body>
</html>
