@extends("layout.app")
@section("title","User Details | School management software")
@section("active","users")
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
  <h3 style="text-align: center;">Info of {{$user->name}}</h3>
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
<div class="row">
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Full Name')}}</label>
    <input type="text" class="form-control" id="name" name="name"  value="{{ $user->name }}" aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
<input type="hidden" name="id"  value="{{ $user->id }}">
@csrf
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Email address')}}</label>
    <input type="email" class="form-control" id="email" readonly="" name="email" aria-describedby="emailHelp"  value="{{ $user->email }}" placeholder="Enter email">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Phone number')}}</label>
    <input type="text" class="form-control" id="phone" readonly="" name="phone" aria-describedby="emailHelp"   value="{{ $user->phone }}" placeholder="Enter phone number">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Address')}}</label>
    <input type="text" class="form-control" id="address1" name="address1" aria-describedby="emailHelp"  value="{{ $user->address1 }}" placeholder="Full Address">
  </div>
  </div>
<div class="row">
  @if ($user->type==1 OR $user->type==3)
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Number')}}</label>
    <input type="text" class="form-control" id="national_id" name="national_id" aria-describedby="emailHelp"  value="{{ $user->national_id }}" placeholder="{{__('National ID Number')}}">
  </div>


  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Calender Link')}}</label>
    <input type="text" class="form-control" id="calender_link" name="calender_link" aria-describedby="emailHelp"  value="{{ $user->calender_link }}" placeholder="{{__('Calender Link')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Zoom Link')}}</label>
    <input type="text" class="form-control" id="zoom_link" name="zoom_link" aria-describedby="emailHelp"  value="{{ $user->zoom_link }}" placeholder="{{__('Zoom Link')}}">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Graduation')}}</label>
    <input type="text" class="form-control" id="zoom_link" name="zoom_link" aria-describedby="emailHelp"  value="{{ $user->graduation }}" readonly="">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Education')}}</label>
    <input type="text" class="form-control" id="education" name="education" aria-describedby="emailHelp"  value="{{ $user->education }}" placeholder="{{__('Your Education')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Gender')}}</label>
    <select name="gender" id="gender" class="form-control">
      <option value="Male" {{ $user->gender == "Male" ? "selected" : "" }}>Male</option>
      <option value="Female" {{ $user->gender == "Female" ? "selected" : "" }}>Female</option>
      <option value="Custom" {{ $user->gender == "Custom" ? "selected" : "" }}>Custom</option>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Timezone')}}</label>
    <input type="text" class="form-control" id="timezone" name="timezone" aria-describedby="emailHelp"  value="{{ $user->timezone }}" placeholder="{{__('Your Timezone')}}">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Country')}}</label>
    <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp"  value="{{ $user->country }}" placeholder="{{__('Your Country')}}">
  </div>
    </div>
  <div class="row">
        <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">{{__('User Bio')}}</label>
    <textarea class="form-control" id="bio" name="bio" aria-describedby="emailHelp" placeholder="{{__('Your Bio')}}">{{ $user->bio }}</textarea>
  </div>

  </div>
    <div class="row">
