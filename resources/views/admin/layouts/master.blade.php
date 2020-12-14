<!<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>@yield('title')</title>
   <!-- Favicon-->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   
    <!-- End Datatable -->

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_css/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_css/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">


<!-- for data table -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  
    <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@auth
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                 
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name}}
                  <small>{{ Auth::user()->email_id }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  @if( Auth::user()->role == "teacher")
                  <div class="pull-left">
                  <a href="{{ route('teacher_info.create') }}" class="btn btn-default btn-flat">Profile</a>
                  <a href="{{ route('teacher_info.show', Auth::user()->id) }}" class="btn btn-default btn-flat">View Profile</a>
                </div>
                @else
                 <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                @endif
               
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons"></i>{{ __('Sign out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @php
        $curl=url()->current();
        @endphp
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li @if(strstr($curl,"admin") )
                        class="active"
                        @endif class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if( Auth::user()->role == "admin")

         <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Teacher Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{url('approveteacher')}}"><i class="fa fa-circle-o"></i>Approve Teacher Account</a></li>
            <li> <a href="{{url('addteacher')}}"><i class="fa fa-plus-square"></i> <span>Add Teacher</span>
          </a></li>
          </ul>
        </li>

   <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Tution Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li @if(strstr($curl,"confirmtution") )
                        class="active"
                        @endif class="">
          <a href="{{url('confirmtution')}}">
            <i class="fa fa-edit"></i> <span>Confirm tuition</span>
          </a>
        </li>
            <li> <a href="{{url('alltuition')}}"><i class="fa fa-plus-square"></i> <span>Tution Status</span>
          </a></li>
          </ul>
        </li>

       
        
        <li @if(strstr($curl,"feedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('feedback')}}">
            <i class="fa fa-commenting"></i> <span>Feedback List</span>
          </a>
        </li>
        


        <li @if(strstr($curl,"allteacher") )
                        class="active"
                        @endif class="">
          <a href="{{url('allteacher')}}">
            <i class="fa fa-list"></i> <span>All Teacher</span>
          </a>
        </li>

        <li @if(strstr($curl,"allparents") )
                        class="active"
                        @endif class="">
          <a href="{{url('allparents')}}">
            <i class="fa fa-list"></i> <span>All Parents</span>
          </a>
        </li>

        @elseif( Auth::user()->role == "teacher" && Auth::user()->status == 1)
        <li @if(strstr($curl,"tutionstatus") )
                        class="active"
                        @endif>
          <a href="{{url('tutionstatus')}}">
           <i class="fa fa-eye"></i>
               <span>View Tution Status</span>
               </a>
       </li>
       <li @if(strstr($curl,"intrstcourse") )
                        class="active"
                        @endif>
          <a href="{{url('intrstcourse')}}">
           <i class="fa fa-eye"></i>
               <span>Interest Course List</span>
               </a>
       </li>
        <li @if(strstr($curl,"resourcelist") )
                        class="active"
                        @endif>
          <a href="{{url('resourcelist')}}">
           <i class="fa fa-eye"></i>
               <span>Resource List</span>
               </a>
       </li>
       <li @if(strstr($curl,"allmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
        @elseif( Auth::user()->role == "teacher" && Auth::user()->status == 0)
          <li @if(strstr($curl,"waiting") )
                        class="active"
                        @endif class="">
          <a href="{{url('waiting')}}">
            <i class="fa fa-commenting-o"></i> <span>Wait For admin Approval</span>
          </a>
        </li>
       @elseif( Auth::user()->role == "parents")
        <li @if(strstr($curl,"bookinginfo") )
                        class="active"
                        @endif>
          <a href="{{url('bookinginfo')}}">
           <i class="fa fa-eye"></i>
               <span>View Tution Status</span>
               </a>
       </li>
        <li @if(strstr($curl,"parentresource") )
                        class="active"
                        @endif>
          <a href="{{url('parentresource')}}">
           <i class="fa fa-eye"></i>
               <span>Resource List</span>
               </a>
       </li>
        <li @if(strstr($curl,"parentresource") )
                        class="active"
                        @endif>
          <a href="{{url('teacherlist')}}">
           <i class="fa fa-eye"></i>
               <span>Teachre List</span>
               </a>
       </li>
       <li @if(strstr($curl,"allmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
       @endif
        <li @if(strstr($curl,"changePassword") )
                        class="active"
                        @endif class="">
          <a href="{{url('changePassword')}}">
            <i class="fa fa-key"></i> <span>Change Password</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endauth



  @guest
   <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                 
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.jpg" class="user-image" alt="User Image">
             
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.jpg" class="img-circle" alt="User Image">

                <p>
                 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 
               
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons"></i>{{ __('Sign out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @php
        $curl=url()->current();
        @endphp
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li @if(strstr($curl,"admin") )
                        class="active"
                        @endif class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Teacher Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{url('approveteacher')}}"><i class="fa fa-circle-o"></i>Approve Teacher Account</a></li>
            <li> <a href="{{url('addteacher')}}"><i class="fa fa-plus-square"></i> <span>Add Teacher</span>
          </a></li>
          </ul>
        </li>

   <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Tution Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li @if(strstr($curl,"confirmtution") )
                        class="active"
                        @endif class="">
          <a href="{{url('confirmtution')}}">
            <i class="fa fa-edit"></i> <span>Confirm tuition</span>
          </a>
        </li>
            <li> <a href="{{url('alltuition')}}"><i class="fa fa-plus-square"></i> <span>Tution Status</span>
          </a></li>
          </ul>
        </li>

       
        
        <li @if(strstr($curl,"feedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('feedback')}}">
            <i class="fa fa-commenting"></i> <span>Feedback List</span>
          </a>
        </li>
        


        <li @if(strstr($curl,"allteacher") )
                        class="active"
                        @endif class="">
          <a href="{{url('allteacher')}}">
            <i class="fa fa-list"></i> <span>All Teacher</span>
          </a>
        </li>

        <li @if(strstr($curl,"allparents") )
                        class="active"
                        @endif class="">
          <a href="{{url('allparents')}}">
            <i class="fa fa-list"></i> <span>All Parents</span>
          </a>
        </li>
        <li @if(strstr($curl,"tutionstatus") )
                        class="active"
                        @endif>
          <a href="{{url('tutionstatus')}}">
           <i class="fa fa-eye"></i>
               <span>View Tution Status</span>
               </a>
       </li>
       <li @if(strstr($curl,"intrstcourse") )
                        class="active"
                        @endif>
          <a href="{{url('intrstcourse')}}">
           <i class="fa fa-eye"></i>
               <span>Interest Course List</span>
               </a>
       </li>
        <li @if(strstr($curl,"resourcelist") )
                        class="active"
                        @endif>
          <a href="{{url('resourcelist')}}">
           <i class="fa fa-eye"></i>
               <span>Resource List</span>
               </a>
       </li>
       <li @if(strstr($curl,"allmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>

          <li @if(strstr($curl,"waiting") )
                        class="active"
                        @endif class="">
          <a href="{{url('waiting')}}">
            <i class="fa fa-commenting-o"></i> <span>Wait For admin Approval</span>
          </a>
        </li>

        <li @if(strstr($curl,"bookinginfo") )
                        class="active"
                        @endif>
          <a href="{{url('bookinginfo')}}">
           <i class="fa fa-eye"></i>
               <span>View Tution Status</span>
               </a>
       </li>
        <li @if(strstr($curl,"parentresource") )
                        class="active"
                        @endif>
          <a href="{{url('parentresource')}}">
           <i class="fa fa-eye"></i>
               <span>Resource List</span>
               </a>
       </li>
       <li @if(strstr($curl,"allmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>

        <li @if(strstr($curl,"changePassword") )
                        class="active"
                        @endif class="">
          <a href="{{url('changePassword')}}">
            <i class="fa fa-key"></i> <span>Change Password</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endguest


  </footer>
<main class="py-4">
            @yield('content')
        </main>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin_css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_css/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('admin_css/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_css/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_css/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_css/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin_css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin_css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_css/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_css/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_css/dist/js/demo.js') }}"></script>


<!-- DataTables -->
<script src="{{ asset('admin_css/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#user_table').DataTable()
  })
</script>
</body>
</html>
