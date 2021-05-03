
function doctors(page){
  var urls = url("admin/doctorlist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Full name</th> <th scope="col">Contact</th><th scope="col">Email</th><th scope="col">Designation</th><th scope="col">Fees</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['contact'];
        body+= "</td>";
        body+= "<td>";
        body+= row['email'];
        body+= "</td>";
        body+= "<td>";
        body+= row['designation'];
        body+= "</td>";
        body+= "<td>";
        body+= row['fees'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/doctors/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_doctor("+row['id']+",this)'>Delete</button>";
        
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
      $(".all_doctors").html(body);
  });
return false; 
}


function reports(page){
  var urls = url("admin/reports");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  var users = $("#users").val();
  var test = $("#testdsf").val();
  var due15 = $("#due15").val();
  var date1 = $("#date1").val();
  var date2 = $("#date2").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,users: users,due15: due15,test: test,date1: date1,date2: date2, search: search},
  })
  .done(function(data) {
    console.log(data);
    var total = 0;
    var paid = 0;
    var due = 0;
      var d = JSON.parse(data);
      var body = '<table class="table" id="adfea"> <thead class="thead-light"> <tr> <th scope="col">ID</th>  <th scope="col">From</th> <th scope="col">Patient Info</th> <th scope="col">Tests</th> <th scope="col">Total</th><th scope="col">Paid</th><th scope="col">Due</th><th scope="col">Date</th><th scope="col">User</th></thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        if (due15=="due") {
          if((Number(row['test_total'])-Number(row['test_paid']))==0){
            // alert("due");
          continue;
          }
        }
        if (due15=="paid") {
          if((Number(row['test_total'])-Number(row['test_paid']))!=0){
          continue;
          }
        }
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row['em_id'];
        body+= "</td>";
        body+= "<td>";
        body+= row['from'];
        body+= "</td>";
        body+= "<td>";
        body+= row['names']+"<br>";
        body+= row['contact'];
        body+= "</td>";
        body+= "<td>";
        body+= row['test_name'];
        body+= "</td>";
        body+= "<td>";
        body+= row['test_total']+" Taka";
        total+=Number(row['test_total']);
        paid+=Number(row['test_paid']);
        body+= "</td>";
        body+= "<td>";
        body+= row['test_paid']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= (Number(row['test_total'])-Number(row['test_paid']))+" Taka";
        due+= (Number(row['test_total'])-Number(row['test_paid']));
        body+= "</td>";
        body+= "<td>";
        body+= row['test_time'];
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
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
      $(".reports").html(body);
            $(".total").html(total);
      $(".paid").html(paid);
      $(".due").html(due);
  });
return false; 
}


function emargency(page){
  var urls = url("emargencylist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table" id="bmw"> <thead class="thead-light"> <tr> <th scope="col">ID</th> <th scope="col">Full name</th> <th scope="col">Contact</th><th scope="col">Age</th><th scope="col">Gender</th><th scope="col">Address</th><th scope="col">Consultant</th><th scope="col">Refference</th><th scope="col">Date</th> <th scope="col" class="opt">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td style='color: green; font-weight: bold;'>";
        body+= row['id'];
        body+= "</td>";
        body+= "<td>";
        body+= row['name'];
        body+= "</td>";
        body+= "<td>";
        body+= row['contact'];
        body+= "</td>";
        body+= "<td>";
        body+= row['age'];
        body+= "</td>";
        body+= "<td>";
        body+= row['gender'];
        body+= "</td>";
        body+= "<td>";
        body+= "Village/Road: "+row['village']+"<br>";
        body+= "Thana: "+row['thana']+"<br>";
        body+= "District: "+row['district']+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+= row['consultant'];
        body+= "</td>";
        body+= "<td>";
        body+= row['reffered'];
        body+= "</td>";
        body+= "<td>";
        body+= row['date'];
        body+= "</td>";
        body+= "<td class='opt'>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("emergency/"+row["id"])+"'>Edit</a>";
        body+= "<a class='btn btn-success' style='margin: 1px' href='"+url("tests/"+row["id"])+"'>Tests</a>";
        body+= " <button class='btn btn-danger' style='margin: 1px' data-do='0' onclick='delete_emergency("+row['id']+",this)'>Delete</button>";
        
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
      $(".all_doctors").html(body);

  });
return false; 

}





