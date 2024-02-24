@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')

<div class="container" >
    <div class="row">
        <div class="col-md-8 mx-auto">
         
                <h2>View Chapters</h2> <br>  
            
                <div>
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
        
            
            <table class="table text-center" >
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Chapter No.</th>
                        <th class="text-center">Chapter Name</th>
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>


                <tbody>
                    @php
                        $i=1;
                    @endphp
                
                    @foreach ($chapters as $index => $chapter)
                        <tr>
                            {{-- <td>{{$index + $chapters->firstItem()}}</td> --}}
                            <td>{{$i++}}</td>
                            <td class="text-center">{{$chapter->chapter_no}}</td>
                            <td class="text-left">{{$chapter->chapter_name}}</td>
                            {{-- <td><a href="{{url('edit-chapter/'.$chapter->chapter_id)}}" class="btn btn-primary me-md-4">Edit</a><a href="{{url('delete-chapter/'.$chapter->chapter_id)}}" class="btn btn-danger">Delete</a> </td> --}}
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
                <a href="{{url('selected-course')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
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
        
