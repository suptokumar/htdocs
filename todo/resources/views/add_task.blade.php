@extends('layout.app')
@section('title','Home Page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/public/js/jquery.datetimepicker.css') }}">
@includeif("layout.header",["home"=>"home"])
<div class="container" style="width: 99% !important;">
	@if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if ($s = session('success'))
<div class="alert alert-{{$s[0]}}">{{$s[1]}}</div>
@endif
<form method="POST" action="{{ url('/add_tasks') }}" style="margin: 5% 0%; border: 1px solid #ccc; padding: 10% 16% 15% 5%; background: #ffffffEE;">
	@csrf
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Task Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" autocomplete="off" placeholder="Task Name" name="name" required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Date & Time</label>
<style>
  .rowwer {
    width: 100%;
    float: right;
}
.rowwer .col-sm-10{
    width: 100%;
}
</style>
<div class="rowwer">
  
    <div class="col-sm-10">
      <div class="input-group">
    <input type="text" autocomplete="off" name="date" class="form-control date-picker" value="@php
      echo date("Y-m-d",time()+8400)
    @endphp">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
</div>
    </div>


    <div class="col-sm-10">
      <div class="input-group clockpicker">
    <input type="text" autocomplete="off" name="time" class="form-control vaonod" value="05:00">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
    </div>
</div>




  </div>
  <hr>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Repeat</label>
    <div class="col-sm-10">
      <input type="hidden" class="form-control" id="days" name="days">
      <div class="days">
        <input type="button" class="day_tog day_ml" id="Sunday" value="Sunday">
        <input type="button" class="day_tog day_ml" id="Monday" value="Monday">
        <input type="button" class="day_tog day_ml" id="Tuesday" value="Tuesday">
        <input type="button" class="day_tog day_ml" id="Wednesday" value="Wednesday">
        <input type="button" class="day_tog day_ml" id="Thursday" value="Thursday">
        <input type="button" class="day_tog day_ml" id="Saturday" value="Saturday">
        <input type="button" class="day_tog day_ml" id="Friday" value="Friday">
        <br>
        <input type="button" class="day_tog day_ml" id="Month" value="Month">
        <input type="button" class="day_tog day_ml" id="Year" value="Year">
      </div>
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
      <select type="text" class="form-control" id="inputEmail3" name="category">
<option value="Uncategorized">--Select Category--</option>
<option value="Health">Health</option>
<option value="Shop">Shop</option>
<option value="Eat">Eat</option>
<option value="Travel">Travel</option>
<option value="Visit">Visit</option>
<option value="Meeting">Meeting</option>
<option value="Reading">Reading</option>
<option value="Learning">Learning</option>
<option value="Enjoy">Enjoy</option>
<option value="Rest">Rest</option>
<option value="Others">Others</option>
      </select>
    </div>
  </div>
  <div class="form-group row">

    <label for="inputEmail3" class="col-sm-2 col-form-label">Priority</label>
    <div class="col-sm-10">
    <select type="text" class="form-control" id="inputEmail3" name="priority">
<option value="High">High</option>
<option value="Medium" selected>Medim</option>
<option value="Low">Low</option>
      </select>
    </div>
  </div>
  <div class="form-group row" style="overflow: hidden">
    <div class="col-sm-10">
      <button type="submit" style="float:right;" class="btn btn-primary">Add This Task</button>
    </div>
  </div>
</form>
</div>
<style>
  .selected{
    background: green;
    color: white;
  }
  .bost{
    background: #C7C7C7 !important;
    color: black !important;
    border: 1px solid black !important;
  }
</style>
@endsection