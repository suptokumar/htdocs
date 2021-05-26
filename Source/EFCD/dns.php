<?php


include ('includes/header.php');
?>



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirm</h2>
            </div>
            <div class="modal-body">
                Do you really want to delete this Server?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<main role="main" class="col-15 pt-4 px-5"><div class="row justify-text-center"><div class="chartjs-size-monitor" style="position:absolute ; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div id="main">
            

          <!-- Page Heading -->
          <h1 class=" h3 mb-1 text-gray-800"> DNS Manager</h1>
                        <a button class="btn btn-success btn-icon-split" id="button" href="./create_dns.php">
                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Create</span>
                        </button></a>
          </div>
		<div class="table-responsive">
			<table class="table table-striped table-sm">
			<thead class= "text-primary">
				<tr>
				<th>Name</th>
				<th>URL</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				
			</table>
		</div>
</main>

    <br><br><br></div>



      <!-- Footer -->
      <footer class="">
        <div class="container">
          <div class="copyright text-center my-auto">
             <span><a href="https://t.me/Eggzie00" target="_blank">&#169; Eggzie Panels - Ultra FCD </a> <a href="https://t.me/Eggzie00/" target="_blank"> // Designed by Eggzie00</a></span>
          </div>
        </div>
      </footer>      <!-- End of Footer -->