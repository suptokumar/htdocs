<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Infinity</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/vendor/perfect-scrollbar.css">
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        <div class="main-header">
            <div class="logo">
                <img onclick="window.location='{{ url('/dashboard') }}'" src="{{ url('/public/html/src') }}/assets/images/logo.png" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="d-flex align-items-center">
                <!-- Mega menu -->
                <div class="dropdown  d-none d-md-block">
                    <a href="{{ url('/') }}" target="_blank" class="btn text-muted mr-3" >Visit App</a>
{{--                     <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                        <div class="row m-0">
                            <div class="col-md-4 p-4 bg-img">
                                <h2 class="title">Mega Menu <br> Sidebar</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit, consequatur.
                                </p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos dolore suscipit placeat.</p>
                                <button class="btn btn-lg btn-rounded btn-outline-warning">Learn More</button>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Features</p>
                                <div class="menu-icon-grid w-auto p-0">
                                    <a href="#"><i class="i-Shop-4"></i> Home</a>
                                    <a href="#"><i class="i-Library"></i> UI Kits</a>
                                    <a href="#"><i class="i-Drop"></i> Apps</a>
                                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                                    <a href="#"><i class="i-Ambulance"></i> Support</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Components</p>
                                <ul class="links">
                                    <li><a href="accordion.html">Accordion</a></li>
                                    <li><a href="alerts.html">Alerts</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="badges.html">Badges</a></li>
                                    <li><a href="carousel.html">Carousels</a></li>
                                    <li><a href="lists.html">Lists</a></li>
                                    <li><a href="popover.html">Popover</a></li>
                                    <li><a href="tables.html">Tables</a></li>
                                    <li><a href="datatables.html">Datatables</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="nouislider.html">Sliders</a></li>
                                    <li><a href="tabs.html">Tabs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- / Mega menu -->
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->
                <div class="dropdown">
                    <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="menu-icon-grid">
                            <a href="#"><i class="i-Shop-4"></i> Home</a>
                            <a href="#"><i class="i-Library"></i> UI Kits</a>
                            <a href="#"><i class="i-Drop"></i> Apps</a>
                            <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                            <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                            <a href="#"><i class="i-Ambulance"></i> Support</a>
                        </div>
                    </div>
                </div>
                <!-- Notificaiton -->
                <div class="dropdown">
                    <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-primary">3</span>
                        <i class="i-Bell text-muted header-icon"></i>
                    </div>
                    <!-- Notification dropdown -->
                    <div class="dropdown-menu dropdown-menu-right rtl-ps-none notification-dropdown" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>New message</span>
                                    <span class="badge badge-pill badge-primary ml-1 mr-1">new</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">10 sec ago</span>
                                </p>
                                <p class="text-small text-muted m-0">James: Hey! are you busy?</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Receipt-3 text-success mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>New order received</span>
                                    <span class="badge badge-pill badge-success ml-1 mr-1">new</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">2 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">1 Headphone, 3 iPhone x</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Empty-Box text-danger mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>Product out of stock</span>
                                    <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">10 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">Headphone E67, R98, XL90, Q77</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Data-Power text-success mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>Server Up!</span>
                                    <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">14 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">Server rebooted successfully</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notificaiton End -->

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user colalign-self-end">
                        <img src="{{ url('/public/html/src') }}/assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{Auth::user()->name}}
                            </div>
                            <a class="dropdown-item" href="{{ url('/settings') }}">Account settings</a>
                            <a class="dropdown-item"  href="{{ url('/logout') }}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
{{--                     <li class="nav-item active" data-item="dashboard">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="uikits">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text">UI kits</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="extrakits">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Suitcase"></i>
                            <span class="nav-text">Extra kits</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="apps">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Computer-Secure"></i>
                            <span class="nav-text">Apps</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="forms">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Forms</span>
                        </a>
                        <div class="triangle"></div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ url('/records') }}">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">Records</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ url('/users') }}">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Users</span>
                        </a>
                        {{-- <div class="triangle"></div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ url('/clouds') }}">
                            <i class="nav-icon i-Data-Cloud"></i>
                            <span class="nav-text">Json Editor</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank">
                            <i class="nav-icon i-Safe-Box1"></i>
                            <span class="nav-text">Doc</span>
                        </a>
                        <div class="triangle"></div>
                    </li> --}}
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                {{-- <ul class="childNav" data-parent="dashboard">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name">Version 1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html" class="open">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name">Version 2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v3.html">
                            <i class="nav-icon i-Over-Time"></i>
                            <span class="item-name">Version 3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v4.html">
                            <i class="nav-icon i-Clock"></i>
                            <span class="item-name">Version 4</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item">
                        <a href="form.basic.html">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Basic Elements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.layouts.html">
                            <i class="nav-icon i-Split-Vertical"></i>
                            <span class="item-name">Form Layouts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.input.group.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Input Groups</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.validation.html">
                            <i class="nav-icon i-Close-Window"></i>
                            <span class="item-name">Form Validation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="smart.wizard.html">
                            <i class="nav-icon i-Width-Window"></i>
                            <span class="item-name">Smart Wizard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Tag-2"></i>
                            <span class="item-name">Tag Input</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="editor.html">
                            <i class="nav-icon i-Pen-2"></i>
                            <span class="item-name">Rich Editor</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item">
                        <a href="invoice.html">
                            <i class="nav-icon i-Add-File"></i>
                            <span class="item-name">Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="inbox.html">
                            <i class="nav-icon i-Email"></i>
                            <span class="item-name">Inbox</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chat.html">
                            <i class="nav-icon i-Speach-Bubble-3"></i>
                            <span class="item-name">Chat</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="extrakits">
                    <li class="nav-item">
                        <a href="image.cropper.html">
                            <i class="nav-icon i-Crop-2"></i>
                            <span class="item-name">Image Cropper</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="loaders.html">
                            <i class="nav-icon i-Loading-3"></i>
                            <span class="item-name">Loaders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ladda.button.html">
                            <i class="nav-icon i-Loading-2"></i>
                            <span class="item-name">Ladda Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="toastr.html">
                            <i class="nav-icon i-Bell"></i>
                            <span class="item-name">Toastr</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sweet.alerts.html">
                            <i class="nav-icon i-Approved-Window"></i>
                            <span class="item-name">Sweet Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tour.html">
                            <i class="nav-icon i-Plane"></i>
                            <span class="item-name">User Tour</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="upload.html">
                            <i class="nav-icon i-Data-Upload"></i>
                            <span class="item-name">Upload</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="uikits">
                    <li class="nav-item">
                        <a href="alerts.html">
                            <i class="nav-icon i-Bell1"></i>
                            <span class="item-name">Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="accordion.html">
                            <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                            <span class="item-name">Accordion</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="badges.html">
                            <i class="nav-icon i-Medal-2"></i>
                            <span class="item-name">Badges</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="buttons.html">
                            <i class="nav-icon i-Cursor-Click"></i>
                            <span class="item-name">Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cards.html">
                            <i class="nav-icon i-Line-Chart-2"></i>
                            <span class="item-name">Cards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="card.metrics.html">
                            <i class="nav-icon i-ID-Card"></i>
                            <span class="item-name">Card Metrics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="carousel.html">
                            <i class="nav-icon i-Video-Photographer"></i>
                            <span class="item-name">Carousels</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lists.html">
                            <i class="nav-icon i-Belt-3"></i>
                            <span class="item-name">Lists</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pagination.html">
                            <i class="nav-icon i-Arrow-Next"></i>
                            <span class="item-name">Paginations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="popover.html">
                            <i class="nav-icon i-Speach-Bubble-2"></i>
                            <span class="item-name">Popover</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="progressbar.html">
                            <i class="nav-icon i-Loading"></i>
                            <span class="item-name">Progressbar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tables.html">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="item-name">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tabs.html">
                            <i class="nav-icon i-New-Tab"></i>
                            <span class="item-name">Tabs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tooltip.html">
                            <i class="nav-icon i-Speach-Bubble-8"></i>
                            <span class="item-name">Tooltip</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="modals.html">
                            <i class="nav-icon i-Duplicate-Window"></i>
                            <span class="item-name">Modals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nouislider.html">
                            <i class="nav-icon i-Width-Window"></i>
                            <span class="item-name">Sliders</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item">
                        <a href="signin.html">
                            <i class="nav-icon i-Checked-User"></i>
                            <span class="item-name">Sign in</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.html">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Sign up</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="forgot.html">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Forgot</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item">
                        <a href="not.found.html">
                            <i class="nav-icon i-Error-404-Window"></i>
                            <span class="item-name">Not Found</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user.profile.html">
                            <i class="nav-icon i-Male"></i>
                            <span class="item-name">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="blank.html">
                            <i class="nav-icon i-File-Horizontal"></i>
                            <span class="item-name">Blank Page</span>
                        </a>
                    </li>
                </ul> --}}
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">

            <div class="breadcrumb">
                <h1 class="mr-2">Infinity</h1>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>Overview</li>
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <!-- CARD ICON -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Data-Upload"></i>
                                    <p class="text-muted mt-2 mb-2">Today's Records</p>
                                    <p class="text-primary text-24 line-height-1 m-0">{{$todays_record}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Add-User"></i>
                                    <p class="text-muted mt-2 mb-2">Total Users</p>
                                    <p class="text-primary text-24 line-height-1 m-0">{{$total_user}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="text-muted mt-2 mb-2">Total Records</p>
                                    <p class="text-primary text-24 line-height-1 m-0">{{$total_record}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="text-muted mt-2 mb-2">Monthly Records</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">{{$montyly_record}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Gear"></i>
                                    <p class="text-muted mt-2 mb-2">Yearly Records</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">{{$yearly_record}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Bell"></i>
                                    <p class="text-muted mt-2 mb-2">Notifications</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body p-0">
                            <h5 class="card-title m-0 p-3">Records By Category</h5>
                            <div id="echart5" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body p-0">
                            <h5 class="card-title m-0 p-3">Records of This Month</h5>
                            <div id="echart4" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

    </div>
    <!-- ============ Search UI End ============= -->

    <script src="{{ url('/public/html/src') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/vendor/echarts.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/vendor/datatables.min.js"></script>

    <script src="{{ url('/public/html/src') }}/assets/js/es5/echart.options.min.js"></script>
    {{-- <script src="{{ url('/public/html/src') }}/assets/js/es5/dashboard.v2.script.min.js"></script> --}}
<script>
    "use strict";
var _extends = Object.assign || function(e) {
    for (var t = 1; t < arguments.length; t++) {
        var o = arguments[t];
        for (var a in o) Object.prototype.hasOwnProperty.call(o, a) && (e[a] = o[a])
    }
    return e
};
$(document).ready(function() {
    $("#user_table").DataTable(), $("#sales_table").DataTable();
    var e = document.getElementById("echart4");
    if (e) {
        var t = echarts.init(e);
        t.setOption(_extends({}, echartOptions.lineNoAxis, {
            series: [{
                data: [{{implode(",",$data)}}],
                lineStyle: {
                    color: "rgba(102, 51, 153, .86)",
                    width: 3,
                    shadowColor: "rgba(0, 0, 0, .2)",
                    shadowOffsetX: -1,
                    shadowOffsetY: 8,
                    shadowBlur: 10
                },
                label: {
                    show: !0,
                    color: "#212121"
                },
                type: "line",
                smooth: !0,
                itemStyle: {
                    borderColor: "rgba(69, 86, 172, 0.86)"
                }
            }]
        }, {
            xAxis: {
                data: [@for ($i = 0; $i < count($date); $i++)
"{{$date[$i]}}"@if ($i!=count($date)-1) , @endif @endfor ]
            }
        })), $(window).on("resize", function() {
            setTimeout(function() {
                t.resize()
            }, 500)
        })
    }
var o = document.getElementById("echart5");
    if (o) {
        var a = echarts.init(o);
        a.setOption(_extends({}, echartOptions.defaultOptions, {
            legend: {
                show: !0,
                bottom: 0
            },
            series: [_extends({
                type: "pie"
            }, echartOptions.pieRing, {
                label: echartOptions.pieLabelCenterHover,
                data: [
                @for ($i = 0; $i < count($category); $i++)
                {
                    name: "{{$category[$i]}}",
                    value: {{$value[$i]}},
                    itemStyle: {
                        color: "#{{rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9)}}"
                    }



                }, 
                @endfor
                ]
            })]
        })), $(window).on("resize", function() {
            setTimeout(function() {
                a.resize()
            }, 500)
        })
    }
});
</script>
    <script src="{{ url('/public/html/src') }}/assets/js/es5/script.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/es5/sidebar.large.script.min.js"></script>
</body>

</html>