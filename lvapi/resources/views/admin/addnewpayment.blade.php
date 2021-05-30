@extends("layout.app")
@section("title","School management software")
@section("active","paymentdetails")
@section("content")
<article>
<header style="overflow: hidden;">
	<a href="{{ url('/admin/paymentdetails') }}" class="btn btn-danger float-left">Gateway List</a>
</header>
<section class="gateway_view">
	<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
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
</style>
<script>
function accept(id,th){
	if (confirm("Accept?")) {
		$.ajax({
			url: '{{ url('/admin/acceptreader') }}',
			type: 'POST',
			data: {id: id,_token:"{{csrf_token()}}"},
		})
		.done(function(data) {
			$(th).html(data);
		});
		
	}
}
function deletes(id,th){
	if (confirm("Delete?")) {
		$.ajax({
			url: '{{ url('/admin/deletesreader') }}',
			type: 'POST',
			data: {id: id,_token:"{{csrf_token()}}"},
		})
		.done(function(data) {
			$(th).html(data);
		});
		
	}
}
</script>
@endsection