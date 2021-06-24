@extends("layout.app")
@section("title","School management software")
@section("active","products")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
background: none;
}
</style>
 <article>

<div class="row">
	<div class="col-4">
		<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
		<img src="{{ url(empty(Auth::user()->image)?"/public/logo/ag.jpg":"/public/".Auth::user()->image) }}" alt="{{Auth::user()->name}}" style="width: 200px; border-radius: 100%;">
		<h2>{{Auth::user()->name}}</h2>
		<h5>Client ID:{{Auth::user()->gurdain_id}}</h5>
		<div style="text-align: left">
<h6>Email: {{Auth::user()->email}}</h6>
<h6>Phone Number: {{Auth::user()->phone}}</h6>

@if (Auth::user()->type!=2)
<h6>ID Number: {{Auth::user()->national_id}}</h6>

<br>
<br>

<h6>Zoom Link: {{Auth::user()->zoom_link}}</h6>
<h6>Calender Link: {{Auth::user()->calender_link}}</h6>

@endif
		</div>
		</div>
		<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
<h3>My Bio</h3>
<p>
	{{Auth::user()->bio}}
</p>
		</div>
	</div>
	<div class="col-8">
			<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; ">
<div class="row">
<div class="col-sm-6 m-2" style="border-right: 1px solid #ccc;">
<h6>Country: {{Auth::user()->country}}</h6>
<h6>Timezone: {{Auth::user()->timezone}}</h6>
<h6>Gender: {{Auth::user()->gender}}</h6>
<h6>Birthday: {{Auth::user()->dateofbirth}}</h6>
<h6>Address: {{Auth::user()->address1}}</h6>
</div>
@php
	use App\Models\report;
	use App\Models\User;
	if(Auth::user()->type==2)
	{
	$r = report::where("s_id","=",Auth::id())->get();
}else{
	$r = report::where("t_id","=",Auth::id())->get();
}
$subject = [];
$clt = [];
foreach ($r as $key => $value) {
		if(!in_array($value->subject,$subject )){

	array_push($subject,$value->subject);
}

	if(Auth::user()->type==2)
{
	if(!in_array(User::find($value->t_id)->name,$clt )){

	array_push($clt,User::find($value->t_id)->name);
	}
}else{
if(!in_array(User::find($value->s_id)->name,$clt )){
		
	array_push($clt,User::find($value->s_id)->name);
	}}
}
@endphp
<div class="col-sm-4 m-2">
<h6>Subjects: {{ implode(",",$subject) }}</h6>
<h6>@if (Auth::user()->type==2)
	Teacher:
@else
Students:
@endif

{{ implode(",",$clt) }}</h6>
<h6>Cancel Request: {{Auth::user()->cancel_request}}</h6>
</div>
</div>


		</div>
		<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">

<div class="pre_class">
	<h3>Current Month Reports
</h3>
  {{--    <a class='btn btn-info float-right' style='width: 400px; !important' href='{{ url("/upcoming/".Auth::user()->id) }}'>Upcomings</a>   --}}
<table class="table" id="tablon"> 
    <thead class="thead-light"> 
      <tr> 
        <th scope="col">#</th>
        <th scope="col">Class Title</th>
        <th scope="col">Subject</th>
        <th scope="col">{{Auth::user()->type==2?"Teacher":"Student"}}</th>
        <th scope="col">Duration</th>
        <th scope="col">Time</th>
        <th scope="col">Progress Notes</th>
      </tr>
    </thead>
  <tbody>
      @if (empty($report))
    <td colspan="7">Nothing Found</td>
  @endif
  @php
    $i = 0;
  @endphp
 @foreach ($report as $r)
 @php
   date_default_timezone_set($r->timezone);
   $m = strtotime($r->lastclass);
   date_default_timezone_set(Auth::user()->timezone);
 @endphp
      <tr> 
        <td>{{++$i}}</td>
        <td>{{ $r->title}}</td>
        <td>{{ $r->subject}}</td>
        <td>{{ $r->client}}</td>
        <td>{{ $r->duration}} Minutes</td>
        <td>{{ date("d M Y h:ia",$m)}}</td>
        <td>{{ $r->notes}}</td>
      </tr>
@endforeach 
  </tbody>
  </table>
</div>

	</div>
</div>


 </article>
@endsection