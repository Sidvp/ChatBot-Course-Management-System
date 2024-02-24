@extends('main')
@push('title')
    <title>CARES-Goa</title>
@endpush
@section('main-section')
<h1 style="margin-left:90px;">Courses</h1>    

<div class="container" style="margin-left:150px;">
    <div class="row">
        <div class="col-md-6 ">
    <br>
    {{-- <div class="table-responsive"> --}}
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Curriculum</th>
                </tr>
            </thead>
            <tbody>
                @php 
                $i=1; 
                @endphp

                @foreach ($data as $index =>$d)
                    <tr>
                        {{-- <td>{{$i++}}</td> --}}
                        <td>{{$index + $data->firstItem()}}</td>
                        <td>{{$d->class}}</td>
                        <td>{{$d->curriculum}}</td>
                    </tr>
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
    </div>

    {{-- <pre>
        {{print_r($teachers)}}
    </pre>
     --}}

     <br><br>
     

    {{-- </div> --}}
    </div>
</div>

<br><br>

<div class="d-grid gap-2 d-md-flex justify-content-md-start" style="margin-left: 100px;">
    <a href="{{url('/dashboard')}}"><button class="btn btn-primary me-md-2" type="button">Back</button></a>
    {{-- <a href="{{url('/profiles')}}"><button class="btn btn-primary me-md-2" type="button">All Users</button></a> --}}
    {{-- <button class="btn btn-primary me-md-2" type="button">Logout</button> --}}
</div>

@endsection 