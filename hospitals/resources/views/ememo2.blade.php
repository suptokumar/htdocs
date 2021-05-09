<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hospital Management Software</title>
    <link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
	<style>

	</style>
</head>
<body style="padding: 20px;">

<div class="body_part" style="width: 40%; margin: 2%; padding: 2%; border: 1px solid #ccc; display: inline-block;">

<div class="row">
	<div class="col-2">Reg No : </div>
	<div class="col-2"> {{$user->id}}</div>
	<div class="col-2">Patient Name : </div>
	<div class="col-2"> {{$user->name}}</div>
	<div class="col-2">Consultant : </div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>Pathology</h4>
<div class="row">
	<ul>
		
	@php
		$i =  0;
		$rates = 0;
		$name = explode('```', $tests->test_name);
		$rate = explode(',', $tests->test_amount);
	@endphp
	@foreach ($name as $key => $n)
@if ($i==0)
@php
	$i++;
	continue;
@endphp
@endif
@if ($n=="Room Fee")
@php
	$i++;
	continue;
@endphp
@endif
	@if($type[$n]=='Pathology')
	<li>
		<td>{{$n}} |</td>
		<td>{{$rate[$key]}} Taka</td>
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

<div class="body_part" style="width: 40%; margin: 2%; padding: 2%; border: 1px solid #ccc; display: inline-block;">

<div class="row">
	<div class="col-2">Reg No : </div>
	<div class="col-2"> {{$user->id}}</div>
	<div class="col-2">Patient Name : </div>
	<div class="col-2"> {{$user->name}}</div>
	<div class="col-2">Consultant : </div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>ECG</h4>

<div class="row">
	<ul>
		
	@php
		$i =  0;
		$rates = 0;
		$name = explode('```', $tests->test_name);
		$rate = explode(',', $tests->test_amount);
	@endphp
	@foreach ($name as $key => $n)
@if ($i==0)
@php
	$i++;
	continue;
@endphp
@endif
@if ($n=="Room Fee")
@php
	$i++;
	continue;
@endphp
@endif
	@if($type[$n]=='ECG')
	<li>
		<td>{{$n}} |</td>
		<td>{{$rate[$key]}} Taka</td>
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

<div class="body_part" style="width: 40%; margin: 2%; padding: 2%; border: 1px solid #ccc; display: inline-block;">

<div class="row">
	<div class="col-2">Reg No : </div>
	<div class="col-2"> {{$user->id}}</div>
	<div class="col-2">Patient Name : </div>
	<div class="col-2"> {{$user->name}}</div>
	<div class="col-2">Consultant : </div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>X-RAY</h4>
<div class="row">
	<ul>
		
	@php
		$i =  0;
		$rates = 0;
		$name = explode('```', $tests->test_name);
		$rate = explode(',', $tests->test_amount);
	@endphp
	@foreach ($name as $key => $n)
@if ($i==0)
@php
	$i++;
	continue;
@endphp
@endif
@if ($n=="Room Fee")
@php
	$i++;
	continue;
@endphp
@endif
	@if($type[$n]=='X-RAY')
	<li>
		<td>{{$n}} |</td>
		<td>{{$rate[$key]}} Taka</td>
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

<div class="body_part" style="width: 40%; margin: 2%; padding: 2%; border: 1px solid #ccc; display: inline-block;">

<div class="row">
	<div class="col-2">Reg No : </div>
	<div class="col-2"> {{$user->id}}</div>
	<div class="col-2">Patient Name : </div>
	<div class="col-2"> {{$user->name}}</div>
	<div class="col-2">Consultant : </div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>ULTRA</h4>
<div class="row">
	<ul>
		
	@php
		$i =  0;
		$rates = 0;
		$name = explode('```', $tests->test_name);
		$rate = explode(',', $tests->test_amount);
	@endphp
	@foreach ($name as $key => $n)
@if ($i==0)
@php
	$i++;
	continue;
@endphp
@endif
@if ($n=="Room Fee")
@php
	$i++;
	continue;
@endphp
@endif
	@if($type[$n]=='ULTRA')
	<li>
		<td>{{$n}} |</td>
		<td>{{$rate[$key]}} Taka</td>
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

			<a href="javascript:void(0)" class="btn btn-info mt-2" onclick="this.style.display='none'; window.print();">Print</a>
</body>
</html>
