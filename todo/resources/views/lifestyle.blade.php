@extends('layout.app')
@section('title','Home Page')
@section('content')
@includeif("layout.header",["home"=>"home"])
<div class="content">
    <div style="padding: 1%; text-align: center">
    <div class="primary_div">
        <span>Task Completed</span>
        <h2><span class="fst">{{$mov[0]}}</span>%</h2>
    </div>
    <div class="primary_div">
        <span>Todays Tasks</span>
        <h2><span class="snd">{{$mov[1]}}</span>%</h2>
    </div>
    </div>
    <div style="padding: 1%; text-align: center">
    <button class="btn btn-success" onclick="window.location='{{ url('add_tasks') }}'">Add Tasks</button>
    <button class="btn btn-info" onclick="window.location='{{ url('all_tasks') }}'">View All Tasks</button>
    <button class="btn btn-primary" onclick="window.location='{{ url('lifestyle') }}'">My Lifestyle</button>
    </div>
    <div style="padding: 1%; text-align: center">
<form action="{{ url('lifestyle') }}" method="POST" style="background: white;">
	@csrf
	<div class="form-group">
    <label for="date" style="text-align: left;">Date</label>
    <input type="text" class="form-control date-picker" name="date" placeholder="YYYY-MM-DD" autocomplete="off" id="date">
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
    	@if (isset($list))
        @foreach ($list as $row)
            <div class="march march_{{ $row->id}}">
                <div class="name_s">
                    <h4>{{ $row->task_name }}</h4>
                    <h4>@php
                        echo date("h:i a",strtotime(date($row->time)));
                    @endphp</h4>
                    <h5>Priority: {{$row->priority}}</h5>
                </div>
                <div class="button_s">
                Status:
                @if ($row->status==1)
                <span class="badge badge-success" style="border: 1px solid green; color:green; background: white;">Completed</span>
@else

<span class="badge badge-danger" style="border: 1px solid red; color:red; background: white;">Not Completed</span>

                @endif
                </div>
            </div>
        @endforeach
    	@endif



    </div>

</div>
@endsection