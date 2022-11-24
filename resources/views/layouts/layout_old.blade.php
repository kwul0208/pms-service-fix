<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IT Project Management</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">IT Project Management System</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('project') }}">Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('task') }}">Task</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('task/mytask') }}">My Task</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('team') }}">Team</a>

            
          </li>
          <li class="nav-item">
            <a href="">
              <i class="fas fa-bell"></i><span class="badge badge-light">4</span>            
            </a>
            
          </li>
          <li class="nav-item">
            <img src="https://pbs.twimg.com/profile_images/1079257462799138817/-5GdblJx_normal.jpg" class="rounded-circle" alt="Cinque Terre" width="30"> 
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>IT Project Management</h2>
            <span class="subheading">Let's Manage our projects and systems be better</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded mr-2" alt="...">
      <strong class="mr-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
  
  @yield('content')


  
  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ url('assets/startbootstrap-clean-blog-gh-pages') }}/js/clean-blog.min.js"></script>

</body>

</html>
