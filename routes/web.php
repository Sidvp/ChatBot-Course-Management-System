<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\caresController;
use App\Models\Teachers_data;
use App\Models\Course;
use App\Models\Chapter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/botman', [BotManController::class, 'handle']);
    

Route::post('/botman', [BotManController::class, 'handle']);


// Route::get('/bot', [BotManController::class, 'handle1']);
    

// Route::post('/bot', [BotManController::class, 'handle1']);
    

// Route::match(['get', 'post'], '/bot', BotController::class);

// Route::match(['get', 'post'], '/botman', function(){
//     app('botman')->listen();
// });

Route::view('/botman/chat', 'chat');


////////////// Dashboard //////////////////////////////////////////////////////////



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('register',[caresController::class,'registration'])->middleware('alreadyLoggedIn');
// Route::post('register',[caresController::class,'getData']);

Route::get('register', 'App\Http\Controllers\caresController@registration')->middleware('alreadyLoggedIn');
Route::post('register', 'App\Http\Controllers\caresController@getData');

// Route::get('profiles',[caresController::class,'viewProfiles'])->middleware('isLoggedIn');
// Route::get('your-profile',[caresController::class,'viewYourProfile'])->middleware('isLoggedIn');

Route::get('profiles', 'App\Http\Controllers\caresController@viewProfiles')->middleware('alreadyLoggedIn');
Route::get('your-profile', 'App\Http\Controllers\caresController@viewYourProfile')->middleware('isLoggedIn');


Route::get('/adminhome',[caresController::class,'home'])->middleware('alreadyLoggedIn');
// Route::get('/adminhome',[caresController::class,'home']);
// Route::get('/adminhome', 'App\Http\Controllers\caresController@home')->middleware('alreadyLoggedIn');

// Route::get('login',[caresController::class,'login'])->middleware('alreadyLoggedIn');
// Route::post('login',[caresController::class,'getLoginData']);

Route::get('login', 'App\Http\Controllers\caresController@login')->middleware('alreadyLoggedIn');
Route::post('login', 'App\Http\Controllers\caresController@getLoginData');


// Route::get('logout',[caresController::class,'logout']);
Route::get('logout', 'App\Http\Controllers\caresController@logout');

Route::get('/teachers_data',function(){
    $all_teachers_data = Teachers_data::all();
});

Route::get('/courses_data',function(){
    $all_courses_data = Course::all();
    echo "<pre>";
    print_r($all_courses_data);
});

// Route::get('/chapters',[caresController::class,'getChapterData'])->middleware('isLoggedIn');

Route::get('/chapters', 'App\Http\Controllers\caresController@getChapterData')->middleware('isLoggedIn');

// Route::view("/dashboard","dashboard");   // Method-2 // Route::view("url path" , "view")
// Route::get('dashboard',[caresController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('dashboard', 'App\Http\Controllers\caresController@dashboard')->middleware('isLoggedIn');

// For Courses
// Route::get('manage-course',[caresController::class,'manageCourse'])->middleware('isLoggedIn');
Route::get('manage-course', 'App\Http\Controllers\caresController@manageCourse')->middleware('isLoggedIn');

// Route::get('add-course',[caresController::class,'addCourse'])->middleware('isLoggedIn');
Route::get('add-course', 'App\Http\Controllers\caresController@addCourse')->middleware('isLoggedIn');


// Route::post('save-course',[caresController::class,'saveCourse'])->middleware('isLoggedIn');
Route::post('save-course', 'App\Http\Controllers\caresController@saveCourse')->middleware('isLoggedIn');


// Route::get('edit-course/{course_id}',[caresController::class,'editCourse'])->middleware('isLoggedIn');
Route::get('edit-course/{course_id}', 'App\Http\Controllers\caresController@editCourse')->middleware('isLoggedIn');



// Route::post('update-course',[caresController::class,'updateCourse'])->middleware('isLoggedIn');
Route::post('update-course', 'App\Http\Controllers\caresController@updateCourse')->middleware('isLoggedIn');



