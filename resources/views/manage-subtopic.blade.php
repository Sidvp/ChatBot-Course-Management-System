@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')

<div class="container" >
    <div class="row">
        <div class="col-md-12 mx-auto">
         
                <h2>Manage Subtopic</h2> <br>  
            
                <div>
                    <h4><strong>Class: </strong> {{$course->class}}</h4>
                    <h4><strong>Curriculum: </strong> {{$course->curriculum}}</h4>

                    <br>

                    <h4><strong>Chapter No: </strong> {{$chapter->chapter_no}}</h4>
                    <h4><strong>Chapter      : </strong> {{$chapter->chapter_name}}</h4>

                </div>
                 
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{url('add-subtopic/'.$chapter->chapter_id)}}" ><button class="btn btn-primary me-md-2" type="button">Add Subtopic</button></a><br><br><br>
                </div>

                <div class="col-md-12 mx-auto text-center">
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
        
            
            <table class="table text-center" >
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th colspan="3" class="text-center">Wightages (%)</th>
                        <th></th>
                    </tr>
                </thead>
                <thead>                    
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Subtopic Name</th>
                        {{-- <th class="text-center">Video Link</th> --}}
                        {{-- <th class="text-center">Additional Resources (Link)</th> --}}
                        {{-- <th class="text-center">Image Link</th> --}}
                        <th class="text-center">Marks/Subtopic</th>
                        {{-- <th class="text-center">
                            <tr colspan="3">Weightages</tr>
                        </th> --}}
                        <th class="text-center">Easy</th>
                        <th class="text-center">Intermediate</th>
                        <th class="text-center">Difficult</th>
                        
                        <th class="text-center">Action</th>
                    </tr>
                </thead>


                <tbody>
                    @php
                        $i=1;
                    @endphp
                
                    @foreach ($subtopics as $index => $subtopic)
                        <tr>
                            {{-- <td>{{$index + $chapters->firstItem()}}</td> --}}
                            <td>{{$i++}}</td>
                            <td class="text-left">{{$subtopic->subtopic_name}}</td>
                            {{-- <td class="text-left"><a href="{{$subtopic->video_link}}">{{$subtopic->video_link}}</a></td> --}}
                            {{-- <td class="text-left"><a href="{{$subtopic->additional_resource}}">{{$data->additional_resource}}</a></td> --}}
                            {{-- <td class="text-left"><a href="{{$subtopic->image_link}}">{{$data->image_link}}</a></td> --}}
                            <td class="text-center">{{$subtopic->subtopic_marks}}</td>
                            <td class="text-center">{{$subtopic->weightage_easy}}</td>
                            <td class="text-center">{{$subtopic->weightage_intermediate}}</td>
                            <td class="text-center">{{$subtopic->weightage_intermediate}}</td>
                            <td><a href="{{url('show-details-subtopic/'.$subtopic->subtopic_id)}}" class="btn btn-secondary ">Show Details</a> &nbsp;&nbsp;&nbsp; <a href="{{url('edit-subtopic/'.$subtopic->subtopic_id)}}" class="btn btn-primary me-md-4">Edit</a> <a href="{{url('delete-subtopic/'.$subtopic->subtopic_id)}}" class="btn btn-danger">Delete</a> </td>
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
                <a href="{{url('select-chapter-for-subtopic')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
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
        
