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
        <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">back</button> 
                <button class="btn btn-info" style="float: left; margin: 5px" onclick="window.location='{{ url('/') }}'">Menu</button> 


        Expense
    </h2>
   <div class="parent" style="width: 30%; float: left; border: 1px solid #ccc; margin: 10px; padding: 10px;">
       <form action="{{ url('/admin/expense') }}" method="POST">
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

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <input type="text" name="name" autocomplete="off" class="form-control" id="name" value="{{isset($doctor)?$doctor->name:''}}" placeholder="">
    </div>
    </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-10">
      <input type="text" name="amount" autocomplete="off" class="form-control" id="amount" value="{{isset($doctor)?$doctor->amount:''}}">
       
    </div>
 
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Expense Type</label>
    <div class="col-sm-10">
     <select name="role" class="form-control" id="role">
      <option value="Hospital Cost" {{isset($doctor)?($doctor->role=='Hospital Cost'?'selected':''):''}}>Hospital Cost</option>
      <option value="Service Cost" {{isset($doctor)?($doctor->role=='Service Cost'?'selected':''):''}}>Service Cost</option>
      <option value="Order Cost" {{isset($doctor)?($doctor->role=='Order Cost'?'selected':''):''}}>Order Cost</option>
      <option value="Purchase Cost" {{isset($doctor)?($doctor->role=='Purchase Cost'?'selected':''):''}}>Purchase Cost</option>
      <option value="Salary Cost" {{isset($doctor)?($doctor->role=='Salary Cost'?'selected':''):''}}>Salary Cost</option>
      <option value="Cleaning or Shifting" {{isset($doctor)?($doctor->role=='Cleaning or Shifting'?'selected':''):''}}>Cleaning or Shifting</option>
      <option value="Food & Care" {{isset($doctor)?($doctor->role=='Food & Care'?'selected':''):''}}>Food & Care</option>
      <option value="Others" {{isset($doctor)?($doctor->role=='Others'?'selected':''):''}}>Others</option>
      </select>
       
    </div>
 
  </div>


  <div class="form-group row">
    <div class="col-sm-12">
        <input type="hidden" name="id" value="{{isset($doctor)?$doctor->id:''}}">

      <button type="submit" class="btn btn-success float-right">{{!isset($doctor)?'Create':'Update'}}</button>
    </div>
  </div>
</form>
   </div>
   <div class="parent" style="width: 60%; float: left;">
<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
<div class="rk" style="float: right; align-items: center;">
  <button class="btn btn-info"  onclick="printData()">Print</button>

Search <input type="search" id="snod410" autocomplete="off" onkeyup="expense(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
</div>
  <div class="col-6">
  <input type="date" id="date1" autocomplete="off" onchange="expense(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;"> TO
  <input type="date" id="date2" autocomplete="off" onchange="expense(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;">
</div>
<div class="dk" style="float: right; display: block; margin-top: 15px">
Total Expense: <span class="total" style="padding: 10px; border: 1px solid #ccc; outline: none;"></span>

<input type="hidden" value="{{ csrf_token() }}" id="csrf">
</div>
</div>
<div class="all_doctors" style="width: 100%">

</div>
<script>
  function printData()
{
   var divToPrint=document.getElementById("bmw");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML+"<style>table{border-collapse:collapse;} td{border: 1px solid #ccc; padding: 10px; max-width: 10%;}.opt{display:none;}</style>");
   newWin.print();
   newWin.close();
}
</script>
<script>
    $(document).ready(function() {
        expense(1);
    });
        function dp_fun(page){
        expense(page);

    }
</script>

   </div>
</body>
</html>