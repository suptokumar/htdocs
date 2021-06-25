@extends("layout.app")
@section("title","User Details | School management software")
@section("active","users")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
background: none;
}
</style>
 <article>


<div class="row">
  <div class="col-4">
    <div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
    <img src="{{ url(empty($user->image)?"/public/logo/ag.jpg":"/public/image/0".$user->image) }}" alt="{{$user->name}}" style="width: 200px; border-radius: 100%;">
    <h2>{{$user->name}}</h2>
    @if ($user->type==2)
      {{-- expr --}}
    <h5>Client ID:{{$user->gurdain_id}}</h5>
    @endif
    <div style="text-align: left">
<h6>Email: {{$user->email}}</h6>
<h6>Phone Number: {{$user->phone}}</h6>

@if ($user->type!=2)
<h6>ID Number: {{$user->national_id}}</h6>

<br>
<br>

<h6>Zoom Link:<br><a style="line-break: anywhere;" href="{{$user->zoom_link}}" target="_blank">{{$user->zoom_link}}</a></h6>
<h6>Calender Link:<br><a style="line-break: anywhere;" href="{{$user->calender_link}}" target="_blank">{{$user->calender_link}}</a></h6>

@endif
    </div>

    </div>

@if ($user->type==2)
<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
<h3>Student Evalution</h3>
<p>
  {{$user->evalu}}
</p>
</div>
<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
<h3>Regular Evalution</h3>
<p>
  {{$user->reg_evalu}}
</p>
    </div>

@else
<div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">
<h3>My Bio</h3>
<p>
  {{$user->bio}}
</p>
    </div>
@endif
<div class="round">
<h5>{{$user->type==1?"Done Hours":"Remaining Hours"}}</h5>
@if(floatval($user->hours)==0)
      <h3  class="bioer" style="color:{{$user->hours<61?'red;':'blue'}}">0:00</h3>
      @else
      <h3 class="bioer"  style="color:{{$user->hours<61?'red;':'blue'}}">{{ floatval($user->hours)>0?(floor(floatval($user->hours) / 60) .':'. floatval($user->hours) % 60):("-".floor(floatval(-1*$user->hours) / 60) .':'. floatval(-1*$user->hours) % 60) }}</h3>
@endif

@if (Auth::user()->type==3)
  <button class="btn btn-danger resp">Edit</button>
@endif

    <div class="main_edit" style="max-width: 500px; margin: 0px auto; display: none;">
        <div class="form-group">
    <label for="exampleInputEmail1">{{__('Hours in account')}}</label>
    <input type="number" class="form-control" id="sd" value="{{floatval($user->hours) / 60}}" name="hours" aria-describedby="emailHelp" >
    <input type="hidden" id="scrf" value="{{csrf_token()}}">
    <input type="hidden" id="id1" value="{{$user->id}}">
  </div>
      <a href="javascript:void(0)" class="btn btn-danger resp_2">Save</a>
      <span class="message"></span>
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
        $(".bioer").html(data[0]);
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
</div>
  </div>

<style>
  .round {
    background: white;
    text-align: center;
    border-radius: 17px;
    padding: 13px;
    margin: 10px;
}
</style>
  <div class="col-8">
    <div class="row">
<div class="col-6">
<div class="round">
<h5>Previous Class Report</h5>
<a href="#1aed">Click Here</a>

</div>
</div>
<div class="col-6">
<div class="round">
<h5>Upcoming Classes in Month</h5>
<a href="{{ url('/upcoming/'.$user->id) }}" target="_blank">Click Here</a>
</div>
</div>

    </div>
      <div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; ">
<div class="row">
<div class="col-sm-6 m-2" style="border-right: 1px solid #ccc;">
<h6>Country: {{$user->country}}</h6>
<h6>Timezone: {{$user->timezone}}</h6>
<h6>Gender: {{$user->gender}}</h6>
<h6>Birthday: {{$user->dateofbirth}}</h6>
<h6>Address: {{$user->address1}}</h6>
</div>
@php
  use App\Models\report;
  use App\Models\User;
  if($user->type==2)
  {
  $r = report::where("s_id","=",$user->id)->get();
}else{
  $r = report::where("t_id","=",$user->id)->get();
}
$subject = [];
$clt = [];
foreach ($r as $key => $value) {
    if(!in_array($value->subject,$subject )){

  array_push($subject,$value->subject);
}

  if($user->type==2)
{
  if(!in_array(User::find($value->t_id)->name,$clt )){

  array_push($clt,User::find($value->t_id)->name);
  }
}else{
if(!in_array(User::find($value->s_id)->name,$clt )){
    
  array_push($clt,User::find($value->s_id)->name);
  }}
}
@endphp
<div class="col-sm-4 m-2">
<h6>Subjects: {{ implode(",",$subject) }}</h6>
<h6>@if ($user->type==2)
  Teacher:
@else
Students:
@endif

{{ implode(",",$clt) }}</h6>
<h6>Cancel Request: {{$user->cancel_request}}</h6>
@if ($user->type!=2)
<h6>Graduation: {{$user->graduation}}</h6>
<h6>Education: {{$user->education}}</h6>
@endif
</div>
</div>


    </div>
    <div style="padding: 2%; background: white; margin: 10px; border-radius: 10px; border: 1px solid #ccc; text-align: center;">

<div class="pre_class">
  <h3 onclick="exportTableToExcel('tablon','table')">Current Month Reports
</h3>
  {{--    <a class='btn btn-info float-right' style='width: 400px; !important' href='{{ url("/upcoming/".$user->id) }}'>Upcomings</a>   --}}
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
   $m = strtotime($r->lastclass);
   date_default_timezone_set(Auth::user()->timezone);
 @endphp
      <tr> 
        <td>{{++$i}}</td>
        <td>{{ $r->title}}</td>
        <td>{{ $r->subject}}</td>
        <td>{{ $r->client}}</td>
        <td>{{ $r->duration}} Minutes</td>
        <td>{{ date("d M Y h:ia",$m)}}</td>
        <td>{{ $r->notes}}</td>
      </tr>
@endforeach 
  </tbody>
  </table>
</div>
<div id="1aed"></div>
<div class="pre_class">
  <h3 onclick="exportTableToExcel('tablosn','table')">Previous month reports</h3>
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
   $m = strtotime($r->lastclass);
   date_default_timezone_set(Auth::user()->timezone);
 @endphp
      <tr> 
        <td>{{++$i}}</td>
        <td>{{ $r->title}}</td>
        <td>{{ $r->subject}}</td>
        <td>{{ $r->client}}</td>
        <td>{{ $r->duration}} Minutes</td>
        <td>{{ date("d M Y h:ia",$m)}}</td>
        <td>{{ $r->notes}}</td>
      </tr>
@endforeach 
  </tbody>
  </table>
</div>

  </div>
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