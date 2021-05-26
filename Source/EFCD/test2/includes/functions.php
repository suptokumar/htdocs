<center></center>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/jquery.datetimepicker.js"></script>
 
<script>

var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;

$('#datetimepicker').datetimepicker({
	//value:dateTime, 
	step:30,
	format:'Y-m-d H:i:s',
	});
	

$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});

</script>