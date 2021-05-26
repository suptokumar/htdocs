<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header("location:"."index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<meta name="google" content="notranslate">
	<script type="text/javascript" nonce="548cb46794844282a72d0147409" src="//local.adguard.org?ts=1613264720985&amp;type=content-script&amp;dmn=theprogram.xyz&amp;app=com.google.Chrome&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0"></script>
<script type="text/javascript" nonce="548cb46794844282a72d0147409" src="//local.adguard.org?ts=1613264720985&amp;name=AdGuard%20Extra&amp;type=user-script"></script><script src="https://kit.fontawesome.com/3794d2f89f.js" crossorigin="anonymous"></script>
  <title>Eso v4</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Custom styles for this template-->
  <?php 
  $db = new SQLite3('./api/.db.db');

$rows = $db->query("SELECT Count(*),colour FROM colour WHERE user='".$_SESSION['loggedin']."'");
$m = $rows->fetchArray();
print_r($m);
if ($m['Count(*)']==0) {
        ?>
  <link href="css/sb-admin-5.css" rel="stylesheet">

        <?php
}else{
        ?>

  <link href="css/sb-admin-<?php echo $m['colour'] ?>.css" rel="stylesheet">
        <?php
}
   ?>
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Material Dashboard CSS -->

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="colour.php">
        <div class="sidebar-brand d-flex align-items-center justify-content-center">
          <img class="img-profile" style="width:48%" src="./img/logo.png">
        </div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item -->
      <li class="nav-item">
      <a class="nav-link" href="control.php" >
          <i class="fas fa-fw fa-address-card"></i>
          <span> General Control</span></a>
      </li>
      <li class="nav-item">
              <a class="nav-link" href="laf.php" >
          <i class="fas fa-fw fa fa-wrench"></i>
          <span> Look and Feel</span></a>
      </li>
			<li class="nav-item">
              <a class="nav-link" href="addons.php" >
          <i class="fas fa-fw  fa-cogs"></i>
          <span> In-app Addons</span></a>
      </li>
			<li class="nav-item">
		<a class="nav-link" href="store.php">
				<i class="fas fa-fw fa-user"></i>
				<span> Store Config</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="rss.php">
				<i class="fas fa-fw fa fa-sign-out"></i>
				<span>RSS Feed</span></a>
      </li>
      <li class="nav-item">
			<a class="nav-link" href="user_update.php">
				<i class="fas fa-fw fa fa-sign-out"></i>
				<span>Update credentials</span></a>
      </li>
      <li class="nav-item">
			<a class="nav-link" href="logout.php">
				<i class="fas fa-fw fa fa-sign-out"></i>
				<span>Logout</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
