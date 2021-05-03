@extends('layout.app')
@section('title','Home Page')
@section('content')
@includeif("layout.header",["home"=>"home"])
<div class="content">
<style>
	
.login_blade .card {
	margin: 26% 6% 27% -3%;
	box-shadow: 1px 1px 1px 1px #000;
}
.login_blade .card form{
	padding: 0% 10% 3% 4%;
}
body {
	background:url('{{asset('/public/')}}../img/ap.jpg') 45% 44% / 183% fixed;
}
.page-header {
    padding-bottom: 2px;
    margin: 3px 0 20px;
    border-bottom: 1px solid #eee;
}
</style>
<div class="login_blade container">
	<div class="card-group">
  <div class="card" style="background: #f8f8f8EE; order: {{$register[0]}}">
    	<div class="page-header">
    		<h3 class="text-center">{{__('Login')}}</h3>
    	</div>
		@if($message = Session::get('error'))
	    <div class="alert alert-danger" role="alert">{{$message}}</div>
	    @endif
	    @if($errors->any())
{{-- 		@foreach ($errors->all() as $error)
		<div class="alert alert-danger" role="alert">{{ $error }}</div>
		@endforeach --}}
		@endif


@if ($new_account = session('new_account'))
			@if ($new_account[0]==0)
	    <div class="alert alert-success" role="alert">{{$new_account[2]}}</div>
			@endif
    	@endif



		@if (isset($new_account))
			@if ($new_account[0]==1)
	    <div class="alert alert-success" role="alert">{{$new_account[1]}}</div>
			@endif
		@endif
		<form action="{{url('login')}}" method="POST">
			@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">{{ __('Email or phone number')}}</label>
		    <input type="text" class="form-control {{ $errors->has('Email_or_Phone_number') ? ' is-invalid' : '' }}" name="Email_or_Phone_number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('Email or phone number')}}">
		    {{-- <small id="emailHelp" class="text-danger">We'll never share your email with anyone else.</small> --}}
		@if ($errors->has('Email_or_Phone_number'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('Email_or_Phone_number') }}</strong>
            </span>
        @endif

		  </div>
		  @if($redirect = Session::get('redirect'))
		  <input type="hidden" name="redirect" value="{{$redirect}}">
		  @else
		  <input type="hidden" name="redirect" value="">
		  @endif

		  <div class="form-group">
		    <label for="exampleInputPassword1">{{ __('Password')}}</label>
		    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="exampleInputPassword1" placeholder="{{ __('Password')}}">
		    @if ($errors->has('password'))
            <span class="help-block">
                <strong id="passHelp" class="text-danger">{{ $errors->first('password') }}</strong>
            </span>
        @endif
		  </div>
	<div style="overflow: hidden">
		  <button type="submit" class="btn btn-primary float-right">{{__('Login')}}</button>
	</div>
		</form>
	</div>

	</div>
</div>


</div>
@endsection