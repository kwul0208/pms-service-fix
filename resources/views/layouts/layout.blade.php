<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IT Project Management</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicons -->
  <link href="{{ url('assets/Rapid') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ url('assets/Rapid') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/Rapid') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/Rapid') }}/assets/css/style.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

    
  <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">



  


  
  <!-- =======================================================
  * Template Name: Rapid - v2.2.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 33px !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-selection__arrow {
            height: 38px !important;
        }
        .hidden{
            display: none;
        }

        .dataTables_wrapper .row{
          margin-bottom: 1%;
        }
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
        <div class="container d-flex justify-content-end">
            <div class="social-links">
                Welcome {{ Session::get('employeesFullname') }}
                <a href="{{url('logout')}}">Log out</a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center">

            <h4 class="logo mr-auto" style="font-size: 25px"><a href="{{url('/')}}">IT Project Management System</a></h4>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="{{ url('assets/Rapid') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="main-nav d-none d-lg-block">
                <ul>
                    <li class="nav-item {{@$page=='/' ? 'active' : ''}}"><a href="{{url('/')}}">Home</a></li>
                    <li class="nav-item {{@$page=='Project' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('project') }}">Project</a>
                    </li>
                    @if(Session::get('employeesId')=='105')
                    <li class="nav-item {{@$page=='Sprint' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('sprint') }}">Sprint</a>
                    </li>
                   
                    <li class="nav-item {{@$page=='Task' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('task') }}">Task</a>
                    </li>

                    @endif 


                    <li class="nav-item {{@$page=='My Task' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('task/mytask/index/ongoing') }}">My Task</a>
                    </li>
                    <li class="nav-item {{@$page=='Team' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('timesheet/index/'.Session::get('employeesId') .'/'. date('Y-m-d')) }}">Timesheet</a>
                    </li>
                    @if(Session::get('employeesId')=='105')
                    <li class="nav-item {{@$page=='Team' ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('team') }}">Team</a>
                    </li>
                    @endif
                    <!--
                    <li class="nav-item {{@$page=='/' ? 'active' : ''}}">
                        <a href="">
                          <i class="fas fa-bell"></i><span class="badge badge-light">4</span>            
                        </a>
                    </li>
                    <li class="nav-item">
                        <img src="https://pbs.twimg.com/profile_images/1079257462799138817/-5GdblJx_normal.jpg" class="rounded-circle" alt="Cinque Terre" width="30"> 
                    </li>
                -->
                </ul>
            </nav><!-- .main-nav-->

        </div>
    </header><!-- End Header -->
    <main id="main" style="min-height: 400px">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li>{{ @$breadcrumb }}</li>
                </ol>
            </div>
        </section><!-- End Breadcrumbs -->
        <section class="inner-page pt-4">
            {{-- <div class="container-fluid">
                
            </div> --}}
            @yield('content')
        </section>

    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <div class="container">
            <div class="copyright">
                &copy; 2021 Copyright <strong>MUC Consulting</strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->

    @if (Request::segment(1) !== 'team')
    

    <script src="{{ url('assets/Rapid') }}/assets/vendor/jquery/jquery.min.js"></script>

@endif
    <script src="{{ url('assets/Rapid') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/counterup/counterup.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/venobox/venobox.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ url('assets/Rapid') }}/assets/vendor/aos/aos.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/Rapid') }}/assets/js/main.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 

    <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>

    @yield('script')
  
    @if ($message = Session::get('success'))
        <script type="text/javascript">
            toastr.success('Success!', '{{@$message}}')
        </script>
    @endif

@if (Request::segment(1) == 'timesheet')
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {

    var employees_id = '{{ Session::get("employeesId") }}';
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
      
        onSelect: function (date) {
            var url = '{{ url("timesheet/browse") }}/'+employees_id+'/'+date;
            $('#date').text(date);
            // alert(url);
            $('#timesheet').load(url);
        }
    });
} );
</script>

@endif  
</body>

</html>