// Route::get('delete-course/{course_id}',[caresController::class,'deleteCourse'])->middleware('isLoggedIn');
Route::get('delete-course/{course_id}', 'App\Http\Controllers\caresController@deleteCourse')->middleware('isLoggedIn');



// Route::get('view-course',[caresController::class,'viewCourse'])->middleware('isLoggedIn');
Route::get('view-course', 'App\Http\Controllers\caresController@viewCourse')->middleware('isLoggedIn');


// For Chapters
// Route::get('select-course',[caresController::class,'selectCourse'])->middleware('isLoggedIn');
Route::get('select-course', 'App\Http\Controllers\caresController@selectCourse')->middleware('isLoggedIn');



// Route::post('identify-course',[caresController::class,'identifyCourse'])->middleware('isLoggedIn');
Route::post('identify-course', 'App\Http\Controllers\caresController@identifyCourse')->middleware('isLoggedIn');


// Route::get('manage-chapter/{course_id}',[caresController::class,'manageChapter'])->middleware('isLoggedIn');
Route::get('manage-chapter/{course_id}', 'App\Http\Controllers\caresController@manageChapter')->middleware('isLoggedIn');



// Route::get('add-chapter/{course_id}',[caresController::class,'addChapter'])->middleware('isLoggedIn');
Route::get('add-chapter/{course_id}', 'App\Http\Controllers\caresController@addChapter')->middleware('isLoggedIn');



// Route::post('save-chapter/{course_id}',[caresController::class,'saveChapter'])->middleware('isLoggedIn');
// Route::post('save-chapter',[caresController::class,'saveChapter'])->middleware('isLoggedIn');
Route::post('save-chapter', 'App\Http\Controllers\caresController@saveChapter')->middleware('isLoggedIn');



// Route::get('edit-chapter/{chapter_id}',[caresController::class,'editChapter'])->middleware('isLoggedIn');
Route::get('edit-chapter/{chapter_id}', 'App\Http\Controllers\caresController@editChapter')->middleware('isLoggedIn');



// Route::post('update-chapter',[caresController::class,'updateChapter'])->middleware('isLoggedIn');
Route::post('update-chapter', 'App\Http\Controllers\caresController@updateChapter')->middleware('isLoggedIn');



// Route::get('delete-chapter/{chapter_id}',[caresController::class,'deleteChapter'])->middleware('isLoggedIn');
Route::get('delete-chapter/{chapter_id}', 'App\Http\Controllers\caresController@deleteChapter')->middleware('isLoggedIn');



// Route::get('selected-course',[caresController::class,'selectedCourse'])->middleware('isLoggedIn');
Route::get('selected-course', 'App\Http\Controllers\caresController@selectedCourse')->middleware('isLoggedIn');



// Route::post('identified-course',[caresController::class,'identifiedCourse'])->middleware('isLoggedIn');
Route::post('identified-course', 'App\Http\Controllers\caresController@identifiedCourse')->middleware('isLoggedIn');



// Route::get('view-chapter',[caresController::class,'viewChapter'])->middleware('isLoggedIn');

// For Subtopics
// Route::get('select-course-for-subtopic',[caresController::class,'selectCourseForSubtopic'])->middleware('isLoggedIn');
Route::get('select-course-for-subtopic', 'App\Http\Controllers\caresController@selectCourseForSubtopic')->middleware('isLoggedIn');



// Route::post('identify-course-for-subtopic',[caresController::class,'identifyCourseForSubtopic'])->middleware('isLoggedIn');
Route::post('identify-course-for-subtopic', 'App\Http\Controllers\caresController@identifyCourseForSubtopic')->middleware('isLoggedIn');


// Route::get('select-chapter-for-subtopic',[caresController::class,'selectChapterForSubtopic'])->middleware('isLoggedIn');
Route::get('select-chapter-for-subtopic', 'App\Http\Controllers\caresController@selectChapterForSubtopic')->middleware('isLoggedIn');


// Route::post('identify-chapter-for-subtopic',[caresController::class,'identifyChapterForSubtopic'])->middleware('isLoggedIn');
Route::post('identify-chapter-for-subtopic', 'App\Http\Controllers\caresController@identifyChapterForSubtopic')->middleware('isLoggedIn');


