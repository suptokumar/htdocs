function show_class(page){
  var urls = url("laod_class");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">Title</th> <th scope="col">Subject</th><th scope="col">Details</th> <th scope="col">Next Classes</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row['title']+"<br>";
        body+= row["ras"]+"<br>";
        body+= "<a href='"+row['link']+"' class='btn btn-info'>Go to Link</a>";
        body+= "</td>";
        body+= "<td>";
        body+= "<b>"+row['subject']+"</b><br>";
        body+= row['description'];
        body+= "</td>";
        body+= "<td>";
        body+= 'Teacher: '+ d[6][i][0]+"<br>";
        body+= 'Student: '+ d[6][i][1]+"<br>";
        body+= 'Repeat: '+ (row['repeat']==''?"No Repeat":row['repeat'] )+"<br>";
        body+= 'Starting Time: '+ d[2][i][0]+"<br>";
        body+= 'Timezone: '+ d[2][i][1]+"<br>";
        body+= 'Duration: '+ row['duration']+" Minutes<br>";
        body+= 'Status: '+ d[3][i]+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+=d[4][i];
        body+= "</td>";
        body+= "<td>";
        if(d[5][i]>(3600*3)){
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= " <button class='btn btn-danger' onclick='request_cancel("+row['id']+",this)' data-do='0'>Cancel</button>";
        body+= " <button class='btn btn-primary' onclick='request_change_time("+row['id']+",this)' data-do='0'>Schedule Change</button>";
        }
        
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
      $(".all_class").html(body);
  });
return false; 
}






function request_cancel(id, t){
  window.location = url('request_cancel/'+id);
}


function request_change_time(id, t){
  window.location = url('request_change/'+id);
}












function reports(page){
  var urls = url("load_reports");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      console.log(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">Class No.</th><th scope="col">Title</th> <th scope="col">Subject</th><th scope="col">Class Time</th> <th scope="col">Notes</th> <th scope="col">Assignments</th> <th scope="col">Attendance</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= d[2][i][1];
        body+= "</td>";
        body+= "<td>";
        body+= row['title']+"<br>";
        body+= row["ras"];
        body+= "</td>";
        body+= "<td>";
        body+= row['subject'];
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i][0];
        body+= "</td>";
        body+= "<td>";
        if (d[2][i][2]=='2') {
          if (row['notes']=='') {
        body+="Not Submited";
          }else{
        body+=row['notes'];
          }
        }else{
          if (row['notes']=='') {
        body+="<a class='btn btn-primary' href='"+url("notes/"+row['id'])+"'>Add Progress Note</a><br> You can't Update Notes After "+d[2][i][3];
          }else{
body+=row['notes'];          }
        }
        body+= "</td>";
        body+= "<td>";
        if (d[2][i][2]=='1') {
          if (row['assignment']=='') {
        body+="Not Published";
          }else{
        body+="<a class='btn btn-primary' href='"+url("public/image/"+row['assignment'])+"' download>Download Assignments</a>";
          }
        }else{
          if (row['assignment']=='') {
        body+="<a class='btn btn-primary' href='"+url("assignment/"+row['id'])+"'>Upload Assignments</a>";
          }else{
        body+="<a class='btn btn-primary' href='"+url("public/image/"+row['assignment'])+"' download>Download Assignments</a>";
          }
        }
        body+= "</td>";
        body+= "<td>";
        body+= '<label class="container">Student <input onchange="mark('+row['id']+',2)" type="checkbox" '+(row['guest']==0?"":"checked='checked'")+'> <span class="checkmark"></span> </label>';
        body+= '<label class="container">Teacher <input onchange="mark('+row['id']+',1)" type="checkbox" '+(row['guest_active']==0?"":"checked='checked'")+'> <span class="checkmark"></span> </label>';
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
      $(".all_class").html(body);
  });
return false; 
}
function mark(id,type){
  var urls = url("mark_attendence");
  var token = $("#csrf").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, type: type, id: id},
  })
  .done(function(data) {});
  return false;
}

function exportTableToExcel(tableId, filename) {
    let dataType = 'application/vnd.ms-excel';
    let extension = '.xls';

    let base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
    };

    let template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>';
    let render = function(template, content) {
        return template.replace(/{(\w+)}/g, function(m, p) { return content[p]; });
    };

    let tableElement = document.getElementById(tableId);

    let tableExcel = render(template, {
        worksheet: filename,
        table: tableElement.innerHTML
    });

    filename = filename + extension;

    if (navigator.msSaveOrOpenBlob)
    {
        let blob = new Blob(
            [ '\ufeff', tableExcel ],
            { type: dataType }
        );

        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        let downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        downloadLink.href = 'data:' + dataType + ';base64,' + base64(tableExcel);

        downloadLink.download = filename;

        downloadLink.click();
    }
}