@extends("layout.app")
@section("title","Users | School management software")
@section("active","users")
@section("content")
<style>
.page-content .grid > article{
  grid-column: 1 / -1 !important;
    margin-top: 60px;
flex-direction: column;
}
</style>
 <article>


<div class="card bg-light" style=" margin: 10px auto; width: 70%">
	<h3 style="text-align: center; margin: 10px">Create User</h3>
<article class="card-body mx-auto" style="max-width: 400px;">
	<form action="{{ url('/register') }}" method="POST">
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


		@csrf
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" value="{{ old("name") }}" type="text">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" value="{{ old("email") }}" type="email">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="phone" class="form-control" placeholder="Phone number" value="{{ old("phone") }}" type="text">
    	@if ($errors->has('phone'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" name="type" required="">
			<option selected="">Select User type</option>
			<option value="1">Teacher</option>
			<option value="2">Student</option>
			<option value="3">Admin</option>
		</select>
		@if ($errors->has('type'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('type') }}</strong>
            </span>
        @endif
	</div> <!-- form-group end.// -->

    <div class="form-group input-group" style="position: relative;">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
    </div>
      <input name="timezone" class="form-control" required="" autocomplete="off" id="doneontimezone" placeholder="Your timezone" value="{{ old("timezone") }}" type="text">
      @if ($errors->has('timezone'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('timezone') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->   
    <style>
        #doneontimezoneautocomplete-list {
            margin-top: 38px;
        }
    </style>
        <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
    </div>
    <select class="form-control" name="country" required="">
      <option selected="">Select Your Country</option>
      @php
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
foreach ($countries as $country) {
  echo '<option value="'.$country.'">'.$country.'</option>';
}
      @endphp
    </select>
    @if ($errors->has('country'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('country') }}</strong>
            </span>
        @endif
  </div> <!-- form-group end.// --> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create password" type="password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong id="emailHelp" class="text-danger">{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->                             
    <div class="form-group">
    	<input type="hidden" name="refil" value="1">
        <button type="submit" class="btn btn-primary btn-block"> Create User  </button>
    </div> <!-- form-group// -->      
</form>
</article>
</div> <!-- card.// -->



<div class="search" style="width: 100%; padding: 2%; overflow: hidden">
	<div class="rk" style="float: right; align-items: center;">
		Search <input type="search" id="snod410" autocomplete="off" onkeyup="load_users(1)" style="padding: 10px; border: 1px solid #ccc; outline: none;" placeholder="Search">
	</div>
	<div class="dk">
	<select name="d1s" id="select_410" onchange="load_users(1)" style="padding: 10px">
		<option value="0">Student and Teacher</option>
		<option value="1">Student Only</option>
		<option value="2">Teacher Only</option>
	</select>
	<input type="hidden" id="token" value="{{ csrf_token() }}">
	</div>
</div>
<div class="all_users" style="width: 100%">
	
</div>

 </article>
@endsection

@section("script")
<script src="{{ asset('/public/js/admin.js?') }}"></script>
<script>
	$(document).ready(function() {
		load_users(1);
	});
    autocomplete(document.querySelector("#doneontimezone"),@php
    echo json_encode(timezone_identifiers_list());
  @endphp);

</script>
@endsection