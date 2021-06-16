@extends("layout.app")
@section("title","Add Questions | Classroommoney")
@section("10","active")
@section("content")

<div class="container">

<div class="section">

  <h2>Add Questions</h2>
  <div class="all_payments">
    
<form action="{{ url('/admin/savequestions') }}" method="POST">
  @csrf
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
  <div class="row">
    <div class="col-12">
      <label for="question">Question</label>
      <input type="text" name="question" value="{{$books->question}}" id="question" class="form-control">
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <label for="opt1">A.</label>
      <input type="text"  name="opt1" id="opt1" value="{{$books->opt1}}" class="form-control">
    </div>
    <div class="col-6">
      <label for="opt2">B.</label>
      <input type="text"  name="opt2" id="opt2" value="{{$books->opt2}}" class="form-control">
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <label for="opt3">C.</label>
      <input type="text"  name="opt3" id="opt3" value="{{$books->opt3}}" class="form-control">
    </div>
    <div class="col-6">
      <label for="opt4">D.</label>
      <input type="text"  name="opt4" id="opt4" value="{{$books->opt4}}" class="form-control">
    </div>
  </div>


  <div class="row">
    <div class="col-8">
      <label for="correct">Correct</label>
      <select name="correct" id="correct" class="form-control">
        <option value="opt1" {{$books->correct=='opt1'?'selected':''}}>opt1</option>
        <option value="opt2" {{$books->correct=='opt2'?'selected':''}}>opt2</option>
        <option value="opt3" {{$books->correct=='opt3'?'selected':''}}>opt3</option>
        <option value="opt4" {{$books->correct=='opt4'?'selected':''}}>opt4</option>
      </select>
    </div>
    <div class="col-4">
      <br>
      <input type="hidden" value="{{$books->id}}" name="book">
      <input type="submit"  name="submit" id="submit" value="Save" class="btn btn-success mt-2">
    </div>
  </div>


@php
  use App\Models\question;
  $questionlist = question::where("book","=",$books->book)->get();
@endphp
  
<table class="table">
      <tr>
        <th>Question</th>
        <th>Opt1</th>
        <th>Opt2</th>
        <th>Opt3</th>
        <th>Opt4</th>
        <th>Correct</th>
        <th>View</th>
        <th>Options</th>
      </tr>
      @foreach ($questionlist as $q)
      <tr id="bcmc{{$q->id}}">
        <td>{{$q->question}}</td>
        <td>{{$q->opt1}}</td>
        <td>{{$q->opt2}}</td>
        <td>{{$q->opt3}}</td>
        <td>{{$q->opt4}}</td>
        <td>{{$q->correct}}</td>
        <td>Answer Time: {{$q->showtime}}<br>Average %: {{$q->corper}}</td>
        <td><a href="{{ url('/admin/question/edit/'.$q->id) }}" class="btn btn-success">Edit</a><a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit({{$q->id}},this)">Delete</a></td>
        </tr>
      @endforeach
  </table>



</form>


  </div>
</div>
<script>
  function deleteit(id,t){

      $.ajax({
        url: "{{ url('/admin/deletequestion') }}",
        type: 'POST',
        data: {id: id,_token: '{{csrf_token()}}'},
      })
      .done(function(data) {
        $("#bcmc"+id).css('background',"#F4FCFF");
        $("#bcmc"+id).fadeOut();
      })
      .fail(function() {
        $("#bcmc"+id).css('background',"#FFCCCC");
      })
      .always(function() {
        console.log("complete");
      });

}
</script>
@endsection