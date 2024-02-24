<!doctype html>
<html lang="en">

<head>
  {{-- <title>Title</title> --}}
  
  @stack('title')

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

{{-- Favicon --}}
<link rel="shortcut icon" href="{{ asset('favicon_prerna.jpg') }}">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
  
</head>

<body>

    {{-- <div class="container-fluid bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-sm">
                <a href="#" class="navbar-brand" style="color:white">CARES-Goa</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="#">Dashboard</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <div class="navbar-header">
                            <li><a class="navbar-brand" href="#">CARES-Goa</a></li>
                        </div>
                        <li class="nav-item"><a href="#" style="padding-right: 500px">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    </div> --}}

   

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            {{-- Logo --}}
            <div class="navbar-header" style="padding-right: 650px">
                <a href="{{url('/adminhome')}}" class="navbar-brand">CARES-Goa</a>
                {{-- <a href="{{url('/adminhome')}}" class="navbar-brand"><img src="{{ asset('logo.jpg') }}" alt=""></a> --}}

                <button type="button" class="navbar-toggler d-lg-none" style="float:right" aria-label="Toggle navigation" data-toggle="collapse" data-target="#mainNavBar">
                    <span class="navbar-toggler-icon"></span>
                    
                </button>
                
            </div>

            {{-- Menu items --}}
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="nav navbar-nav ml-auto mt-2 mt-lg-0 ms-auto">
                    <li class="nav-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    {{-- <li class="nav-item"><a href="{{url('/register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}

                    {{-- <li class="nav-item"><a href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> --}}
                
                    <li class="nav-item"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
    
{{-- 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
            <ul class="nav navbar-nav navbar-left">
                <div class="nav navbar-nav navbar-left navbar-header">
                    <li><a class="navbar-brand" href="#">CARES-Goa</a></li>
                </div>
                <li style="padding-right: 500px"><a href="#">Dashboard</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
      </nav>
       --}}
  {{-- <header>
    <!-- place navbar here -->
  </header>
   --}}

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>