function appoinment(page){
  var urls = url("appoinmentlist");
  var token = $("#csrf").val();
  var date = $("#dt10").val();
  var docto10r = $("#docto10r").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,date: date,doctor: docto10r, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table" id="bmw"> <thead class="thead-light"> <tr> <th scope="col">ID</th> <th scope="col">Full name</th> <th scope="col">Details</th><th scope="col">Token</th><th scope="col">Costs</th><th scope="col">Address</th><th scope="col">Consultant</th><th scope="col">Refference</th><th scope="col">Date</th> <th scope="col" class="opt">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td style='color: green; font-weight: bold;'>";
        body+= row['id'];
        body+= "</td>";
        body+= "<td>";
        body+= row['name'];
        body+= "</td>";
        body+= "<td>";
        body+= "Contact: "+row['contact']+"<br>";
        body+= "Age: "+row['age']+"<br>";
        body+= "Gender: "+row['gender']+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+= row['token'];
        body+= "</td>";
        body+= "<td style='text-align: right;'>";
        body+= row['total']+"Taka<br>";
        body+= row['paid']+"Taka<hr style='margin:0 !important'>";
        body+= (row['total']-row['paid'])+"Taka";
        body+= "</td>";
        body+= "<td>";
        body+= "Village/Road: "+row['village']+"<br>";
        body+= "Thana: "+row['thana']+"<br>";
        body+= "District: "+row['district']+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+= row['consultant'];
        body+= "</td>";
        body+= "<td>";
        body+= row['reffered'];
        body+= "</td>";
        body+= "<td>";
        body+= row['date'];
        body+= "</td>";
        body+= "<td class='opt'>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("appoinment/"+row["id"])+"'>Edit</a>";
        if ((row['total']-row['paid'])!=0) {
        body+= "<a class='btn btn-primary' style='margin: 1px' href='"+url("appoinment/collect/"+row["id"])+"'>Collect</a>";
        }else{
        if (row['past']=='') {
        body+= "<a class='btn btn-secondary' style='margin: 1px' href='javascript:void(0)' onclick='payid("+row["id"]+",this)'>Pay</a>";
        }else{
        body+= "<a class='btn btn-primary' style='margin: 1px' href='#'>Paid</a>";
        } 
        }
        body+= "<a class='btn btn-success' style='margin: 1px' href='"+url("appoinment/token/"+row["id"])+"'>Token</a>";
        body+= " <button class='btn btn-danger' style='margin: 1px' data-do='0' onclick='delete_appoinment("+row['id']+",this)'>Delete</button>";
        
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
      if(typeof d[1][3] === 'undefined'){
      }else{
        $(".cowen").html(d[1][3]);
      }
      $(".all_doctors").html(body);
  });
return false; 

}








function admission(page){
  var urls = url("admissionlist");
  var token = $("#csrf").val();
  var date = $("#dt10").val();
  var docto10r = $("#docto10r").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,date: date,doctor: docto10r, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table" id="bmw"> <thead class="thead-light"> <tr> <th scope="col">ID</th> <th scope="col">Full name</th> <th scope="col">Details</th><th scope="col">Room</th><th scope="col">Day</th><th scope="col">Consultant</th><th scope="col">Refference</th><th scope="col">Admitted</th> <th scope="col" class="opt">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td style='color: green; font-weight: bold;'>";
        body+= row['id'];
        body+= "</td>";
        body+= "<td>";
        body+= row['name'];
        body+= "</td>";
        body+= "<td>";
        body+= "Contact: "+row['contact']+"<br>";
        body+= "Age: "+row['age']+"<br>";
        body+= "Gender: "+row['gender']+"<br>";
        body+= "Address: "+row['village']+", "+row['thana']+", "+row['district']+"<br>";

        body+= "</td>";
        body+= "<td>";
        body+= row['room'];
        body+= "</td>";
        // body+= "<td style='text-align: right;'>";
        // body+= row['total']+"Taka<br>";
        // body+= row['paid']+"Taka<hr style='margin:0 !important'>";
        // body+= (row['total']-row['paid'])+"Taka";
        // body+= "</td>";
        body+= "<td>";

        body+= row['day'];

      
        body+= "</td>";
        body+= "<td>";
        body+= row['consultant'];
        body+= "</td>";
        body+= "<td>";
        body+= row['reffered'];
        body+= "</td>";
        body+= "<td>";
        body+= row['date'];
        body+= "</td>";
        body+= "<td class='opt'>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        if (row['discharge']==1) {
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("admission/memo/dis/"+row["id"])+"'>Memo</a>";

        }else{
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("admission/"+row["id"])+"'>Edit</a>";
        body+= "<a class='btn btn-primary' style='margin: 1px' href='"+url("admission/tests/"+row["id"])+"'>Tests</a>";
        body+= "<a class='btn btn-success' style='margin: 1px' href='"+url("admission/collect/"+row["id"])+"'>Discharge</a>";
        }
        body+= " <button class='btn btn-danger' style='margin: 1px' data-do='0' onclick='delete_add("+row['id']+",this)'>Delete</button>";
        
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
      $(".all_doctors").html(body);
  });
