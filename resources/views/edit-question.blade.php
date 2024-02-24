<!DOCTYPE html>
<html lang="en">

<head>
    <title>CARES-Goa</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{-- jQuery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="bg-dark">
    @include('header');

    <div class="container" style="margin-bottom: 40px;">
        
        <form action="{{url('update-question')}}" method="POST">
            @csrf
            <div class="container card p-3 bg-white">
                <br>
                <h2 class="text-center text-primary">Edit Question</h2>

                @php
                    $course_id = $course->course_id;
                    $class = $course->class;
                    $curriculum = $course->curriculum;  
                    $chapter_id = $chapter->chapter_id;           
                    $chapter_no = $chapter->chapter_no;
                    $chapter_name = $chapter->chapter_name;       
                    $subtopic_id = $subtopic->subtopic_id;
                    $subtopic_name = $subtopic->subtopic_name;
                    $question_id = $data->question_id;
                @endphp

                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div>
                            <h4><strong>Class: </strong> {{$class}}</h4>
                            <h4><strong>Curriculum: </strong> {{$curriculum}}</h4>

                            <br>

                            <h4><strong>Chapter No: </strong> {{$chapter_no}}</h4>
                            <h4><strong>Chapter    : </strong> {{$chapter_name}}</h4>
                            
                            <br>
                            <h4><strong>Subtopic: </strong> {{$subtopic_name}}</h4>
                        </div>
                    </div>
                </div>
                <br><br>

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

                <div class="row">
                    <div class="form group col-md-10 required mx-auto">

                        <input type="hidden" name="course_id" value="{{ $course_id }}">
                        <input type="hidden" name="chapter_id" value="{{ $chapter_id }}">
                        <input type="hidden" name="subtopic_id" value="{{ $subtopic_id }}">
                        <input type="hidden" name="question_id" value="{{ $question_id }}">

                        <div>
                            <label for="" class="form-label">Question Type</label><br>
                            <select name="question_type" id="question_type" required style="width:180px; height:30px;">
                                <option selected disabled value="">Select Question Type</option>

                                <option value="mcq2" @if ($data->question_type == "mcq2") {{ 'selected' }} @endif>2 Options MCQ</option>
                                <option value="mcq4" @if ($data->question_type == "mcq4") {{ 'selected' }} @endif>4 Options MCQ</option>
                                <option value="chk2" @if ($data->question_type == "chk2") {{ 'selected' }} @endif>2 Options Checkboxes</option>
                                <option value="chk4" @if ($data->question_type == "chk4") {{ 'selected' }} @endif>4 Options Checkboxes</option>
                                <option value="fillBlank" @if ($data->question_type == "fillBlank") {{ 'selected' }} @endif>Fill in the blanks</option>
                                <option value="shortAns" @if ($data->question_type == "shortAns") {{ 'selected' }} @endif>Short Answer</option>
                                <option value="longAns" @if ($data->question_type == "longAns") {{ 'selected' }} @endif>Long Answer</option>
                            </select>
                            <span class="text-danger">
                                @error('question_type')
                                    {{$message}}
                                @enderror
                            </span>
      
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-primary qtypebtn" style="" id="type_selected">Select</button>

                        </div>

                        <div class="questionbox col-md-8">
                            <br><br>
                            <div id="difficulty_level2" class="diff_level" style="display: none">
                            <label for="" id="difficulty_level1" class="form-label" style="display:none">Difficulty Level</label>
                                <select type="number" id="difficulty_level" name="difficulty_level" required placeholder="Select Level of Difficulty" style="height:30px;dispaly:none">
                                    <option selected disabled style="display: none;" value="">Select Difficulty Level</option>
                                    <option value="Easy" @if ($data->difficulty_level == "Easy") {{ 'selected' }} @endif>Easy</option>
                                    <option value="Intermediate" @if ($data->difficulty_level == "Intermediate") {{ 'selected' }} @endif>Intermediate</option>
                                    <option value="Difficult" @if ($data->difficulty_level == "Difficult") {{ 'selected' }} @endif>Difficult</option>
                                </select>
                                @error('difficulty_level')
                                    {{$message}}
                                @enderror
                            </div>
                            <br><br>

                            <label for="" id="quest_order1" class="form-label" style="display:none">Enter Question Order</label>
                            <input type="" id="quest_order" name="quest_order" placeholder="Enter Question Order" style="width:150px;display:none" value="{{$data->question_order}}">
                            <span class="text-danger">
                                @error('quest_order')
                                    {{$message}}
                                @enderror
                            </span>
                            <br><br>

                            <label for="" id="quest1" class="form-label" style="display:none">Enter Question</label>
                            <input type="text" id="quest" name="quest" placeholder="Enter Question " style="width:500px;display:none" value="{{$data->question}}">
                            <span class="text-danger">
                                @error('quest')
                                    {{$message}}
                                @enderror
                            </span>
                            <br><br>

                            <label for="" id="quest_img1" class="form-label" style="display:none">Image Link (Optional)</label>
                            <input type="text" id="quest_img" name="quest_img" placeholder="Enter Image Link " style="width:500px;display:none" value="{{$data->image_link}}">
                            <span class="text-danger">
                                @error('quest_img')
                                    {{$message}}
                                @enderror
                            </span>
                            <br><br>

                            <label for="" id="quest_video1" class="form-label" style="display:none">Video Link (Optional)</label>
                            <input type="text" id="quest_video" name="quest_video" placeholder="Enter Question " style="width:500px;display:none" value="{{$data->video_link}}">
                            @error('quest_video')
                                    {{$message}}
                            @enderror

                            {{-- Start block 2 option MCQ question  --}}
                            <div id="mcq2" class="qt" style="display: none">
                                {{-- <input type="text" id="quest" name="quest" placeholder="Enter your Question " style="width:500px"> --}}
                                <br><br>
                                <label for="" class="form-label">Enter Options</label><br>
                                <div class="option2">
                                    <input type="text" name="opt2_1" placeholder="Enter Option 1 " value="{{$data->option_1}}">
                                    @error('opt2_1')
                                        {{$message}}
                                    @enderror
                                    <br><br>

                                    <input type="text" name="opt2_2" placeholder="Enter Option 2 " value="{{$data->option_2}}">
                                    @error('opt2_2')
                                        {{$message}}
                                    @enderror
                                </div>
                                <br><br>
                                <label for="" class="form-label">Enter Correct Option No.</label><br>
                                <select type="number" name="correctOpt2" placeholder="Enter Correct Option No." style="height:30px">
                                    <option selected disabled value="">Select Correct Option  </option>
                                    <option value="1" @if ($data->correct_option == "1") {{ 'selected' }} @endif>1</option>
                                    <option value="2" @if ($data->correct_option == "2") {{ 'selected' }} @endif>2</option>
                                </select>
                                @error('correctOpt2')
                                    {{$message}}
                                @enderror

                                <br><br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                            {{-- End block 2 option MCQ question  --}}

                            {{-- Start block 4 option MCQ question  --}}
                            <div id="mcq4" class="qt" style="display: none">
                                {{-- <input type="text" id="quest" name="quest" placeholder="Enter your Question " style="width:500px"> --}}
                                <br><br>
                                <label for="" class="form-label">Enter Options</label><br>
                                <div class="option4">
                                    <input type="text" name="opt4_1" placeholder="Enter your Option 1 " value="{{$data->option_1}}">
                                    @error('opt4_1')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="opt4_2" placeholder="Enter your Option 2 " value="{{$data->option_2}}">
                                    @error('opt4_2')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="opt4_3" placeholder="Enter your Option 3 " value="{{$data->option_3}}">
                                    @error('opt4_3')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="opt4_4" placeholder="Enter your Option 4 " value="{{$data->option_4}}">
                                    @error('opt4_4')
                                        {{$message}}
                                    @enderror
                                </div>
                                <br><br>
                                <label for="" class="form-label">Enter Correct Option No.</label><br>
                                <select type="number" name="correctOpt4" placeholder="Enter Correct Option No." style="height:30px">
                                    <option selected disabled value="">Select Correct Option  </option>
                                    <option value="1" @if ($data->correct_option == "1") {{ 'selected' }} @endif>1</option>
                                    <option value="2" @if ($data->correct_option == "2") {{ 'selected' }} @endif>2</option>
                                    <option value="3" @if ($data->correct_option == "3") {{ 'selected' }} @endif>3</option>
                                    <option value="4" @if ($data->correct_option == "4") {{ 'selected' }} @endif>4</option>
                                </select>
                                @error('correctOpt4')
                                    {{$message}}
                                @enderror
                                <br><br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                            {{-- End block 4 option MCQ question  --}}
                            
                            {{-- Start block 2 option Checkboxes question  --}}
                            <div id="chk2" class="qt" style="display: none">
                                <br><br>
                                {{-- <input type="text" name="quest" placeholder="Enter your Chechbox Question " style="width:500px"> --}}
                                <label for="" class="form-label">Enter Options</label><br>
                                <div class="chkoption">
                                    <input type="text" name="chkopt2_1" placeholder="Enter your Option 1 " value="{{$data->option_1}}">
                                    @error('chkopt2_1')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="chkopt2_2" placeholder="Enter your Option 2 " value="{{$data->option_2}}">
                                    @error('chkopt2_2')
                                        {{$message}}
                                    @enderror
                                </div>
                                <br><br>
                              
                                <label for="">Please select the correct answer(s): </label>
                                
                                <br>
                                
                                <select id="correctchkopt2" name="correctchkopt2[]" class="form-select w-25" style="height:45px; text-align: center; font-size:14px;" multiple>
                                    {{-- <option value="1" @if (old('correctchkopt2') == "1") {{ 'selected' }} @endif>1</option> --}}
                                    <option value="1" @if ($data->correct_option == "1") {{ 'selected' }} @endif>1</option>
                                    <option value="2" @if ($data->correct_option == "2") {{ 'selected' }} @endif>2</option>
                                </select>
                                @error('correctchkopt2')
                                    {{$message}}
                                @enderror
                                <br>
                                <label for="correctchkopt2" class="text-danger">NOTE:- To select multiple press and hold ctrl and click the option</label>
                                
                                <br><br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                            {{-- End block 2 option Checkboxes question  --}}
                
                            {{-- Start block 4 option Checkboxes question  --}}
                            <div id="chk4" class="qt" style="display: none">
                                {{-- <input type="text" name="quest" placeholder="Enter your Chechbox Question " style="width:500px"> --}}
                                <br><br>
                                <label for="" class="form-label">Enter Options</label><br>
                                
                                <div class="chkoption">
                                    <input type="text" name="chkopt4_1" placeholder="Enter your Option 1 " value="{{$data->option_1}}">
                                    @error('chkopt4_1')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="chkopt4_2" placeholder="Enter your Option 2 " value="{{$data->option_2}}">
                                    @error('chkopt4_2')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="chkopt4_3" placeholder="Enter your Option 3 " value="{{$data->option_3}}">
                                    @error('chkopt4_3')
                                        {{$message}}
                                    @enderror
                                    <br><br>
                                    <input type="text" name="chkopt4_4" placeholder="Enter your Option 4 " value="{{$data->option_4}}">
                                    @error('chkopt4_4')
                                        {{$message}}
                                    @enderror
                
                                </div>
                                <br><br>
                                
                                <label for="">Please select the correct answer(s): </label>
                                <br>
                                <select id="correctchkopt4" name="correctchkopt4[]" class="form-select w-25" style="height:80px; text-align: center; font-size:14px;" multiple>
                                    <option value="1" @if ($data->correct_option == "1") {{ 'selected' }} @endif>1</option>
                                    <option value="2" @if ($data->correct_option == "2") {{ 'selected' }} @endif>2</option>
                                    <option value="3" @if ($data->correct_option == "3") {{ 'selected' }} @endif>3</option>
                                    <option value="4" @if ($data->correct_option == "4") {{ 'selected' }} @endif>4</option>
                                </select>
                                @error('correctchkopt4')
                                    {{$message}}
                                @enderror
                                <br>
                                <label for="correctchkopt4" class="text-danger">NOTE:- To select multiple press and hold ctrl and click the option</label>
                                <br><br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                            {{-- End block 4 option Checkboxes question  --}}

                            {{-- Start block text question  --}}
                           
                            <div id="shortAns" class="qt" style="display: none">
                                <br><br>
                                <label for="" id="" class="form-label">Enter Answer</label>
                                <input type="text" id="" name="answer1" placeholder="Enter Answer " style="width:500px; height: 50px;" value="{{$data->answer}}">
                                @error('answer1')
                                    {{$message}}
                                @enderror
                                <br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                            {{-- End block text question  --}}
                                
                            <div id="longAns" class="qt" style="display: none">
                                <br><br>
                                <label for="" id="" class="form-label">Enter Answer</label>
                                <input type="text" id="" name="answer2" placeholder="Enter Answer " style="width:500px; height: 50px;" value="{{$data->answer}}">
                                @error('answer2')
                                    {{$message}}
                                @enderror
                                <br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                     

                            <div id="fillBlank" class="qt" style="display: none">
                                <br><br>
                                <label for="" id="" class="form-label">Enter Answer</label><br>
                                <input type="text" id="" name="answer" placeholder="Enter Answer " style="width:180px;" value="{{$data->answer}}">
                                @error('answer')
                                    {{$message}}
                                @enderror
                                <br><br>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form group text-center">
                    <a href="{{url('manage-question/'.$subtopic_id)}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
                    <br><br>
                </div>

            </div>
        </form>
    </div>
    
    <script>
        let qtbox = document.querySelector(".questionbox")
        let qtypebtn = document.querySelector(".qtypebtn")
        let qtype = document.querySelector("#question_type")
    
        let qt = document.querySelectorAll(".qt")
        let shorttextquest = document.querySelector("#shortAns")
        let fillBlankquest = document.querySelector("#fillBlank")
        let longtextquest = document.querySelector("#longAns")
    
        let mcqquest2 = document.querySelector("#mcq2")
        let mcqquest4 = document.querySelector("#mcq4")
    
        let chkquest2 = document.querySelector("#chk2")
        let chkquest4 = document.querySelector("#chk4")
    
        // let diff_level = document.querySelector("#difficulty_level")
        // let diff_level1 = document.querySelector("#difficulty_level1")

        let inpquest_order = document.querySelector("#quest_order")
        let inpquest_order1 = document.querySelector("#quest_order1")

        let inpquest = document.querySelector("#quest")
        let inpquest1 = document.querySelector("#quest1")

        let inpquest_img = document.querySelector("#quest_img")
        let inpquest_img1 = document.querySelector("#quest_img1")

        let inpquest_video = document.querySelector("#quest_video")
        let inpquest_video1 = document.querySelector("#quest_video1")
        
        qtypebtn.onclick = ()=>{
    
            console.log(qtype.value)
            
            diff_level.style.display="block"
            diff_level1.style.display="block"
            diff_level2.style.display="block"

            inpquest_order.style.display="block"
            inpquest_order1.style.display="block"

            inpquest.style.display="block"
            inpquest1.style.display="block"

            inpquest_img.style.display="block"
            inpquest_img1.style.display="block"

            inpquest_video.style.display="block"
            inpquest_video1.style.display="block"
    
            qt.forEach((ele)=>{
                ele.style.display="none"
            })
    
            if(qtype.value === "shortAns"){
    
                shorttextquest.style.display="block"
    
            }else if (qtype.value === "longAns"){
    
                longtextquest.style.display="block"

            }
            else if(qtype.value === "mcq2"){
    
                mcqquest2.style.display="block"
    
            }else if(qtype.value === "mcq4"){
    
                mcqquest4.style.display="block"
    
            }else if(qtype.value === "chk2"){
    
                chkquest2.style.display="block"
    
            }else if(qtype.value === "chk4"){
    
                chkquest4.style.display="block"
    
            }
            else if(qtype.value === "fillBlank"){
    
                fillBlankquest.style.display="block"

            }else{
                alert("Please select valid option");
            }
        }
    
        
        let gobtn = document.querySelector("#gobtn");

        let diff_level = document.querySelector("#difficulty_level");
        let diff_level1 = document.querySelector("#difficulty_level1");
        let diff_level2 = document.querySelector("#difficulty_level2");

        let quest_order = document.querySelector("#quest_order");
        let quest_order1 = document.querySelector("#quest_order1");

        let quest = document.querySelector("#quest");
        let quest1 = document.querySelector("#quest1");

        let quest_video = document.querySelector("#quest_video");
        let quest_video1 = document.querySelector("#quest_video1");

        let quest_img = document.querySelector("#quest_img");
        let quest_img1 = document.querySelector("#quest_img1");
    </script>
</body>
</html>