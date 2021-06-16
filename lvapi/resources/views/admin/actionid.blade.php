@extends("layout.app")
@section("title","Admin Portal")
@section("active","createid")
@section("content")
<article>
<header style="overflow: hidden;">
	<div class="row">
		<div class="col-4">
			<input onkeyup="load_user(1)" id="searches"  placeholder="Search" class="form-control">
		</div>
		<div class="col-4">
			<select onchange="load_user(1)" id="type" class="form-control">
				<option value="">--Status--</option>
				<option value="">All</option>
        		<option value="pending" selected="">pending</option>
        		<option value="approved">approved</option>
        		<option value="deleted">deleted</option>
			</select>
		</div>
{{-- 		<div class="col-4">
	<a href="{{ url('/admin/addexchange') }}" class="btn btn-info float-right">Add Exchanges</a>
	<a href="{{ url('/admin/addconfigure') }}" class="btn btn-danger float-right">Add Exchange Type</a>
  <a href="{{ url('/admin/plan') }}" class="btn btn-success float-right">Add Plan</a>
		</div> --}}
	</div>
</header>
<section class="user_view">
	<pre>
		
	Here we  will  see the user  info

	Change username and password
	
	Status changing

	</pre>
</section>
</article>
@endsection
@section("script")
<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
.card-view {
  margin:2px;
  padding: 5px;
  border: 1px solid #ccc;
  animation: .4s moving;
}
@keyframes moving {
    from{
      margin-top: 30px;
    }
}
</style>


@endsection