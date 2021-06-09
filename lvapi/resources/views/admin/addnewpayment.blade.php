@extends("layout.app")
@section("title","Admin Portal")
@section("active","paymentdetails")
@section("content")
<article>
<header style="overflow: hidden;">
	<a href="{{ url('/admin/paymentdetails') }}" class="btn btn-danger float-left">Gateway List</a>
</header>
<section class="gateway_view">
	<form action="{{ url('/admin/createapi/addpaymentgateway') }}" method="POST" enctype="multipart/form-data">

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
      <label for="name">Gateway Name</label>
      <input type="text" class="form-control" name="name" id="name" required="" placeholder="eg: PayPal">
    </div>
    <div class="form-group col-md-6">
      <label for="icon">Gateway Icon</label>
      <input type="file" class="form-control" name="file" id="icon" required="" placeholder="eg: Icon">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="details_name">Name of Details</label>
      <input type="text" class="form-control" name="gc1" for="details_name" placeholder="eg: Email">
    </div>
    <div class="form-group col-md-4">
      <label for="details_value">Value of Details</label>
      <input type="text" class="form-control" name="gc2" for="details_value" placeholder="eg: info@demofy21.top">
    </div>
    <div class="form-group col-md-3" style="display: flex; justify-content: center; align-items: center;">
      <a type="button" href="javascript:void(0)" class="btn btn-info" onclick="new_data()" style="margin-right: 5px;">Add Field</a> 
    </div>
  </div>
  <div class="cpnel">
  	
  </div>
  <br>
  <div style="text-align: center;">
  	<input type="hidden" name="name_cls" class="name_cls" value="1">
  	<input type="hidden" name="value_cls" class="value_cls" value="2">
  <button type="submit" class="btn btn-primary">Create Gateway</button>
  </div>
</form>
</section>
</article>
@endsection
@section("script")
<script>
	function new_data(){
			// alert("data");
			let rand_class = Math.floor(Math.random() * 100415404110441120214);
			$(".cpnel").append(`<div class="form-row ac`+rand_class+`">
    <div class="form-group col-md-5">
      <label for="details_name`+rand_class+`">Name of Details</label>
      <input type="text" class="form-control" name='gc1`+rand_class+`' for="details_name`+rand_class+`" placeholder="eg: Email">
    </div>
    <div class="form-group col-md-4">
      <label for="details_value`+rand_class+`">Value of Details</label>
      <input type="text" class="form-control" name='gc2`+rand_class+`' for="details_value`+rand_class+`" placeholder="eg: jobdc14@gmail.com">
    </div>
    <div class="form-group col-md-3" style="display: flex; justify-content: center; align-items: center;">
      <a type="button" class="btn btn-info"  onclick="new_data()" style="margin-right: 5px;">Add Field</a> 
      <a type="button" class="btn btn-danger" onclick="removedata('`+rand_class+`')">Remove Field</a>
    </div>
  </div>`);

			$ncls = $(".name_cls").val();
			$name_plate = $ncls.split(",");
			$name_plate.push("1"+rand_class);
			$(".name_cls").val($name_plate.join(","));


			$ncls = $(".value_cls").val();
			$name_plate = $ncls.split(",");
			$name_plate.push("2"+rand_class);
			$(".value_cls").val($name_plate.join(","));
	}
	function removedata(id){
		$(".ac"+id).remove();

		var st = $(".name_cls").val();
      var mcg = st.split(",");
      var carIndex = mcg.indexOf("1"+id.toString());
      mcg.splice(carIndex,1);
      $(".name_cls").val(mcg.join());


		var st = $(".value_cls").val();
      var mcg = st.split(",");
      var carIndex = mcg.indexOf("2"+id.toString());
      mcg.splice(carIndex,1);
      $(".value_cls").val(mcg.join());




	}
</script>
<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
</style>
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