@extends("layout.app")
@section("title","Admin Portal")
@section("active","deposit")
@section("content")
<article>
<header style="overflow: hidden;">

    <a href="{{ url('/admin/deposit') }}" class="btn btn-info float-left">Deposit List</a>

</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/declinedeposit') }}" method="POST" enctype="multipart/form-data">
<br>
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


<input type="hidden" name="id" value="{{$deposit->id}}">
    @csrf
<div class="alert alert-info">
  @if ($deposit->status=='declined')
    Deposit successfuly declined. 
  @else
	You are going to <b>Decline</b> a deposit request. Please view the screenshot of the deposit properly and match the detail before you decline it.
  @endif
</div>
  <div class="form-row">

    <div class="form-group col-md-6">
    	<a href="{{ url('/public/'.$deposit->screenshot) }}" target="_blank"><img src="{{ url('/public/'.$deposit->screenshot) }}" style="height: 200px" alt=""></a>
    	<div style="padding: 20px">
    	<h6>Amount: {{$deposit->amount}}</h6>
    	<h6>Currency: {{$deposit->currency}}</h6>
    	<h6>Gateway: {{$deposit->gateway}}</h6>
    	<h6>Deposit ID: {{$deposit->idm}}</h6>
    	</div>
    </div>
  @if ($deposit->status!='declined')

    <div class="form-group col-md-6">
      <label for="declinecause">Write the cause why are you declining the request <span class="red">*</span></label>
      <textarea  class="form-control" name="declinecause" required="" id="declinecause" placeholder="eg: The amount hasn't been transfered  yet."></textarea> 
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Decline Now</button>
  </div>
    </div>
  @endif

  </div>

  <br>
</form>
</section>
</article>
@endsection
@section("script")
<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
.multiselect-native-select {
    width: 100%;
    display: block;
}
.form-check-label{
  color: black;
}
.btn-group, .btn-group-vertical{
  display: block !important;
}
.multiselect-container{
  width: 100%;
}
.custom-select{
  background: #242222 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
  color: #90979d;
}
</style>
@endsection