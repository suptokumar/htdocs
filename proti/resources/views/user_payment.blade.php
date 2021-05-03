@extends('layout.app')
@section('title','Contact Page')
@section('content')
@includeif("layout.header",["home"=>"contact"])
@if ($msg = session("success"))
<div class="alert alert-{{$msg[0]}}">{{$msg[1]}}</div>
	
@endif
<table class="table">
		<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Fee</th>
      <th scope="col">Paid</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($members as $row)
  		
    <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->name}} <br> @if (is_null($row->month))
      	<span style="color: red">No Month</span>
      @endif
      	<span style="color: green">{{$row->month}}</span>
      <br>{{$row->phone}}</td>
      <td>৳ {{$row->fee}}</td>
      <td>৳ {{$row->paid}}</td>
      <td>
<button type="button" class="btn btn-success" onclick="window.location='{{url('/collect/'.$row->id)}}'">Collect</button>
      </td>
    </tr>
  	@endforeach
  </tbody>
</table>
@endsection
