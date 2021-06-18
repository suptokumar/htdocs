@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/createid') }}" class="btn btn-danger float-left">ID list</a>

</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/createnewid') }}" method="POST" enctype="multipart/form-data">

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
      <label for="name">Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" placeholder="eg: Alex">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone</label>
      <input type="tel" class="form-control" name="phone" for="phone" required="" placeholder="eg: +7777777777">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="exchange">Exchange <span class="red">*</span></label>
      <select class="form-control" required="" name="exchange" id="asdfeea" onchange="load_plan(this.value)">
      	@php
      		use App\Models\exchange;
      		use App\Models\plan;
      		$configure = exchange::get();
      		$plan = plan::get();
      	@endphp
        @foreach ($configure as $cg)
        	<option value="{{$cg->id}}">{{$cg->name}}</option>
        @endforeach
      </select>
<br>
      <label for="plan">Select Plan <span class="red">*</span></label>
      <select class="form-control" required="" id="awet" name="plan">
        @foreach ($plan as $cg)
          <option value="{{$cg->id}}">{{$cg->name}}</option>
        @endforeach
      </select>
<br>
      <label for="status">Status <span class="red">*</span></label>
      <select class="form-control" required="" id="awet" name="status">
				<option value="pending" selected="">pending</option>
        		<option value="approved">approved</option>
        		<option value="deleted">deleted</option>
      </select>
    
    </div>
    <div class="form-group col-md-6">
    	      <label for="username">Username <span class="red">*</span></label>
            <input type="text" class="form-control" name="username" id="username" required="" placeholder="eg: Alex">

<br>
      <label for="password">Password <span class="red">*</span></label>
            <input type="text" class="form-control" name="password" id="password" required="" placeholder="eg: @7D4@1d4e*1!$&%">
<br>
      <label for="mode">Mode <span class="red">*</span></label>
      <select class="form-control" required="" id="mode" name="mode">
				<option value="0" selected="">active</option>
        		<option value="1">blocked</option>
     </select>
  	</div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Create Exchange</button>
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
.multiselect-native-select {
    width: 100%;
    display: block;
}
.form-check-label{
  color: black;
}
.btn-group, .btn-group-vertical{
  display: block !important;
}
.multiselect-container{
  width: 100%;
}
.custom-select{
  background: #242222 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
  color: #90979d;
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
function load_plan(id){
    $.ajax({
      url: '{{ url('/admin/load_plan') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $('#awet').html(data);
    });
    
  }

</script>
@endsection