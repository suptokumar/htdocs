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

<form style="width: 90%; margin: 0 auto;" action="{{ url('/update_client') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Edit Client</h3>
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
    <input type="text" class="form-control" id="name" name="name"  value="{{ $client->name }}" required aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
<input type="hidden" name="id"  value="{{ $client->id }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Email address')}}</label>
    <input type="email" class="form-control" id="email" required="" name="email" aria-describedby="emailHelp"    value="{{ $client->email }}" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Phone number')}}</label>
    <input type="text" class="form-control" id="phone" required="" name="phone" aria-describedby="emailHelp"     value="{{ $client->phone }}" placeholder="Enter phone number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Hour Rate')}}</label>
    <input type="number" class="form-control" id="rate" required="" name="rate" aria-describedby="emailHelp" value="{{ $client->rate }}" placeholder="Enter Hourly Rate">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Payment in USD')}}</label>
    <input type="number" class="form-control" id="payment_usd" required="" name="payment_usd" aria-describedby="emailHelp" value="{{ $client->payment_usd }}" placeholder="payment in usd">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Payment Hours (min)')}}</label>
    <input type="number" class="form-control" id="hours" required="" name="hours" aria-describedby="emailHelp" value="{{ $client->hours }}" placeholder="in minute">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Last Payment Date')}}</label>
    <input type="date" class="form-control" id="last_payment_date" required="" name="last_payment_date" aria-describedby="emailHelp" value="{{ $client->last_payment_date }}" placeholder="payment date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Client\'s Invoice')}}</label>
    <input type="number" class="form-control" id="invoice_number" required="" name="invoice_number" aria-describedby="emailHelp" value="{{ $client->invoice_number }}" placeholder="Enter Hourly Rate">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Payment Method')}}</label>
    <select class="form-control" id="payment" required="" name="payment">
    	<option value="PayPal" {{$client->payment=='PayPal'?"selected":""}}>PayPal</option>
    	<option value="Ria" {{$client->payment=='Ria'?"selected":""}}>Ria</option>
    	<option value="Western Union" {{$client->payment=='Western Union'?"selected":""}}>Western Union</option>
    	<option value="Bank Account" {{$client->payment=='Bank Account'?"selected":""}}>Bank Account</option>
    	<option value="Others" {{$client->payment=='Others'?"selected":""}}>Others</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Payment Plan')}}</label>
    <select class="form-control" id="payment_plan" required="" name="payment_plan">
      <option value="Advance" {{$client->payment_plan=='Advance'?"selected":""}}>Advance</option>
      <option value="In arrears" {{$client->payment_plan=='In arrears'?"selected":""}}>In arrears</option>
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