// Route::get('manage-subtopic/{chapter_id}',[caresController::class,'manageSubtopic'])->middleware('isLoggedIn');
Route::get('manage-subtopic/{chapter_id}', 'App\Http\Controllers\caresController@manageSubtopic')->middleware('isLoggedIn');



// Route::get('add-subtopic/{chapter_id}',[caresController::class,'addSubtopic'])->middleware('isLoggedIn');
Route::get('add-subtopic/{chapter_id}', 'App\Http\Controllers\caresController@addSubtopic')->middleware('isLoggedIn');

// Route::post('save-subtopic',[caresController::class,'saveSubtopic'])->middleware('isLoggedIn');
Route::post('save-subtopic', 'App\Http\Controllers\caresController@saveSubtopic')->middleware('isLoggedIn');



// Route::get('edit-subtopic/{subtopic_id}',[caresController::class,'editSubtopic'])->middleware('isLoggedIn');
Route::get('edit-subtopic/{subtopic_id}', 'App\Http\Controllers\caresController@editSubtopic')->middleware('isLoggedIn');
Route::get('edit-subtopic1/{subtopic_id}', 'App\Http\Controllers\caresController@editSubtopic1')->middleware('isLoggedIn');


// Route::post('update-subtopic',[caresController::class,'updateSubtopic'])->middleware('isLoggedIn');
Route::post('update-subtopic', 'App\Http\Controllers\caresController@updateSubtopic')->middleware('isLoggedIn');



// Route::get('delete-subtopic/{subtopic_id}',[caresController::class,'deleteSubtopic'])->middleware('isLoggedIn');
Route::get('delete-subtopic/{subtopic_id}', 'App\Http\Controllers\caresController@deleteSubtopic')->middleware('isLoggedIn');




// Route::get('selected-course-for-subtopic',[caresController::class,'selectedCourseForSubtopic'])->middleware('isLoggedIn');
Route::get('selected-course-for-subtopic', 'App\Http\Controllers\caresController@selectedCourseForSubtopic')->middleware('isLoggedIn');



// Route::post('identified-course-for-subtopic',[caresController::class,'identifiedCourseForSubtopic'])->middleware('isLoggedIn');
Route::post('identified-course-for-subtopic', 'App\Http\Controllers\caresController@identifiedCourseForSubtopic')->middleware('isLoggedIn');


// Route::get('selected-chapter-for-subtopic',[caresController::class,'selectedChapterForSubtopic'])->middleware('isLoggedIn');
Route::get('selected-chapter-for-subtopic', 'App\Http\Controllers\caresController@selectedChapterForSubtopic')->middleware('isLoggedIn');



// Route::post('identified-chapter-for-subtopic',[caresController::class,'identifiedChapterForSubtopic'])->middleware('isLoggedIn');
Route::post('identified-chapter-for-subtopic', 'App\Http\Controllers\caresController@identifiedChapterForSubtopic')->middleware('isLoggedIn');

// Route::get('view-subtopic',[caresController::class,'viewSubtopic'])->middleware('isLoggedIn');

// For questions

// Route::get('select-course-for-question',[caresController::class,'selectCourseForQuestion'])->middleware('isLoggedIn');
Route::get('select-course-for-question', 'App\Http\Controllers\caresController@selectCourseForQuestion')->middleware('isLoggedIn');




// Route::post('identify-course-for-question',[caresController::class,'identifyCourseForQuestion'])->middleware('isLoggedIn');
Route::post('identify-course-for-question', 'App\Http\Controllers\caresController@identifyCourseForQuestion')->middleware('isLoggedIn');


// Route::get('select-chapter-for-question',[caresController::class,'selectChapterForQuestion'])->middleware('isLoggedIn');
Route::get('select-chapter-for-question', 'App\Http\Controllers\caresController@selectChapterForQuestion')->middleware('isLoggedIn');




// Route::post('identify-chapter-for-question',[caresController::class,'identifyChapterForQuestion'])->middleware('isLoggedIn');
Route::post('identify-chapter-for-question', 'App\Http\Controllers\caresController@identifyChapterForQuestion')->middleware('isLoggedIn');


