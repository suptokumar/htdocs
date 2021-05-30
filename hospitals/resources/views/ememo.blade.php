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
<body style="padding: 20px; font-weight: bold;">

<div class="body_part a1" style="width: 80%; margin: 1%; padding: 1%; border: 2px solid #ccc; display: none;">
<div class="row" style="">
	<div class="col-1">ID: </div>
	<div class="col-1"> {{$user->id}}</div>
	<div class="col-2">Name:  </div>
	<div class="col-4">{{$user->name}}</div>
	<div class="col-2">Doctor:</div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>Pathology - 107</h4>
<div class="row">
	<ul style="list-style-type: decimal;">
		
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
	@if($type[$n]=='Pathology')
	<style>
		.a1{
			 display: inline-block !important;
		}
	</style>
	<li>
		<td>{{$n}}</td>
		
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>
<a href="javascript:void(0)" class="btn btn-info mt-2" onclick="this.style.display='none'; window.print();">Print</a>

<div class="body_part a2" style="display:none;width: 80%; margin: 2%; padding: 2%; border: 2px solid #ccc;">

<div class="row" style="">
	<div class="col-1">ID: </div>
	<div class="col-1"> {{$user->id}}</div>
	<div class="col-2">Name:  </div>
	<div class="col-4">{{$user->name}}</div>
	<div class="col-2">Doctor:</div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>ECG - 113</h4>

<div class="row">
	<ul style="list-style-type: decimal;">
		
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
	@if($type[$n]=='ECG')
		<style>
		.a2{
			display: inline-block !important;
		}
	</style>
	<li>
		<td>{{$n}}</td>
		
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

<div class="body_part a3" style="width: 80%; margin: 2%; padding: 2%; border: 2px solid #ccc; display: none;">

<div class="row" style="">
	<div class="col-1">ID: </div>
	<div class="col-1"> {{$user->id}}</div>
	<div class="col-2">Name:  </div>
	<div class="col-4">{{$user->name}}</div>
	<div class="col-2">Doctor:</div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>X-RAY - 108</h4>
<div class="row">
	<ul style="list-style-type: decimal;">
		
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
	@if($type[$n]=='X-RAY')
	<style>
		.a3{
			display: inline-block !important;
		}
	</style>
	<li>
		<td>{{$n}}</td>
		
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

<div class="body_part a4" style="width: 80%; margin: 2%; padding: 2%; border: 2px solid #ccc; display: none;">

<div class="row" style="">
	<div class="col-1">ID: </div>
	<div class="col-1"> {{$user->id}}</div>
	<div class="col-2">Name:  </div>
	<div class="col-4">{{$user->name}}</div>
	<div class="col-2">Doctor:</div>
	<div class="col-2"> {{$user->consultant}}</div>
</div>
<h4>ULTRA - 112</h4>
<div class="row">
	<ul style="list-style-type: decimal;">
		
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
	@if($type[$n]=='ULTRA')
		<style>
		.a4{
			display: inline-block !important;
		}
	</style>
	<li>
		<td>{{$n}}</td>
		
	</li>
@endif
	@endforeach
	</ul>
</div>
</div>

			
</body>
</html>
