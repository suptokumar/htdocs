@extends("layout.app")
@section("title","My Class | School management software")
@section("active","my_class")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
.rab{
	padding: 10px 20px;
	border: 1px solid #ccc;
	border-radius: 8px;
	width: auto;
	margin: 10px;
	float: left;
}
</style>
 <article>



<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
	<div class="rk" style="float: right; align-items: center;">
		Search <input type="search" id="snod410" autocomplete="off" onkeyup="show_class(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
	</div>
	<div class="parts">
		<div class="rab">
			<h5>{{Auth::user()->type==1?"Done Hours":"Remaining Hours"}}</h5>
			<h3 style="color:{{Auth::user()->hours<61?'red;':'blue'}}">{{floor(intval(Auth::user()->hours)/60)}}:{{intval(Auth::user()->hours<0?intval(Auth::user()->hours)*-1:Auth::user()->hours)%60}}</h3>
		</div>
	</div>

	<div class="parts">
		<div class="rab">
			<h6>Attended Classes</h6>
			<h5>Total: {{$attend[0]}}</h5>
			<h5>Month: {{$attend[1]}}</h5>
		</div>
		<div class="rab">
			<h6>Not Attended Classes</h6>
			<h5>Total: {{$not_attended[0]}}</h5>
			<h5>Month: {{$not_attended[1]}}</h5>
		</div>
		@if (isset($last_payment))
		<div class="rab">
			<h6>Payments</h6>
			<h6>Last Payment: {{$last_payment[0]}}</h6>
			<h6>Upcoming: {{$last_payment[1]}}</h6>
		</div>
		@endif
	</div>
	<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
	</div>
</div>
<div class="all_class" style="width: 100%">
	
</div>



 </article>
@endsection

@section("script")

  <script src="{{ asset('/public/js/class.js?c') }}"></script>
<script>
	$(document).ready(function() {
		show_class(1);
	});
	function dp_fun(page){
		show_class(page);

	}
</script>
<style>
	
.moce10 {
  padding: 10px;
  margin: 10px;
  border: 1px solid #ccc;
}
.moce10.new_one {
  background: #e6f8ff;
}
.moce10 .btn {
  float: right;
}
</style>
@endsection