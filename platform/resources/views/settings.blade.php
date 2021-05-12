@extends("layout.app")
@section("title","Users | School management software")
@section("active","settings")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>

<form style="width: 90%; margin: 0 auto;" action="{{ url('/update') }}" method="POST" enctype="multipart/form-data"><br>
	<h3 style="text-align: center;">My account</h3>
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
<div class='row'>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Full Name')}}</label>
    <input type="text" class="form-control" id="name" name="name"  value="{{ Auth::user()->name }}" aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
<input type="hidden" name="id"  value="{{ Auth::user()->id }}">
@csrf
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Email address')}}</label>
    <input type="email" class="form-control" id="email" readonly="" name="email" aria-describedby="emailHelp"  value="{{ Auth::user()->email }}" placeholder="Enter email">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Phone number')}}</label>
    <input type="text" class="form-control" id="phone" readonly="" name="phone" aria-describedby="emailHelp"   value="{{ Auth::user()->phone }}" placeholder="Enter phone number">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Address')}}</label>
    <input type="text" class="form-control" id="address1" name="address1" aria-describedby="emailHelp"  value="{{ Auth::user()->address1 }}" placeholder="Full Address">
  </div>
  </div>
  @if (Auth::user()->type==1 OR Auth::user()->type==3)
  <div class='row'>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Front Copy')}}</label>
    <input type="file" class="form-control" id="national_id_front" name="national_id_front" aria-describedby="emailHelp"  value="{{ Auth::user()->national_id_front }}" placeholder="{{__('National Front Copy')}}">
    @if (Auth::user()->national_id_front!='')
      <img src="{{ url('/public/image/') }}/0{{ Auth::user()->national_id_front }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Back Copy')}}</label>
    <input type="file" class="form-control" id="national_id_back" name="national_id_back" aria-describedby="emailHelp"  value="{{ Auth::user()->national_id_back }}" placeholder="{{__('National Front Copy')}}">
    @if (Auth::user()->national_id_back!='')
      <img src="{{ url('/public/image/') }}/0{{ Auth::user()->national_id_back }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Your Photo')}}</label>
    <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" placeholder="{{__('Your Photo')}}">

    @if (Auth::user()->image!='')
      <img src="{{ url('/public/image/') }}/0{{ Auth::user()->image }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Your CV')}}</label>
    <input type="file" class="form-control" id="cv" name="cv" aria-describedby="emailHelp"  value="{{ Auth::user()->cv }}" placeholder="{{__('Your CV')}}">
    @if (Auth::user()->cv!='')
      <a href="{{ url('/public/image/') }}/0{{ Auth::user()->cv }}" download>View your uploaded CV</a>
    @endif
  </div>
  </div>
  <div class='row'>
    <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Number')}}</label>
    <input type="text" class="form-control" id="national_id" name="national_id" aria-describedby="emailHelp"  value="{{ Auth::user()->national_id }}" placeholder="{{__('National ID Number')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Calender Link')}}</label>
    <input type="text" class="form-control" id="calender_link" name="calender_link" aria-describedby="emailHelp"  value="{{ Auth::user()->calender_link }}" placeholder="{{__('Calender Link')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Zoom Link')}}</label>
    <input type="text" class="form-control" id="zoom_link" name="zoom_link" aria-describedby="emailHelp"  value="{{ Auth::user()->zoom_link }}" placeholder="{{__('Zoom Link')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Education')}}</label>
    <input type="text" class="form-control" id="education" name="education" aria-describedby="emailHelp"  value="{{ Auth::user()->education }}" placeholder="{{__('Your Education')}}">
  </div>
    </div>
  <div class='row'>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Your Bio')}}</label>
    <textarea class="form-control" style="height: 200px" id="bio" name="bio" aria-describedby="emailHelp" placeholder="{{__('Your Bio')}}">{{ Auth::user()->bio }}</textarea>
  </div>
     <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Available Time')}}</label>
     <textarea class="form-control" style="height: 200px"  id="available_time" name="available_time" aria-describedby="emailHelp" value="{{ old("available_time") }}">
{{ Auth::user()->available_time }}
    </textarea>
  </div>
  </div>
  <div class='row'>
  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Timezone')}}</label>
    <input type="text" class="form-control" id="timezone" name="timezone" aria-describedby="emailHelp"  value="{{ Auth::user()->timezone }}" placeholder="{{__('Your Timezone')}}">
  </div>
  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Country')}}</label>
    <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp"  value="{{ Auth::user()->country }}" placeholder="{{__('Your Country')}}">
  </div>

  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">{{__('Graduation')}}</label>
    <select class="form-control" name="graduation" required="">
      <option value="Graduate" {{ Auth::user()->graduation == "Graduate" ? "selected" : "" }}>Graduate</option>
      <option value="Under Graduate" {{ Auth::user()->graduation == "Under Graduate" ? "selected" : "" }}>Under Graduate</option>
    </select>
  </div>
  </div>
<div class='row'>
  <div class="form-group col-sm-9">
    <label for="exampleInputEmail1">{{__('Gender')}}</label>
    <select name="gender" id="gender" class="form-control">
      <option value="Male" {{ Auth::user()->gender == "Male" ? "selected" : "" }}>Male</option>
      <option value="Female" {{ Auth::user()->gender == "Female" ? "selected" : "" }}>Female</option>
      <option value="Custom" {{ Auth::user()->gender == "Custom" ? "selected" : "" }}>Custom</option>
    </select>
  </div>
  
  @endif
  @if (Auth::user()->type==2)
  <div class='row'>
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
    <input type="text" class="form-control" id="country" name="country" autocomplete="off" required="" aria-describedby="emailHelp"  value="{{ Auth::user()->country }}" placeholder="{{__('Your Country')}}">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Status')}}</label>
     <select class="form-control" name="status" required="">
      
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>

    </select>
  </div>
  </div>
<div class='row'>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Student Evaluation')}}</label>
    <textarea class="form-control" id="evalu" name="evalu" aria-describedby="emailHelp" placeholder="{{__('Your Evaluation')}}">{{ old("evalu") }}</textarea>
  </div>


  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Regular Evaluation')}}</label>
    <textarea class="form-control" id="reg_evalu" name="reg_evalu" aria-describedby="emailHelp" placeholder="{{__('Your Evaluation')}}">{{ old("reg_evalu") }}</textarea>
  </div>


<div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Client ID')}}</label>
    <input type="text" class="form-control" id="gurdain_id" name="gurdain_id" aria-describedby="emailHelp"  value="{{ Auth::user()->gurdain_id }}" placeholder="Client is your parents who bear your costs here">
    <a href="{{ url('/create_client') }}">Don't have any client ID?</a>
  </div>
  @endif
<div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Date of Birth')}}</label>
    <input type="date" class="form-control" id="dateofbirth" required="" name="dateofbirth" aria-describedby="emailHelp" value="{{ Auth::user()->dateofbirth }}">
  </div>
  </div>
  <div style="padding: 10px; overflow: hidden">
  <button type="submit" class="btn btn-success" style="float: right;">Save</button>
  </div>
</form>



 </article>
@endsection

@section("script")
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