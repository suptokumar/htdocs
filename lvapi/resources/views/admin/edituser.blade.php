@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/users') }}" class="btn btn-danger float-left">Users List</a>
</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/updateusers') }}" method="POST" enctype="multipart/form-data">

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


    @csrf
    <input type="hidden" name="id" value="{{$users->id}}">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">User Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" value="{{$users->name}}" id="name" required="" placeholder="eg: Alex">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" value="{{$users->phone}}" for="phone" placeholder="eg: +77777777">
    </div>
    
    <div class="form-group col-md-4">
      <label for="role">Role <span class="red">*</span></label>
      <select class="form-control" required="" name="role" for="role">
        <option {{$users->role=='Sub-Admin'?'selected':''}} value="Sub-Admin">Sub-Admin</option>
        <option {{$users->role=='Admin'?'selected':''}} value="Admin">Admin</option>
        <option {{$users->role=='User'?'selected':''}} value="User">User</option>
      </select>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email <span class="red">*</span></label>
      <input type="email" class="form-control" required=""  value="{{$users->email}}" name="email" for="email" placeholder="eg: @demofy21.top">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password <span class="red">*</span></label>
      <input type="text" class="form-control" name="password" for="password" placeholder="Let it empty if you don't want a new password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="address">Address</label>
      <textarea class="form-control" name="address" rows="6" for="address" placeholder="eg: 24/7 street, Resport, Amdarstrong">{{$users->address}}</textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="icon">User Profile<br>
      <img src="{{ url('/public/') }}{{$users->image}}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Update User</button>
  </div>
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
  let imgInp = document.getElementById('icon');
  let blah = document.getElementById('blah');
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
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