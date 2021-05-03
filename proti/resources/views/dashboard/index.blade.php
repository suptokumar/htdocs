@extends('layout.app')
@section('title','Dashboard')
@section('content')

@includeif("layout.header",["home"=>"dashboard"])
<div class="flex-center position-ref full-height">
<div class="content">
    <div style="text-align: center;">
       <h1>This is About Page</h1>
       <a href="{{url('/blog')}}">Blog</a>
       <a href="{{route('dk')}}">Make</a>
       <a href="{{url('/contact')}}">Contact</a>
    </div>
@php
	
for($i=0; $i<20; $i++)
{
echo $r = rand(10,20);
}

@endphp
</div>
</div>
@endsection
