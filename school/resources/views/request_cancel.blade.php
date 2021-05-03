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

<form style="width: 90%; margin: 0 auto;" action="{{ url('/reqs_d') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Cancel Class</h3>
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
    <label for="exampleInputEmail1">{{__('Write Note')}}</label>
    <div style="position: relative;">
    <textarea class="form-control" id="note" name="note" aria-describedby="emailHelp"></textarea>
    </div>
  </div>
@csrf


 <input type="hidden" name="del" value="{{$id}}">
  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Request Now</button>
  </div>
</form>


 </article>
@endsection

@section("script")

@endsection