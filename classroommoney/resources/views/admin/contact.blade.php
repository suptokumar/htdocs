@extends("layout.app")
@section("title","Contact Records")
@section("active","13")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>



<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
	<div class="rk" style="float: right; align-items: center;">
		Search <input type="search" id="snod410" autocomplete="off" onkeyup="userlist(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
		
	</div>
	<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
	</div>
</div>
<div class="all_payments" style="width: 100%">
	
</div>



 </article>
@endsection

@section("script")

<script>
	$(document).ready(function() {
		userlist(1);
	});
	function dp_fun(page){
		userlist(page);

	}

	function userlist(page){
		var order = $("#order").val();
    $.ajax({
      url: '{{ url('/admin/asdfdfdsf') }}',
      type: 'POST',
      data: {page: page,order: order, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Name</th> <th scope="col">Email</th><th scope="col">Message</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['message'];
        body+= "</td>";
        body+= "<td>";
        body+= "<button onclick='clt("+row['id']+")' class='btn btn-danger'>Delete</button>";
        body+= "</td>";


        body+= "</tr>";

      }
      if (d[0]=='') {
        body+= "<tr colspan='6'>";
        body+= "<td>";
        body+= "Nothing Found";
        body+= "</td>";
        body+= "</tr>";
      }
      body+= '</tbody></table>';
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      if (d[0]!='') {
      	body+=generate_pagination($total, $page, $limit, "dp_fun");
  		}
      $(".all_payments").html(body);
    })
    .fail(function() {
      $(".all_payments").html("Network error!");
    })    
  }
function clt(id){
      $.ajax({
        url: "{{ url('/clt') }}",
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $("#bcmc"+id).fadeOut();
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}
</script>
<style>
	
.moce10 {
  padding: 10px;
  margin: 10px;
  border: 1px solid #ccc;
}
.moce10.new_one {
  background: #e6f8ff;
}
.moce10 .btn {
  float: right;
}
</style>
@endsection