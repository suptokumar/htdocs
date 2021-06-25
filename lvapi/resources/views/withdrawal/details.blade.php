@extends("layout.app")
@section("title","Admin Portal")
@section("active","withdrawal")
@section("content")
<article>
<header style="overflow: hidden;">

    <a href="{{ url('/admin/withdrawal') }}" class="btn btn-info float-left">Withdrawal List</a>

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
<input type="hidden" name="id" value="{{$withdrawal->id}}">
    @csrf
  <div class="form-row">

    <div class="form-group col-md-6">
      <div style="padding: 20px">
      <h6>Amount: {{$withdrawal->amount}}</h6>
      <h6>Currency: {{$withdrawal->currency}}</h6>
      <h6>Deposit ID: {{$withdrawal->idm}}</h6>
      <h6>Gateway: {{$withdrawal->gateway}}</h6>
      <h6>Gateway Info:<br><pre style="color: white">
{{$withdrawal->info}}</pre></h6>
    	<h6>Status: {{$withdrawal->status}}</h6>
@if ($withdrawal->status!='approved')
    	<button onclick='edit({{$withdrawal->id}})' class="btn btn-success">Approve</button>
@endif
@if ($withdrawal->status!='declined')
    	<button onclick='decline({{$withdrawal->id}})' class="btn btn-warning">Decline</button>
@endif
    	<button onclick='deletes({{$withdrawal->id}})' class="btn btn-danger">Delete</button>
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
   if (confirm("Are you sure you want to approve the withdrawal request?")) {
    $.ajax({
      url: '{{ url('/admin/addwithdrawalrequestapprove') }}',
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
   window.location = '{{ url('/admin/declinewithdrawal/') }}/'+id;
  }
  function details(id)
  {
   window.location = '{{ url('/admin/withdrawal/') }}/'+id;
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
  if (confirm("Are you sure you want to delete the withdrawal request?\nIf you delete it, it will be removed with the amount.")) {
    $.ajax({
      url: '{{ url('/admin/deletewithdrawal') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(".acd"+id).fadeOut('slow');
      alert(data);
      window.history.back();
    });
  }
}
$('#toggle-demo').bootstrapToggle();

</script>
@endsection