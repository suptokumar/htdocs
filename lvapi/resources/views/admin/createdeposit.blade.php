@extends("layout.app")
@section("title","Admin Portal")
@section("active","deposit")
@section("content")
<article>
<header style="overflow: hidden;">

    <a href="{{ url('/admin/deposit') }}" class="btn btn-info float-left">Deposit List</a>

</header>
<section class="gateway_view">
  <form action="{{ url('/admin/createapi/adddeposit') }}" method="POST" enctype="multipart/form-data">

<br>
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

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">User Name <span class="red">*</span></label>
      <select type="text" class="form-control" name="username" onchange="createpas(this.value);" id="username" required="" placeholder="eg: Alex">
      	<option value="">--SELECT--</option>
      	@foreach ($users as $user)
        	<option value="{{$user->phone}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone <span class="red">*</span></label>
      <input type="text" class="form-control" name="phone" required="" id="phone" placeholder="eg: +7777777777">
    </div>
  </div>
  <div class="row">
{{--    <div class="form-group col-md-6">
      <label for="idm">Select Id <span class="red">*</span></label>
	<select type="text" class="form-control" name="idm" id="idm" required="">
      	<option value="">SELECT</option>
    </select>    
  </div>
  <div class="form-group col-md-6">
      <label for="exchange">Select Exchange <span class="red">*</span></label>
	<select type="text" class="form-control" name="exchange" id="exchange" required="">
      	<option value="">SELECT</option>
      </select>    
  </div>
 --}}
  <div class="form-group col-md-6">
      <label for="gateway">Select Gateway <span class="red">*</span></label>
	<select type="text" class="form-control" name="gateway" id="gateway" required="">
      	@foreach ($gateway as $g)
        	<option value="{{$g->name}}">{{$g->name}}</option>
        @endforeach
      </select>
      <br>
      <label for="amount">Amount <span class="red">*</span></label>
      <br>
      <input type="number" class="form-control" name="amount" required="" id="amount">
          <label for="currency">Select Currency <span class="red">*</span></label>
	<select type="text" class="form-control" name="currency" id="currency" required="">
		@php
			$cur = array (
            'ALL' => 'Albania Lek',
            'AFN' => 'Afghanistan Afghani',
            'ARS' => 'Argentina Peso',
            'AWG' => 'Aruba Guilder',
            'AUD' => 'Australia Dollar',
            'AZN' => 'Azerbaijan New Manat',
            'BSD' => 'Bahamas Dollar',
            'BBD' => 'Barbados Dollar',
            'BDT' => 'Bangladeshi taka',
            'BYR' => 'Belarus Ruble',
            'BZD' => 'Belize Dollar',
            'BMD' => 'Bermuda Dollar',
            'BOB' => 'Bolivia Boliviano',
            'BAM' => 'Bosnia and Herzegovina Convertible Marka',
            'BWP' => 'Botswana Pula',
            'BGN' => 'Bulgaria Lev',
            'BRL' => 'Brazil Real',
            'BND' => 'Brunei Darussalam Dollar',
            'KHR' => 'Cambodia Riel',
            'CAD' => 'Canada Dollar',
            'KYD' => 'Cayman Islands Dollar',
            'CLP' => 'Chile Peso',
            'CNY' => 'China Yuan Renminbi',
            'COP' => 'Colombia Peso',
            'CRC' => 'Costa Rica Colon',
            'HRK' => 'Croatia Kuna',
            'CUP' => 'Cuba Peso',
            'CZK' => 'Czech Republic Koruna',
            'DKK' => 'Denmark Krone',
            'DOP' => 'Dominican Republic Peso',
            'XCD' => 'East Caribbean Dollar',
            'EGP' => 'Egypt Pound',
            'SVC' => 'El Salvador Colon',
            'EEK' => 'Estonia Kroon',
            'EUR' => 'Euro Member Countries',
            'FKP' => 'Falkland Islands (Malvinas) Pound',
            'FJD' => 'Fiji Dollar',
            'GHC' => 'Ghana Cedis',
            'GIP' => 'Gibraltar Pound',
            'GTQ' => 'Guatemala Quetzal',
            'GGP' => 'Guernsey Pound',
            'GYD' => 'Guyana Dollar',
            'HNL' => 'Honduras Lempira',
            'HKD' => 'Hong Kong Dollar',
            'HUF' => 'Hungary Forint',
            'ISK' => 'Iceland Krona',
            'INR' => 'India Rupee',
            'IDR' => 'Indonesia Rupiah',
            'IRR' => 'Iran Rial',
            'IMP' => 'Isle of Man Pound',
            'ILS' => 'Israel Shekel',
            'JMD' => 'Jamaica Dollar',
            'JPY' => 'Japan Yen',
            'JEP' => 'Jersey Pound',
            'KZT' => 'Kazakhstan Tenge',
            'KPW' => 'Korea (North) Won',
            'KRW' => 'Korea (South) Won',
            'KGS' => 'Kyrgyzstan Som',
            'LAK' => 'Laos Kip',
            'LVL' => 'Latvia Lat',
            'LBP' => 'Lebanon Pound',
            'LRD' => 'Liberia Dollar',
            'LTL' => 'Lithuania Litas',
            'MKD' => 'Macedonia Denar',
            'MYR' => 'Malaysia Ringgit',
            'MUR' => 'Mauritius Rupee',
            'MXN' => 'Mexico Peso',
            'MNT' => 'Mongolia Tughrik',
            'MZN' => 'Mozambique Metical',
            'NAD' => 'Namibia Dollar',
            'NPR' => 'Nepal Rupee',
            'ANG' => 'Netherlands Antilles Guilder',
            'NZD' => 'New Zealand Dollar',
            'NIO' => 'Nicaragua Cordoba',
            'NGN' => 'Nigeria Naira',
            'NOK' => 'Norway Krone',
            'OMR' => 'Oman Rial',
            'PKR' => 'Pakistan Rupee',
            'PAB' => 'Panama Balboa',
            'PYG' => 'Paraguay Guarani',
            'PEN' => 'Peru Nuevo Sol',
            'PHP' => 'Philippines Peso',
            'PLN' => 'Poland Zloty',
            'QAR' => 'Qatar Riyal',
            'RON' => 'Romania New Leu',
            'RUB' => 'Russia Ruble',
            'SHP' => 'Saint Helena Pound',
            'SAR' => 'Saudi Arabia Riyal',
            'RSD' => 'Serbia Dinar',
            'SCR' => 'Seychelles Rupee',
            'SGD' => 'Singapore Dollar',
            'SBD' => 'Solomon Islands Dollar',
            'SOS' => 'Somalia Shilling',
            'ZAR' => 'South Africa Rand',
            'LKR' => 'Sri Lanka Rupee',
            'SEK' => 'Sweden Krona',
            'CHF' => 'Switzerland Franc',
            'SRD' => 'Suriname Dollar',
            'SYP' => 'Syria Pound',
            'TWD' => 'Taiwan New Dollar',
            'THB' => 'Thailand Baht',
            'TTD' => 'Trinidad and Tobago Dollar',
            'TRY' => 'Turkey Lira',
            'TRL' => 'Turkey Lira',
            'TVD' => 'Tuvalu Dollar',
            'UAH' => 'Ukraine Hryvna',
            'GBP' => 'United Kingdom Pound',
            'USD' => 'United States Dollar',
            'UYU' => 'Uruguay Peso',
            'UZS' => 'Uzbekistan Som',
            'VEF' => 'Venezuela Bolivar',
            'VND' => 'Viet Nam Dong',
            'YER' => 'Yemen Rial',
            'ZWD' => 'Zimbabwe Dollar'
        );
		@endphp
      	@foreach ($cur as $k => $g)
        	<option value="{{$k}}" @if ($k=="INR")
        		{{"selected"}}
        	@endif>{{$k}}</option>
        @endforeach
      </select>
  </div>

    <div class="form-group col-md-6">
      <label for="icon">Screenshot<br>
      <img src="{{ url('/public/logo/index.png') }}" id="blah" alt="Default Image" style="width: 150px; height: 135px; border-radius: 10px;"></label>
      <input type="file" class="form-control" style="display: none;" name="screenshot" id="icon" placeholder="eg: Icon">
    </div>
  </div>
  <div class="cpnel">
    
  </div>
  <br>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Create Deposit</button>
  </div>
