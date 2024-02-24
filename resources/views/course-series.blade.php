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

<body class="">
    @include('header');

    <div class="container">
        <section>
            <div class="mt-4 p-5 bg-secondary text-white text-center rounded">
                <h1>ICT Curriculum</h1>

              </div>
        </section>

        <section>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 p-4">
              @foreach ($courses as $course)
                <div class="col">
                  <div class="card h-100">
                    {{-- <img class="" src="data:image/png;base64,{{ chunk_split(base64_encode($course->image)) }}" height="200" alt="photo"> --}}
                    <img src="{{$course->image}}" height="200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center" style="font-size: 20px;">{{ $course->title }}</h5>
                      {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                      {{-- <p>{{\Str::words($d->description, 10)}}</p> --}}
                      <br>
                      <div class="text-center">
                        <a href="chapters/{{ $course->course_series_id }}"><button type="button" class="text-center btn btn-secondary">Browse Course</button></a>
                      </div>
                    </div>
                    {{-- <div class="card-footer">
                       <small class="text-muted">Last updated 3 mins ago</small> 
                    </div> --}}

                   
                    
                  </div>
                </div>
                @endforeach
              </div>
        </section>

        {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> --}}
     
    </div>
</body>

</html>

