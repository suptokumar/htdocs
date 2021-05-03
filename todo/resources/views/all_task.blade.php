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
        @foreach ($list as $row)
            <div class="march march_{{ $row->id}}">
                <div class="name_s">
                    <h4>{{ $row->task_name }}</h4>
                    <h4>@php
                        echo date("h:i a",strtotime(date($row->time)));
                    @endphp</h4>
                    <h5>Priority: {{$row->priority}}</h5>
                    <h5 style="color: #FF1717;">Type:
@php
  $type = [];
@endphp
@if ($row->montht==1)
  @php
    array_push($type,"Monthly");
  @endphp
  @endif
@if($row->yeart==1) 
  @php
    array_push($type,"Yearly");
  @endphp
  @endif
@if($row->shedule!='') 
  @php
    array_push($type,"Weekly");
  @endphp
  @endif
@if($row->shedule=='' &&  $row->yeart==0 && $row->montht==0)
@php
    array_push($type,"General");
  @endphp
@endif

@for ($i = 0; $i < count($type); $i++)
  {{ $type[$i] }}
  @if ($i!=count($type)-1)
    , 
  @endif
@endfor
                    </h5>
                </div>
                <div class="button_s">
                <button class="btn btn-danger" onclick="del('{{ url('/del') }}',0,{{ $row->id}},'<?php echo csrf_token() ?>',this)">Remove</button>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection