
function load_products(url,search, page, order, token){
	$.ajax({
		url: url,
		type: "POST",
		data: {_token: token, order: order, page: page, search: search},
	})
	.done(function(data) {
			var d = JSON.parse(data);
			var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">ID</th> <th scope="col">Name</th> <th scope="col">Brand</th><th scope="col">Category</th><th scope="col">Price</th><th scope="col">Options</th> </tr> </thead> <tbody>';
			for (var i = 0; i < d[0].length; i++) {
				var row = d[0][i];
				body+= "<tr id='bcmc"+row["id"]+"'>";
				body+= "<td>";
				body+= "<img style='width: 50px' src='"+public()+'/image/0'+row['product_image']+"' alt='"+(i+1)+"'>";
				body+= "</td>";
				body+= "<td>";
				body+= row['product_id'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_name'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_brand'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_category'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_price'] + " Taka";
				body+= "</td>";
				body+= "<td>";
				body+= '<div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="javascript:void(0)" onclick="pd_view(\''+row['product_id']+'\',\''+row['product_name']+'\')">View Details</a></li> <li><a href="javascript:void(0)" onclick="pd_edit(\''+row['product_id']+'\',\''+row['product_name']+'\')">Edit</a></li> <li><a href="javascript:void(0)" style="background:#FF1B1B; color: white" onclick="pd_delete(\''+row['id']+'\',\''+row['product_name']+'\',\'#bcmc'+row['id']+'\')">Delete</a></li> </ul> </div>';
				body+= "</td>";
				body+= "</tr>";

			}
			if (data=='') {
				body+= "<tr colspan='6'>";
				body+= "<td>";
				body+= "No Products";
				body+= "</td>";
				body+= "</tr>";
			}
			body+= '</tbody></table>';
			$page = d[1][1];
			$total = d[1][0];
			$limit = d[1][2];
			body+=generate_pagination($total, $page, $limit, "dp_fun");
			$(".product_list").html(body);
	});
return false;	
}
function pd_view(id, name){
	$.ajax({
		url: url()+"dashboard/single_product",
		type: 'POST',
		data: {_token: $("#csrf").val(), id: id, name:name},
	})
	.done(function(data) {
		$(".product_view").html(data);
	});
	
$(".product_view").dialog({
	open: true,
	modal: true,
	title: "Product Details",
	width: "auto",
	buttons:{
		"Edit":function(){
			$(this).dialog("close");
		},
		"Delete":function(){
			$(this).dialog("close");
		},
		"Close":function(){
			$(this).dialog("close");
		}
	}
});
return false;
}
function pd_edit(id,name){
	window.location=url()+"dashboard/products/"+id+"/"+name;
}
function delete_image(id,name,type,find)
{
	$.ajax({
		url: url()+"dashboard/deleteimage",
		type: 'POST',
		data: {_token: $("#csrf").val(), name: name, type: type, find: find},
	})
	.done(function(data) {
		console.log(data);
		$("#"+id).fadeOut(500);
	});
	
}
function pd_delete(id,name,row){
	$(".product_delete").html("Are you sure you want to delete <b>"+name+"</b>");
	$(".product_delete").dialog({
		open: true,
		modal: true,
		title: "Confirmation",
		buttons:{
			"Yes":function(){
				$(this).dialog("close");

				$.ajax({
					url: url()+"dashboard/delete_product",
					type: 'POST',
					data: {_token: $("#csrf").val(), id: id},
				})
				.done(function(data) {
					console.log(data);
					$(row).fadeOut('slow');
				});
				
			},
			"No":function(){
				$(this).dialog("close");
			}
		}
	});
}



