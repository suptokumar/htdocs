@extends("layout.app")
@section("title","Payments | School management software")
@section("active","payment")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>


<h3 style="text-align: center; margin: 10px">Create Payment</h3>
<article class="card-body mx-auto" style="width: 398px;">
	<form action="{{ url('/admin/payments') }}" method="POST" id="eonoasdf100d">
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


		@csrf

   <div class="form-group">
   		
    <label for="exampleInputEmail1">{{__('Payment Type')}}</label>
		<select class="form-control" name="type"  id="type" required="">
			<option value="1">Student</option>
			<option value="2">Client</option>
		</select>
  	</div>

  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Payment Date')}}</label>
		<input class="form-control" name="date" required="" type="date">
  	</div>
  	
  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Client ID or Student\'s Mail')}}</label>
		<input class="form-control" name="client" required="" type="text">
  	</div>
  	  	
  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Invoice')}}</label>
		<input class="form-control" name="invoice" type="text">
  	</div>
  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Fees')}}</label>
		<input class="form-control" name="fees" type="text">
  	</div>
  	  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Transfer Fees')}}</label>
		<input class="form-control" name="transfer_fees" type="text">
  	</div>
  	  	  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Extra Payment')}}</label>
		<input class="form-control" name="extra_payment" type="text">
  	</div>
  	
  	<div class="form-group">
    <label for="exampleInputEmail1">{{__('Purchased Hours')}}</label>
		<input class="form-control" name="hours" required="" type="number">
  	</div>

    <div class="form-group">
    	<input type="hidden" name="refil" value="1">
        <button type="submit" class="btn btn-primary btn-block"> Complete Payment  </button>
    </div> <!-- form-group// -->      
</form>
</article>
<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
	<div class="rk" style="float: right; align-items: center;">
		Search <input type="search" id="snod410" autocomplete="off" onkeyup="get_payments(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Date">
	</div>
	<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
	</div>
</div>
<div class="all_payments" style="width: 100%">
	
</div>


</article>
@endsection

@section("script")
<script src="{{ asset('/public/js/admin.js?'.rand()) }}"></script>
<script>
	$(document).ready(function() {
		get_payments(1);
	});
	function dp_fun(page){
		get_payments(page);

	}
</script>
@endsection