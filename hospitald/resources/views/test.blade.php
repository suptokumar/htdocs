<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job It Medical Software</title>
    <link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
    <script src="{{ asset('/public/vendor/jquery.js') }}"></script>
    <script src="{{ asset('/public/vendor/main.js?'.rand()) }}"></script>
    <script src="{{ asset('/public/vendor/admin.js?'.rand()) }}"></script>
</head>
<body>
    <h2 style="text-align: center; margin: 10px">
    <button class="btn btn-info" style="float: left" onclick="window.history.back()">back</button>
                    <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 

        Tests for {{$user->name}}({{$user->id}})
    </h2>
    <div class="row" style="width: 95%; padding: 20px">
   <div class="parent col-sm-5" style="border: 1px solid #ccc; padding: 20px;">

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
@csrf
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link Services active" href="javascript:void(0)" onclick="run_time('Service', this)">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link ImageTests" href="javascript:void(0)" onclick="run_time('ImageTest', this)">ImageTest</a>
  </li>
  <li class="nav-item">
    <a class="nav-link Pathologys" href="javascript:void(0)" onclick="run_time('Pathology', this)">Pathology</a>
  </li>
</ul>
  <table class="table">
    <thead>
      <tr>
        <th>Test Name</th>
        <th>Rate</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody id="adsf41">
      @foreach ($tests as $test)
      <tr class="{{$test->type}}" {{$test->type!='Service'?'style=display:none;':''}}>
        <td id='n{{$test->id}}'>{{$test->name}}</td>
        <td><span id='r{{$test->id}}'>{{$test->rate}}</span> Taka</td>
        <td><a href="javascript:void(0)" class="btn btn-success" onclick="add_test({{$test->id}})">Add</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
<script>
  function run_time(id, t){
    $(".nav-item .nav-link").removeClass('active');
    $(t).addClass('active');
    $("#adsf41 tr").hide(0);
    $("."+id).show(100);
  }
</script>

   </div>
  
<div class="col-sm-5">
  <form action="{{ url('/testsadd') }}" method="POST">
    @csrf
    <table class="table">
    <thead>
      <tr>
        <th>Service Name</th>
        <th>Rate</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody class="t_body">
      <tr class="primary_field">
        <td colspan="3">No tests Added</td>
      </tr>
    </tbody>
    </table>
    <hr>
      <input type="hidden" id="em_id" name="em_id" value="{{$user->id}}">
      <input type="hidden" id="tests" name="tests" value="">
      <input type="hidden" id="names" name="names" value="">
      <input type="hidden" id="rates" name="rates" value="">
    <div class="row">
      <div class="col-sm-7">
        <label for="discount">Total Discount</label>
      </div>
      <div class="col-sm-5">
    <input type="text" name="discount" onkeyup="sum_test();" id="discount" class="input form-control" value="0">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <label for="total">Total Amount</label>
      </div>
      <div class="col-sm-5">
    <input type="text" name="total" id="total" onkeyup="due_check();" readonly class="input form-control" value="0">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <label for="paid">Total Paid</label>
      </div>
      <div class="col-sm-5">
    <input type="text" name="paid" id="paid" onkeyup="due_check();" class="input form-control" value="0">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <label for="due">Total Due</label>
      </div>
      <div class="col-sm-5">
    <input type="text" name="due" id="due" onkeyup="due_check();" class="input form-control" value="0">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <label for="due">Confirmation</label>
      </div>
      <div class="col-sm-5">
        <label for="confirm">
    <input type="checkbox" name="confirm" id="confirm" required="" class="input"> I have got the paid amount
        </label><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Save">
      </div>
    </div>
  </form>
</div>  
  </div>
   <div class="parent">
<div class="search" style="width: 98%; padding: 2%; overflow: hidden">
<div class="details">

  <div class="box green">
    <h2>Total Amount</h2>
    <h2 id="t_2">0</h2>
  </div>
  <div class="box blue">
    <h2>Total Paid</h2>
    <h2 id="t_3">0</h2>
  </div>
  <div class="box yellow">
    <h2>Total Due</h2>
    <h2 id="t_4">0</h2>
  </div>
  <div class="box" style="background: #9EFFC9">
    <h2>Print Memo</h2>
    <h2 id="t_4"><a href="{{ url('/memo/emergency/'.$user->id) }}" class="btn btn-danger">Print</a></h2>
  </div>
