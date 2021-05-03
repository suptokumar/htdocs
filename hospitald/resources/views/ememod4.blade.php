<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>this is boostrap tutorial</title>
    <link rel="stylesheet" href="{{ asset('/public/vendor/bootstrap.min.css') }}">
	<style>

	</style>
</head>
<body style="padding: 20px;">


	



			<div class="row" style="">

				<div class="col-6 col-lg-6" style="background: #ddd;">

					<center><strong style="font-size: 17px">Bengal Community Hospital & Diagnostic Centre & Ullapara Diabetic Center</strong><br>JOMIDERBARI, Ullapara, Sirajganj<br><strong>Phone:01715-503424</strong></center>



				</div>


				<div class="col-6 col-lg-6" style="background: #ddd;">

					<center><strong style="font-size: 17px">Bengal Community Hospital & Diagnostic Centre & Ullapara Diabetic Center</strong><br>JOMIDERBARI, Ullapara, Sirajganj<br><strong>Phone:01715-503424</strong></center>


				</div>


			</div>	



			<div class="row mt-1">

				<div class="col-6 col-lg-6">
					<div class="row">
						<div class="col-4" style="background: #ddd;">Patient Copy</div>
						<div class="col-8">Date: @php
							echo date("Y/m/d, h:ia")
						@endphp</div>

					</div>


				</div>

				<div class="col-6 col-lg-6">
					<div class="row">
						<div class="col-4" style="background: #ddd;">Hospital Copy</div>
						<div class="col-8">Date: @php
							echo date("Y/m/d, h:ia")
						@endphp</div>

					</div>


				</div>
			</div>



			<div class="row" style="text-align: center; font-weight: bold;">
				<div class="col-6" style="border: 1px solid #ddd;">Patient Details</div>
				<div class="col-6" style="border: 1px solid #ddd;">Patient Details</div>
			</div>

			<div class="row mt-1">
					
				<div class="col-6" style="border: 1px solid #ddd;">
				<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-5">Reg No : </div>
						<div class="col-7"> {{$user->id}}</div>
					</div>
					<div class="row">
						<div class="col-5">Patient Name : </div>
						<div class="col-7"> {{$user->name}}</div>
					</div>
					<div class="row">
						<div class="col-5">Patient Age : </div>
						<div class="col-7"> {{$user->age}}</div>
					</div>
				</div>
				<div class="col-sm-6" style="border-left: 1px solid #ccc">
					<div class="row">
						<div class="col-5">Patient Sex : </div>
						<div class="col-7"> {{$user->gender}}</div>
					</div>
					<div class="row">
						<div class="col-5">Consultant : </div>
						<div class="col-7"> {{$user->consultant}}</div>
					</div>
					<div class="row">
						<div class="col-5">Reffered By : </div>
						<div class="col-7"> {{$user->reffered}}</div>
					</div>
					<div class="row">
						<div class="col-5">Contact No : </div>
						<div class="col-7"> {{$user->contact}}</div>
					</div>
					</div>
					</div>

					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<th>SL</th>
									<th>Test Name</th>
									<th>Test Amount</th>
								</tr>
	@php
									$i =  1;
									$rates = 0;
									$total = 0;
									$paid = 0;
									$discount = 0;
								@endphp
								@foreach ($testst as $tests)

								@php
									$j = 0;
									$total += $tests->test_total;
									$paid += $tests->test_paid;
									$discount += $tests->test_discount;
									$name = explode('```', $tests->test_name);
									$rate = explode(',', $tests->test_amount);
								@endphp
								@foreach ($name as $key => $n)
								@php
									if($j==0){
										$j=1;
										continue;
									}
								@endphp
								<tr>
									<td>{{$i++}}</td>
									<td>{{$n}}</td>
									<td>{{$rate[$key]}} Taka</td>
									@php
										$rates+=$rate[$key];
									@endphp
								</tr>
								@endforeach
								@endforeach
								<tr>
									<td colspan="2">Total</td>
									<td>{{$rates}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Discount</td>
									<td>{{$discount}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Total</td>
									<td>{{$total}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Paid</td>
									<td>{{$paid}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Due</td>
									<td>{{$total-$paid}} Taka</td>
								</tr>
							</thead>
						</table>
					</div>

				</div>
				<style>
					

					
.table td{
  padding: 5px !important;
  font-size: 15px;
  font-weight: normal;
}

.col-6, .col-lg-5 {
  max-width: 49% !important;
  margin-right: 1%;
}
.col-2{
  max-width: 10px !important;
}	
.col-sm-6{
	font-size: 13px;
}					</style>
				<div class="col-6" style="border: 1px solid #ddd;">
				<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-5">Reg No : </div>
						<div class="col-7"> {{$user->id}}</div>
					</div>
					<div class="row">
						<div class="col-5">Patient Name : </div>
						<div class="col-7"> {{$user->name}}</div>
					</div>
					<div class="row">
						<div class="col-5">Patient Age : </div>
						<div class="col-7"> {{$user->age}}</div>
					</div>
				</div>
				<div class="col-sm-6" style="border-left: 1px solid #ccc">
					<div class="row">
						<div class="col-5">Patient Sex : </div>
						<div class="col-7"> {{$user->gender}}</div>
					</div>
					<div class="row">
						<div class="col-5">Consultant : </div>
						<div class="col-7"> {{$user->consultant}}</div>
					</div>
					<div class="row">
						<div class="col-5">Reffered By : </div>
						<div class="col-7"> {{$user->reffered}}</div>
					</div>
					<div class="row">
						<div class="col-5">Contact No : </div>
						<div class="col-7"> {{$user->contact}}</div>
					</div>
					</div>
					</div>
										<div class="row">
						<table class="table">
							<thead>
								<tr>
									<th>SL</th>
									<th>Test Name</th>
									<th>Test Amount</th>
								</tr>
								@php
									$i =  1;
									$rates = 0;
									$total = 0;
									$paid = 0;
									$discount = 0;
								@endphp
								@foreach ($testst as $tests)

								@php
									$j = 0;
									$total += $tests->test_total;
									$paid += $tests->test_paid;
									$discount += $tests->test_discount;
									$name = explode('```', $tests->test_name);
									$rate = explode(',', $tests->test_amount);
								@endphp
								@foreach ($name as $key => $n)
								@php
									if($j==0){
										$j=1;
										continue;
									}
								@endphp
								<tr>
									<td>{{$i++}}</td>
									<td>{{$n}}</td>
									<td>{{$rate[$key]}} Taka</td>
									@php
										$rates+=$rate[$key];
									@endphp
								</tr>
								@endforeach
								@endforeach
								<tr>
									<td colspan="2">Total</td>
									<td>{{$rates}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Discount</td>
									<td>{{$discount}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Total</td>
									<td>{{$total}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Paid</td>
									<td>{{$paid}} Taka</td>
								</tr>
								<tr>
									<td colspan="2">Due</td>
									<td>{{$total-$paid}} Taka</td>
								</tr>
							</thead>
						</table>
					</div>
			</div>
</body>
</html>