return false; 

}




function tests(page){
  var urls = url("testslist");
  var token = $("#csrf").val();
  var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,order: order, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col"> Name</th> <th scope="col"> Rates</th> <th scope="col">Discount</th> <th scope="col">Total Amount</th><th scope="col">Paid Amount</th><th scope="col">Due Amount</th><th scope="col">Time</th><th scope="col">Added By</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row['test_name'];
        body+= "</td>";
        body+= "<td>";
        body+= row['test_amount'];
        body+= "</td>";
        body+= "<td>";
        body+= "<span id='discount11"+row['id']+"'></span> Taka";
        countdown(row['test_discount'], 'discount11'+row['id'], 1);
        body+= "</td>";
        body+= "<td>";
        body+= row['test_total']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['test_paid']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= (Number(row['test_total'])-Number(row['test_paid']))+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['test_time'];
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("collect/"+row["em_id"])+"'>Collect</a>";
        body+= "<a class='btn btn-success' style='margin: 1px' href='"+url("memo/emergency/tests/"+row["id"])+"'>Memo</a>";
        
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
      $(".all_doctors").html(body);
  });
return false; 

}





function adtests(page){
  var urls = url("admission/testslist");
  var token = $("#csrf").val();
  var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,order: order, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">Name</th> <th scope="col">Rates</th> <th scope="col">Discount</th> <th scope="col">Total Amount</th><th scope="col">Paid Amount</th><th scope="col">Due Amount</th><th scope="col">Time</th><th scope="col">Added By</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td colspan=2>";
        body+= row['bordered'];
        body+= "</td>";
        body+= "<td>";
        body+= "<span id='discount11"+row['id']+"'></span> Taka";
        countdown(row['test_discount'], 'discount11'+row['id'], 1);
        body+= "</td>";
        body+= "<td>";
        body+= row['test_total']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['test_paid']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= (Number(row['test_total'])-Number(row['test_paid']))+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['test_time'];
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' style='margin: 1px' href='"+url("admission/collect/"+row["em_id"])+"'>Collect</a>";
        body+= "<a class='btn btn-success' style='margin: 1px' href='"+url("memo/admission/tests/"+row["id"])+"'>Memo</a>";
        
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
      $(".all_doctors").html(body);
  });
return false; 

}


function prev_details(page){
  var urls = url("prev_details");
  var token = $("#csrf").val();
  var em_id = $("#em_id").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,user: em_id,search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table" id="done1"> <thead class="thead-light"> <tr> <th scope="col">Payment Type</th> <th scope="col">Paid Amount</th> <th scope="col">Date</th> <th scope="col">Collected By</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        if (row['total']<0) {
        body+= "discount amount " + (row['total']*-1)+" Taka";

        }else{
        body+= row['total']==0?"Due Payment":"New Payment of "+row['total']+" Taka";

        }
        body+= "</td>";
        body+= "<td>";
        body+= row['paid']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['created_at'];
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
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
      $(".all_doctors").html(body);
  });
return false; 
}


function prev_details3(page){
  var urls = url("prev_details3");
  var token = $("#csrf").val();
  var em_id = $("#em_id").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page,user: em_id,search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table" id="done1"> <thead class="thead-light"> <tr> <th scope="col">Payment Type</th> <th scope="col">Paid Amount</th> <th scope="col">Date</th> <th scope="col">Collected By</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";

        body+= row['total']==0?"Due Payment":"New Payment of "+row['total']+" Taka";

        
        body+= "</td>";
        body+= "<td>";
        body+= row['paid']+" Taka";
        body+= "</td>";
        body+= "<td>";
        body+= row['created_at'];
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
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
      $(".all_doctors").html(body);
  });
