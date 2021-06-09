@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
	<div class="row">
		<div class="col-4">
			<input onkeyup="load_user(1)" id="searches"  placeholder="Search" class="form-control">
		</div>
		<div class="col-4">
			<select onchange="load_user(1)" id="type" class="form-control">
				<option value="">--User Type--</option>
				<option value="">All</option>
				<option value="Admin">Admin</option>
				<option value="Sub-Admin">Sub-Admin</option>
				<option value="Users">Users</option>
			</select>
		</div>
		<div class="col-4">
	<a href="{{ url('/admin/createusers') }}" class="btn btn-info float-right">Add Users</a>
		</div>
	</div>
</header>
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
      url: '{{ url('/admin/load_user') }}',
      type: 'POST',
      data: {page: page, search: $("#searches").val(),type: $("#type").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body =  `<div class="row" style="text-align: center;">
        <div class="col-1" style='padding-top: 15px;'>
        <h5>Image</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'>
        <h5>Name</h5>
        </div>
        <div class="col-4" style='padding-top: 15px;'><h5>Details</h5>
        </div>
        <div class="col-1" style='padding-top: 15px;'><h5>Role</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'><h5>Options</h5></div></div>`;
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+=`

        <div class="card-view row acd`+row['id']+`">
        <div class="col-1">
        <img src="{{ url('public') }}`+row['image']+`" alt="`+row['name']+`" style="width: 100px; border-radius: 100%; heigh:120px">
        </div>
        <div class="col-3 center" style='padding-top: 15px;'>
        <h3>`+row['name']+`</h3>
        </div>
        <div class="col-4" style='padding-top: 15px;'>
        `;
        body+=`<p><b>Email:</b> `+row['email']+`</p>`
        body+=`<p><b>Phone:</b> `+row['phone']+`</p>`
        body+=`<p><b>Address:</b> `+row['address']+`</p>`
var role = '';
if (row['role']=='Sub-Admin') {
	role=`<button onclick='manageroll(`+row['id']+`)' class='btn btn-info'>Manage Privileges</button>`;
}
        body+=`</div>
        <div class="col-1 center" style='padding-top: 15px;'>
        `+row['role']+
        `</div>
        <div class="col-3 right" style='padding-top: 15px;'>`+role+`
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
    window.location = '{{ url('/admin/edituser/') }}/'+id;
  }
  function manageroll(id)
  {
    window.location = '{{ url('/admin/privileges/') }}/'+id;
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
  if (confirm("Are you sure you want to delete the user?")) {
    $.ajax({
      url: '{{ url('/admin/deleteusers') }}',
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
<style>
   /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 
.center{
  text-align: center;
}
</style>
@endsection