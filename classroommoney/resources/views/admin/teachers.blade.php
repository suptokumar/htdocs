@extends("layout.app")
@section("title","Teachers | School management software")
@section("2","active")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>
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

@if ($new_client = session("new_client"))
  <div class="alert alert-success" role="alert">
  {{$new_client}}
</div>
@endif
<div class="search" style="width: 98%; padding: 2%; overflow: hidden">
  <div class="rk" style="float: right; align-items: center;">
    Search <input type="search" id="snod410" autocomplete="off" onkeyup="veri_teachers(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Date">
  </div>
  <div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
  </div>
</div>
<div class="all_payments" style="width: 98%">
  
</div>


@endsection
@section("script")
<script>
  $(document).ready(function() {
    veri_teachers(1);
  });
  function dp_fun(page){
    veri_teachers(page);
  }
  function veri_teachers(page){
    $.ajax({
      url: '{{ url('/admin/veri_teachers') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Name</th> <th scope="col">Email</th><th scope="col">Phone number</th><th scope="col">School</th><th scope="col">School Address</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['name'];
        body+= "</td>";
        body+= "<td>";
        body+= row['email'];
        body+= "</td>";
        body+= "<td>";
        body+= row['phone'];
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i]['school'];
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i]['school_address'];
        body+= "</td>";

        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        
        // body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";
        body+= " <button class='btn btn-primary' time='5' onclick='verify("+row['id']+",this)'  data-do='0'>Verify</button>";
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='6'>";
        body+= "<td>";
        body+= "No Users Found";
        body+= "</td>";
        body+= "</tr>";
      }
      body+= '</tbody></table>';
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      body+=generate_pagination($total, $page, $limit, "dp_fun");
      $(".all_payments").html(body);
    })
    .fail(function() {
      $(".all_payments").html("Network error!");
    })    
  }






function verify(id,t){
  let time = $(t).attr('time');
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    $(t).attr('time',5);
      clearInterval(x);
    t.innerHTML = "Verify";
  }else{

    time=time-1;
    t.innerHTML = "Confirming in "+time;
    if (time==0) {
      $.ajax({
        url: "{{ url('/admin/veri_success') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#9BE4FF");
        $(t).removeAttr('onclick');
        $(t).html('Verified');
        $("#bcmc"+id).fadeOut(2000);
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      clearInterval(x);
    }
  }
  },1000);
}
</script>
@endsection