function autocomplete(inp) {
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

$.ajax({
	url: url()+'dashboard/get_matched_product',
	type: 'POST',
	data: "_token="+$("#csrf").val()+"&&s="+val,
})
.done(function(data) {
			if (data=='[]') {
				return false;
			}
	var d = JSON.parse(data);
	var body = '<table class="table"> <thead class="thead-light"> <tr> <th scope="col">#</th> <th scope="col">ID</th> <th scope="col">Name</th> <th scope="col">Quantity</th><th scope="col">Category</th><th scope="col">Price</th> </tr> </thead> <tbody>';
			for (var i = 0; i < d.length; i++) {
				var row = d[i];
				body+= "<tr class='bcz_hover' onclick='autofill("+data+")'>";
				body+= "<td>";
				body+= "<img style='width: 50px' src='"+public()+'/image/0'+row['product_image']+"' alt='"+(i+1)+"'>";
				body+= "</td>";
				body+= "<td>";
				body+= row['product_id'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_name'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_quantity'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_category'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_price'] + " Taka";
				body+= "</td>";
				body+= "</tr>";

			}
			if (data=='') {
				body+= "<tr colspan='6'>";
				body+= "<td>";
				body+= "No Products";
				body+= "</td>";
				body+= "</tr>";
			}
			body+= '</tbody></table>';
	a.innerHTML=body;
});



// 
      // for (i = 0; i < arr.length; i++) {
        // /*check if the item starts with the same letters as the text field value:*/
        // if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          // /*create a DIV element for each matching element:*/
          // b = document.createElement("DIV");
          // /*make the matching letters bold:*/
          // b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          // b.innerHTML += arr[i].substr(val.length);
          // /*insert a input field that will hold the current array item's value:*/
          // b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          // /*execute a function when someone clicks on the item value (DIV element):*/
          // b.addEventListener("click", function(e) {
              // /*insert the value for the autocomplete text field:*/
              // inp.value = this.getElementsByTagName("input")[0].value;
              // close the list of autocompleted values,
              // (or any other open lists of autocompleted values:
              // closeAllLists();
          // });
          // a.appendChild(b);
        // }
      // }
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
        $("#institutionautocomplete-list").animate({
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
        $("#institutionautocomplete-list").animate({
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


function get_category(inp) {
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

$.ajax({
	url: url()+'dashboard/get_matched_product',
	type: 'POST',
	data: "_token="+$("#csrf").val()+"&&s="+val,
})
.done(function(data) {
	var d = JSON.parse(data);
	var body = '';
			for (var i = 0; i < d.length; i++) {
				var row = d[i];
				body+= "<tr class='bcz_hover' onclick='window.location=\""+url()+"dashboard/products/"+row['product_id']+"/"+row['product_name']+"\"'>";
				body+= "<td>";
				body+= "<img style='width: 50px' src='"+public()+'/image/0'+row['product_image']+"' alt='"+(i+1)+"'>";
				body+= "</td>";
				body+= "<td>";
				body+= row['product_id'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_name'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_quantity'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_category'];
				body+= "</td>";
				body+= "<td>";
				body+= row['product_price'] + " Taka";
				body+= "</td>";
				body+= "</tr>";

			}
			body+= '</tbody></table>';
	a.innerHTML=body;
});



// 
      // for (i = 0; i < arr.length; i++) {
        // /*check if the item starts with the same letters as the text field value:*/
        // if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          // /*create a DIV element for each matching element:*/
          // b = document.createElement("DIV");
          // /*make the matching letters bold:*/
          // b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          // b.innerHTML += arr[i].substr(val.length);
          // /*insert a input field that will hold the current array item's value:*/
          // b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          // /*execute a function when someone clicks on the item value (DIV element):*/
          // b.addEventListener("click", function(e) {
              // /*insert the value for the autocomplete text field:*/
              // inp.value = this.getElementsByTagName("input")[0].value;
              // close the list of autocompleted values,
              // (or any other open lists of autocompleted values:
              // closeAllLists();
          // });
          // a.appendChild(b);
        // }
      // }
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
        $("#institutionautocomplete-list").animate({
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
        $("#institutionautocomplete-list").animate({
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


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
get_category(document.getElementById("product_category"));
autocomplete(document.getElementById("product_name"));


function autofill(data)
{
	var row = data[0];

	$("#product_name").val(row["product_name"]);
	$("#product_id").val(row["product_id"]);
	$("#product_category").val(row["product_category"]);
	$("#product_price").val(row["product_price"]);
	$("#product_brand").val(row["product_brand"]);
	$("#product_buy").val(row["product_buy"]);
	$("#product_discount").val(row["product_discount"]);
	$("#product_size").val(row["product_size"]);
	$("#product_color").val(row["product_color"]);
	$("#product_tags").val(row["seo_tags"]);
	$("#product_discriptions").val(row["product_description"]);
	$("#product_quentity").focus();
}
