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

  <link href="https://unpkg.com/video.js@7.20.0/dist/video-js.css" rel="stylesheet">

  <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
</head>

<body class="">
    @include('header');

    <div class="container">
        <section>
            <div class="mt-1 p-4 bg-secondary text-white text-center rounded">
                <h1>{{ $course->title }} Course</h1>
              </div>
        </section>

        <section>
          <br>
          <div class="row" style="margin-left: 0.005rem;">
            <div class="col-3 mx-auto">
              <div class="card overflow-auto" style="width: 25rem; height:480px;">
              @foreach ($chapters as $chapter)
                <div class="card-header text-center">
                  {{$chapter->chapter_name}}
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                @endforeach
              </div>
            </div>

            <br><br>
            
            <div class="col-9">
            {{-- @foreach ($chapters as $chapter) --}}
            {{-- <h1>{{$chapter->chapter_name}}</h1> --}}
            {{-- <p>{{$chapter->video}}</p> --}}
           
            {{-- <video height="400"  autoplay="false" muted>
              {{-- <source class="video-js vjs-default-skin" src="https://drive.google.com/file/d/1szN8oKcwZS00mrgL4EMT1ucQWuKeY6yy/view?usp=share_link" type="video/mp4"> --}}
              {{-- <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4"> --}}
              {{-- <source src="https://www.youtube.com/embed/DuwiTuXrBEI" type="video/mp4">
              Your browser does not support the video tag.
            </video>  --}}
            <div class="embed-responsive embed-responsive-16by9"> 
              {{-- <iframe src="https://www.youtube.com/embed/DuwiTuXrBEI" frameborder="0"></iframe> --}}
              <iframe width="853" height="480" src="https://www.youtube.com/embed/DuwiTuXrBEI" title="ADD, EDIT, DELETE, LIST using Laravel | Laravel CRUD Operation | Laravel 9 | Learning Points" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div> 
            {{-- @endforeach  --}}



            {{-- <video
              id="my-video"
              class="video-js vjs-styles-defaults vjs-big-play-centered"
              controls
              preload="auto"
              width="820"
              height="480"
              poster="MY_VIDEO_POSTER.jpg"
              data-setup="{}"
              >
              <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4" type="video/mp4" />
              <source src="https://www.youtube.com/embed/DuwiTuXrBEI" /> --}}
              
              {{-- <source src="MY_VIDEO.webm" type="video/webm" /> --}}
              {{-- <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
              </p> --}}
            </video>
          </div>  
        </section> 

        <section>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 p-4">
              @foreach ($chapters as $chapter)
                <div class="col">
                  <div class="card h-100">
                    {{-- <img class="" src="data:image/png;base64,{{ chunk_split(base64_encode($chapter->image)) }}" height="200" alt="photo"> --}}
                    <img src="{{$chapter->image}}" height="200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center" style="font-size: 20px;">{{ $chapter->chapter_name }}</h5>
                      {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                      {{-- <p>{{\Str::words($d->description, 10)}}</p> --}}
                      <br>
                      <div class="text-center">
                        <a href="{{url('subtopics/'.$chapter->chapter_series_id)}}"><button type="button" class="text-center btn btn-secondary">View Chapter</button></a>
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

    <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>

    <script src="https://unpkg.com/video.js@7.20.0/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls@5.15.0/es5/videojs-contrib-hls.js"></script> 
</body>

</html>

<iframe width="320" height="560" src="https://www.youtube.com/embed/pSWbeIzhhkU" title="Big Impact Story 6 #ytshorts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>