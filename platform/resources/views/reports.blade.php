@extends("layout.app")
@section("title","My Class | School management software")
@section("active","allclass")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
display: block;
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
<div class="select">
	<select id="at" style="padding: 10px;">
		<option value="{{date("m")}}">Select Month</option>
		<option value="01">January</option>
		<option value="02">February</option>
		<option value="03">March</option>
		<option value="04">April</option>
		<option value="05">May</option>
		<option value="06">June</option>
		<option value="07">July</option>
		<option value="08">August</option>
		<option value="09">September</option>
		<option value="10">October</option>
		<option value="11">November</option>
		<option value="12">December</option>
	</select>
	<select id="ad" style="padding: 10px;">
		<option value="{{date("Y")}}">Select Year</option>
		@for ($i = 2020; $i < 2100; $i++)
		<option value="{{$i}}">{{$i}}</option>
		@endfor
	</select>
	<button class="btn btn-danger" onclick="window.location='{{ url('/admin/reports/') }}/'+document.getElementById('ad').value+'/'+document.getElementById('at').value">Search</button>
</div>

<aside class="rest" style="">
	<h3>Total Student</h3>
	<h4>{{$total_student}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Total Teacher</h3>
	<h4>{{$total_teacher}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Active Students</h3>
	<h4>{{$total_active}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Inctive Students</h3>
	<h4>{{$total_inactive}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Inctive Students</h3>
	<h4>{{$total_inactive}}</h4>
</aside>


<aside class="rest" style="">
	<h3>Waiting Student</h3>
	<h4>{{$waitings}}</h4>
</aside>



<aside class="rest" style="border: 1px solid blue;">
	<h3>Total Classes</h3>
	<h4>{{$total_cls}}</h4>
</aside>
<aside class="rest" style="border: 1px solid blue;">
	<h3>Done Classes</h3>
	<h4>{{$doneclass}}</h4>
</aside>

<aside class="rest" style="border: 1px solid blue;">
	<h3>Upcoming Classes</h3>
	<h4>{{$upcoming_cls}}</h4>
</aside>

<aside class="rest" style="border: 1px solid blue;">
	<h3>Deleted Classes</h3>
	<h4>{{$total_deleted}}</h4>
</aside>

<aside class="rest" style="border: 1px solid blue;">
	<h3>Reschedule Classes</h3>
	<h4>{{$total_changed}}</h4>
</aside>

<aside class="rest" style="border: 1px solid blue;">
	<h3>Missed Classes</h3>
	<h4>{{$missed_class}}</h4>
</aside>


<aside class="rest" style="">
	<h3>Total Families</h3>
	<h4>{{$total_clients}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Total Fees</h3>
	<h4>{{$fees}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Total Transfer Fee</h3>
	<h4>{{$transfer}}</h4>
</aside>

<aside class="rest" style="">
	<h3>Remaining Hours</h3>
	<h4>{{$total_remaining_hours}} hour</h4>
</aside>
<aside class="rest" style="border: 1px solid #1CEB00">
	<h3>Quran Memorization</h3>
	<h4>{{$qm}} Students</h4>
</aside>

<aside class="rest" style="border: 1px solid #1CEB00">
	<h3>Quran Recitation</h3>
	<h4>{{$qr}} Students</h4>
</aside>

<aside class="rest" style="border: 1px solid #1CEB00">
	<h3>Arabic language</h3>
	<h4>{{$al}} Students</h4>
</aside>
<aside class="rest" style="border: 1px solid #1CEB00">
	<h3>Islamic Studies</h3>
	<h4>{{$is}} Students</h4>
</aside>
<style>
	
.rest{
	border: 1px solid #FF8080; padding: 20px; width: 300px; height: 120px; text-align: center; display: inline-block; margin: 5px
}
</style>
 </article>
@endsection

@section("script")

@endsection