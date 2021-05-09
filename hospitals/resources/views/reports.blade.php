<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Job It Medical Software</title>
	    <link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
    <script src="{{ asset('/public/vendor/jquery.js') }}"></script>
    <script src="{{ asset('/public/vendor/main.js?'.rand()) }}"></script>
    <script src="{{ asset('/public/vendor/admin.js?'.rand()) }}"></script>
  <style>
  	*{margin: 0;padding: 0;outline: 0;}
.navbar {
  overflow: auto;
  
  position: relative;
  display: inline-block;
 
  width: 100%;
}

.navbar button {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  font-size: 17px;
  background-color: #333;
}

.navbar button:hover {
  background: #f1f1f1;
  color: black;
}


.submenu{
    float: right;
    display: inline-block;
    padding: 15px;
    
}
.bstyle{
    padding: 14px;
    background: #333;
    font-size: 20px;
    color: #ddd;
    text-shadow: 1px 1px 2px black;
}
.bstyle:hover{
    background: #4CAF50;
}
.logout{

    background: #98e497;
    color: blue;
    text-shadow: 1px 1px 2px black;
    font-weight: bold;
}
.logout:hover{
    background: blue;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  
  }
  .dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: inline-block;
  margin-top: 15px;
  overflow: hidden;
}
.dropdown a:hover {background-color: #ddd;}
  .show {display: block;}
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 14px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
  width: 100%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  left: 132px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>


<div class="dropdown">
  <button onclick="window.location='{{ url('/appoinment') }}'" class="dropbtn">APPOINMENT</button>
  <button onclick="window.location='{{ url('/emergency') }}'" class="dropbtn">EMERGENCY</button>
{{--   <div id="myDropdown" class="dropdown-content">
    <a href="#home">New Patient</a>
    <a href="#about">Patient History</a>
  </div> --}}
  <button class="dropbtn"  onclick="window.location='{{ url('/admission') }}'">ADMISSION</button>
{{--   <button class="dropbtn">DIAGNOSTIC</button>
  <button class="dropbtn">DOCTOR</button>
  <button class="dropbtn">PHARMACY</button>
  <button class="dropbtn">PRESCRIPTION</button>
  <button class="dropbtn">LAB</button> --}}
  <button class="dropbtn" onclick="window.location='{{ url('/accounts') }}'">USERS</button>
  <button class="dropbtn" onclick="window.location='{{ url('/admin/expense') }}'">EXPENSE</button>
  <button class="dropbtn" onclick="window.location='{{ url('/admin/reports') }}'">REPORTS</button>
  <button class="dropbtn" onclick="window.location='{{ url('/admin/service') }}'">ADMIN</button>
  <button onclick="window.location='{{ url('/logout') }}'" style="background: #98e497;color: blue;text-shadow: 1px 1px 2px black;font-weight: bold;" class="dropbtn">LOGOUT</button>
</div>

{{-- <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(x) {
  document.getElementById(x).classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 --}}





{{-- <div class="submenu">
  <table>
  <tr>
    <td><button onclick="" class="bstyle">Due</button></td>
    <td><button onclick="" class="bstyle">Total Cash</button></td>
    <td><button onclick="" class="bstyle">Accounts</button></td>
  </tr>
</table>
</div>
 --}}

<div style="background: #ffffffAA">
	
<h2>
	Reports
</h2>
<style>
	
.rows .col-3 {
  margin: 10px;
  border: 1px solid #ccc;
  background: #98e497;
  text-align: center;
  border-radius: 40% 20%;
}
</style>
<div class="row rows">
	<div class="col-3">
		<h2>Total Cashbox</h2>
		<h2>{{$t1}} Taka</h2>
	</div>
	<div class="col-3">
		<h2>Current Cashbox</h2>
		<h2>{{$s}} Taka</h2>
	</div>
	<div class="col-3">
		<h2>Total Due</h2>
		<h2>{{$t1-$s}} Taka</h2>
	</div>

</div>
<div class="row" style="max-width: 98%">
<div class="col-3">
	<button class="btn btn-success" onclick="exportTableToExcel('adfea','Download')">Download</button>
	  <select  onchange="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" name="due15" id="due15">
    <option value="">-- REPORT TYPE --</option>
      <option value="due">Due</option>
      <option value="paid">Full Paid</option>
  </select>

	 
	 <button class="btn btn-danger float-right" onclick="printData()">Print</button>

</div>
<div class="col-3">
	<select  onchange="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" name="users" id="users">
		<option value="">-- SELECT USER --</option>
		@foreach ($user as $u)
			<option value="{{$u->name}}">{{$u->name}}</option>
		@endforeach
	</select>
	<select  onchange="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" name="test" id="testdsf">
		<option value="">-- SELECT TESTS --</option>
		@foreach ($test as $u)
			<option value="{{$u->name}}">{{$u->name}}</option>
		@endforeach
	</select>
</div>
<div class="col-3">
	<input type="date" id="date1" autocomplete="off" onchange="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;"> TO
	<input type="date" id="date2" autocomplete="off" onchange="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;">
</div>
<div class="col-3">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="reports(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search"><br>
<span>Total: <b class="total"></b> Taka</span> <br>
	<span>Paid: <b class="paid"></b> Taka</span>
	<span>Due: <b class="due"></b> Taka</span>
</div>
<script>
	function printData()
{
   var divToPrint=document.getElementById("adfea");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML+"<style>table{border-collapse:collapse;} td{border: 1px solid #ccc; padding: 10px; max-width: 10%}</style>");
   newWin.print();
   newWin.close();
}
</script>
</div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<script>
    $(document).ready(function() {
        reports(1);
    });
        function dp_fun(page){
        reports(page);

    }
</script>
</div>
<div class="reports" style="background: #fffA"></div>
</div>
</body>
</html>