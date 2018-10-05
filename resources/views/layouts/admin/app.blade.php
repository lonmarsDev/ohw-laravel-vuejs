<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/admin-assets/img/favicon.png">

     <title>@yield('title', 'OHWO')</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin-assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin-assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/admin-assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/admin-assets/assets/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
      <!--right slidebar-->
      <link href="/admin-assets/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/admin-assets/css/style.css" rel="stylesheet">
    <link href="/admin-assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script  src="/admin-assets/js/html5shiv.js"></script>
      <script  src="/admin-assets/js/respond.min.js"></script>
    <![endif]-->
        @yield('css-assets')
         <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
        <!--logo start-->
        <a href="/admin-assets/index.html" class="logo">OHWO<span>LAR</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="/admin-assets/#">
                      <i class="fa fa-tasks"></i>
                      <span class="badge bg-success">6</span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                     
                  </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="/admin-assets/#">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-important">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                     <!-- <div class="notify-arrow notify-arrow-red"></div>
                      <li>
                          <p class="red">You have 5 new messages</p>
                      </li>
                      <li>
                          <a href="/admin-assets/#">
                              <span class="photo"><img alt="avatar"  src="/admin-assets/./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="/admin-assets/#">
                              <span class="photo"><img alt="avatar"  src="/admin-assets/./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="/admin-assets/#">
                              <span class="photo"><img alt="avatar"  src="/admin-assets/./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="/admin-assets/#">
                              <span class="photo"><img alt="avatar"  src="/admin-assets/./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="/admin-assets/#">See all messages</a>
                      </li>-->
                  </ul>
              </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="/admin-assets/#">

                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-warning">7</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                    
                  </ul>
              </li>
              <!-- notification dropdown end -->
            </ul>
        </div>
        <div class="top-nav ">
          <ul class="nav pull-right top-menu">
              <li>
                  <input type="text" class="form-control search" placeholder="Search">
              </li>
              <!-- user login dropdown start-->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="/admin-assets/#">
                      <img alt=""  src="/admin-assets/img/avatar1_small.jpg">
                      <span class="username">Jhon Doue</span>
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                      <div class="log-arrow-up"></div>
                      <li><a href="/admin-assets/#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                      <li><a href="/admin-assets/#"><i class="fa fa-cog"></i> Settings</a></li>
                      <li><a href="/admin-assets/#"><i class="fa fa-bell-o"></i> Notification</a></li>
                      <li><form action="{{ route('logout') }}" method="POST"> {{ csrf_field() }}<button type="submit" class="btn btn-primary" style="background: transparent;border: none"><i class="fa fa-key"></i> Log Out</button></form></li>
                  </ul>
              </li>
              <!-- user login dropdown end -->
              <li class="sb-toggle-right">
                  <i class="fa  fa-align-right"></i>
              </li>
          </ul>
      </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                 <li>
                      <a class="active"href="{{url('admin/dashboard')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/admin-assets/javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('admin/users')}}">List</a></li>
                          
                          
                      </ul>
                  </li>
                 <li class="sub-menu">
                      <a href="/admin-assets/javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Roles</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('admin/roles')}}">List</a></li>
                        
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="/admin-assets/javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Permissions</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('admin/permissions')}}">List</a></li>
                          
                          
                      </ul>
                  </li>
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content" style="min-height: 850px">
          <section class="wrapper"  id="ohwo">
               @yield('content')
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
     
      <!-- Right Slidebar end -->
      <!--footer start-->
     
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script  src="/admin-assets/js/jquery.js"></script>
    <script  src="/admin-assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript"  src="/admin-assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script  src="/admin-assets/js/jquery.scrollTo.min.js"></script>
    <script  src="/admin-assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script  src="/admin-assets/js/respond.min.js" ></script>

  <!--right slidebar-->
  <script  src="/admin-assets/js/slidebars.min.js"></script>

  <!-- BEGIN:File Upload Plugin JS files-->
  <script  src="/admin-assets/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
  <!-- The Templates plugin is included to render the upload/download listings -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/vendor/tmpl.min.js"></script>
  <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/vendor/load-image.min.js"></script>
  <!-- The Canvas to Blob plugin is included for image resizing functionality -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
  <!-- The basic File Upload plugin -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
  <!-- The File Upload file processing plugin -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/jquery.fileupload-fp.js"></script>
  <!-- The File Upload user interface plugin -->
  <script  src="/admin-assets/assets/jquery-file-upload/js/jquery.fileupload-ui.js"></script>


    <!--common script for all pages-->
    <script  src="/admin-assets/js/common-scripts.js"></script>
     @yield('script-assets')

  </body>
</html>
