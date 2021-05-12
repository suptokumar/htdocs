@extends("layout.app")
@section("title","Create Client | School management software")
@section("active","settings")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>

<form style="width: 90%; margin: 0 auto;" action="{{ url('/create_client') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Create Client</h3>
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

@if ($new_client = session("new_client"))
  <div class="alert alert-success" role="alert">
  {{$new_client}}
</div>
@endif

 <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Full Name')}}</label>
    <input type="text" class="form-control" id="name" name="name"  value="{{ old("name") }}" required aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
<input type="hidden" name="id"  value="{{ Auth::user()->id }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Email address')}}</label>
    <input type="email" class="form-control" id="email" required="" name="email" aria-describedby="emailHelp"    value="{{ old("email") }}" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Phone number')}}</label>
    <input type="text" class="form-control" id="phone" required="" name="phone" aria-describedby="emailHelp"     value="{{ old("phone") }}" placeholder="Enter phone number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Hour Rate')}}</label>
    <input type="text" class="form-control" id="rate" required="" name="rate" aria-describedby="emailHelp" value="{{ old("rate") }}" placeholder="Enter Hourly Rate">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Payment Method')}}</label>
    <select class="form-control" id="payment" required="" name="payment">
    	<option value="PayPal">PayPal</option>
    	<option value="Ria">Ria</option>
    	<option value="Western Union">Western Union</option>
    	<option value="Bank Account">Bank Account</option>
    	<option value="Others">Others</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Payment Plan')}}</label>
    <select class="form-control" id="payment_plan" required="" name="payment_plan">
      <option value="Advance">Advance</option>
      <option value="In arrears">In arrears</option>
    </select>
  </div>

 
  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Save</button>
  </div>
</form>


 </article>
@endsection

@section("script")

@endsection