@extends("layout.app")
@section("title","Create Client | School management software")
@section("active","settings")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>

<form style="width: 90%; margin: 0 auto;" action="{{ url('/reqs_t') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Request To Change Schedule</h3>
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

@if ($new_client = session("new_client"))
  <div class="alert alert-success" role="alert">
  {{$new_client}}
</div>
@endif
<style>
  .dup{
    float: left;
  }
</style>
 <div class="form-group">
    <label for="exampleInputEmail1">{{__("Select Time")}}</label>
    <div style="overflow: hidden;">
      
    <div class="dup clockpicker" style="width: 40%"><input type="text" class="form-control" id="time" name="time" aria-describedby="emailHelp"  value="{{ date("H:i",strtotime($course->starting)) }}" placeholder="H:M"></div>
    <div class="dup" style="width: 40%"><input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp"  value="{{ date("Y-m-d") }}"></div>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Set Timezone')}}</label>
    <div style="position: relative;">
    	
    <input type="text" class="form-control" id="timezone" name="timezone" aria-describedby="emailHelp"  value="{{ $course->timezone }}" placeholder="Start Typing">
    </div>
  </div>
@csrf
    <div class="form-group">
    <label for="exampleInputEmail1">{{__('Repeat Class')}}</label>
    <input type="hidden" class="form-control" id="repeat" name="repeat" aria-describedby="emailHelp"  value="{{ $course->repeat }}" placeholder="What class are you in?">

  </div>

 <input type="hidden" name="del" value="{{$id}}">
  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Save</button>
  </div>
</form>


 </article>
@endsection

@section("script")
<link rel="stylesheet" type="text/css" href="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/public/js') }}/bootstrap-clockpicker.min.css">
<script type="text/javascript" src="{{ asset('/public/js') }}/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/boot/dist') }}/bootstrap-tagsinput-anglular.min.js"></script>
  <script src="{{ asset('/public/js/admin.js?') }}"></script>

<script>
	$('.clockpicker').clockpicker({
placement: 'bottom',
align: 'left',
donetext: 'Done'
});
		autocomplete(document.querySelector("#timezone"),@php
		echo json_encode(timezone_identifiers_list());
	@endphp);

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