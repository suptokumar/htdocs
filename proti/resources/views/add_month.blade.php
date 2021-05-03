@extends('layout.app')
@section('title','Home Page')
@section('content')
@includeif("layout.header",["home"=>"home"])
<div class="All_members">
<button type="button" class="btn btn-success" style="margin: 10px;" onclick="window.location='{{url('/apply_month/')}}'">Apply This Monthly Fees to all</button>
@if ($msg = session("status"))
<div class="alert alert-{{$msg[0]}}">{{$msg[1]}}</div>
@endif
	<table class="table">
		<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Fee</th>
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
      	<span style="color: green">{{$row->month}}</span></td>
      <td>{{$row->phone}}</td>
      <td>{{$row->fee}}</td>
      <td>
<button type="button" class="btn btn-success" onclick="window.location='{{url('/apply_month/'.$row->id)}}'">Apply</button>
      </td>
    </tr>
  	@endforeach
  </tbody>
</table>
</div>
@endsection