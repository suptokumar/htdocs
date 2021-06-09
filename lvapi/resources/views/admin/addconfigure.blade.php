@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/exchange') }}" class="btn btn-danger float-left">Exchange List</a>
  <a href="{{ url('/admin/addexchange') }}" class="btn btn-success float-left">Add Exchange</a>
</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/addconfigure') }}" method="POST" enctype="multipart/form-data">

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
    <div class="form-group col-md-12">
      <label for="name">Configure Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" placeholder="eg: Cricket">
    </div>
    
    <div class="form-group col-md-12">
      <label for="icon">Configure Logo<br>
      <img src="{{ url('/public/logo/user.png') }}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Create Configure</button>
  </div>
</form>
</section>
<section class="user_view">
	
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

<script>
  $(document).ready(function() {
    load_user(1);
  });
  function dp_fun(page){
    load_user(page);
  }
  function load_user(page){
    $.ajax({
      url: '{{ url('/admin/load_configures') }}',
      type: 'POST',
      data: {page: page, search: $("#searches").val(),type: $("#type").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body =  `<div class="row" style="text-align: center;">
        <div class="col-4" style='padding-top: 15px;'>
        <h5>Logo</h5>
        </div>
        <div class="col-4" style='padding-top: 15px;'>
        <h5>Name</h5>
        </div>
        <div class="col-4" style='padding-top: 15px;'><h5>Options</h5></div></div>`;
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+=`

        <div class="card-view row acd`+row['id']+`">
        <div class="col-4">
        <img src="{{ url('public') }}`+row['logo']+`" alt="`+row['text']+`" style="width: 100px; border-radius: 100%; heigh:120px">
        </div>
        <div class="col-4 center" style='padding-top: 15px;'>
        <h3>`+row['text']+`</h3>
        </div>
        <div class="col-4" style='padding-top: 15px;'>
<button onclick='edit(`+row['id']+`)' class='btn btn-success'>Edit</button>
<button onclick='deletes(`+row['id']+`)' class='btn btn-danger'>Delete</button>

        </div>
        </div>


        `;
        }
        $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      if (d[0]!='') {
        body+=generate_pagination($total, $page, $limit, "dp_fun");
      }
       $(".user_view").html(body);
    })
    .fail(function() {
      $(".user_view").html("Network error!");
    })    
  }
  function edit(id)
  {
    window.location = '{{ url('/admin/editconfigure/') }}/'+id;
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
  if (confirm("Are you sure you want to delete the configure?")) {
    $.ajax({
      url: '{{ url('/admin/deleteconfigure') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(".acd"+id).fadeOut('slow');
    });
  }
}
$('#toggle-demo').bootstrapToggle();

</script>
@endsection