// Route::get('select-subtopic-for-question',[caresController::class,'selectSubtopicForQuestion'])->middleware('isLoggedIn');
Route::get('select-subtopic-for-question', 'App\Http\Controllers\caresController@selectSubtopicForQuestion')->middleware('isLoggedIn');


// Route::post('identify-subtopic-for-question',[caresController::class,'identifySubtopicForQuestion'])->middleware('isLoggedIn');
Route::post('identify-subtopic-for-question', 'App\Http\Controllers\caresController@identifySubtopicForQuestion')->middleware('isLoggedIn');


// Route::get('manage-question/{subtopic_id}',[caresController::class,'manageQuestion'])->middleware('isLoggedIn');
Route::get('manage-question/{subtopic_id}', 'App\Http\Controllers\caresController@manageQuestion')->middleware('isLoggedIn');



// Route::get('add-question/{subtopic_id}',[caresController::class,'addQuestion'])->middleware('isLoggedIn');
Route::get('add-question/{subtopic_id}', 'App\Http\Controllers\caresController@addQuestion')->middleware('isLoggedIn');


// Route::post('save-question',[caresController::class,'saveQuestion'])->middleware('isLoggedIn');
Route::post('save-question', 'App\Http\Controllers\caresController@saveQuestion')->middleware('isLoggedIn');



// Route::get('edit-question/{question_id}',[caresController::class,'editQuestion'])->middleware('isLoggedIn');
Route::get('edit-question/{question_id}', 'App\Http\Controllers\caresController@editQuestion')->middleware('isLoggedIn');
Route::get('edit-question1/{question_id}', 'App\Http\Controllers\caresController@editQuestion1')->middleware('isLoggedIn');


Route::get('show-details/{question_id}', 'App\Http\Controllers\caresController@showDetails')->middleware('isLoggedIn');
Route::get('show-details1/{question_id}', 'App\Http\Controllers\caresController@showDetails1')->middleware('isLoggedIn');

Route::get('show-details-subtopic/{subtopic_id}', 'App\Http\Controllers\caresController@showDetailsSubtopic')->middleware('isLoggedIn');
Route::get('show-details-subtopic1/{subtopic_id}', 'App\Http\Controllers\caresController@showDetailsSubtopic1')->middleware('isLoggedIn');

Route::get('view-subtopics/{chapter_id}', 'App\Http\Controllers\caresController@viewSubtopics')->middleware('isLoggedIn');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::get('selected-course-for-subtopic',[caresController::class,'selectedCourseForSubtopic'])->middleware('isLoggedIn');
Route::get('selected-course-for-question', 'App\Http\Controllers\caresController@selectedCourseForQuestion')->middleware('isLoggedIn');



// Route::post('identified-course-for-subtopic',[caresController::class,'identifiedCourseForSubtopic'])->middleware('isLoggedIn');
Route::post('identified-course-for-question', 'App\Http\Controllers\caresController@identifiedCourseForQuestion')->middleware('isLoggedIn');


// Route::get('selected-chapter-for-subtopic',[caresController::class,'selectedChapterForSubtopic'])->middleware('isLoggedIn');
Route::get('selected-chapter-for-question', 'App\Http\Controllers\caresController@selectedChapterForQuestion')->middleware('isLoggedIn');



// Route::post('identified-chapter-for-subtopic',[caresController::class,'identifiedChapterForSubtopic'])->middleware('isLoggedIn');
Route::post('identified-chapter-for-question', 'App\Http\Controllers\caresController@identifiedChapterForQuestion')->middleware('isLoggedIn');

Route::post('identified-subtopic-for-question', 'App\Http\Controllers\caresController@identifiedSubtopicForQuestion')->middleware('isLoggedIn');

// Route::get('selected-chapter-for-subtopic',[caresController::class,'selectedChapterForSubtopic'])->middleware('isLoggedIn');
Route::get('selected-subtopic-for-question', 'App\Http\Controllers\caresController@selectedSubtopicForQuestion')->middleware('isLoggedIn');



