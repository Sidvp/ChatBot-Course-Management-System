<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
        <br><br><br>
        <h1 text-center>All Users</h1>
        <br><br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>School Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->email}}</td>
                            <td>{{$teacher->school_name}}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        {{-- <pre>
            {{print_r($teachers)}}
        </pre>
         --}}

         <br><br>
         <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="{{url('/dashboard')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
            {{-- <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
            {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
        </div>
    </div>

 
</body>

</html>