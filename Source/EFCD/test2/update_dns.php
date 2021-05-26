<?php

$db = new SQLite3("./api/.db.db");
$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Servers Updated!</h4></div>";
$mess = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>DNS Deleted!</h4></div>";
$res = $db->query("SELECT * \r\n\t\t\t\t  FROM dns \r\n\t\t\t\t  WHERE id='" . $_GET["update"] . "'");
while ($row = $res->fetchArray()) {
    $id = $row["id"];
    $b = $row["url"];
}
if (isset($_POST["submit"])) {
    $db->exec("UPDATE dns SET url='" . $_POST["b"] . "'\r\n\t\t\t\t\t\t  WHERE \r\n\t\t\t\t\t\t\t  id='" . $_POST["id"] . "'");
    header("Location: dns.php?m=" . $message);
}
include "includes/header.php";
?>

<!DOCTYPE html>
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
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

 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800"> DNS Management</h1>

              <!-- Custom codes -->
                <div class="card border-left-primary shadow h-100 card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-android"></i> Edit DNS</h6>
                </div>
                <div class="card-body">
                        <form method="post">
                        <div class="form control">
                                    <label class="control-label " for="a"><strong>
                                        Name</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-primary" id="a" name="a"  value="" type="text"/>
<input class="hidden" id="id" name="id"  value="" type="text"/>
                                    </div></br>
                                    
                                <div class="form-group ">
                                    <label class="control-label " for="b">
                                        <strong>URL</strong>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-primary" name="b"  id="b" value=""> 
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">
                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>
                        </button>
                                    </div>

                                </div>
                            </form>
                </div>
              </div>
            </div>            </div><div>

<?php
include "includes/footer.php";
echo "</body>\n";

?>