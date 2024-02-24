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

<body>
    @include('header');  <!-- View -->

    <div class="container">
            
    <div class="container">
        <br><br><br>
        <h1 text-center>Your Profile</h1>
        <br><br>
        
        <div class="col-lg-5">
            <div class="table-responsive">
                <table class="table">
                    {{-- <thead>
                        <tr>
                            
                            <th></th>
                            <th></th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email ID</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>School Name</th>
                            <td>{{$data->school_name}}</td>
                        </tr>
        
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    <br><br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
       <a href="{{url('/dashboard')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
       {{-- <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
       {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
   </div>
    </div>
</body>

</html>