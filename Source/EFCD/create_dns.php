<?php

include ('includes/header.php');
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
  <script src="https://kit.fontawesome.com/3794d2f89f.js" crossorigin="anonymous"></script>
  <title>Ultra FCD</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-6.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 

  

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
                                        <input class="form-control text-primary" id="b" name="b" placeholder="http://yourdns.xyz:80" type="text"/>
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