return false; 
}

function imagetest(page){
  var urls = url("admin/imagetestlist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Test name</th> <th scope="col">Rate</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['rate'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/imagetest/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_imagetest("+row['id']+",this)'>Delete</button>";
        
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='4'>";
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
      $(".all_doctors").html(body);
  });
return false; 
}


function accounts(page){
  var urls = url("accountlist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Username</th> <th scope="col">email</th><th scope="col">phone</th><th scope="col">address</th><th scope="col">role</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['address'];
        body+= "</td>";
        body+= "<td>";
        body+= row['role'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("accounts/"+row["id"])+"'>Edit</a>";
        if (row['id']!=d[2]) {
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_account("+row['id']+",this)'>Delete</button>";  
        }
        
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='4'>";
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
      $(".all_doctors").html(body);
  });
return false; 
}


function expense(page){
  var urls = url("admin/expenselist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
    var date1 = $("#date1").val();
  var date2 = $("#date2").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search,date2: date2, date1: date1},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var total = 0;
      var body = '<table class="table" id="bmw"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Description</th> <th scope="col">Type</th><th scope="col">Amount</th><th scope="col">Date</th><th scope="col" class="opt">Options</th> </tr> </thead> <tbody>';
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
        body+= row['role'];
        body+= "</td>";
        body+= "<td>";
        body+= row['amount']+" Taka";
        total+=Number(row['amount']);
        body+= "</td>";
        body+= "<td>";
        body+= row['created_at'];
        body+= "</td>";
        body+= "<td class='opt'>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/expense/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_expense("+row['id']+",this)'>Delete</button>";
        
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='4'>";
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
      $(".all_doctors").html(body);
      $(".total").html(total);
  });
return false; 
}

function service(page){
  var urls = url("admin/servicelist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Test name</th> <th scope="col">Test type</th> <th scope="col">Rate</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['type'];
        body+= "</td>";
        body+= "<td>";
        body+= row['rate']+" Taka";
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/service/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_service("+row['id']+",this)'>Delete</button>";
        
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='4'>";
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
      $(".all_doctors").html(body);
  });
return false; 
}

function pathology(page){
  var urls = url("admin/pathologylist");
  var token = $("#csrf").val();
  // var order = $("#select_410").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token,page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Room name</th> <th scope="col">Type</th> <th scope="col">Rate</th><th scope="col">Options</th> </tr> </thead> <tbody>';
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
        body+= row['type'];
        body+= "</td>";
        body+= "<td>";
        body+= row['cost']+" Taka";
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/room/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_pathology("+row['id']+",this)'>Delete</button>";
        
        body+= "</td>";
        body+= "</tr>";

      }
      if (data=='') {
        body+= "<tr colspan='4'>";
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
      $(".all_doctors").html(body);
  });
return false; 
}

function login(id, t){
  $.ajax({
    url: url("admin/login"),
    type: "POST",
    data: {id: id, _token: $("#token").val()},
  })
  .done(function(data) {
    window.location = url();
  });
  
}


/*Update software*/

