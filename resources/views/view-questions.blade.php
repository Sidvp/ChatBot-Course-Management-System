@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')

<div class="container" >
    <div class="row">
        <div class="col-md-10 mx-auto">
         
                <h2>View Questions</h2> <br>  
            
                <div>
                    <h4><strong>Class: </strong> {{$course->class}}</h4>
                    <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>

                    <br>

                    <h4><strong>Chapter No: </strong> {{$chapter->chapter_no}}</h4>
                    <h4><strong>Chapter    : </strong> {{$chapter->chapter_name}}</h4>

                    <br>

                    <h4><strong>Subtopic: </strong> {{$subtopic->subtopic_name}}</h4>
                    <br><br>

                </div>
                 
                {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{url('add-question/'.$subtopic->subtopic_id)}}" ><button class="btn btn-primary me-md-2" type="button">Add Question</button></a><br><br><br>
                </div> --}}

                <div class="col-md-12 text-center">
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
        
            <input type="hidden" name="course_id" value="{{ $course->course_id }}">
            <input type="hidden" name="chapter_id" value="{{ $chapter->chapter_id }}">
            <input type="hidden" name="subtopic_id" value="{{ $subtopic->subtopic_id }}">
            
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Question Type</th>
                        <th class="text-center">Difficulty Level</th>
                        <th class="text-center">Question Order</th>
                        <th class="text-center">Question</th>
                        {{-- <th class="text-center">Image Link</th> --}}
                        {{-- <th class="text-center">Video Link</th> --}}
                        {{-- <th class="text-center">Option 1</th> --}}
                        {{-- <th class="text-center">Option 2</th> --}}
                        {{-- <th class="text-center">Option 3</th> --}}
                        {{-- <th class="text-center">Option 4</th> --}}
                        {{-- <th class="text-center">Correct Option</th> --}}
                        {{-- <th class="text-center">Answer</th> --}}
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

 
                <tbody>
                    @php
                        $i=1;
                    @endphp
                
                    @foreach ($questions as $index => $question)
                        <tr>
                            {{-- <td>{{$index + $questions->firstItem()}}</td> --}}
                            <td>{{$i++}}</td>
                            <td class="text-center">{{$question->question_type}}</td>
                            <td class="text-center">{{$question->difficulty_level}}</td>
                            <td class="text-center">{{$question->question_order}}</td>
                            <td class="text-left">{{$question->question}}</td>
                            {{-- <td class="text-left"><a href="{{$question->image_link}}">{{$question->image_link}}</a></td> --}}
                            {{-- <td class="text-left"><a href="{{$question->video_link}}">{{$question->video_link}}</a></td> --}}

                            {{-- <td class="text-left">{{$question->option_1}}</td> --}}
                            {{-- <td class="text-left">{{$question->option_2}}</td> --}}
                            {{-- <td class="text-left">{{$question->option_3}}</td> --}}
                            {{-- <td class="text-left">{{$question->option_4}}</td> --}}
                            {{-- <td class="text-center">{{$question->correct_option}}</td> --}}
                            {{-- <td class="text-left">{{$question->answer}}</td> --}}
                            
                            
                            {{-- <td><a href="{{url('edit-question/'.$question->question_id)}}" class="btn btn-primary ">Edit</a><a href="{{url('delete-question/'.$question->question_id)}}" class="btn btn-danger">Delete</a> </td> --}}
                            <td>
                                <a href="{{url('show-details1/'.$question->question_id)}}" class="btn btn-secondary ">Show Details</a> 
                                {{-- &nbsp;&nbsp;&nbsp; --}}
                                {{-- <a href="{{url('edit-question/'.$question->question_id)}}" class="btn btn-primary ">Edit</a> --}}
                                {{-- &nbsp;&nbsp;&nbsp; --}}
                                {{-- <a href="{{url('delete-question/'.$question->question_id)}}" class="btn btn-danger">Delete</a>  --}}
                            </td>
                        </tr>         
                    @endforeach 
                </tbody>
            </table>  
            {{-- <div class="row">
                <div class="col-7">
                    Showing {{ $chapters->firstItem() }} - {{ $chapters->lastItem() }} of {{ $chapters->total() }}
                </div>
                <div class="col-5 mx-auto">
                    {{$chapters->links()}}
                </div>
            </div>
             --}}

             <div class="form group mx-auto">
                <br>
                <a href="{{url('selected-subtopic-for-question')}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
            </div>
            
        </div>
    </div>
</div> 




@endsection 
{{-- <div>
    <div>
        <h3>Welcome, {{$data1->name}}</h3>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{url('/your-profile')}}"><button class="btn btn-primary me-md-2" type="button">Your Profile</button></a>
        <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
        {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
    {{-- </div>
</div>


<br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Column content -->
            <div class="table-responsive">
            
               
                    <table class="table borderless"> --}}
                        {{-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>School Name</th>
                            </tr>
                        </thead> --}}
                        {{-- <thead>
                            <tr>
                                <th>Manage Course</th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">Add Course</button></a>
                                </th>
                                <th>
                                    <button class="btn btn-secondary me-md-2 col-8" type="button">View Course</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Chapter</th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">Add Chapter</button></a>
                                </th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">View Chapter</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Subtopic</th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">Add Subtopic</button></a>
                                </th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">View Subtopic</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Questions</th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">Add Questions</button></a>
                                </th>
                                <th>
                                    <a href=""><button class="btn btn-secondary me-md-2 col-8" type="button">View Questions</button></a>
                                </th>
                            </tr>
                        </thead>
                    </table>
                
            </div>
    
        </div>
    </div>
</div>--}}
        
