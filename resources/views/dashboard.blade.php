@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')
<h1 class="text-center">Dashboard</h1>    

<div>
    <div>
        <h3>Welcome, {{$data1->name}}</h3>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{url('/your-profile')}}"><button class="btn btn-primary me-md-2" type="button">Your Profile</button></a>
        <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a>
        {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
    </div>
</div>


<br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Column content -->
            <div class="table-responsive">
            
               
                    <table class="table borderless">
                        {{-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>School Name</th>
                            </tr>
                        </thead> --}}
                        <thead>
                            <tr>
                                <th>Manage Courses</th>
                                <th>
                                    <a href="manage-course"><button class="btn btn-secondary me-md-2 col-8" type="button">Manage Courses</button></a>
                                </th>
                                <th>
                                    <a href="view-course"><button class="btn btn-secondary me-md-2 col-8" type="button">View Courses</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Chapters</th>
                                <th>
                                    <a href="select-course"><button class="btn btn-secondary me-md-2 col-8" type="button">Manage Chapters</button></a>
                                </th>
                                <th>
                                    <a href="selected-course"><button class="btn btn-secondary me-md-2 col-8" type="button">View Chapters</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Subtopics</th>
                                <th>
                                    <a href="select-course-for-subtopic"><button class="btn btn-secondary me-md-2 col-8" type="button">Manage Subtopics</button></a>
                                </th>
                                <th>
                                    <a href="selected-course-for-subtopic"><button class="btn btn-secondary me-md-2 col-8" type="button">View Subtopics</button></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Manage Questions</th>
                                <th>
                                    <a href="select-course-for-question"><button class="btn btn-secondary me-md-2 col-8" type="button">Manage Questions</button></a>
                                </th>
                                <th>
                                    <a href="selected-course-for-question"><button class="btn btn-secondary me-md-2 col-8" type="button">View Questions</button></a>
                                </th>
                            </tr>
                        </thead>
                    </table>
                
            </div>
    
        </div>
    </div>
</div>
        
@endsection