var mmg = 5;
function delete_doctor(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("admin/delete_doctor"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}
var mmg = 5;
function payid(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Pay";
  }else{

    mmg=mmg-1;
    t.innerHTML = "paying in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("payid"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $(t).html('Paid');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}
var mmg = 5;
function payid2(doctor,date,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Pay";
  }else{

    mmg=mmg-1;
    t.innerHTML = "paying in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("payid2"),
        type: 'POST',
        data: {doctor: doctor,date: date,_token: $("#csrf").val()},
      })
      .done(function(data) {
        console.log(data);
        $(t).html('Paid');
        appoinment(1);
      })
      .fail(function() {
        // $("#bcmc"+id).css('background',"#FF9B9B");
        appoinment(1);
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}
var mmg = 5;
function delete_expense(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("admin/delete_expense"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}
var mmg = 5;
function delete_appoinment(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("delete_app"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}

var mmg = 5;
function delete_add(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("delete_add"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}
var mmg = 5;
function delete_pathology(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("admin/delete_pathology"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}

var mmg = 5;
function delete_service(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("admin/delete_service"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}


var mmg = 5;
function delete_imagetest(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("admin/delete_imagetest"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}



var mmg = 5;
function delete_emergency(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    mmg = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    mmg=mmg-1;
    t.innerHTML = "Deleting in "+mmg;
    if (mmg==0) {
      $.ajax({
        url: url("delete_emergency"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    mmg = 5;
      clearInterval(x);
    }
  }
  },1000);
}


function get_clients(page){
  var urls = url("admin/clients");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">Full Name</th> <th scope="col">Id</th><th scope="col">Email</th> <th scope="col">Hours</th> <th scope="col">Members</th> <th scope="col">Details</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row["name"];
        body+= "</td>";
        body+= "<td>";
        body+= row['key'];
        body+= "</td>";
        body+= "<td>";
        body+= row['email'];
        body+= "</td>";
        body+= "<td>";
        body+= (row['hours'] / 60) + ":" +(row['hours'] % 60);
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i][0];
        body+= "</td>";
        body+= "<td>";
        body+= "Invoice:"+row['invoice_number'];
        body+= "<br>Payment(USD):"+row['payment_usd'];
        body+= "<br>payment plan:"+row['payment_plan'];
        body+= "<br>Last Payment Date:"+row['last_payment_date'];
        body+= "<br>Phone:"+row['phone'];
        body+= "</td>";
        body+= "<td>";
        body+= "<a href='"+url("admin/editclient/"+row['id'])+"' class='btn btn-primary'>Edit</a>";
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











function get_payments(page){
  var urls = url("admin/get_payment");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">#</th> <th scope="col">Type</th><th scope="col">Name</th> <th scope="col">Email</th> <th scope="col">Hours</th> <th scope="col">Date</th><th scope="col">Info</th> <th scope="col">Adder</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['type'];
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i][0];
        body+= "</td>";
        body+= "<td>";
        body+= d[2][i][1];
        body+= "</td>";
        body+= "<td>";
        body+= row['hours'];
        body+= "</td>";
        body+= "<td>";
        body+= row['date'];
        body+= "</td>";
        body+= "<td>";
        body+= "Invoice: "+row['invoice']+"<br>";
        body+= "Fees: "+row['fees']+"<br>";
        body+= "Transfer Fees: "+row['transfer_fees']+"<br>";
        body+= "Extra Payment: "+row['extra_payment']+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+= row['adder'];
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
  });
return false; 
}




  var time = 5;
function delete_class(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    time = 6;
      clearInterval(x);
    t.innerHTML = "Delete Class";
  }else{

    time=time-1;
    t.innerHTML = "Deleting in "+time;
    if (time==0) {
      $.ajax({
        url: url("delete_class"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    time = 5;
      clearInterval(x);
    }
  }
  },1000);
}
  var time = 5;

function delete_account(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    time = 6;
      clearInterval(x);
    t.innerHTML = "Delete Class";
  }else{

    time=time-1;
    t.innerHTML = "Deleting in "+time;
    if (time==0) {
      $.ajax({
        url: url("admin/delete_account"),
        type: 'POST',
        data: {id: id,_token: $("#csrf").val()},
      })
      .done(function(data) {
        $("#bcmc"+id).fadeOut('slow');
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FF9B9B");
      })
      .always(function() {
        console.log("complete");
      });
      


    time = 5;
      clearInterval(x);
    }
  }
  },1000);
}
function details(id,t){
  window.location = url("details/"+id);
}
function delete_n(id){
  $.ajax({
    url: url("delete_noti"),
    type: 'GET',
    data: {id: id, _token: $("#csrf").val()},
  })
  .done(function(data) {
    $("#bcmc"+id).fadeOut(500);
  })
  .fail(function() {
    $("#bcmc"+id).css("background","tomato");
  });
  return false;
  
}

function load_notifications(page){
  var urls = url("notifications");
  var token = $("#token").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<div id='bcmc"+row["id"]+"' class='moce10 " +(row['read']==0 ? 'new_one':'') + "'>";
        body+= "<button class='btn btn-danger' onclick='delete_n("+row['id']+")'>Delete</button>";
        body+= "<p>"+row['content']+"</p>";
        body+= "<p>"+row['time']+"</p>";
        body+= "</div>";
        
      }
      if (data=='') {
        body+= "<div>";
        body+= "No Users Found";
        body+= "</div>";
      }
      $page = d[1][1];
      $total = d[1][0];
      $limit = d[1][2];
      body+=generate_pagination($total, $page, $limit, "dp_fun");
      $(".all_notifications").html(body);
  });
