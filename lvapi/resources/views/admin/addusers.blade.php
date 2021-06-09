@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/users') }}" class="btn btn-danger float-left">Users List</a>
</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/adduserintodatabase') }}" method="POST" enctype="multipart/form-data">

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
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">User Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" placeholder="eg: Alex">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" for="phone" placeholder="eg: +7777777777">
    </div>
    
    <div class="form-group col-md-4">
      <label for="role">Role <span class="red">*</span></label>
      <select class="form-control" required="" name="role" for="role">
        <option value="Sub-Admin">Sub-Admin</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email <span class="red">*</span></label>
      <input type="email" class="form-control" required="" name="email" for="email" placeholder="eg:@demofy21.top">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password <span class="red">*</span></label>
      <input type="password" class="form-control" required="" name="password" for="password" placeholder="eg: #Alex14@4dez1D4gX*&">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="address">Address</label>
      <textarea class="form-control" name="address" rows="6" for="address" placeholder="eg: 24/7 street, Resport, Amdarstrong"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="icon">User Profile<br>
      <img src="{{ url('/public/logo/user.png') }}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Create User</button>
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