</form>
</section>
</article>
@endsection
@section("script")
<script>
  $(function(){

    $('#asdfeea').multiselect({

    // allows HTML content
    enableHTML: false,
       // CSS class of the multiselect button
    buttonClass: 'custom-select'
  });
    $('#awet').multiselect({

    // allows HTML content
    enableHTML: false,
       // CSS class of the multiselect button
    buttonClass: 'custom-select'
  });

  });
</script>
<style>
.page-content .grid > article:first-child {
    grid-column: 1 / -1;
    display: block;
}
.multiselect-native-select {
    width: 100%;
    display: block;
}
.form-check-label{
  color: black;
}
.btn-group, .btn-group-vertical{
  display: block !important;
}
.multiselect-container{
  width: 100%;
}
.custom-select{
  background: #242222 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
  color: #90979d;
}
</style>
<script>
  let imgInp = document.getElementById('icon');
  let blah = document.getElementById('blah');
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
<script>
function accept(id,th){
  if (confirm("Accept?")) {
    $.ajax({
      url: '{{ url('/admin/acceptreader') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(th).html(data);
    });
    
  }
}
function deletes(id,th){
  if (confirm("Delete?")) {
    $.ajax({
      url: '{{ url('/admin/deletesreader') }}',
      type: 'POST',
      data: {id: id,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
      $(th).html(data);
    });
    
  }
}
function createpas(v){
    $.ajax({
      url: '{{ url('/admin/phoneid') }}',
      type: 'POST',
      data: {id: v,_token:"{{csrf_token()}}"},
    })
    .done(function(data) {
    	data = JSON.parse(data);
      $("#phone").val(data[0]);
      $("#idm").html(data[1]);
      $("#exchange").html(data[2]);
    });
    
  }

</script>
@endsection