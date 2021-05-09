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




			<div class="row">
<div class="col-6">
					<div class="row">
						
				<div class="col-6" style="border: 1px solid #ddd;">
<h3>X-ray</h3>
@php
	$i = 1;
@endphp
@foreach ($a as $row)
	{{$i++}} . {{$row->name}} <br>
@endforeach
				</div>	
				<div class="col-6" style="border: 1px solid #ddd;">
<h3>ULTRA</h3>
@php
	$i = 1;
@endphp
@foreach ($b as $row)
	{{$i++}} . {{$row->name}} <br>
@endforeach
				</div>
					</div>
					<div class="row">
				<div class="col-6" style="border: 1px solid #ddd;">
<h3>ECG</h3>
@php
	$i = 1;
@endphp
@foreach ($c as $row)
	{{$i++}} . {{$row->name}} <br>
@endforeach
				</div>				<div class="col-6" style="border: 1px solid #ddd;">
<h3>Pathology</h3>
@php
	$i = 1;
@endphp
@foreach ($d as $row)
	{{$i++}} . {{$row->name}} <br>
@endforeach
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
</div>
			<a href="javascript:void(0)" class="btn btn-info mt-2" onclick="this.style.display='none'; window.print();">Print</a>

</body>
</html>
