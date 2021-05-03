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
<form method="POST" action="{{ url('/collect') }}" style="margin: 5% 0%; border: 1px solid #ccc; padding: 10% 16% 15% 5%">
	@csrf
	<input type="hidden" name="id" value="{{$members->id}}">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Due Amount</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" id="inputEmail3" placeholder="due amount" name="name" 
	value="{{($members->fee)-($members->paid)}}" required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Paid Amount</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword3"
	max="{{($members->fee)-($members->paid)}}" min="0"  placeholder="paid amount" name="fee" required="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Collect</button>
    </div>
  </div>
</form>
</div>

@endsection