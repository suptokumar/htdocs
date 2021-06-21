@extends("layout.app")
@section("title","Book Requests | Classroommoney")
@section("7","active")
@section("content")

<div class="container">

<div class="section">

  <h2>Books Request</h2>
  <div class="all_payments"></div>
</div>
<script>
  $(document).ready(function() {
    veri_teachers(1);
  });
  function dp_fun(page){
    veri_teachers(page);
  }
  function veri_teachers(page){
    $.ajax({
      url: '{{ url('/admin/bookreqeusts') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Student</th> <th scope="col">Book Name</th><th scope="col">Book Level</th><th scope="col">Grade/ Pct%</th><th scope="col">email</th><th scope="col">Time</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        // console.log(row['books']['title']);
        $bookser = row['books'];
        console.log($bookser);
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['users']['name'];
        body+= "</td>";
        body+= "<td>";
        body+= row['bookname'];
        body+= "</td>";
        body+= "<td>";
        body+= row['bookgrade']+"th";
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
      $(".all_payments").html(body);
    })
    .fail(function() {
      $(".all_payments").html("Network error!");
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