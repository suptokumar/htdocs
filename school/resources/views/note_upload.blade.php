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

<form style="width: 90%; margin: 0 auto;" action="{{ url('/upload_note') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Create Progress Notes</h3>
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
    <label for="exampleInputEmail1">{{__('Update Progress Notes')}}</label>
    <textarea class="form-control" id="assignment" name="assignment"></textarea>
  </div>
<input type="hidden" name="id"  value="{{ Auth::user()->id }}">
<input type="hidden" name="as"  value="{{ $report }}">
<input type="hidden" name="type"  value="1">
@csrf
 
  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Save</button>
  </div>
</form>


 </article>
@endsection

@section("script")

@endsection