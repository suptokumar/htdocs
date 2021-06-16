@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/exchange') }}" class="btn btn-danger float-left">Exchange List</a>
  <a href="{{ url('/admin/addexchange') }}" class="btn btn-success float-left">Add Exchange</a>
    <a href="{{ url('/admin/plan') }}" class="btn btn-info float-left">Add Plan</a>

</header>
<section class="gateway_view">
<form action="{{ url('/admin/editplan') }}" method="POST" enctype="multipart/form-data">

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
    <div class="form-group col-md-6">
      <label for="name">Plan Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" value="{{$plan->name}}" placeholder="eg: Gold">
    </div>
    <div class="form-group col-md-6">
      <label for="min_withdraw_amount">Minimum Withdrawal Amount <span class="red">*</span></label>
      <input type="number" class="form-control" name="min_withdraw_amount" value="{{$plan->min_withdraw_amount}}" for="min_withdraw_amount" placeholder="eg: 10">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="max_withdraw_amount">Max Withdrawal Amount <span class="red">*</span></label>
      <input type="number" class="form-control" name="max_withdraw_amount" value="{{$plan->max_withdraw_amount}}" required for="max_withdraw_amount" placeholder="eg: 10">
<br>
      <label for="max_withdraw_perday">Max Withdrawal Per Day <span class="red">*</span></label>
      <input type="number" class="form-control" name="max_withdraw_perday" value="{{$plan->max_withdraw_perday}}" required for="max_withdraw_perday" placeholder="eg: 10">
    <br>
      <label for="max_withdraw_month">Max Withdrawal Per Month <span class="red">*</span></label>
      <input type="number" class="form-control" name="max_withdraw_month" value="{{$plan->max_withdraw_month}}" required for="max_withdraw_month" placeholder="eg: 10">
    
    </div>
    
    <div class="form-group col-md-6">
    	<label for="min_refil_amount">Minimum Refil Amount <span class="red">*</span></label>
      <input type="number" class="form-control" name="min_refil_amount"  value="{{$plan->min_refil_amount}}" required for="min_refil_amount" placeholder="eg: 10">
    <br><label for="min_maintaining_amount">Minimum Maintaining Amount <span class="red">*</span></label>
      <input type="number" class="form-control" name="min_maintaining_amount" value="{{$plan->min_maintaining_amount}}" required for="min_maintaining_amount" placeholder="eg: 10">
    <br>
      <label for="icon">Logo<br>
      <img src="{{ url('/public/') }}{{ $plan->icon }}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" style="display: none;" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  	<input type="hidden" name="id" value="{{$plan->id}}">
  <button type="submit" class="btn btn-primary">Update Plan</button>
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
      url: '{{ url('/admin/load_plans') }}',
      type: 'POST',
      data: {page: page, search: $("#searches").val(),type: $("#type").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body =  `<div class="row" style="text-align: center;">
        <div class="col-2" style='padding-top: 15px;'>
        <h5>Logo</h5>
        </div>
        <div class="col-2" style='padding-top: 15px;'>
        <h5>Name</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'>
        <h5>Minimum</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'>
        <h5>Maximum</h5>
        </div>
        <div class="col-2" style='padding-top: 15px;'><h5>Options</h5></div></div>`;
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+=`

        <div class="card-view row acd`+row['id']+`">
        <div class="col-2">
        <img src="{{ url('public') }}`+row['icon']+`" alt="`+row['text']+`" style="width: 100px; border-radius: 100%; heigh:120px">
        </div>
        <div class="col-2 center" style='padding-top: 15px;'>
        <h3>`+row['name']+`</h3>
        </div>
        <div class="col-3 center" style='padding-top: 15px;'>
        <h6> Withdraw Amount: `+row['min_withdraw_amount']+`</h6>
        <h6> Refil Amount: `+row['min_refil_amount']+`</h6>
        <h6> Maintaining Amount: `+row['min_maintaining_amount']+`</h6>
        </div>
        <div class="col-3 center" style='padding-top: 15px;'>
		<h6> Withdraw Amount: `+row['max_withdraw_amount']+`</h6>
        <h6> Withdraw Per Day: `+row['max_withdraw_perday']+`</h6>
        <h6> Withdraw Per Month: `+row['max_withdraw_month']+`</h6>        </div>
        <div class="col-2" style='padding-top: 15px;'>
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
    window.location = '{{ url('/admin/editplan/') }}/'+id;
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
  if (confirm("Are you sure you want to delete the plan?")) {
    $.ajax({
      url: '{{ url('/admin/deleteplan') }}',
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