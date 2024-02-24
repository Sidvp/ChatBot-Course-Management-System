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

<body class="bg-dark">
    @include('header1');

    <div class="container">
        
        <form action="{{url('/')}}/register" method="POST">
            @csrf
            <div class="container mt-4 card p-3 bg-white">
                <br>
                <h2 class="text-center text-primary">Register</h2>
               
                {{-- <div class="row"> --}}
                    <div class="col-md-12">
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

                <div class="row">
                    <div class="form group col-md-12 required">
                        <label for="" class="form-label">Name</label><br>
                        <input type="text" name="name" id="" class="form-control" placeholder="Enter your name" aria-describedby="helpId" value="{{old('name')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('name')
                              {{$message}}
                          @enderror
                      </span>
                    </div>
                </div>
                
                <br>
                
                <div class="row">
                    <div class="form group col-md-12 required">
                        <label for="" class="form-label">Email</label><br>
                        <input type="email" name="email" id="" class="form-control" placeholder="Enter your Email ID" aria-describedby="helpId" value="{{old('email')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
    
                <br>
    
                <div class="row">
                    <div class="form group col-md-6 required">
                        <label for="" class="form-label">School Name</label><br>
                        <input type="text" name="schoolName" id="" class="form-control" placeholder="Enter School Name " aria-describedby="helpId" value="{{old('schoolName')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                            @error('schoolName')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    
            
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
                </div>
                
                <br>
    
                <div class="row">
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
        
                    <div class="form group col-md-6 required">
                        <label for="" class="form-label">Confirm Password</label><br>
                        <input type="password" name="password_confirmation" id="" class="form-control" placeholder="Re-type Password " aria-describedby="helpId">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>           
          
                <br>
          
                <div class="form group">
                    <br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <br>
                <a href="login">Already Registered?? Login here</a>
        
            </div>
        </form>
    </div>
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