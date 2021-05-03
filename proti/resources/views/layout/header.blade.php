<style>
.top_nav a.{{$home}}{
	background: #1e4478;
}
</style>
<div class="fulll_stak_menu">
	<div class="partision">
		<h2 onclick="openNav();" style="cursor: pointer; user-select: none;"><span class="fa fa-bars"></span><img src="{{ asset('public/img/fev.png') }}" alt="" style="height:40px"></h2>
		
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
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{url("/")}}">Home</a>
  <a href="{{url("/add_member")}}">Add Member</a>
  <a href="{{url("/add_month")}}">Add Monthly Fees</a>
  <a href="{{url("/user_payment")}}">User Payment</a>
  <a href="{{url("/external")}}">External Fees</a>
  <a href="{{url("/expense")}}">Expense</a>
  <a href="{{url("/reports")}}">Reports</a>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</div>
</div>