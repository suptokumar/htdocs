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
    <a href="{{ url('/addbooks') }}">Add Books</a>

  <a href="{{ url('/teacher/requests') }}" class="active">Requests</a>
  <a href="{{ url('/settings') }}">Settings</a>
  <a href="{{ url('/logout') }}">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
@endif


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/payment') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Fee submission</h2>
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
  <div class="form-row">
    @php
      
        use App\Http\Controllers\soft;

    @endphp
    <div class="form-group col-md-12">
      <script>
        function amg(t)
        {
          var val = $(t).val();
          valv = 0;
          for (var i = 0; i < val.length; i++) {
            if(i==0)
            {
              valv+= {{number_format(soft::set()->single_payment,2)}};
            }else{
              valv+= {{number_format(soft::set()->multi_payment,2)}};
            }
          }
          $("#amount").val(valv);
        }
      </script>
      <label for="name">Select Students <span style="color: red">*</span></label>
      <select name="student[]" id="student" class="form-control" multiple="" required="" onchange="amg(this)">
        @php
          use App\Models\student;
          use App\Models\payment;
          use App\Models\User;
          $p = student::where("email","=",Auth::user()->email)->first();
          $parents = $p->m_occupation;
          $mores = student::where("m_occupation","=", $parents)->get();
        @endphp
        @foreach ($mores as $more)
        @php
          $st = $more->email;
          $std = User::where("email","=",$st)->first();
          if ($payment = payment::where([["user","=",$std->id],["status","=","success"]])->first()) {
            continue;
          }
        @endphp
        <option value="{{$more->email}}">{{$more->name}}</option>
        @endforeach
      </select>
      <small>If you have more then one students you  will get a discount. Please make Mother's Email same to make student from one family</small>
    </div>
    <div class="form-group col-md-4">
      <label for="name">Fee submission Year <span style="color: red">*</span></label>
      <select name="year" id="year" class="form-control">
      	<option value="{{date("Y")}}-{{date("Y")+1}}">{{date("Y")}}-{{date("Y")+1}}</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="amount">Payment Amount ($) <span style="color: red">*</span></label>
      <input type="number" class="form-control" step=".001" required="" readonly  id="amount" name="amount" placeholder="Your Last Qualification"  value="{{soft::set()->single_payment}}">
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Pay Now</button>

</form>
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div style="width: 100%;max-width: 1000px;padding: 20px;margin: 0px auto;">
<h3>Previous Fees</h3>
	
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
      url: '{{ url('/paymentlist') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
     let body = "";
      for (var i = 0; i < d.length; i++) {
        var row = d[i];
        console.log(row);
      body += '<div class="row" id="bcmc'+row["id"]+'" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "<div class='col-sm-4'><h2>"+row['year']+"</h2>"+row['ctd']+"</div>";
        if (row['status']!="pending") {
body+="<div class='col-sm-4'><span class='badge badge-success'>"+row['status']+"</span><h5>Gateway: "+row['method']+"</h5><h5>paymentID: "+row['paymentID']+"</h5></div>";
        }else{
        body+="<div class='col-sm-4'><span class='badge badge-info'>"+row['status']+"</span><h3>"+row['amount']+"$</h3><h6>"+row['returnURL']+"<h6></div>";
        body+= "<a class='btn btn-primary' style='padding: 1.375rem 1.75rem' href='{{ url('/payment/') }}/"+row['paymentID']+"'>Pay Now</a>";
        }

      body+= '</div>';

      }
      if (d[0]=='') {
      body += '<div class="row" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "No Payments";
        body+= "</div>";
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
