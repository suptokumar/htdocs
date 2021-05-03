@extends('layout.app')
@section('title','Home Page')
@section('content')
@includeif("layout.header",["home"=>"home"])
<div class="content">
    <div class="port">
    	<div class="rows">
    		<div class="header">Total Collection</div>
    		<h3 class="Answer">৳ {{$total_col}}</h3>
    	</div>
    	<div class="rows">
    		<div class="header">Todays Collection</div>
    		<h3 class="Answer">৳ {{$today_col}}</h3>
    	</div>
        <div class="rows">
            <div class="header">Total Due</div>
            <h3 class="Answer">৳ {{$total_due}}</h3>
        </div>
        <div class="rows">
            <div class="header">Due of @php
                echo date("M")
            @endphp</div>
            <h3 class="Answer">৳ {{$mon_due}}</h3>
        </div>
    	<div class="rows">
    		<div class="header">Total Expense</div>
    		<h3 class="Answer">৳ 0</h3>
    	</div>
    	<div class="rows">
    		<div class="header">Todays Expense</div>
    		<h3 class="Answer">৳ 0</h3>
    	</div>
    	<div class="rows">
    		<div class="header">Collection of @php
    			echo date("M");
    		@endphp</div>
    		<h3 class="Answer">৳ 0</h3>
    	</div>
    	<div class="rows">
    		<div class="header">Expense of @php
    			echo date("M");
    		@endphp</div>
    		<h3 class="Answer">৳ 0</h3>
    	</div>
    	<div class="rows">
    		<div class="header">Total Members</div>
    		<h3 class="Answer">{{$member}}</h3>
    	</div>
    	<div class="rows">
    		<div class="header">External Fees of @php
    			echo date("M");
    		@endphp</div>
    		<h3 class="Answer">৳ 0</h3>
    	</div>

    </div>
</div>
@endsection