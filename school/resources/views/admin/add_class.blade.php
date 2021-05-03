@extends("layout.app")
@section("title","Add Class | School management software")
@section("active","add_class")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>


<form style="width: 90%; margin: 0 auto;" action="{{ url('/update') }}" method="POST" id="add_class_form"><br>
	<h3 style="text-align: center;">{{__('Add Class')}}</h3>
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
<div class="alert alert-success donoe410" style="display: none;" role="alert">
  
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Class Title')}}</label>
    <input type="text" class="form-control" id="title" name="title"  value="{{ old("title") }}" aria-describedby="emailHelp" placeholder="Enter The Title">
  </div>
<input type="hidden" name="id"  value="{{ Auth::user()->id }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Class Link')}}</label>
    <input type="text" class="form-control" id="link" name="link" aria-describedby="emailHelp"  value="{{ old("link") }}"  placeholder="Enter zoom link">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Subject')}}</label>
    <select class="form-control" id="subject" name="subject" required>
      <option value="">Select Subject</option>
      <option value="Quran Memorization">Quran Memorization</option>
      <option value="Quran Recitation">Quran Recitation</option>
      <option value="Arabic language">Arabic language</option>
      <option value="Islamic Studies">Islamic Studies</option>
    </select>

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Class Duration')}}</label>
    <select class="form-control" id="duration" name="duration" required="">
    	<option value="">Select Duration</option>
    	<option value="15">{{__('15 Minutes')}}</option>
    	<option value="30">{{__('30 Minutes')}}</option>
    	<option value="45">{{__('45 Minutes')}}</option>
    	<option value="50">{{__('50 Minutes')}}</option>
    	<option value="60">{{__('60 Minutes')}}</option>
    	<option value="75">{{__('75 Minutes')}}</option>
    	<option value="90">{{__('90 Minutes')}}</option>
    	<option value="120">{{__('120 Minutes')}}</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Class Description')}}</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Set Timezone')}}</label>
    <div style="position: relative;">
    	
    <input type="text" class="form-control" id="timezone" name="timezone" aria-describedby="emailHelp"  value="{{ old("timezone") }}" placeholder="Start Typing">
    </div>
  </div>
  <div class="form-group">
  	<style>
  		.dup{
  			float: left;
  			
  		}
  	</style>
    <label for="exampleInputEmail1">{{__('Starting Date')}}</label>
    <div class="mains" style="overflow: hidden;">
    	<div class="dup clockpicker" style="width: 40%"><input type="text" class="form-control" id="time" name="time" aria-describedby="emailHelp"  value="{{ old("time") }}" placeholder="H:M"></div>
    	<div class="dup" style="width: 57%"><input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp"  value="{{ old("date") }}" placeholder="YYYY-MM-DD"></div>
    </div>
    
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Select Teacher')}}</label>
    <div style="position: relative;">

    <input type="text" class="form-control" id="teacher" name="teacher" aria-describedby="emailHelp"  value="{{ old("teacher") }}" placeholder="Select Teacher">
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Select Student')}}</label>
    <div style="position: relative;">

    <input type="text" class="form-control" id="student" name="student" aria-describedby="emailHelp"  value="{{ old("student") }}" placeholder="your section">
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Invite Guests')}}</label>
    <input type="text" class="form-control" id="guest" name="guest"  data-role="tagsinput" value="{{ old("guest") }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Repeat Class')}}</label>
    <input type="hidden" class="form-control" id="repeat" name="repeat" aria-describedby="emailHelp"  value="" placeholder="What class are you in?">
    <div class="col-sm-10">
      <div class="days">
        <input type="button" class="day_tog day_ml" id="Sunday" value="Sunday">
        <input type="button" class="day_tog day_ml" id="Monday" value="Monday">
        <input type="button" class="day_tog day_ml" id="Tuesday" value="Tuesday">
        <input type="button" class="day_tog day_ml" id="Wednesday" value="Wednesday">
        <input type="button" class="day_tog day_ml" id="Thursday" value="Thursday">
        <input type="button" class="day_tog day_ml" id="Friday" value="Friday">
        <input type="button" class="day_tog day_ml" id="Saturday" value="Saturday">
        <br>
      </div>
    </div>
  </div>
  <div style="padding: 10px; overflow: hidden">
  <button type="button" class="btn btn-success add_class_button" style="float: right;">{{__('Add Class')}}</button>
  </div>
</form>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">

 </article>
@endsection

@section("script")
<link rel="stylesheet" type="text/css" href="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/public/js') }}/bootstrap-clockpicker.min.css">
<script type="text/javascript" src="{{ asset('/public/js') }}/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput-anglular.min.js"></script>
  <script src="{{ asset('/public/js/admin.js?'.rand()) }}"></script>

<script>
	$('.clockpicker').clockpicker({
placement: 'bottom',
align: 'left',
donetext: 'Done'
});
	autocomplete(document.querySelector("#timezone"),@php
		echo json_encode(timezone_identifiers_list());
	@endphp);

	search_user(document.querySelector("#student"),2);
	search_user(document.querySelector("#teacher"),1);
</script>
<style>
  .selected{
    background: green;
    color: white;
  }
  .bost{
    background: #C7C7C7 !important;
    color: black !important;
    border: 1px solid black !important;
  }
    .day_tog {
    padding: 4px 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    cursor: pointer;
    margin: 5px;
  }
  .label-info {
  background: #2b7be2;
  padding: 2px 4px 4px 6px;
  border-radius: 10px;
}
.label-info span {
  color: #ffbfb4;
  font-weight: bold;
}
</style>
@endsection