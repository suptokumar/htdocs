<?php/

$db = new SQLite3("./api/.db.db");
$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Servers Updated!</h4></div>";
$mess = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>DNS Deleted!</h4></div>";
$db->exec("CREATE TABLE IF NOT EXISTS dns(id INTEGER PRIMARY KEY NOT NULL,url VARCHAR(50))");
$res = $db->query("SELECT * FROM dns");
if (isset($_GET["delete"])) {
    $db->exec("DELETE FROM dns WHERE id=" . $_GET["delete"]);
    header("Location: dns.php?m=" . $mess);
}
include "includes/header.php";

?>

<!DOCTYPE html>
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
<div><h5 class="m-0 text-primary">Ultra FCD</h5></div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Logout -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="logout.php"><span class="badge badge-danger">Logout</span>
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

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
            <tr>
			</tbody>
			<table>
		<div>
<main>

    <br><br><br><div>

<?php
include "includes/footer.php";
echo "    <script>\r\n\$('#confirm-delete').on('show.bs.modal', function(e) {\r\n    \$(this).find('.btn-ok').attr('href', \$(e.relatedTarget).data('href'));\r\n});\r\n    </script>\r\n</body>\r\n\r\n</html>";

?>