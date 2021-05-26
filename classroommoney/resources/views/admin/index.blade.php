@extends("layout.app")
@section("title","Add Class | School management software")
@section("1","active")
@section("content")

<div class="container">
  
<div class="all_payments" style="width: 100%">
  
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
      url: '{{ url('/admin/results') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Student</th> <th scope="col">Teacher</th><th scope="col">Subject/Course</th><th scope="col">Marks</th><th scope="col">Grades</th><th scope="col">Miss Attendents</th><th scope="col">Payment($)</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['student'];
        body+= "</td>";
        body+= "<td>";
        body+= row['teacher'];
        body+= "</td>";
        body+= "<td>";
        body+= row['subject'];
        body+= "</td>";

        body+= "<td>";
        body+= row['mark'];
        body+= "</td>";

        body+= "<td>";
        body+= row['grades'];
        body+= "</td>";


        body+= "<td>";
        body+= row['attend'];
        body+= "</td>";

        body+= "<td>";
        body+= "<input type='text' id='edit"+row['id']+"' before='"+row['amount']+"' onchange='changeit(this,this.value,"+row['id']+")' value='"+row['amount']+"'>";
        body+= "</td>";


        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        
        // body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";

        body+= " <button class='btn btn-primary' onclick='request("+row['id']+",this)'>Verify</button>";
        
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

function changeit(t,val,id){
  if (confirm("Are you sure you want to change the amount")) {
    $.ajax({
      url: '{{ url('/admin/changeit') }}',
      type: 'POST',
      data: {val: val,id:id,_token:'{{csrf_token()}}'},
    })
    .done(function(data) {
      $(t).attr('before', val);
    });
  }else{
      $(t).val($(t).attr("before"));

  }
}

function request(id,t){

      $.ajax({
        url: "{{ url('/admin/requestapprove') }}",
        type: 'POST',
        data: {id: id,_token:'{{csrf_token()}}'},
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
</div>

@endsection