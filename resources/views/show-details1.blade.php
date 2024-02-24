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
        <h2>Show Question Details</h2> <br>  
            
                <div>
                    <h4><strong>Class: </strong> {{$course->class}}</h4>
                    <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>

                    <br>

                    <h4><strong>Chapter No: </strong> {{$chapter->chapter_no}}</h4>
                    <h4><strong>Chapter    : </strong> {{$chapter->chapter_name}}</h4>

                    <br>

                    <h4><strong>Subtopic: </strong> {{$subtopic->subtopic_name}}</h4>

                </div>
        {{-- <h3 text-center>{{$data->question}}</h3> --}}
        <br><br>

        @if($data->question_type === "mcq2")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            <tr>
                                <th>Option 1</th>
                                <td>{{$data->option_1}}</td>
                            </tr>
                            <tr>
                                <th>Option 2</th>
                                <td>{{$data->option_2}}</td>
                            </tr>
                            <tr>
                                <th>Correct Option(s)</th>
                                <td>{{$data->correct_option}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif
        

        @if($data->question_type === "mcq4")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            <tr>
                                <th>Option 1</th>
                                <td>{{$data->option_1}}</td>
                            </tr>
                            <tr>
                                <th>Option 2</th>
                                <td>{{$data->option_2}}</td>
                            </tr>
                            <tr>
                                <th>Option 3</th>
                                <td>{{$data->option_3}}</td>
                            </tr>
                            <tr>
                                <th>Option 4</th>
                                <td>{{$data->option_4}}</td>
                            </tr>
                            <tr>
                                <th>Correct Option(s)</th>
                                <td>{{$data->correct_option}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif


        @if($data->question_type === "chk2")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            <tr>
                                <th>Option 1</th>
                                <td>{{$data->option_1}}</td>
                            </tr>
                            <tr>
                                <th>Option 2</th>
                                <td>{{$data->option_2}}</td>
                            </tr>
                           
                            <tr>
                                <th>Correct Option(s)</th>
                                <td>{{$data->correct_option}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif

        @if($data->question_type === "chk4")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            <tr>
                                <th>Option 1</th>
                                <td>{{$data->option_1}}</td>
                            </tr>
                            <tr>
                                <th>Option 2</th>
                                <td>{{$data->option_2}}</td>
                            </tr>
                            <tr>
                                <th>Option 3</th>
                                <td>{{$data->option_3}}</td>
                            </tr>
                            <tr>
                                <th>Option 4</th>
                                <td>{{$data->option_4}}</td>
                            </tr>
                            <tr>
                                <th>Correct Option(s)</th>
                                <td>{{$data->correct_option}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif

        @if($data->question_type === "shortAns")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            
                            <tr>
                                <th>Answer</th>
                                <td>{{$data->answer}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif

        @if($data->question_type === "longAns")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            
                            <tr>
                                <th>Answer</th>
                                <td>{{$data->answer}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif

        @if($data->question_type === "fillBlank")
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Question</th>
                                <td>{{$data->question}}</td>
                            </tr>

                            <tr>
                                <th>Question Order</th>
                                <td>{{$data->question_order}}</td>
                            </tr>
                            <tr>
                                <th>Question Type</th>
                                <td>{{$data->question_type}}</td>
                            </tr>
                            <tr>
                                <th>Difficulty Level</th>
                                <td>{{$data->difficulty_level}}</td>
                            </tr>
                            <tr>
                                <th>Image Link</th>
                                <td>{{$data->image_link}}</td>
                            </tr>
                            <tr>
                                <th>Video Link</th>
                                <td>{{$data->video_link}}</td>
                            </tr>
                            
                            <tr>
                                <th>Answer</th>
                                <td>{{$data->answer}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    

        @endif

    </div>
    <br><br>

    {{-- <div class="form group text-center">
        <a href="{{url('manage-question/'.$subtopic->subtopic_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
        <br><br>
    </div> --}}

    <div class="form group text-center">
        <a href="{{url('view-questions/'.$data->subtopic_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>&nbsp;&nbsp;&nbsp;
        <a href="{{url('edit-question1/'.$data->question_id)}}" class="btn btn-primary ">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       <br><br>    
    </div>
</div>
</div> 

</body>

</html>