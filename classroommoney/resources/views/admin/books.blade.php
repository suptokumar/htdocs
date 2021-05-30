@extends("layout.app")
@section("title","Books | Classroommoney")
@section("6","active")
@section("content")

<div class="container">

<div class="all_payments" style="width: 100%">
  
</div>
<div class="section">


<form style="background: white; padding: 20px; width: 90%; margin: 100px auto; border: 1px solid #ccc;" action="{{ url('/hammba') }}" method="POST" enctype="multipart/form-data">

  @csrf
  
  <h2>Books</h2>
  <hr>

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
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Greade <span style="color: red">*</span></label>
      <select name="grade" id="grade" class="form-control">
        <option value="7">7th</option>
        <option value="8">8th</option>
        <option value="9">9th</option>
        <option value="10">10th</option>
        <option value="11">11th</option>
        <option value="12">12th</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="title">Title <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="title" name="title">
    </div>
    </div>
      <div class="form-row">

    <div class="form-group col-md-6">
      <label for="link">File Link <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="link" name="link">
    </div>
    <div class="form-group col-md-6">
      <label for="thumb">Thumbnails <span style="color: red">*</span></label>
      <input type="file" class="form-control" required=""  id="thumb" name="thumb">
    </div>
      </div>
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Description <span style="color: red">*</span></label>
      <input type="text" class="form-control" required=""  id="description" name="description">
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Add</button>

</form>


</div>
<form action="" method="GET">
  <input type="text" name="s" placeholder="search"><input type="submit" value="search">
</form>
<style>
  .book {
  width: 300px;
  float: left;
  height: 530px;
  overflow: hidden;
  border: 1px solid #ccc;
  padding: 1%;
  margin: 1%;
}
.book .imgs1 {
  width: 100%;
  height: 300px;
}
</style>
<div class="mainct">
  @foreach ($books as $book)
    <div class="book a{{$book->id}}">
      <button class="btn btn-danger" onclick="delte_it({{$book->id}},this)">Delete</button>
      <img src="{{ url('/public/image/'.$book->thumb) }}" class="imgs1" alt="">
      <h3>{{$book->title}}</h3>
      <p>{{$book->description}}</p>
    </div>
  @endforeach
</div>
</div>
<script>
  function delte_it(id,t){
    if (confirm("Are you sure you want to delete it?")) {
      $.ajax({
        url: '{{ url('/delteanoe') }}',
        type: 'POST',
        data: {id:id,_token:'{{csrf_token()}}'},
      })
      .done(function(data) {
        $(t).html(data);
        $(".a"+t).css('background', '#FFD4D4');
      });
      
    }
  }
</script>
@endsection