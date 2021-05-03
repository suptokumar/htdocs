@extends('layout.app')
@section('title','Home Page')
@section('content')
@includeif("layout.header",["home"=>"home"])
<div class="container" style="width: 80% !important;">
	@if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if ($s = session('success'))
<div class="alert alert-{{$s[0]}}">{{$s[1]}}</div>
@endif
<form method="POST" action="{{ url('/add_member') }}" style="margin: 5% 0%; border: 1px solid #ccc; padding: 10% 16% 15% 5%">
	@csrf
	@if (isset($edit))
	<input type="hidden" name="id" value="{{$edit->id}}">
	@endif
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="member's name" name="name" @if(isset($edit))
	value="{{$edit->name}}" @endif required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="inputEmail3" placeholder="Phone Number" name="phone" @if(isset($edit))
	value="{{$edit->phone}}" @endif required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Monthly Fee</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword3" @if(isset($edit))
	value="{{$edit->fee}}" @endif placeholder="Monthly Fee" name="fee" required="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Add Member</button>
    </div>
  </div>
</form>
</div>


<div class="All_members">
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
      <td>{{$row->name}}</td>
      <td>{{$row->phone}}</td>
      <td>{{$row->fee}}</td>
      <td>
<button type="button" class="btn btn-success" onclick="window.location='{{url('/add_member/'.$row->id)}}'">Edit</button>
<button type="button" class="btn btn-danger" onclick="window.location='{{url('/delete_member/'.$row->id)}}'">Delete</button>
      </td>
    </tr>
  	@endforeach
  </tbody>
</table>
</div>
@endsection