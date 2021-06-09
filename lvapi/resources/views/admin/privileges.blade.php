@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
	<a href="{{ url('/admin/users') }}" class="btn btn-danger float-left">Users List</a>
<h2 style="text-align: center;">Privileges of {{$users->name}}</h2>
</header>
<section class="gateway_view">
	<form action="{{ url('/admin/privilegessave') }}" method="POST" enctype="multipart/form-data">
@php
use \App\Http\Controllers\soft;

  // function soft::power($user,$route)
  // {

  //   $user = User::find($user);
  //   $soft::power = $user->soft::power;
  //   $par = explode(",", $soft::power);
  //   if (in_array($par, $route)) {
  //       return 'checked';
  //   }else{
  //       return '';
  //   }
  // }
@endphp
<br>
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


		@csrf
		<input type="hidden" name="id" value="{{$users->id}}">
  <div class="form-row">
    <div class="form-group col-md-4">

<label class="container">Withdrawal Management
  <input type="checkbox"  name="withdrawal"  {{soft::power($users->id,'withdrawal')}}>
  <span class="checkmark"></span>
</label>

<label class="container">Payment Details
  <input type="checkbox" {{soft::power($users->id,'paymentdetails')}} name="paymentdetails">
  <span class="checkmark"></span>
</label>

<label class="container">Id management
  <input type="checkbox"{{soft::power($users->id,'createid')}} name="createid">
  <span class="checkmark"></span>
</label>

<label class="container">Refer & Earn
  <input type="checkbox" {{soft::power($users->id,'referearn')}} name="referearn">
  <span class="checkmark"></span>
</label>
<label class="container">Deposit Management
  <input type="checkbox" {{soft::power($users->id,'deposit')}} name="deposit">
  <span class="checkmark"></span>
</label>
    </div>

    <div class="form-group col-md-4">

<label class="container">FAQ management
  <input type="checkbox" {{soft::power($users->id,'faq')}} name="faq">
  <span class="checkmark"></span>
</label>


<label class="container">User Management
  <input type="checkbox" {{soft::power($users->id,'users')}} name="users">
  <span class="checkmark"></span>
</label>

<label class="container">Exchange management
  <input type="checkbox" {{soft::power($users->id,'exchange')}} name="exchange">
  <span class="checkmark"></span>
</label>
<label class="container">Support
  <input type="checkbox" {{soft::power($users->id,'support')}} name="support">
  <span class="checkmark"></span>
</label>

<label class="container">Terms
  <input type="checkbox" {{soft::power($users->id,'terms')}} name="terms">
  <span class="checkmark"></span>
</label>
</div>
<div class="form-group col-md-4">

<label class="container">How to use
  <input type="checkbox" {{soft::power($users->id,'howtouse')}} name="howtouse">
  <span class="checkmark"></span>
</label>
<label class="container">Bannar Management
  <input type="checkbox" {{soft::power($users->id,'bannar')}} name="bannar">
  <span class="checkmark"></span>
</label>
<label class="container">Send Notifications
  <input type="checkbox" {{soft::power($users->id,'notifications')}} name="notifications">
  <span class="checkmark"></span>
</label>
<label class="container">Announcement
  <input type="checkbox" {{soft::power($users->id,'announcement')}} name="announcement">
  <span class="checkmark"></span>
</label>
<label class="container">Offers
  <input type="checkbox" {{soft::power($users->id,'offer')}} name="offer">
  <span class="checkmark"></span>
</label>
    </div>
  </div>
  <div class="cpnel">
  	
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
</section>
</article>
@endsection
@section("script")

<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
</style>
<script>
	let imgInp = document.getElementById('icon');
	let blah = document.getElementById('blah');
	imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
<script>
function accept(id,th){
	if (confirm("Accept?")) {
		$.ajax({
			url: '{{ url('/admin/acceptreader') }}',
			type: 'POST',
			data: {id: id,_token:"{{csrf_token()}}"},
		})
		.done(function(data) {
			$(th).html(data);
		});
		
	}
}
function deletes(id,th){
	if (confirm("Delete?")) {
		$.ajax({
			url: '{{ url('/admin/deletesreader') }}',
			type: 'POST',
			data: {id: id,_token:"{{csrf_token()}}"},
		})
		.done(function(data) {
			$(th).html(data);
		});
		
	}
}
</script>
<style>
/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}	
</style>
@endsection