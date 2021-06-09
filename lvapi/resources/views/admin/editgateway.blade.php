@extends("layout.app")
@section("title","Admin Portal")
@section("active","paymentdetails")
@section("content")
<article>
<header style="overflow: hidden;">
	<a href="{{ url('/admin/paymentdetails') }}" class="btn btn-danger float-left">Gateway List</a>
</header>
<section class="gateway_view">
	<form action="{{ url('/admin/createapi/editpaymentgateway') }}" method="POST" enctype="multipart/form-data">

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
		<input type="hidden" value="{{$gateway->id}}" name="id">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Gateway Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$gateway->name}}" required="" placeholder="eg: PayPal">
    </div>
    <div class="form-group col-md-6">
      <label for="icon">Gateway Icon<br>
      <input type="file" style="display: none;" class="form-control" name="file" id="icon" placeholder="eg: Icon">
      <img src="{{ url('/public/') }}{{$gateway->icon}}" alt="" style="width: 100px; height:100px;  float: left; border-radius: 100px;">
      </label>
    </div>
  </div>
  @php
  	$details = explode(",", $gateway->details_name);
  	$values = explode(",", $gateway->details_value);
  	$msg = '';
  	$msgs = '';
  @endphp
  @for ($i=0; $i<count($details); $i++)
  @php
  	$mcglist=rand();
  	$msg .="1".$mcglist.",";
  	$msgs .="2".$mcglist.",";
  @endphp
  <div class="form-row ac{{$mcglist}}">
    <div class="form-group col-md-5">
      <label for="details_name">Name of Details</label>
      <input type="text" class="form-control" value="{{$details[$i]}}" name="gc1{{$mcglist}}" for="details_name" placeholder="eg: Email">
    </div>
    <div class="form-group col-md-4">
      <label for="details_value">Value of Details</label>
      <input type="text" class="form-control" value="{{$values[$i]}}" name="gc2{{$mcglist}}" for="details_value" placeholder="eg: jobdc14@gmail.com">
    </div>
    <div class="form-group col-md-3" style="display: flex; justify-content: center; align-items: center;">
      <a type="button" href="javascript:void(0)" class="btn btn-info" onclick="new_data()" style="margin-right: 5px;">Add Field</a> 
      @if ($i!=0)
            <a type="button" class="btn btn-danger" onclick="removedata('{{$mcglist}}')">Remove Field</a>

      @endif
    </div>
  </div>
  @endfor
  <div class="cpnel">
  	
  </div>
  <br>
  <div style="text-align: center;">
  	<input type="hidden" name="name_cls" class="name_cls" value="{{substr($msg,0,-1)}}">
  	<input type="hidden" name="value_cls" class="value_cls" value="{{substr($msgs,0,-1)}}">
  <button type="submit" class="btn btn-primary">Update Gateway</button>
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
      <input type="text" class="form-control" name='gc2`+rand_class+`' for="details_value`+rand_class+`" placeholder="eg: info@demofy21.top">
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