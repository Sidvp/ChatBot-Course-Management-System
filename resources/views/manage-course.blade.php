@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')

<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-md-8 mx-auto">
         
                <h2>Manage Courses</h2>   
            
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{url('/add-course')}}"><button class="btn btn-primary me-md-2" type="button">Add Course</button></a><br><br><br>
                </div>

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
                    

                     {{-- @if ($errors->any())
                     <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                     </div>
                       
                     @endif --}}
                </div>
        
            
            <table class="table text-center" >
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Curriculum</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @php 
                    $i=1; 
                    @endphp --}}

                    @foreach ($data as $index => $d)
                        <tr>
                            <td>{{$index + $data->firstItem()}}</td>
                            <td>{{$d->class}}</td>
                            <td>{{$d->curriculum}}</td>
                            <td><a href="{{url('edit-course/'.$d->course_id)}}" class="btn btn-primary me-md-4">Edit</a><a href="{{url('delete-course/'.$d->course_id)}}" class="btn btn-danger">Delete</a> </td>
                        </tr>
                        {{-- @php
                            $i++;
                        @endphp --}}
                        
                    @endforeach
                </tbody>
            </table> 
            
            <div class="row">
                <div class="col-7">
                    Showing {{ $data->firstItem() }} - {{ $data->lastItem() }} of {{ $data->total() }}
                </div>
                <div class="col-5 mx-auto">
                    {{$data->links()}}
                </div>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{url('/dashboard')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
                {{-- <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
                {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
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
        
