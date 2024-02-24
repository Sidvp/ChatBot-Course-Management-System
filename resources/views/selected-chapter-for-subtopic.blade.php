@extends('main2')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')

<div class="container" >
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form method="post" action="{{url('identified-chapter-for-subtopic')}}">
                @csrf
            <div class="form-group mt-4 card p-3 bg-white">
         
                <h2 class="text-center">Select Chapter</h2> <br>  
            
                <div style="margin-left: 50px; margin-right: 50px;">
                    <h4><strong>Class: </strong> {{$course->class}}</h4>
                    <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>
                </div>
                 
                <br><br>

                <div class="col-md-12 mx-auto">
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
                {{-- <input type="hidden" name="chapter_id" value="{{$chapter->chapter_id}}"> --}}

                <select class="form-control required" name="chapter_name" id="class" style="margin: auto; width:1000px;">
                    <option selected disabled value="">Select Chapter</option>
                    
                    @foreach ($chapters as $chapter)

                    <option value="{{ $chapter['chapter_name'] }}">{{ $chapter['chapter_name'] }}</option>

                    @endforeach
                </select>

           
                <br><br>

                <div class="form-group mx-auto">
                    <br>
                    <a href="{{url('/selected-course-for-subtopic')}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
                    <button class="btn btn-primary me-md-2" type="submit">Next</button>      
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
        
