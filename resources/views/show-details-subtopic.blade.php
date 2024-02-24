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
    <div class="container" style="display: flex; justify-content: center;">

    <div class="container"   >
            
    <div class="container" >
        {{-- <br><br><br> --}}

        
        <h2>Show Subtopic Details</h2> <br>  
            
        <div>
            <h4><strong>Class: </strong> {{$course->class}}</h4>
            <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>

            <br>

            <h4><strong>Chapter No: </strong> {{$chapter->chapter_no}}</h4>
            <h4><strong>Chapter      : </strong> {{$chapter->chapter_name}}</h4>

            <br>

            <h4><strong>Subtopic Name      : </strong> {{$data->subtopic_name}}</h4>

        </div>

        <br><br>
        
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            {{-- <tr>
                                <th>Subtopic Name</th>
                                <td>{{$data->subtopic_name}}</td>
                            </tr> --}}
                            <tr>
                                <th>Video Link</th>
                                <td><a href="{{$data->video_link}}">{{$data->video_link}}</a></td>
                            </tr>
                            <tr>
                                <th>Additional Resources (Link) (Optional)</th>
                                <td><a href="{{$data->additional_resource}}">{{$data->additional_resource}}</a></td>
                            </tr>
                            <tr>
                                <th>Image Link (Optional)</th>
                                <td><a href="{{$data->image_link}}">{{$data->image_link}}</a></td>
                            </tr>
                        
                            <tr>
                                <th>Marks/Subtopic</th>
                                <td>{{$data->subtopic_marks}}</td>
                            </tr>
                            <tr>
                                <th>Weightage - 'Easy' (%)</th>
                                <td>{{$data->weightage_easy}}</td>
                            </tr>
                            <tr>
                                <th>Weightage - 'Intermediate' (%)</th>
                                <td>{{$data->weightage_intermediate}}</td>
                            </tr>
                            <tr>
                                <th>Weightage - 'Difficult' (%)</th>
                                <td>{{$data->weightage_difficult}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

      

    </div>
    <br><br>

    {{-- <div class="form group text-center">
        <a href="{{url('manage-question/'.$subtopic->subtopic_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
        <br><br>
    </div> --}}

    <div class="form group text-center">
    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-start"> --}}
       <a href="{{url('manage-subtopic/'.$data->chapter_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>&nbsp;&nbsp;&nbsp;
       <a href="{{url('edit-subtopic/'.$data->subtopic_id)}}" class="btn btn-primary ">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
       <br><br>

       
       {{-- <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
       {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
    </div>
</div>
</div> 

</body>

</html>