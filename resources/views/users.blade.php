<x-header componentName="Users"/>
<h1>User Page</h1>
<h2>Welcome {{$user ?? "Guest"}}</h2>
<x-footer componentName="Users"/>
<!-- 
URL Generation - using 'url' class
- to get query parameters: eg: ?age=30
- to find current page
- to submit the form on specific route
- to find/get last visited page

1. Current URL
2. Full URL
3. Previous URL

Reference:
URL class in Laravel: https://laravel.com/api/9.x/Illuminate/Support/Facades/URL.html
-->


<h2>{{10+20}}</h2>  <!-- Expression -->

<h2>{{count($state)}}</h2>

<!-- If loop -->
@if($state[0]=="Goa")
<h2>Welcome to {{$state[0]}}</h2>
@endif

<!-- If-else loop -->
@if($user=="Siddhi")
<h2>Welcome {{$user}}</h2>
@else
<h2>Welcome Guest</h2>
@endif


<!-- If-elseif loop -->
@if($user=="Siddhi")
<h2>Welcome to {{$user}}</h2>
@elseif($user=="Tanvi")
<h2>Hi {{$user}}</h2>
@else
<h2>Hi Unknown</h2>
@endif

<!-- For loop -->
@for($i=0; $i<10; $i++)
<h4>{{$i}}</h4>
@endfor

<!-- Foreach loop -->
@foreach($state as $s)
<h6>{{$s}}</h6>
@endforeach


<!-- csrf token function - to protect data from unauthorized users -->
@csrf <!-- To genetrate token in hidden field -->

<!-- Include view -->
@include('innerPage')




<!-- Include PHP in JS -->
<script>
    var data=@json($state);
    // console.warn(data);
    console.log(data);
    // console.warn(data[0]);
    console.log(data[0]);
</script>


{{-- 
    Laravel Middleware
    - when specific rules or condition has to be applied to the website.
    - Eg.: If user is logged in then access the website.
            or access is allowed to website only for users above 21 yrs+ age
            or if residing in specific country, etc.

    - 3 Types of Middleware:
       1. Global Middleware
       2. Grouped Middleware (used for specific pages)
          - Make Middleware
          - Register it
          - Apply Middleware
       3. Routed Middleware    
--}}

{{-- 
    
    // Connecting to Database:
       - method-1 - using classes
       - method-2 - using models

       Models -
       1. Map database table 
    
--}}