// Route::post('identified-chapter-for-subtopic',[caresController::class,'identifiedChapterForSubtopic'])->middleware('isLoggedIn');
Route::post('identified-subtopic-for-question', 'App\Http\Controllers\caresController@identifiedSubtopicForQuestion')->middleware('isLoggedIn');
// Route::post('identified-subtopic-for-question/{question_id}', 'App\Http\Controllers\caresController@identifiedSubtopicForQuestion')->middleware('isLoggedIn');

Route::get('view-questions/{subtopic_id}', 'App\Http\Controllers\caresController@viewQuestions')->middleware('isLoggedIn');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::post('update-question',[caresController::class,'updateQuestion'])->middleware('isLoggedIn');
Route::post('update-question', 'App\Http\Controllers\caresController@updateQuestion')->middleware('isLoggedIn');


// Route::get('delete-question/{question_id}',[caresController::class,'deleteQuestion'])->middleware('isLoggedIn');
Route::get('delete-question/{question_id}', 'App\Http\Controllers\caresController@deleteQuestion')->middleware('isLoggedIn');



// Route::view("/chapters","chapters")->middleware('isLoggedIn');  
// Route::get('course-series',[caresController::class,'courseSeries'])->middleware('isLoggedIn');
Route::get('course-series', 'App\Http\Controllers\caresController@courseSeries')->middleware('isLoggedIn');



// Route::get('chapters/{course_series_id}', [caresController::class,'chapterSeries'])->middleware('isLoggedIn');
Route::get('chapters/{course_series_id}', 'App\Http\Controllers\caresController@chapterSeries')->middleware('isLoggedIn');

// 



///////////////////////////////////////////////////////////////////////////////////////////
// url + page -> route

// Route::get('/', function () {   // opens 'url' for welcome page
//     return view('home');   // open 'page'
//     // return view('welcome');   // open 'page'
// });

// Route::get('/home', function () {   // Method-1
//     return redirect('class-course');   // re-direct to another page
// });

Route::get('/about', function () {   // Method-1
    return view('about');   // re-direct to another page
});

// Route::get("user", [UserController::class,'show']);   // route to controller 

Route::get("user", [UserController::class,'dbConnection']);   // route to controller 

// Route::get("user/{name}", [UserController::class,'loadView']);   // route to controller // pass data to view through controller.

// Route::get("user", [UserController::class,'loadView']);   // route to controller // pass data to view through controller.

// Route::get("user/{id}", [UserController::class,'showUser']);   // route to controller  // pass data through url

Route::get('/users/{name}', function ($name) {  // route to view
    return view("users", ["user"=>$name]);
});

Route::view("/users","users");   // Method-2 // Route::view("url path" , "view")

// Route for controller - caresController
// Route::get('caresController',[caresController::class, 'getData']);
// Route::post('caresController',[caresController::class, 'getData']);



// Route to grouped middleware
// Route::group(['middleware'=>['checkIfLoggedIn']],function(){
//     Route::View('login','login');
    
//     Route::View('class-course','class-course');


// });

Route::view('accessDenied', 'accessDenied');

Route::get('main/{name?}', function ($name = null) {    
    $data = compact('name');
    return view('main')->with($data);   
});

// Route::view('home','home');


Route::view('register','register');

Route::view('login','login');
// Route::view('login','login')->middleware('checkIfLoggedIn');


Route::get('/class-course', function () {   // route to view  // opens 'url' for welcome page
    return view('class-course');   // open 'page'
});


Route::get('/select-lesson', function () {   // opens url - about page
        return view('lesson');   // open 'page'
});

Route::get('/upload-video', function () {   
    return view('upload-video');   
});

Route::get('/upload-mcqs', function () {   
    return view('upload-MCQs');   
});

Route::get('/upload-student-data', function () {   
    return view('upload-student-data');   
});

// Route::get("about", '/about');
// Route::get("contact", '/contact');


// Route::get('/{id?}', function ($id = null) {   
//     echo $id;                     //  {{$id}}  - access in welcome.blade.php
//     return view('welcome');   

//     // return view('welcome', ['id' => $id]);
// });
