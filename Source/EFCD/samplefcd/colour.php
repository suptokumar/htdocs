          <?php 
          session_start();
error_reporting(0);
$db = new SQLite3('./api/.db.db');
  $db->busyTimeout(5000);

          if (isset($_POST['aa'])) {
            $color =$_POST['aa'];
    
$rows = $db->query("SELECT Count(*),id FROM colour WHERE user='".$_SESSION['loggedin']."'");
$m = $rows->fetchArray();
if ($m['Count(*)']==0) {
        $db->exec("INSERT INTO colour(colour,user) VALUES('$color','".$_SESSION['loggedin']."')");
}else{
        $db->exec("UPDATE colour SET colour='$color' WHERE user='".$_SESSION['loggedin']."'");
}
  $msgee ='<div class="alert alert-primary" id="flash-msg"><h4><i class="icon fa fa-check"></i>Theme Updated!</h4></div>';
?>
<?php
          }

          $rows = $db->query("SELECT Count(*),colour FROM colour WHERE user='".$_SESSION['loggedin']."'");
$m = $rows->fetchArray();
if ($m['Count(*)']==0) {
  $m['colour']=5;
}
$db->close();
unset($db);
           ?>
<?php
include ('includes/header.php');

?>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ULTRA FCD PANEL</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-11.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
</head> 
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
<div><h5 class="m-0 text-primary">Ultra FCD<br>SKY FCD </br></h5></div>

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
          <h1 class="h3 mb-1 text-gray-800">Colour Changes</h1>
           <?php

             echo $msgee;
            ?>

          <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-12">

              <!-- Custom codes -->
                <div class="card border-left-primary shadow h-100 card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-paintbrush"></i> Colours</h6>
                </div>
                <div class="card-body">            

                            <form method="post">
							<div class="form-group ">
                            <label class="control-label requiredField" for="aa" >
                            <strong> Pick Your Colour</strong>
                            </label>
                            <?php function get_color($a, $b){
                              if ($a==$b) {
                                echo "selected";
                              }
                            } ?>
                            <select class="select form-control text-primary" id="select" name="aa">
<option <?php get_color($m['colour'],"1") ?> value="1">Purple</option>
<option <?php get_color($m['colour'],"2") ?> value="2">Blue</option>
<option <?php get_color($m['colour'],"3") ?> value="3">Red</option>
<option <?php get_color($m['colour'],"4") ?> value="4">Orange</option>
<option <?php get_color($m['colour'],"13") ?> value="13">Yellow</option>
<option <?php get_color($m['colour'],"5") ?> value="5" >Green</option>
<option <?php get_color($m['colour'],"6") ?> value="6">Teal</option>
<option <?php get_color($m['colour'],"7") ?> value="7">Cyan</option>
<option <?php get_color($m['colour'],"8") ?> value="8">Gray</option>
<option <?php get_color($m['colour'],"9") ?> value="9">Dark-Gray</option>
<option <?php get_color($m['colour'],"14") ?> value="14">Black</option>
<option <?php get_color($m['colour'],"15") ?> value="15">Dark Gray - With Black</option>
<option <?php get_color($m['colour'],"11") ?> value="11">Purple-Black</option>
<option <?php get_color($m['colour'],"12") ?> value="12">Black-Gray</option>
                            </select>
							</div>
                        <button class="btn btn-success btn-icon-split" name="submit" type="submit">
                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Submit</span>
                        </button>
              </div>
            </div>
            </div>
            </div>
            </div>

    <br><br><br></div>
