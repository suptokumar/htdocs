@extends("layout.app")
@section("title","Add Waitings | School management software")
@section("active","waitings")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>

<form style="width: 90%; margin: 0 auto;" action="{{ url('/admin/waitings/add') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">Add Waiting Member</h3>
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
    <label for="exampleInputEmail1">{{__('Student Info')}}</label>
    <input type="text" class="form-control" id="name" name="name"  value="{{ old("name") }}" required aria-describedby="emailHelp" placeholder="Student Info">
  </div>
<input type="hidden" name="id"  value="{{ Auth::user()->id }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Contact Info')}}</label>
    <input type="text" class="form-control" id="contact" required="" name="contact" aria-describedby="emailHelp"    value="{{ old("contact") }}" placeholder="Contact">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('When to contact')}}</label>
    <input type="text" class="form-control" id="time_to_contact" required="" name="time_to_contact" aria-describedby="emailHelp"     value="{{ old("time_to_contact") }}" placeholder="Time to contact">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Who is following up')}}</label>
    <input type="text" class="form-control" id="follower" required="" name="follower" aria-describedby="emailHelp" value="{{ old("follower") }}" placeholder="User">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">{{__('How to reach')}}</label>
    <select class="form-control" id="reach" required="" name="reach">
      <option value="Whatsapp">Whatsapp</option>
      <option value="Facebook">Facebook</option>
      <option value="Ads">Ads</option>
      <option value="Email">Email</option>
      <option value="Others">Others</option>
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