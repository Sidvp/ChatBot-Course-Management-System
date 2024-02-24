<!doctype html>
<html lang="en">

<head>
  <title>CARES-Goa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-dark align-items-center">
    @include('header1');

    <form action="{{url('/')}}/login" method="POST">
        @csrf

        {{-- <pre>
        @php
            print_r($errors->all());
        @endphp
        </pre> --}}

        <div class="container mt-4 card p-3 bg-white align-items-center">
            <br>
            <h2 class="text-center text-primary">Login</h2>
        
                <div class="form group col-md-6 required">
                    <label for="" class="form-label">Username</label><br>
                    <input type="text" name="username" id="" class="form-control" placeholder="Enter Username " aria-describedby="helpId" value="{{old('username')}}">
                    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                    <span class="text-danger">
                        @error('username')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <br>

                <div class="form group col-md-6 required">
                    <label for="" class="form-label">Password</label><br>
                    <input type="password" name="password" id="" class="form-control" placeholder="Enter Password " aria-describedby="helpId">
                    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                {{-- <div class="row"> --}}
                    <br>
                    <div class="col-md-6">
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
    
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                        
                    </div>
                {{-- </div> --}}
    
                
            <div class="form group">
                <br>
                <button class="btn btn-primary">Submit</button>
            </div>
            <br>
            <a href="register">New User?? Register here</a>

        </div>
    </form>
</body>

</html>








{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CARES Goa - Login Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @include('cdn')
    </head>
    <body>
        <h1>Login</h1>
        {{-- <form action="caresController" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Enter User ID" />
            <br><br>
            <input type="password" name="password" placeholder="Enter Password" />
            <br><br>
            <button type="button" class="btn btn-primary">Submit</button>
        </form> --}}
    {{-- </body>
</html> --}}



{{-- 
    3 ways to add Bootstrap in Laravel:
    - Bootstrap with CDN (Content Delivery Network) (Adv: faster loading of website)(for smaller Applications (1-3 pages website))
    - Add Bootstrap with Single Page
    - Add Bootstrap in multi-file project
    - Common file for Bootstrap    
--}} 