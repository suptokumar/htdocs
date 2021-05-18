@extends("layout.app")
@section("title","Teachers | School management software")
@section("3","active")
@section("content")
<div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
<div style="width: 100%;max-width: 1000px;padding: 20px;margin: 0px auto;">
<h3>Previous Withdrawals</h3>
	
    {{-- Search <input type="search" id="snod410" autocomplete="off" onkeyup="veri_teachers(1)" style="padding: 10px; width: 60%; border: 1px solid #ccc; outline: none;"> --}}
<div class="all_payments">
  
</div>
</div>


</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script>
  $(document).ready(function() {
    veri_teachers(1);
  });
  function dp_fun(page){
    veri_teachers(page);
    $("body,html").animate({scrollTop:0}, 500);
  }
  function veri_teachers(page){
    $.ajax({
      url: '{{ url('/admin/amt') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
    	console.log(data);
     var d = JSON.parse(data);
     let body = "";
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
      body += '<div class="row" id="bcmc'+row["id"]+'" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "<div class='col-sm-4'><b>$"+row['amount']+"</b><br>"+row['gateway']+"<br>"+row['ac_no']+"<br>"+row['ad_no']+"<br></div>";
        body+="<div class='col-sm-4'>";
        body+= "<div class='alert alert-primary'>Pending</div>";
        body+= "</div>";
        body+="<div class='col-sm-4'>";
        body+= " <button class='btn btn-primary' onclick=accept("+row['id']+",this)>Accept Request</button>";
        body+= " <button class='btn btn-danger' onclick=deleteit("+row['id']+",this)>Remove Request</button>";
        body+= "</div>";
      body+= '</div>';

      }
      if (d[0]=='') {
      body += '<div class="row" style="padding: 15px; border: 1px solid #ccc; margin: 10px">';
        body+= "No Requests";
        body+= "</div>";
      }
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      if (d[0]!=''){
      body+=generate_pagination($total, $page, $limit, "dp_fun");
      }
      $(".all_payments").html(body);
    })
    .fail(function() {
      veri_teachers(page);
    })    
  }






function accept(id,t){

      $.ajax({
        url: "{{ url('/accept_with') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $(t).html(data);
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}

function deleteit(id,t){

      $.ajax({
        url: "{{ url('/reject_with') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $(t).html(data);

      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}
</script>
@endsection