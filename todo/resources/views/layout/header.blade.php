<style>
.top_nav a.{{$home}}{
	background: #1e4478;
}
</style>
<div class="fulll_stak_menu">
	<div class="partision">
		<img onclick="window.location='{{ url('/') }}'" src="{{ asset('/public/img/todo.PNG') }}" alt="" style="height:66px">
		
	</div>

<div class="partision">
<div class="user_setting">
	<a href="@if(Auth::check())
	{{url('/logout')}}
	@else
	{{url('/login')}}
	@endif"><span class="fa fa-user"></span> <span class="wo">@if(Auth::check())
	{{__('Logout')}}
	@else
	{{__('Login')}}
	@endif</span></a>
</div>
</div>
</div>