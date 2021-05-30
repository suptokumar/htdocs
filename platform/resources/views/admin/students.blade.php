@extends("layout.app")
@section("title","Students | School management software")
@section("active","students")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
flex-direction: column;
}
</style>
<article style="background: transparent; margin-top: -30px;">
    <div class="search" style="width: 100%; padding: 2%; overflow: hidden">
  <div class="rk" style="float: right; align-items: center;">
    Search <input type="search" id="snod410" autocomplete="off" onkeyup="load_student(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
  </div>
  <div class="dk">
{{--   <select name="d1s" id="select_410" onchange="load_student(1)" style="padding: 10px">
    <option value="0">Student and Teacher</option>
    <option value="1">Student Only</option>
    <option value="2">Teacher Only</option>
  </select> --}}
  <input type="hidden" id="token" value="{{ csrf_token() }}">
  </div>
</div>
</article>
 <article style="margin-top:-60px">


      @if ($message = session("message"))
  <div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@endif
@if ($success = session("success"))
  <div class="alert alert-success" role="alert">
  {{$success}}
</div>
@endif

@if ($new_client = session("new_client"))
  <div class="alert alert-success" role="alert">
  {{$new_client}}
</div>
@endif





<div class="all_users" style="width: 100%">
  
</div>
<button onclick="from_show()" class="btn btn-success" style="position: fixed; width: 100px !important; height: 100px; padding-top: 8px; top: 50px;">Create Students</button>
<script>
  function from_show(){
    $("form").slideToggle(400,function(){
    $("body,html").animate({
      scrollTop:$("body").innerHeight()}, 1000);

    });
  }
</script>
<form style="width: 90%; margin: 0 auto; display: none;" action="{{ url('/create') }}" method="POST" enctype="multipart/form-data"><br>
	<input type="hidden" name="type" value="2">
	<h3 style="text-align: center;">Create Students</h3>
<div class='row'>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Full Name')}}</label>
    <input type="text" class="form-control" id="name" name="name" required="" value="{{ old("name") }}" aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
@csrf
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Email address')}}</label>
    <input type="email" class="form-control" id="email" name="email" required="" aria-describedby="emailHelp"  value="{{ old("email") }}" placeholder="Enter email">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Phone number')}}</label>
    <input type="text" class="form-control" id="phone" name="phone" required="" aria-describedby="emailHelp"   value="{{ old("phone") }}" placeholder="Enter phone number">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Password')}}</label>
    <input type="password" class="form-control" id="password" name="password" required="" aria-describedby="emailHelp"   value="" placeholder="Enter password">
  </div>
</div>
<div class='row'>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Address')}}</label>
    <input type="text" class="form-control" id="address1" name="address1" aria-describedby="emailHelp"  value="{{ old("address1") }}" placeholder="Full Address">
  </div>
      <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Your Photo')}}</label>
    <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp"  value="{{ Auth::user()->image }}" placeholder="{{__('Your Photo')}}">
    @if (Auth::user()->image!='')
      <img src="{{ url('/public/image') }}/0{{ Auth::user()->image }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3" style="position: relative">
    <label for="exampleInputEmail1">{{__('Timezone')}}</label>
    <input type="text" class="form-control" id="timezone" name="timezone" required="" aria-describedby="emailHelp"  value="{{ Auth::user()->timezone }}" placeholder="{{__('Your Timezone')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Country')}}</label>
     <select class="form-control" name="country" required="">
      <option selected="">Select Your Country</option>
      @php
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
foreach ($countries as $country) {
  echo '<option value="'.$country.'">'.$country.'</option>';
}
      @endphp
    </select>
  </div>
  </div>
<div class='row'>

  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Date of Birth')}}</label>
    <input type="date" class="form-control" id="dateofbirth" required="" name="dateofbirth" aria-describedby="emailHelp" value="{{ Auth::user()->dateofbirth }}">
  </div>


  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Status')}}</label>
     <select class="form-control" name="status" required="">
      
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>

    </select>
  </div>





  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Client ID')}}</label>
    <input type="text" class="form-control" id="gurdain_id" name="gurdain_id" aria-describedby="emailHelp"  value="{{ Auth::user()->gurdain_id }}" placeholder="Client is your parents who bear your costs here">
    <a href="{{ url('/create_client') }}">Don't have any client ID?</a>
  </div>

</div>
<div class='row'>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Regular Evaluation')}}</label>
    <textarea class="form-control" id="reg_evalu" name="reg_evalu" aria-describedby="emailHelp" placeholder="{{__('Your Evaluation')}}">{{ old("reg_evalu") }}</textarea>
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Student Evaluation')}}</label>
    <textarea class="form-control" id="evalu" name="evalu" aria-describedby="emailHelp" placeholder="{{__('Your Evaluation')}}">{{ old("evalu") }}</textarea>
  </div>
  </div>


  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Save</button>
  </div>
</form>

 </article>
@endsection
@section("script")
<script src="{{ asset('/public/js/admin.js?eeee') }}"></script>

<script>
  $(document).ready(function() {
   load_student(1);
  });
function dp_fun(page){
    load_student(page);
    $("body,html").animate({
        scrollTop: 0
    },500);
}
</script>
<script>
  
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
autocomplete(document.querySelector("#timezone"),@php
    echo json_encode(timezone_identifiers_list());
  @endphp);

</script>
<style>
  
  * {
  box-sizing: border-box;
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    width: 47%;
    margin-top: 38px;
    left: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  font-weight: 100;
  font-size: 16px;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
 #timezoneautocomplete-list{
     margin-top: 0px;

    box-shadow: 0px 3px 3px 1px #ccc;
    max-height: 450px;
    overflow-y: scroll;
}


</style>
@endsection