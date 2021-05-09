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

					<center><strong style="font-size: 17px">Bengal Community Hospital & Diagnostic Centre & Ullapara Diabetic Center</strong><br>JOMIDERBARI, Ullapara, Sirajganj<br><strong>Phone: 01715-503424</strong></center>



				</div>



			</div>	




			<div class="row" style="text-align: center; font-weight: bold;">
				<div class="col-6" style="border: 1px solid #ddd;">
<h5 style="float:right">ID: {{$app->id}}</h5>
<h2>Serial No: {{$app->token}}</h2>
</div>
			</div>

			<div class="row mt-1">
					
				<div class="col-6" style="border: 1px solid #ddd;">
				<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-5">Patient Name : </div>
						<div class="col-7"> {{$app->name}}</div>
					</div>
					<div class="row">
						<div class="col-5">Patient Age : </div>
						<div class="col-7"> {{$app->age}}</div>
					</div>
	<div class="row">
						<div class="col-5">Contact No : </div>
						<div class="col-7"> {{$app->contact}}</div>
					</div>
				</div>
				<div class="col-sm-6" style="border-left: 1px solid #ccc">
					<div class="row">
						<div class="col-5">Patient Sex : </div>
						<div class="col-7"> {{$app->gender}}</div>
					</div>
					<div class="row">
						<div class="col-5">Consultant : </div>
						<div class="col-7"> {{$app->consultant}}</div>
					</div>

				
										<div class="row">
						<div class="col-5">Date : </div>
						<div class="col-7">  @php
							echo date("Y/m/d, h:ia")
						@endphp</div>
					</div>
					</div>
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
			<a href="javascript:void(0)" class="btn btn-info mt-2" onclick="this.style.display='none'; window.print();">Print</a>

</body>
</html>
