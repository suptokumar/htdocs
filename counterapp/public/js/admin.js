function load_student(page){
load_users(page, 1);
}
function load_teacher(page){
load_users(page, 2);
}
function load_users(page, order){
	var urls = url("admin/user_list");
	var token = $("#token").val();
	// var order = $("#select_410").val();
	var search = $("#snod410").val();
	$.ajax({
		url: urls,
		type: "POST",
		data: {_token: token, order: order, page: page, search: search},
	})
	.done(function(data) {
			var d = JSON.parse(data);
			var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Name</th> <th scope="col">Email</th><th scope="col">Phone number</th><th scope="col">Remaining Hours</th><th scope="col">ClientID</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
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
				if (row['type']==1) {
        body+= floor(row['hours']/60) + ":" + (row['hours']<0?row['hours']*-1)%60;
				}else if (row['type']==2) {
        body+= floor(row['hours']/60) + ":" + (row['hours']<0?row['hours']*-1)%60;
				}
				body+= "</td>";
        body+= "<td>";
        if (row['type']==1) {
        body+= floor(row['hours']/60) + ":" + (row['hours']<0?row['hours']*-1)%60;
        }else if (row['type']==2) {
        body+= floor(row['hours']/60) + ":" + (row['hours']<0?row['hours']*-1)%60;
        }
        body+= "</td>";
				body+= "<td>";
				// body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
				if (row['key']==0) {
				body+= "<button class='btn btn-danger' onclick='block("+row['id']+",this)'>Block</button>";
        body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";
				}else{
				body+= "<button class='btn btn-info' onclick='block("+row['id']+",this)'>Unlock</button>";
        body+= " <button class='btn btn-success' onclick='details("+row['id']+",this)'>View Details</button>";
				}
        body+= " <button class='btn btn-primary' onclick='login("+row['id']+",this)'>Login</button>";
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
			$(".all_users").html(body);
	});
return false;	
}




function waiting_list(page){
  var urls = url("admin/waitings_list");
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
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Student Info</th> <th scope="col">Contact Info</th><th scope="col">Contact time</th><th scope="col">Reach</th><th scope="col">Follower</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= (i+1);
        body+= "</td>";
        body+= "<td>";
        body+= row['student_info'];
        body+= "</td>";
        body+= "<td>";
        body+= row['contact'];
        body+= "</td>";
        body+= "<td>";
        body+= row['time_to_contact'];
        body+= "</td>";
        body+= "<td>";
        body+= row['reach'];
        body+= "</td>";
        body+= "<td>";
        body+= row['follower'];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<a class='btn btn-info' href='"+url("admin/waitings/add/"+row["id"])+"'>Edit</a>";
        body+= " <button class='btn btn-danger' data-do='0' onclick='delete_waiting("+row['id']+",this)'>Delete</button>";
        
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


function load_gt(page){
  var urls = url("student_list");
  var token = $("#csrf").val();
  var order = 1;
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, order: order, page: page, search: search},
  })
  .done(function(data) {
      console.log(data);
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Name</th> <th scope="col">Country</th></tr> </thead> <tbody>';
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
        body+= row['country'];
        body+= "</td>";
        body+= "</tr>";

      }
      if (d[0]=='') {
        body+= "<tr colspan='3'>";
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
function load_st(page){
  var urls = url("student_list");
  var token = $("#csrf").val();
  var order = 2;
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, order: order, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">Name</th> <th scope="col">Education</th><th scope="col">Bio</th></tr> </thead> <tbody>';
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
        body+= row['education'];
        body+= "</td>";
        body+= "<td>";
        body+= row['bio'];
        body+= "</td>";
        body+= "</tr>";

      }
      if (d[0]=='') {
        body+= "<tr colspan='3'>";
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

function manage_class(page){
  var urls = url("admin/manage_class");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">Title</th> <th scope="col">Subject</th><th scope="col">Details</th><th scope="col">Upcoming Class</th> <th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row['title']+"<br>";
        body+= row["ras"];
        body+= "</td>";
        body+= "<td>";
        body+= row['subject'];
        body+= "</td>";
        body+= "<td>";
        body+= row['description']+"<br>";
        body+= 'Teacher: '+ row['teacher']+"<br>";
        body+= 'Student: '+ row['student']+"<br>";
        body+= 'Repeat: '+ (row['repeat']==''?"No Repeat":row['repeat'] )+"<br>";
        body+= 'Starting Time: '+ d[2][i][0]+"<br>";
        body+= 'Timezone: '+ d[2][i][1]+"<br>";
        body+= 'Duration: '+ row['duration']+" Minutes<br>";
        body+= 'Status: '+ d[3][i]+"<br>";
        body+= "</td>";
        body+= "<td>";
        body+= d[4][i];
        body+= "</td>";
        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<button class='btn btn-success' onclick=\"window.location='"+url("admin/class_history/"+row['ras'])+"'\">View Details</button>";
        body+= " <button class='btn btn-danger' onclick='delete_class("+row['id']+",this)' data-do='0'>Delete Class</button>";        
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

function get_requests(page){
  var urls = url("admin/get_requests");
  var token = $("#csrf").val();
  var search = $("#snod410").val();
  $.ajax({
    url: urls,
    type: "POST",
    data: {_token: token, page: page, search: search},
  })
  .done(function(data) {
      var d = JSON.parse(data);
      var body = '<table class="table"> <thead class="thead-light"> <th scope="col">Request Details</th><th scope="col">Options</th> </tr> </thead> <tbody>';
      for (var i = 0; i < d[0].length; i++) {
        var row = d[0][i];
        body+= "<tr id='bcmc"+row["id"]+"'>";
        body+= "<td>";
        body+= row['notification'];
        body+= "</td>";

        body+= "<td>";
        // body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
        body+= "<button class='btn btn-success' onclick='approve_req("+row['id']+",this)'>Approve</button>";
        body+= " <button class='btn btn-danger' onclick='delete_req("+row['id']+",this)' data-do='0'>Delete</button>";
        
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
function approve_req(id, t){
    $(t).attr("disabled","disabled");
    $(t).html("Approving...");
    $.ajax({
      url: url("approvereq"),
      type: "POST",
      data: {id: id, _token: $("#csrf").val()},
    })
    .done(function(data) {
      $(t).html(data);
      $(t).removeAttr("disabled");
    });
return;    
}


var gmt = 5;
function delete_req(id,t){
  if ($(t).attr('data-do')==0) {
      $(t).attr('data-do', 1);
  }else{
      $(t).attr('data-do', 0);
  }


  var x = setInterval(function(){
  if ($(t).attr('data-do')==0) {
    gmt = 6;
      clearInterval(x);
    t.innerHTML = "Delete";
  }else{

    gmt=gmt-1;
    t.innerHTML = "Deleting in "+gmt;
    if (gmt==0) {
      $.ajax({
        url: url("delete_req"),
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
      


    gmt = 5;
      clearInterval(x);
    }
  }
  },1000);
}


var mmg = 5;
function delete_waiting(id,t){
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
        url: url("admin/delete_waiting"),
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