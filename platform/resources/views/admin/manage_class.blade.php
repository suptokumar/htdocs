@extends("layout.app")
@section("title","Manage Class | School management software")
@section("active","manage_class")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>



<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
	<div class="rk" style="float: right; align-items: center;">
		Search <input type="search" id="snod410" autocomplete="off" onkeyup="manage_class(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
	</div>
	<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
	</div>
</div>
<div class="all_class" style="width: 100%">
	
</div>



 </article>
@endsection

@section("script")

  <script src="{{ asset('/public/js/admin.js?e') }}"></script>
<script>
	$(document).ready(function() {
		manage_class(1);
	});
	function dp_fun(page){
		manage_class(page);

	}
</script>
<style>
	
.moce10 {
  padding: 10px;
  margin: 10px;
  border: 1px solid #ccc;
}
.moce10.new_one {
  background: #e6f8ff;
}
.moce10 .btn {
  float: right;
}
</style>
@endsection