<div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Front Copy')}}</label><br>
    @if ($user->national_id_front!='')
      <img src="{{ url('/public/image/') }}/0{{ $user->national_id_front }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('National ID Back Copy')}}</label><br>
    @if ($user->national_id_back!='')
      <img src="{{ url('/public/image/') }}/0{{ $user->national_id_back }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Your Photo')}}</label><br>

    @if ($user->image!='')
      <img src="{{ url('/public/image/') }}/0{{ $user->image }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Your CV')}}</label><br>
    @if ($user->cv!='')
      <a href="{{ url('/public/image/') }}/0{{ $user->cv }}" download>View your uploaded CV</a>
    @endif
  </div>
  </div>

  @endif
  @if ($user->type==2)
  

  <div class="form-group col-sm-3" style="position: relative">
    <label for="exampleInputEmail1">{{__('Timezone')}}</label>
    <input type="text" class="form-control" id="timezone" name="timezone" required="" aria-describedby="emailHelp"  value="{{ $user->timezone }}" placeholder="{{__('Your Timezone')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Country')}}</label>
    <input type="text" class="form-control" id="country" name="country" autocomplete="off" required="" aria-describedby="emailHelp"  value="{{ $user->country }}" placeholder="{{__('Your Country')}}">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Client ID')}}</label>
    <input type="text" class="form-control" id="gurdain_id" name="gurdain_id" aria-describedby="emailHelp"  value="{{ $user->gurdain_id }}" placeholder="Client is your parents who bear your costs here">
  </div>

  <div class="form-group col-sm-3">
    <label for="exampleInputEmail1">{{__('Status')}}</label>
    <input type="text" class="form-control"  value="{{ $user->status }}">
  </div>
  </div>
  <div class="row">


    <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Student Evaluation')}}</label>
    <textarea class="form-control" id="bio" name="bio" aria-describedby="emailHelp">{{ $user->evalu }}</textarea>
  </div>

  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">{{__('Regular Evaluation')}}</label>
    <textarea class="form-control" id="bio" name="bio" aria-describedby="emailHelp">{{ $user->reg_evalu }}</textarea>
  </div>
  </div>
  @endif
<div class="row">
  <div class="form-group col-sm-2">
    <label for="exampleInputEmail1">{{__('Date of Birth')}}</label>
    <input type="date" class="form-control" id="dateofbirth" readonly name="dateofbirth" aria-describedby="emailHelp" value="{{ $user->dateofbirth }}">
  </div>

  <div class="form-group col-sm-2">
    @if ($user->type==2)
    <label for="exampleInputEmail1">{{__('Remaining Hours')}}</label>
    @else
    <label for="exampleInputEmail1">{{__('Done Hours')}}</label>
    @endif
    @if($user->hours==0)
    <input class="form-control" id="bioer" name="bio" value="0:00">
    @else
    <input class="form-control" id="bioer" name="bio" value="{{ intval($user->hours)>0?(floor(intval($user->hours) / 60) .':'. intval($user->hours) % 60):("-".floor(intval(-1*$user->hours) / 60) .':'. intval(-1*$user->hours) % 60) }}">
    @endif
    <a href="javascript:void(0)" class="btn btn-success resp">Edit</a>
    <div class="main_edit" style="max-width: 500px; margin: 0px auto; display: none;">
        <div class="form-group">
    <label for="exampleInputEmail1">{{__('Hours in account')}}</label>
    <input type="number" class="form-control" id="sd" value="{{intval($user->hours) / 60}}" name="hours" aria-describedby="emailHelp" >
    <input type="hidden" id="scrf" value="{{csrf_token()}}">
    <input type="hidden" id="id1" value="{{$user->id}}">
  </div>
      <a href="javascript:void(0)" class="btn btn-danger resp_2">Save</a>
      <span class="message"></span>
    </div>
  </div>
