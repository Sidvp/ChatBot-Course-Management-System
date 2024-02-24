<!doctype html>
<html lang="en">

<head>
  <title>CARES-Goa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('favicon_prerna.jpg') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon_prerna.jpg') }}">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
    @include('header1');  <!-- View -->
  </header>
  <main>
    {{-- 
    <h1>Welcome {{$name ?? "User"}}</h1>
    <h2>{{date('d-m-y')}}</h2> 
    --}}

    <div class="container">
        @yield('main-section')
    </div>


  </main>
  <footer>
    <!-- place footer here -->
    @include('footer'); <!-- View -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<div>
  {{-- <h1 style="background: green">CARES</h1>
  <img src="" alt=""> --}}
  {{-- <script>
    var botmanWidget = {
        // frameEndpoint: '/iFrameUrl'   
        aboutText:'Powered by CARES-Goa', 
        introMessage:'CARES-Goa Welcome you 😊',
        aboutLink:'https://cares.goa.gov.in/',
        title: 'CARES-Goa',
        mainColor: '#6C4AB6',
        headerTextColor: '#fff',
        // bubbleBackground:'#c02026',
        bubbleBackground:'#402591',
        // desktopHeight: '450px',
        desktopWidth: '370px',
        // introMessage: 'Hi, Welcome...',
        bubbleAvatarUrl:'https://media.istockphoto.com/id/1191411962/vector/cute-robot.jpg?s=612x612&w=0&k=20&c=KelCNJMam1XGwVM0HclQtHIHZxByJZOtnRjkBbHrAKw='
    };
  </script> --}}
  <script src="{{ asset('js\widget.js') }}"></script>
  <!--<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>-->
  {{-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --}}
  </div>
  
</body>

</html>