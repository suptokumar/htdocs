@extends("layout.app")
@section("title","Admin Portal")
@section("active","users")
@section("content")
<article>
<header style="overflow: hidden;">
  <a href="{{ url('/admin/exchange') }}" class="btn btn-danger float-left">Exchange List</a>
  <a href="{{ url('/admin/addconfigure') }}" class="btn btn-success float-left">Add Configure</a>
    <a href="{{ url('/admin/plan') }}" class="btn btn-info float-left">Add Plan</a>

</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/editexchangelist') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$exchange->id}}">
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
      <label for="name">Exchange Name <span class="red">*</span></label>
      <input type="text" class="form-control" name="name" id="name" required="" value="{{$exchange->name}}" placeholder="eg: Cricket">
    </div>
    <div class="form-group col-md-6">
      <label for="min_value">Exchange Minimum Bid value ($)</label>
      <input type="number" class="form-control" name="min_value" for="min_value" value="{{$exchange->min_bit}}" placeholder="eg: 10">
    </div>
    
  </div>
  @php
    function ecg($id,$val)
    {
      $val = explode(",", $val);
      for ($i=0; $i < count($val); $i++) { 
        if($val[$i]==$id) return "selected";
      }
    }
  @endphp
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Select Type of Bidding Allowed <span class="red">*</span></label>
      <select class="form-control" required=""  multiple="multiple" name="type[]" id="asdfeea">
        @foreach ($configure as $cg)
        	<option value="{{$cg->id}}" {{ecg($cg->id,$exchange->type_id)}}>{{$cg->text}}</option>
        @endforeach
      </select>

      <br>
            <label for="type">Select Plan <span class="red">*</span></label>
      <select class="form-control" required="" name="plan[]" multiple="" id="awet" >
        @foreach ($plan as $cg)
          <option value="{{$cg->id}}" {{$cg->id==$exchange->type_image?'selected':''}}>{{$cg->name}}</option>
        @endforeach
      </select>
<br>
      <label for="type">Exchange URL <span class="red">*</span></label>
      <input type="text" class="form-control" name="exchangeurl" for="exchangeurl" value="{{$exchange->type}}" placeholder="eg: https://www.google.com">
    
    </div>
    
    <div class="form-group col-md-6">
      <label for="icon">Logo<br>
      <img src="{{ url('/public/') }}/{{$exchange->logo}}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" name="file" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
</section>
</article>
@endsection
@section("script")
<script>
  $(function(){

    $('#asdfeea').multiselect({

    // allows HTML content
    enableHTML: false,
       // CSS class of the multiselect button
    buttonClass: 'custom-select'
  });
    $('#awet').multiselect({

    // allows HTML content
    enableHTML: false,
       // CSS class of the multiselect button
    buttonClass: 'custom-select'
  });

  });
</script>
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