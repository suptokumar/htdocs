@extends("layout.app")
@section("title","Admin Portal")
@section("active","deposit")
@section("content")
<article>
<header style="overflow: hidden;">

    <a href="{{ url('/admin/deposit') }}" class="btn btn-info float-left">Deposit List</a>

</header>
<section class="gateway_view">
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

@php
	use App\Http\Controllers\soft;
@endphp
<input type="hidden" name="id" value="{{$deposit->id}}">
    @csrf
  <div class="form-row">

    <div class="form-group col-md-6">
    	<a href="{{ url('/public/'.$deposit->screenshot) }}" target="_blank"><img src="{{ url('/public/'.$deposit->screenshot) }}" style="height: 200px" alt=""></a>
    	<div style="padding: 20px">
    	<h6>Amount: {{$deposit->amount}}</h6>
    	<h6>Currency: {{$deposit->currency}}</h6>
    	<h6>Gateway: {{$deposit->gateway}}</h6>
    	<h6>Deposit ID: {{$deposit->idm}}</h6>
    	<h6>Status: {{$deposit->status}}</h6>
@if ($deposit->status!='approved')
    	<button onclick='edit({{$deposit->id}})' class="btn btn-success">Approve</button>
@endif
@if ($deposit->status!='declined')
    	<button onclick='decline({{$deposit->id}})' class="btn btn-warning">Decline</button>
@endif
    	<button onclick='deletes({{$deposit->id}})' class="btn btn-danger">Delete</button>
    	</div>
    </div>

    <div class="form-group col-md-6">
<div>
<img src="{{ url('/public/'.$user->image) }}" alt="profile" style="width: 100px; height: 100px; border-radius: 100px">
</div>
<h4><a href="{{ url('/user/'.$user->phone) }}">{{$user->name}}</a></h4>
<h5>Contact: {{$user->phone}}</h5>
<h5>Email: {{$user->email}}</h5>
<h5>Member Since: {{date("d M Y",strtotime($user->created_at))}}</h5>
<h5>Wallet Balance: ₹{{soft::wallet($user->phone)}}</h5>
    </div>

  </div>

  <br>

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
<script>

 function edit(id)
  {
   if (confirm("Are you sure you want to approve the deposit?")) {
    $.ajax({
      url: '{{ url('/admin/approvedeposit') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(".acd"+id).fadeOut('slow');
      location.reload();
    });
  }
  }


  function decline(id)
  {
   window.location = '{{ url('/admin/declinedeposit/') }}/'+id;
  }

  function manageroll(id)
  {
    window.location = '{{ url('/admin/privileges/') }}/'+id;
  }
function fc_this(th,id){
		$.ajax({
			url: '{{ url('/admin/statuschanger') }}',
			type: 'POST',
			data: {id: id,_token:"{{csrf_token()}}"},
		})
		.done(function(data) {
		});
}
function deletes(id){
  if (confirm("Are you sure you want to delete the deposit?\nIf you delete it, it will be removed with the amount.")) {
    $.ajax({
      url: '{{ url('/admin/deletedeposit') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
    	alert(data);
      window.history.back();
    });
  }
}
</script>
@endsection