</div>
<div class="rk">
Search <input type="search" id="snod410" autocomplete="off" onkeyup="tests(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
<input type="hidden" value="{{$user->id}}" id="select_410">
</div>
<div class="dk">
<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<style>
 
  
.details {
  float: right;
}
.box{
  text-align: center;
  border: 1px solid #ccc;
  padding: 10px 20px;
  border-radius: 10px;
  display: inline-block;
}
.box h2{
  font-size: 20px;
}
.box.green{
  background: #c7fdc7;
}

.box.red{
  background: #ffa1a1;
}

.box.blue{
  background: #94ff94;
}

.box.yellow{
  background: #ffe3a0;
}
</style>
<div class="all_doctors" style="width: 98%; margin: 10px auto;">

</div>

<script>
    $(document).ready(function() {
        tests(1);
        $.ajax({
            url: '{{ url('/load_userdetails') }}',
            type: 'POST',
            data: {user: '{{$user->id}}', _token:'{{csrf_token()}}'},
          })
          .done(function(data) {
            d = JSON.parse(data);
            console.log(d[1]);
            direct(d[0],'t_1', 0);
            direct(d[1],'t_2', 0);
            direct(d[2],'t_3', 0);
            direct(Number(d[1])-Number(d[2]),'t_4', 0);
          })
        });
        function dp_fun(page){
        tests(page);

    }


    function add_test(id){
      $(".primary_field").remove();
      var st = $("#tests").val();
      var mcg = st.split(",");
      if (mcg.includes(id.toString())) {
        $(".d1"+id).css("background","#FFC4C4");
        setTimeout(function(){
        $(".d1"+id).css("background","#FFF");
        },1000);
        return;
      }else{
        mcg.push(id.toString());
        let  v = mcg.join();
        $("#tests").val(v);

        st = $("#names").val();
        mcg = st.split("```");
        mcg.push($("#n"+id).html());
        v = mcg.join("```");
        $("#names").val(v);

        st = $("#rates").val();
        mcg = st.split(",");
        mcg.push($("#r"+id).html());
        v = mcg.join(",");
        $("#rates").val(v);

      }
      $(".t_body").append('<tr class="d1'+id+'"> <td>'+$("#n"+id).html()+'</td> <td class="foil"> <input type="text" class="foil_field" onkeyup="sum_test();change_deal('+id+', this.value)" value="'+$("#r"+id).html()+'"</td> <td><a href="javascript:void(0)" class="btn btn-danger" onclick="remove(\''+id+'\')">Remove</a></td> </tr>');
      sum_test();
    }
    function change_deal(id,v){
      var st = $("#tests").val();
      var mcg = st.split(",");
      var carIndex = mcg.indexOf(id.toString());
      stts = $("#rates").val();
      dgc = stts.split(",");

      dgc[carIndex] = v;
      $("#rates").val(dgc.join(","));


    }
    function remove(id){
      $(".d1"+id).remove();
      let elements = $(".t_body tr");
      sum_test();


      var st = $("#tests").val();
      var mcg = st.split(",");
      var carIndex = mcg.indexOf(id.toString());
      mcg.splice(carIndex,1);
      $("#tests").val(mcg.join());
      
      let stt = $("#names").val();
      dgc = stt.split("```");
      dgc.splice(carIndex,1);
      $("#names").val(dgc.join("```"));
      
      
    stts = $("#rates").val();
      dgc = stts.split(",");
      dgc.splice(carIndex,1);
      $("#rates").val(dgc.join(","));
      



      if(elements.length==0){

      $(".t_body").append('<tr class="primary_field"> <td colspan="3">No tests Added <input type="hidden" value="0" class="foil_field"></td> </tr>');
      }
    }

    function sum_test(){
      let el = $(".foil_field");
      let dis = $("#discount").val();
      let paid = $("#paid").val();
      let due = $("#due").val();
      var total = 0;
      for(var i=0; i<el.length; i++){
        total+=Number(document.getElementsByClassName('foil_field')[i].value);
      }
      $("#total").val(total-dis);
      $("#due").val($("#total").val()-paid);
    }
    function due_check(){
      $("#due").val($("#total").val()-$("#paid").val());
    }
    
</script>

   </div>
</body>
</html>