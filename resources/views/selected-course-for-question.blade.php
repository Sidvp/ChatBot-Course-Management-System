<!doctype html>
<html lang="en">

<head>
  <title>Add Course</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/> --}}
</head>

<body class="bg-dark">
  
  @include('header');  <!-- View -->


    <div class="container">

      
        <div class="row">
        <div class="col-md-12 mx-auto">
        <form method="post" action="{{url('identified-course-for-question')}}">
            @csrf
            <div class="form-group mt-4 card p-3 bg-white">
                
                    <br>
                <h2 class="text-center text-primary">Select Course</h2><br><br>
              
                {{-- <div class="row"> --}}
                    <div class="col-md-5 mx-auto">
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
             

                <div class="row">
                    <div class="form-group col-md-5 required mx-auto">
                      <div class="input-group">
                        <label for="class" class="" style="">Class</label>

                        {{-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" name="class" class="form-control" id="classDropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" data-bs-toggle="dropdown">
                              Select Class
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="classDropdownMenuButton">
                              <li><a href="#" class="dropdown-item">VI</a></li>
                              <li><a href="#" class="dropdown-item">VII</a></li>
                              <li><a href="#" class="dropdown-item">VIII</a></li>
                            </ul>
                          </div> --}}

                          <select class="form-control required" name="class" id="class" style="">
                            <option selected disabled value="">Select Class</option>
                            {{-- <option value="VI">VI</option> --}}
                            {{-- <option value="VII">VII</option> --}}
                            {{-- <option value="VIII">VIII</option> --}}
                            <option value="VI" @if (old('class') == "VI") {{ 'selected' }} @endif>VI</option>
                            <option value="VII" @if (old('class') == "VII") {{ 'selected' }} @endif>VII</option>
                            <option value="VIII" @if (old('class') == "VIII") {{ 'selected' }} @endif>VIII</option>
                          </select>
                          <br>
                          <span class="text-danger">
                            @error('class')
                                {{$message}}
                            @enderror
                          </span>
                    </div>
                    </div>
                </div>
                
                <br>
                
               
                <div class="row">
                  <div class="form-group col-md-5 required mx-auto">
                    <div class="input-group">
                      <label for="class" class="" style="">Curriculum</label>

                      {{-- <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" name="class" class="form-control" id="classDropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" data-bs-toggle="dropdown">
                            Select Class
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="classDropdownMenuButton">
                            <li><a href="#" class="dropdown-item">VI</a></li>
                            <li><a href="#" class="dropdown-item">VII</a></li>
                            <li><a href="#" class="dropdown-item">VIII</a></li>
                          </ul>
                        </div> --}}
                       
                        <select class="form-control required" name="curriculum" id="curriculum" style="">
                          <option selected disabled value="">Select Curriculum</option>
                          {{-- <option value="VI">REGULAR</option> --}}
                          {{-- <option value="VII">ELECTIVE</option> --}}
                          <option value="REGULAR" @if (old('curriculum') == "REGULAR") {{ 'selected' }} @endif>REGULAR</option>
                          <option value="ELECTIVE" @if (old('curriculum') == "ELECTIVE") {{ 'selected' }} @endif>ELECTIVE</option>
                        </select>
                      <br>
                  
                      <span class="text-danger">
                        @error('curriculum')
                            {{$message}}
                        @enderror
                      </span>
                  </div>
                  </div>
              </div>
                
                <br>
                
               
                <div class="form group mx-auto">
                    <br>
                    <a href="{{url('/dashboard')}}"><button class="btn btn-danger me-md-2" type="button">Back</button></a>
                    <button class="btn btn-primary me-md-2" type="submit">Next</button>      
                </div>
               
                </div>
        
            
        </form>
    </div>
  </div>
    </div>


  <!-- Bootstrap JavaScript Libraries -->

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  
</body>

</html>

