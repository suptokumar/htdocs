@extends("layout.app")
@section("title","School management software")
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
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Status</th> <th scope="col">Gateway Icon</th><th scope="col">Gateway Name</th><th scope="col">Gateway Informations</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['users']['name'];
        body+= "</td>";
        body+= "<td>";
        body+=row['books']['title'];
        body+= "</td>";
        body+= "<td>";
        body+=row['books']['grade']+"th";
        body+= "</td>";
        body+= "<td>";
        body+= row['grade']+"th";
        body+= "</td>";
        body+= "<td>";
        body+= row['users']['email'];
        body+= "</td>";
        body+= "<td>";
        body+= row['created_at'];
        body+= "</td>";


        body+= "<td>";
        
        body+= " <button class='btn btn-success' onclick='accept("+row['id']+",this)'>Accept</button>";

        body+= " <button class='btn btn-danger' onclick='deletes("+row['id']+",this)'>Delete</button>";
        
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
      $(".gateway_view").html(body);
    })
    .fail(function() {
      $(".gateway_view").html("Network error!");
    })    
  }
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