@extends("layout.app")
@section("title","Admin Portal")
@section("active","paymentdetails")
@section("content")
<article>
<header style="overflow: hidden;">
	<a href="{{ url('/admin/addnewpayment') }}" class="btn btn-info float-right">Add Payment Gateway</a>
</header>
<section class="gateway_view">
	
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
    load_gateway(1);
  });
  function dp_fun(page){
    load_gateway(page);
  }
  function load_gateway(page){
    $.ajax({
      url: '{{ url('/admin/load_gateway') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body =  `<div class="row" style="text-align: center;">
        <div class="col-1" style='padding-top: 15px;'>
        <h5>Logo</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'>
        <h5>Name</h5>
        </div>
        <div class="col-3" style='padding-top: 15px;'><h5>Details</h5>
        </div>
        <div class="col-2" style='padding-top: 15px;'><h5>Status</h5>
        </div>
        <div class="col-2" style='padding-top: 15px;'><h5>Options</h5></div></div>`;
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+=`

        <div class="card-view row acd`+row['id']+`">
        <div class="col-1">
        <img src="{{ url('public') }}`+row['icon']+`" alt="`+row['name']+`" style="width: 100px; border-radius: 100px; heigh:100px">
        </div>
        <div class="col-3 center" style='padding-top: 15px;'>
        <h3>`+row['name']+`</h3>
        </div>
        <div class="col-3" style='padding-top: 15px;'>
        `;
        $details = row['details_name'].split(",");
        $value = row['details_value'].split(",");
        for (var j = 0; j < $details.length; j++) {
        body+=`<p><b>`+$details[j]+`</b>: `+$value[j]+`</p>`
        }
        
        body+=`</div>
        <div class="col-2 center" style='padding-top: 15px;'>
        <label class="switch">
  <input type="checkbox" `+(row['status']==1?'checked':'')+` onchange="fc_this(this,`+row['id']+`)">
  <span class="slider round"></span>
</label>
        </div>

        <div class="col-2 center" style='padding-top: 15px;'>
<button onclick='edit(`+row['id']+`)' class='btn btn-success'>Edit</button>
<button onclick='deletes(`+row['id']+`)' class='btn btn-danger'>Delete</button>
        </div>
        </div>


        `;
        }
       $(".gateway_view").html(body);
    })
    .fail(function() {
      $(".gateway_view").html("Network error!");
    })    
  }
  function edit(id)
  {
    window.location = '{{ url('/admin/editgateway/') }}/'+id;
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
    $.ajax({
      url: '{{ url('/admin/deletepaymentgateway') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(".acd"+id).fadeOut('slow');
    });
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