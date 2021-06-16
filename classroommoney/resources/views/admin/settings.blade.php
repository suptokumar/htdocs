@extends("layout.app")
@section("title","Books | Classroommoney")
@section("9","active")
@section("content")

<div class="container">

<div class="all_payments" style="width: 100%">
  
</div>
<div class="section">


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/admin/savesettings') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Settings</h2>
  <hr>

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
  <div class="form-row">
@php
	use App\Http\Controllers\soft;
@endphp
    <div class="form-group col-md-6">
      <label for="singleamount">Single Payment Amount <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" value="{{soft::set()->single_payment}}" id="singleamount" name="singleamount">
    </div>
    </div>
      <div class="form-row">

    <div class="form-group col-md-6">
      <label for="multiplepayment">Multiple  Payment Amount <span style="color: red">*</span></label>
      <input type="text" class="form-control" required="" value="{{soft::set()->multi_payment}}"  id="multipleamount" name="multipleamount">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>

</form>


</div>

@endsection