<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student | classroommoney</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('/public/js/main.js') }}"></script>

    <script src="{{ asset('/public/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/public/css/dash.css?d') }}">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="{{ url('/') }}" class="active">Home</a>
</div>


<div class="question" style="max-width: 500px; margin: 10px auto;">
	<div style=" text-align: center; border: 1px solid #ccc; padding: 10px;">
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

@if ($check==1)
		You can't join this exam.
		@else
	Are you sure You want to complete the exam? If you start the exam now you can't join this exam again.
<br>
	<button class="btn btn-success" onclick="load_question({{$book}})">I am ready to start the exam</button>
	@endif	
	</div>
</div>
<script>
	function load_question(id){
      $.ajax({
        url: "{{ url('/load_question') }}",
        type: 'POST',
        data: {id: id,_token: '{{csrf_token()}}'},
        beforeSend:function(){
        	$(".question").html("<div style=\" text-align: center; border: 1px solid #ccc; padding: 10px;\">Loading Questions...</div>");
        }
      })
      .done(function(data) {
        $(".question").html(data);
      })
      .fail(function() {
        $(".question").html("<div style=\" text-align: center; border: 1px solid #ccc; padding: 10px;\" class='alert alert-danger'>Loading Failed</div>");
      })
      .always(function() {
        console.log("complete");
      });

}

</script>


</body>
</html>