<script>
  $(document).ready(function() {
    $(".resp").click(function(event) {
      $(".main_edit").slideToggle(400);
    });
    $(".resp_2").click(function(event) {
      let time = Number($("#sd").val())*60;
      let token = $("#scrf").val();
      let id = $("#id1").val();
      $.ajax({
        url: "{{ url('/admin/lilupdate') }}",
        type: 'POST',
        data: {id: id, _token: token, hours: time},
      })
      .done(function(datas) {
        var data = JSON.parse(datas); 
        $("#bioer").val(data[0]);
        $(".message").html(data[1]);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });
  });
</script>
  <div class="form-group col-sm-3">
    @if ($user->type==2)
    <label for="exampleInputEmail1">{{__('Subjects')}}</label>
    @else
    <label for="exampleInputEmail1">{{__('Subjects')}}</label>
    @endif
    <input class="form-control" id="bio" name="bio" value="{{ implode(",", $subjects) }}">
  </div>
  <div class="form-group col-sm-3">
    @if ($user->type==2)
    <label for="exampleInputEmail1">{{__('Teachers')}}</label>
    @else
    <label for="exampleInputEmail1">{{__('Students')}}</label>
    @endif
    <input class="form-control" id="bio" name="bio" value="{{ implode(",", $clients) }}">
  </div>
  <div class="form-group col-sm-2">
    <label for="exampleInputEmail1">{{__('Cancel Requests')}}</label>
    <input type="text" class="form-control" id="sd" value="{{$user->cancel_request}}" name="hours" aria-describedby="emailHelp">
    <input type="hidden" id="scrf" value="{{csrf_token()}}">
    <input type="hidden" id="id1" value="{{$user->id}}">
  </div>
  </div>
  <div style="padding: 10px; overflow: hidden">
  </div>
      <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">{{__('Your Photo')}}</label><br>
    @if ($user->image!='')
      <img src="{{ url('/public/image') }}/0{{ $user->image }}" alt="Profile" style="width: 100px;">
    @endif
  </div>
</form>

<div class="pre_class">
  <h3>This month reports   <a class='btn btn-info float-right' style='width: 310px;' href='{{ url("/upcoming/".$user->id) }}'>Download Upcoming Month's Sheet</a>
<button onclick="exportTableToExcel('tablon','table')" class="btn btn-success float-right">Download</button></h3>
  <table class="table" id="tablon"> 
    <thead class="thead-light"> 
      <tr> 
        <th scope="col">#</th>
        <th scope="col">Class Title</th>
        <th scope="col">Subject</th>
        <th scope="col">{{$user->type==2?"Teacher":"Student"}}</th>
        <th scope="col">Duration</th>
        <th scope="col">Time</th>
        <th scope="col">Progress Notes</th>
      </tr>
    </thead>
  <tbody>
      @if (empty($report2))
    <td colspan="7">Nothing Found</td>
  @endif
  @php
    $i = 0;
  @endphp
 @foreach ($report2 as $r)
 @php
   date_default_timezone_set($r->timezone);
   $m = strtotime($r->starting);
   date_default_timezone_set(Auth::user()->timezone);
 @endphp
      <tr> 
        <td>{{++$i}}</td>
        <td>{{ $r->title}}</td>
        <td>{{ $r->subject}}</td>
        <td>{{ $r->client}}</td>
        <td>{{ $r->duration}} Minutes</td>
        <td>{{ date("Y-m-d h:i a",$m)}}</td>
        <td>{{ $r->notes}}</td>
      </tr>
@endforeach 
  </tbody>
  </table>
</div>

<div class="pre_class">
  <h3>Previous month reports <button onclick="exportTableToExcel('tablosn','table')" class="btn btn-success float-right">Download</button></h3>
  <table class="table" id="tablosn"> 
    <thead class="thead-light"> 
      <tr> 
        <th scope="col">#</th>
        <th scope="col">Class Title</th>
        <th scope="col">Subject</th>
        <th scope="col">{{$user->type==2?"Teacher":"Student"}}</th>
        <th scope="col">Duration</th>
        <th scope="col">Time</th>
        <th scope="col">Progress Notes</th>
      </tr>
    </thead>
  <tbody>
      @if (empty($report))
    <td colspan="7">Nothing Found</td>
  @endif
  @php
    $i = 0;
  @endphp
 @foreach ($report as $r)
 @php
   date_default_timezone_set($r->timezone);
   $m = strtotime($r->starting);
   date_default_timezone_set(Auth::user()->timezone);
 @endphp
      <tr> 
        <td>{{++$i}}</td>
        <td>{{ $r->title}}</td>
        <td>{{ $r->subject}}</td>
        <td>{{ $r->client}}</td>
        <td>{{ $r->duration}} Minutes</td>
        <td>{{ date("Y-m-d h:i a",$m)}}</td>
        <td>{{ $r->notes}}</td>
      </tr>
@endforeach 
  </tbody>
  </table>
</div>



 </article>
<iframe id="txtArea1" style="display:none"></iframe>
@endsection
@section("script")
<script src="{{ asset('/public/js/class.js') }}"></script>
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