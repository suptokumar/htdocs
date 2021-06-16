@extends("layout.app")
@section("title","Add Questions | Classroommoney")
@section("10","active")
@section("content")

<div class="container">

<div class="section">

  <h2>Add Questions</h2>
  <input type="text" style="padding: 8px 10px" placeholder="search" onkeyup="veri_teachers(1);" id="snod410">
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
      url: '{{ url('/admin/allbooks') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Title</th> <th scope="col">Image</th><th scope="col">Book Level</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d.length; i++) {
        var row = d[i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['title'];
        body+= "</td>";
        body+= "<td>";
        body+=`<img style='width: 50px;' src='{{ url('/public/') }}/image/`+row['thumb']+`'>`;
        body+= "</td>";
        body+= "<td>";
        body+=row['grade']+"th";
        body+= "</td>";


        body+= "<td>";
        
        body+= " <a class='btn btn-success' href='{{ url('/admin/') }}/questions/"+row['id']+`''>Questions</button>`;

        
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