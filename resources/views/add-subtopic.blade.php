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
    @include('header');

    <div class="container">
        
        <form action="{{url('save-subtopic')}}" method="POST">
        {{-- <form action="{{url('save-chapter/'.$course_id)}}" method="POST"> --}}
            @csrf
            <div class="container card p-3 bg-white">
                <br>
                <h2 class="text-center text-primary">Add Subtopic</h2>

                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div>
                            <h4><strong>Class: </strong> {{$course->class}}</h4>
                            <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>

                            <br>
                            <h4><strong>Chapter No: </strong> {{$chapter->chapter_no}}</h4>
                            <h4><strong>Chapter      : </strong> {{$chapter->chapter_name}}</h4>
                        </div>
                    </div>
                </div>
                <br><br>
               
                {{-- <div class="row"> --}}
                    <div class="col-md-9 mx-auto text-center">
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
                    <div class="form group col-md-9 mx-auto">

                        <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                        <input type="hidden" name="chapter_id" value="{{ $chapter->chapter_id }}">

                        <label for="" class="form-label">Subtopic Name</label><br>
                        <input type="text" name="subtopic_name" id="" class="form-control" placeholder="Enter Subtopic Name" aria-describedby="helpId" value="{{old('subtopic_name')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('subtopic_name')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Video Link</label><br>
                        <input type="text" name="video_link" id="" class="form-control" placeholder="Enter Video Link" aria-describedby="helpId" value="{{old('video_link')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('video_link')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Additional Resources (Link) (Optional)</label><br>
                        <input type="text" name="additional_resource" id="" class="form-control" placeholder="Enter Link for Additional Resources" aria-describedby="helpId" value="{{old('additional_resource')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('additional_resource')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Image Link (Optional)</label><br>
                        <input type="text" name="image_link" id="" class="form-control" placeholder="Enter Image Link" aria-describedby="helpId" value="{{old('image_link')}}">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('image_link')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Marks/Subtopic</label><br>
                        {{-- <input type="text" name="subtopic_marks" id="" class="form-control" placeholder="100" aria-describedby="helpId" value="{{old('subtopic_marks')}}"> --}}
                        <input type="text" name="subtopic_marks" id="" class="form-control" placeholder="100" aria-describedby="helpId" value="100" style="width:70px; text-align:center;">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('subtopic_marks')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label" style="display: inline-block">Weightage - 'Easy' (%)</label>
                        {{-- <input type="text" name="weightage_easy" id="" class="form-control" placeholder="40" aria-describedby="helpId" value="{{old('weightage_easy')}}"> --}}
                        <input type="text" name="weightage_easy" id="" class="form-control" placeholder="40" aria-describedby="helpId" value="40" style="width:70px; text-align:center;" >
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('weightage_easy')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Weightage - 'Intermediate' (%)</label><br>
                        {{-- <input type="text" name="weightage_intermediate" id="" class="form-control" placeholder="30" aria-describedby="helpId" value="{{old('weightage_intermediate')}}"> --}}
                        <input type="text" name="weightage_intermediate" id="" class="form-control" placeholder="30" aria-describedby="helpId" value="30" style="width:70px; text-align:center;">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('weightage_intermediate')
                              {{$message}}
                          @enderror
                      </span>

                      <br>
                      <label for="" class="form-label">Weightage - 'Difficult' (%)</label><br>
                        {{-- <input type="text" name="weightage_difficult" id="" class="form-control" placeholder="30" aria-describedby="helpId" value="{{old('weightage_difficult')}}"> --}}
                        <input type="text" name="weightage_difficult" id="" class="form-control" placeholder="30" aria-describedby="helpId" value="30" style="width:70px; text-align:center;">
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        <span class="text-danger">
                          @error('weightage_difficult')
                              {{$message}}
                          @enderror
                      </span>

                    </div>
                </div>
                
                <br>
                
                <br>
          
                <div class="form group mx-auto">
                    <br>
                    <a href="{{url('manage-subtopic/'.$chapter_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
                <br>
                
        
            </div>
        </form>
        <br><br>
    </div>
</body>

</html>

