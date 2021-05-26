<?php

$db = new SQLite3("./api/.db.db");
if (isset($_POST["submit"])) {
    $db->exec("INSERT INTO dns(url) VALUES('" . $_POST["b"] . "')");
    header("Location: dns.php");
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
          <h1 class="h3 mb-1 text-gray-800">DNS Manager</h1>
         
          <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-12">

              <!-- Custom codes -->
                <div class="card border-left-primary shadow h-100 card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-server"></i> Add DNS</h6>
                </div>
            <div class="card-body">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="a">
                                        <strong>Name</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-primary" id="a" name="a" placeholder="Name" type="text"/>
                                    </div>
                                    </div>
                                <div class="form-group ">
                                    <label class="control-label " for="b">
                                        <strong>URL</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-primary" id="b" name="b" placeholder="http://myappdownload.apk" type="text"/>
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
                </div>
        </div>
    </div>
    <br><br><br></div>
<?php
include "includes/footer.php";
echo "      </body>\n";

?>