@extends("layout.app")
@section("title","Add Class | School management software")
@section("4","active")
@section("content")

<div class="container">
  @if($auto==1)
  <button class="btn btn-danger" id="bgc" onclick="bcg()">Auto Approve: On</button>
@endif
@if($auto==0)
  <button class="btn btn-success" id="bgc" onclick="bcg()">Auto Approve: off</button>
@endif
<script>
  function bcg(){
    $.ajax({
      url: '{{ url('/sohwofsddfiusdfssddgfuawidfhwae') }}',
      type: 'POST',
            data: {_token:'{{csrf_token()}}'},

    })
    .done(function(data) {
      $("#bgc").html(data);
      if ($("#bgc").hasClass('btn-success')) {
        $("#bgc").addClass('btn-danger');
        $("#bgc").removeClass('btn-success');
      }else{
        $("#bgc").removeClass('btn-danger');
        $("#bgc").addClass('btn-success');  
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
</script>
<div class="all_payments" style="width: 100%">
  
</div>
<div class="section">

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
      url: '{{ url('/admin/livelist') }}',
      type: 'POST',
      data: {page: page, search: $("#snod410").val(), _token:'{{csrf_token()}}'},
    })
    .done(function(data) {
     var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Thumbnail</th><th scope="col">Time</th> <th scope="col">Duration</th><th scope="col">Subject</th><th scope="col">Description</th><th scope="col">Zoom/Google Meet</th> <th scope="col">Status</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";

        body+= "<td>";
        body+= "<img src='{{ url('/public/image/') }}/"+row['thumbnail']+"' style='width: 100px'>";
        body+= "</td>";
        body+= "<td>";
        body+= row['time'];
        body+= "</td>";
        body+= "<td>";
        body+= row['duration']+" minutes";
        body+= "</td>";

        body+= "<td>";
        body+= row['subject'];
        body+= "</td>";

        body+= "<td>";
        body+= row['description'];
        body+= "</td>";

        body+= "<td>";
        body+= "<a href='"+row['zoomlink']+"' target=_blank>Visit Room</a>";
        body+= "</td>";

        body+= "<td>";
        body+= row['status']==0?"pending":(row['status']==1?"Published":(row['status']==2?"Timeout":"Rejected"));
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        
        // body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";
        body+= " <button class='btn btn-success' time='5' onclick='approve("+row['id']+",this)'  data-do='0'>Approve</button>";
        body+= " <button class='btn btn-danger' time='5' onclick='deleteit("+row['id']+",this)'  data-do='0'>Reject</button>";
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


function approve(id,t){
  if (confirm("Are you sure you want to approve it?")) {
    $.ajax({
      url: '{{ url('/admin/approveict') }}',
      type: 'POST',
        data: {id: id,_token:'{{csrf_token()}}'},
    })
    .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $(t).html(data);
       });
  }
}

function deleteit(id,t){
  if (confirm("Are you sure you want to reject it?")) {
    $.ajax({
      url: '{{ url('/admin/rejectict') }}',
      type: 'POST',
        data: {id: id,_token:'{{csrf_token()}}'},
    })
    .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $(t).html(data);    });
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