return false; 
}
function block(id,m){
	var token = $("#token").val();
	$.ajax({
		url: url("admin/block"),
		type: "POST",
		data: {id: id, _token: token},
	})
	.done(function(data) {
		$(m).html(data);
		if (data=="Block") {
			$(m).removeClass('btn-info');
			$(m).addClass('btn-danger');
		}else{
			$(m).removeClass('btn-danger');
			$(m).addClass('btn-info');
		}
	});
	
}











function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;

      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/





      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<b>" + arr[i].substr(0, val.length) + "</b>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }else{

let myReg = new RegExp(val.toUpperCase() , "g")
        if (arr[i].toUpperCase().match(myReg) ) {
        	/*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<b>" + arr[i].substr(0, val.length) + "</b>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
        }
      
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
      	// alert(scrol);
        currentFocus++;
      	addActive(x);
        var sd = document.getElementsByClassName("autocomplete-active")[0].offsetHeight;

        var sc = document.getElementsByClassName("autocomplete-active")[0].offsetTop;
        // alert(sc);
        $("#timezoneautocomplete-list").animate({
          scrollTop: (sc-(450-sd))*1,
     
        },100);
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        /*and and make the current item more visible:*/
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
      	addActive(x);
        var sd = document.getElementsByClassName("autocomplete-active")[0].offsetHeight;

        var sc = document.getElementsByClassName("autocomplete-active")[0].offsetTop;
        // alert(sc);
        $("#timezoneautocomplete-list").animate({
          scrollTop: (sc-(450-sd))*1,
     
        },100);
        
      	
        /*and and make the current item more visible:*/
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
        search_d52(1);
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}







function search_user(inp, type) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;

      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", "timezoneautocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/


arr = '';


$.ajax({
	url: url("user_get"),
	type: 'POST',
	data: "_token="+$("#csrf").val()+"&&s="+val+"&&type="+type,
})
.done(function(data) {
	arr = JSON.parse(data);





      for (i = 0; i < arr.length; i++) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<b>" + arr[i]['name'].substr(0, val.length) + "</b>";
          b.innerHTML += arr[i]['name'].substr(val.length);
          b.innerHTML += " | " + arr[i]['phone'];
          b.innerHTML += " | " + arr[i]['email'];
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i]['email'] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }


});

      
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
      	// alert(scrol);
        currentFocus++;
      	addActive(x);
        var sd = document.getElementsByClassName("autocomplete-active")[0].offsetHeight;

        var sc = document.getElementsByClassName("autocomplete-active")[0].offsetTop;
        // alert(sc);
        $("#timezoneautocomplete-list").animate({
          scrollTop: (sc-(450-sd))*1,
     
        },100);
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        /*and and make the current item more visible:*/
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
      	addActive(x);
        var sd = document.getElementsByClassName("autocomplete-active")[0].offsetHeight;

        var sc = document.getElementsByClassName("autocomplete-active")[0].offsetTop;
        // alert(sc);
        $("#timezoneautocomplete-list").animate({
          scrollTop: (sc-(450-sd))*1,
     
        },100);
        
      	
        /*and and make the current item more visible:*/
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
        search_d52(1);
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}





$(function(){
  $(".day_ml").click(function(){
    var rm  = $("#repeat").val();
    var mr = rm.split(",");
    if (mr.includes($(this).val())) {
      mr = removeA(mr, $(this).val());
      $(this).removeClass('selected');

    }else{
    $(this).addClass('selected');
      mr.push($(this).val());
    }
    // var val = mr.toString();
    $("#repeat").val(mr);
  });
});




$(".add_class_button").click(function(){
	var data = $("#add_class_form").serialize();
  $(this).text("Processing...");
  $(this).attr('disabled', 'disabled');
	$.ajax({
    url: url("add_class"),
    type: "POST",
    data: data,
  })
  .done(function(data) {
    $(".donoe410").html(data);
    $("body,html").animate({scrollTop: 10}, 500);
    $(".donoe410").slideDown(200);
    $(".add_class_button").text("Add Class");
  $(".add_class_button").removeAttr('disabled');
  })
  .fail(function() {
     $(".donoe410").html("Failed To add The class, Please Check the Teacher and Student are correct.");
    $("body,html").animate({scrollTop: 10}, 500);
    $(".donoe410").slideDown(200);
    $(".add_class_button").text("Add Class");
  $(".add_class_button").removeAttr('disabled');
  })
  .always(function() {
    console.log("complete");
  });
  
});



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