<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers_data;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Subtopic;
use App\Models\Question;
use App\Models\CourseSeries;
use App\Models\ChapterSeries;


//use Illuminate\Support\Facades\DB;
//use Illuminate\View\View;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// use Session;

class caresController extends Controller
{
    // function getData(Request $req)
    // {
    //     echo "Form submitted successfully !!";
    //     return $req->input();
    // }


    // Registration
    public function registration(){
        return view('register');
    }

    public function getData(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:teachers_data',
                'schoolName' => 'required',
                'username' => 'required|unique:teachers_data',
                'password' => 'required|confirmed|min:5|max:12',
                'password_confirmation' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());

        // store data - using INSERT QUERY
        $teacher = new Teachers_data;
        $teacher->name = $request['name'];	
        $teacher->email = $request['email'];	
        $teacher->school_name = $request['schoolName'];	
        $teacher->username = $request['username'];	
        // $teacher->password = md5($request['password']);
        $teacher->password = Hash::make($request['password']);
        $result = $teacher->save();
        
        // success message
        if($result){
            // return back()->with('success', 'You have registered successfully!!');
            return redirect('login');
        }else{
            return back()->with('fail', 'Something went wrong!! Please Register again...');
        }

        
        // return redirect('teacher/profile');
    }

    public function viewProfiles(){
        $teachers = Teachers_data::all();

        // echo "<pre>";
        // print_r($teachers);
        // print_r($teachers->toArray());
        // echo "</pre>";
        // die;

        if (Session::has('loginId')){
            $data = compact('teachers');  // forms array
            return view('profiles')->with($data);
        }
       
    }

    public function login(){
        return view('login');
    }

    public function getLoginData(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required|min:5|max:12',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $teacher = Teachers_data::where('username','=',$request->username)->first();
        if($teacher){
            if(Hash::check($request->password,$teacher->password)){
                $request->session()->put('loginId', $teacher->teachers_id);
                // $request->session()->put('name', $teacher->name);
                // $request->session()->put('email', $teacher->email);
                // $request->session()->put('school_name', $teacher->school_name);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'You have entered wrong password');

            }            
            // return back()->with('success', 'You have registered successfully!!');
        }else{
            return back()->with('fail', 'This username is NOT registered!!');
        }
    }

     public function viewYourProfile(){
        $data=array();
        if (Session::has('loginId')){
            $data = Teachers_data::where('teachers_id', Session::get('loginId'))->first();
        }
        return view('yourProfile', compact('data')); // pass data from database 
     }

     public function dashboard(){
        // return "Welcome to your dashboard...";
        $data1=array();
       
        if (Session::has('loginId')){
            $data1 = Teachers_data::where('teachers_id', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data1'));

        // return view('dashboard');
     }

     public function home(){
        if (Session::has('loginId')){
            return view('home');
            // return 'loggedIN';
        }else{
            return view('home1');
            // return 'Not logged in';
        }
     }

     public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/adminhome');
        }
     }

    //  public function getChapterData(){
    //     return Chapter::all();
    //  }

    public function manageCourse(){
        // return 'add course';
        // return view('manage-course');
        $data = Course::paginate(6);
        if (Session::has('loginId')){
            $data = compact('data');  // forms array
            return view('manage-course')->with($data);
        }    
    }


    public function saveCourse(Request $request){
        $request-> validate([
            'class'=>'required',
            'curriculum' => 'required',
        ]);

        // dd($request->all());
        // $class = $request->class;
        // $curriculum = $request->curriculum;

        $newCourse = new Course();
        $newCourse->class = $request->class;
        $newCourse->curriculum = $request->curriculum;
        $result = $newCourse->save();

        // return redirect()->back()->with('success', 'Course added successfully.');  // success message


        // success message
        if($result){
            return back()->with('success', 'Course added successfully!!');
            // return redirect()->back()->with('success', 'Course added successfully.');  // success message
        }else{
            return back()->with('fail', 'Something went wrong!!');
        }
    }

    public function addCourse(){
        // return 'add course';
        // return view('manage-course');
        $data = Course::all();
        if (Session::has('loginId')){
            $data = compact('data');  // forms array
            return view('add-course')->with($data);
        }    
    }
    public function viewCourse(){
        // return view('view-course');
        $data = Course::paginate(6);
        if (Session::has('loginId')){
            $data = compact('data');  // forms array
            return view('view-course')->with($data);
        }
        
    }

    public function editCourse($course_id){
        $data=array();
        $data = Course::where('course_id', '=', $course_id)->first();  // access one record
        // $data = compact('data');
        // return $data;
        return view('edit-course',compact('data'));
       
    }

    public function updateCourse(Request $request){
        $request-> validate([
            'class'=>'required',
            'curriculum' => 'required',
        ]);

        $course_id = $request->course_id;
        $class = $request->class;
        $curriculum = $request->curriculum;

        Course::where('course_id','=',$course_id)->update([
            'class' => $class,
            'curriculum' => $curriculum, 
        ]);
        // success message
       
        return redirect()->back()->with('success', 'Course updated successfully!!');
    }

    public function deleteCourse($course_id){
        Course::where('course_id','=',$course_id)->delete();
        return redirect()->back()->with('success', 'Course deleted successfully!!');
    }

    public function selectCourse(){
        return view('select-course');
    }

    public function identifyCourse(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();

        // return $course;
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;
            // $chapters = Course::find($course->course_id)->paginate(5);
            // $chapters = Course::find($course->course_id)->chapters::paginate(10);

            // return view('manage-chapter');
            return view('manage-chapter', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
        }            
      
    }

    public function manageChapter($course_id){
    //     // $data=array();
    //     // if (Session::has('courseId')){
    //         // $data = Chapter::where('course_id', Session::get('courseId'))->first();
    //     //     return $data;
    //     // }

    //     // $chapters = Chapter::orderBy('created_at')->where('course_id', '=', Session::get('courseId'))->with(['chapter_name'])->first();
    //     // return ('data');
    // $course_id
        $course = Course::where([
            ['course_id','=',$course_id], 
        ])->first();

        $chapters = Course::find($course_id)->chapters;
        // return $chapters;
        
        return view('manage-chapter', compact('course','chapters'));

    }

    public function addChapter($course_id){
        $class=Session::get('class');
        $curriculum=Session::get('curriculum');

        // return $curriculum;
        return view('add-chapter', compact('course_id', 'class', 'curriculum'));
    }
    
    public function saveChapter(Request $request){

        $request-> validate([
            'chapter_no'=>'required|unique:chapters,chapter_no',
            'chapter_name'=>'required|unique:chapters,chapter_name',
        ]);
        $course_id = $request->course_id;

        $course = Course::find($course_id);
        $chapter = new Chapter();
        $chapter->chapter_no = $request->chapter_no;
        $chapter->chapter_name = $request->chapter_name;
        $course->chapters()->save($chapter);

        // return "Chapter added";
        return redirect()->back()->with('success', 'Chapter added successfully!!');  // success message
    }

    public function editChapter($chapter_id){
        $data=array();
        $data = Chapter::where('chapter_id', '=', $chapter_id)->first();  // access one record
        
        // return $data;

        $course = Course::where([
            ['course_id','=',$data->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('edit-chapter',compact('data','course'));
    }

    public function updateChapter(Request $request){
        $request-> validate([
            'chapter_no'=>'required',
            'chapter_name'=>'required',
        ]);

        $course_id = $request->course_id;
        $chapter_id = $request->chapter_id;
        $chapter_no = $request->chapter_no;
        $chapter_name = $request->chapter_name;
       
        Chapter::where('chapter_id','=',$chapter_id)->update([
            'chapter_no' => $chapter_no,
            'chapter_name' => $chapter_name,
        ]);
        // success message
       
        return redirect()->back()->with('success', 'Chapter updated successfully!!');
    }

    public function deleteChapter($chapter_id){
        Chapter::where('chapter_id','=',$chapter_id)->delete();
        return redirect()->back()->with('success', 'Chapter deleted successfully!!');
        // return view('manage-chapter')->with('success', 'Chapter deleted successfully!!');
    }



    public function selectedCourse(){
        return view('selected-course');
    }

    public function identifiedCourse(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();

        // return $course;
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;
            // $chapters = Course::find($course->course_id)->paginate(5);
            // $chapters = Course::find($course->course_id)->chapters::paginate(10);

        
            // return view('manage-chapter');
            return view('view-chapter', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
        }            
      
    }

    // For Subtopics
    public function selectCourseForSubtopic(){
        return view('select-course-for-subtopic');
    }

    public function identifyCourseForSubtopic(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;

            return view('select-chapter-for-subtopic', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
    }

}

    public function selectChapterForSubtopic(){
        $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapters = Course::find($course_id)->chapters;
        // return $chapters;
        return view('select-chapter-for-subtopic', compact('course', 'chapters'));
    }
    
    public function identifyChapterForSubtopic(Request $request){
        $chapter = Chapter::where([
            ['chapter_name', '=', $request->chapter_name],
            ['course_id', '=', $request->course_id],
        ])->first();

        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter->chapter_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $subtopics = Chapter::find($chapter->chapter_id)->subtopics;

        return view('manage-subtopic', compact('course','chapter','subtopics'));
    
    }

    public function manageSubtopic($chapter_id){
        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter_id],
        ])->first();

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        $subtopics = Chapter::find($chapter_id)->subtopics;
       
        return view('manage-subtopic', compact('course','chapter','subtopics'));
    }

    public function addSubtopic($chapter_id){
        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter_id],
        ])->first();

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        $subtopics = Chapter::find($chapter_id)->subtopics;

        return view('add-subtopic', compact('chapter_id', 'course', 'chapter', 'subtopics'));
    }

    public function saveSubtopic(Request $request){

        $request-> validate([
            'subtopic_name'=>'required|unique:subtopics,subtopic_name',
            'video_link'=>'required|unique:subtopics,video_link|url',
        ]);
        $chapter_id = $request->chapter_id;

      
        $chapter = Chapter::find($chapter_id);
        $subtopic = new Subtopic();
        $subtopic->subtopic_name = $request->subtopic_name;
        $subtopic->video_link = $request->video_link;

        $subtopic->additional_resource = "";
        $subtopic->image_link = "";

        if($request->additional_resource){
            $subtopic->additional_resource = $request->additional_resource;
        }
        if($request->image_link){
            $subtopic->image_link = $request->image_link;
        }
        $subtopic->subtopic_marks = $request->subtopic_marks;
        $subtopic->weightage_easy = $request->weightage_easy;
        $subtopic->weightage_intermediate = $request->weightage_intermediate;
        $subtopic->weightage_difficult = $request->weightage_difficult;

        $chapter->subtopics()->save($subtopic);

        // // return "Chapter added";
        return redirect()->back()->with('success', 'Subtopic added successfully!!');  // success message
    }

    public function editSubtopic($subtopic_id){
        $data=array();
        $data = Subtopic::where('subtopic_id', '=', $subtopic_id)->first();  // access one record
        
        // return $data;

        $chapter = Chapter::where([
            ['chapter_id','=',$data->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('edit-subtopic',compact('data', 'chapter', 'course'));
    }

    public function editSubtopic1($subtopic_id){
        $data=array();
        $data = Subtopic::where('subtopic_id', '=', $subtopic_id)->first();  // access one record
        
        // return $data;

        $chapter = Chapter::where([
            ['chapter_id','=',$data->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('edit-subtopic1',compact('data', 'chapter', 'course'));
    }

    public function updateSubtopic(Request $request){
        $request-> validate([
            'subtopic_name'=>'required',
            'video_link'=>'required',
        ]);

        $course_id = $request->course_id;
        $chapter_id = $request->chapter_id;
        $subtopic_id = $request->subtopic_id;
        $subtopic_name = $request->subtopic_name;
        $video_link = $request->video_link;

        $additional_resource = "";
        $image_link = "";

        if($request->additional_resource){
            $additional_resource = $request->additional_resource;
        }
        if($request->image_link){
            $image_link = $request->image_link;        
        }
        
        $subtopic_marks = $request->subtopic_marks;
        $weightage_easy = $request->weightage_easy;
        $weightage_intermediate = $request->weightage_intermediate;
        $weightage_difficult = $request->weightage_difficult;

       
        Subtopic::where('subtopic_id','=',$subtopic_id)->update([
            'subtopic_name' => $subtopic_name,
            'video_link' => $video_link,

            'additional_resource' => $additional_resource,
            'image_link' => $image_link,
            'subtopic_marks' => $subtopic_marks,
            'weightage_easy' => $weightage_easy,
            'weightage_intermediate' => $weightage_intermediate,
            'weightage_difficult' => $weightage_difficult,
        ]);
        // success message
        return redirect()->back()->with('success', 'Subtopic updated successfully!!');
    }

    public function deleteSubtopic($subtopic_id){
        Subtopic::where('subtopic_id','=',$subtopic_id)->delete();
        return redirect()->back()->with('success', 'Subtopic deleted successfully!!');
    }

    public function selectedCourseForSubtopic(){
        return view('selected-course-for-subtopic');
    }

    public function identifiedCourseForSubtopic(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();

        // return $course;
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;
            // $chapters = Course::find($course->course_id)->paginate(5);
            // $chapters = Course::find($course->course_id)->chapters::paginate(10);

            return view('selected-chapter-for-subtopic', compact('course', 'chapters'));

        
            // return view('manage-chapter');
            // return view('view-chapter', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
        }            
      
    }

    public function selectedChapterForSubtopic(){
        $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapters = Course::find($course_id)->chapters;
        return view('selected-chapter-for-subtopic', compact('course', 'chapters'));
    }

    public function identifiedChapterForSubtopic(Request $request){
        $request->validate(
            [
                'chapter_name'=>'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());

        $chapter = Chapter::where([
            ['chapter_name', '=', $request->chapter_name],
            ['course_id', '=', $request->course_id],
        ])->first();

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // return $chapter;
    
        if($chapter){
            $request->session()->put('chapter_id', $chapter->chapter_id);
            $request->session()->put('chapter_name', $chapter->chapter_name);
           

            $subtopics = Chapter::find($chapter->chapter_id)->subtopics;
            // $chapters = Course::find($course->course_id)->paginate(5);
            // $chapters = Course::find($course->course_id)->chapters::paginate(10);

        
            // return view('manage-chapter');
            return view('view-subtopic', compact('course', 'chapter', 'subtopics')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
        }            
      
    }


    // For Questions

    public function selectCourseForQuestion(){
        return view('select-course-for-question');
    }

    public function identifyCourseForQuestion(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;

            return view('select-chapter-for-question', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
    }

}

    public function selectChapterForQuestion(){
        $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapters = Course::find($course_id)->chapters;
        // return $chapters;
        return view('select-chapter-for-question', compact('course', 'chapters'));
    }
    
    public function identifyChapterForQuestion(Request $request){
        $chapter = Chapter::where([
            ['chapter_name', '=', $request->chapter_name],
            ['course_id', '=', $request->course_id],
        ])->first();

        if($chapter){
            $request->session()->put('chapter_id', $chapter->chapter_id);
        }
        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter->chapter_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $subtopics = Chapter::find($chapter->chapter_id)->subtopics;

        return view('select-subtopic-for-question', compact('course', 'chapter', 'subtopics'));
    }

    public function selectSubtopicForQuestion(){
        $course_id = Session::get('course_id');
        $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;

        $subtopics = Chapter::find($chapter->chapter_id)->subtopics;
        
        return view('select-subtopic-for-question', compact('course', 'chapter', 'subtopics'));

    }

    public function identifySubtopicForQuestion(Request $request){
        $subtopic = Subtopic::where([
            ['subtopic_name', '=', $request->subtopic_name],
            ['chapter_id', '=', $request->chapter_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $request->chapter_id],
        ])->first();

        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $questions = Subtopic::find($subtopic->subtopic_id)->questions;

        // return compact('questions');

        return view('manage-question', compact('course','chapter','subtopic','questions'));
    }

    public function manageQuestion($subtopic_id){
        $subtopic = Subtopic::where([
            ['subtopic_id', '=', $subtopic_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $subtopic->chapter_id],
        ])->first();

        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $questions = Subtopic::find($subtopic->subtopic_id)->questions;

        // return compact('questions');

        return view('manage-question', compact('course','chapter','subtopic','questions'));
    }

    public function addQuestion($subtopic_id){
        $subtopic = Subtopic::where([
            ['subtopic_id', '=', $subtopic_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $subtopic->chapter_id],
        ])->first();

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // $subtopics = Chapter::find($chapter->chapter_id)->subtopics;

        return view('add-question', compact('subtopic_id', 'course', 'chapter', 'subtopic'));
    }

    function saveQuestion(Request $request){

        // echo "reached";
        // echo $req->input('qtype');
        // echo $req->input('shortquest');

        $request->validate([
            'question_type'=>'required',
            'difficulty_level'=>'required',
            'quest'=>'required',
            'quest_order' => 'required',
        ]);
        $question = new Question();

        $question->question_type = $request->question_type;
        $question->difficulty_level = $request->difficulty_level;
        $question->question = $request->quest;
        $question->question_order = $request->quest_order;
        $question->option_1 = "";
        $question->option_2 = "";
        $question->option_3 = "";
        $question->option_4 = "";
        $question->correct_option = "";
        $question->image_link = "";
        $question->video_link = "";
        $question->answer = "";

        $question->subtopic_id = $request->subtopic_id;

        if($request->question_type === "mcq2"){
            $request->validate([
                'opt2_1'=>'required',
                'opt2_2'=>'required',
                'correctOpt2'=>'required',
            ]);
            $question->option_1 = $request->opt2_1;
            $question->option_2 = $request->opt2_2;
            $question->correct_option = $request->correctOpt2;
        }else if($request->question_type === "mcq4"){
            $request->validate([
                'opt4_1'=>'required',
                'opt4_2'=>'required',
                'opt4_3'=>'required',
                'opt4_4'=>'required',
                'correctOpt4'=>'required',
            ]);
            $question->option_1 = $request->opt4_1;
            $question->option_2 = $request->opt4_2;
            $question->option_3 = $request->opt4_3;
            $question->option_4 = $request->opt4_4;
            $question->correct_option = $request->correctOpt4;
        }else if($request->question_type === "chk2"){
            $request->validate([
                'chkopt2_1'=>'required',
                'chkopt2_2'=>'required',
                'correctchkopt2'=>'required',
            ]);
            $question->option_1 = $request->chkopt2_1;
            $question->option_2 = $request->chkopt2_2;
            $question->correct_option = implode(",", $request->correctchkopt2);            
        }else if($request->question_type === "chk4"){
            $request->validate([
                'chkopt4_1'=>'required',
                'chkopt4_2'=>'required',
                'chkopt4_3'=>'required',
                'chkopt4_4'=>'required',
                'correctchkopt4'=>'required',
            ]);
            $question->option_1 = $request->chkopt4_1;
            $question->option_2 = $request->chkopt4_2;
            $question->option_3 = $request->chkopt4_3;
            $question->option_4 = $request->chkopt4_4;
            $question->correct_option = implode(",", $request->correctchkopt4);
        }else if($request->question_type === "fillBlank"){
            $request->validate([
                'answer'=>'required',
            ]);
            $question->answer = $request->answer;
        }else if($request->question_type === "shortAns"){
            $request->validate([
                'answer1'=>'required',
            ]);
            $question->answer = $request->answer1;
        }else if($request->question_type === "longAns"){
            $request->validate([
                'answer2'=>'required',
            ]);
            $question->answer = $request->answer2;
        }
        $question->image_link=$request->quest_img;
        $question->video_link=$request->quest_video;

        $result = $question->save();
        // echo $question;
        // return redirect('adminhome');
        if($result){
            return redirect()->back()->with('success', 'Question added successfully!!');
        }else{
            return back()->with('fail', 'Something went wrong!! Please try again...');
        }
    }

    public function editQuestion($question_id){
        $data=array();
        $data = Question::where('question_id', '=', $question_id)->first();  // access one record
        
        // return $data;

        $subtopic = Subtopic::where([
            ['subtopic_id','=',$data->subtopic_id], 
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id','=',$subtopic->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('edit-question',compact('data', 'subtopic', 'chapter', 'course'));
        // return view('edit-question');
    }

    public function editQuestion1($question_id){
        $data=array();
        $data = Question::where('question_id', '=', $question_id)->first();  // access one record
        
        // return $data;

        $subtopic = Subtopic::where([
            ['subtopic_id','=',$data->subtopic_id], 
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id','=',$subtopic->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('edit-question1',compact('data', 'subtopic', 'chapter', 'course'));
        // return view('edit-question');
    }

    public function updateQuestion(Request $request){

        $request->validate([
            'question_type'=>'required',
            'difficulty_level'=>'required',
            'quest'=>'required',
            'quest_order'=>'required'
        ]);

        $course_id = $request->course_id;
        $chapter_id = $request->chapter_id;
        $subtopic_id = $request->subtopic_id;
        $question_id = $request->question_id;
        $question_type = $request->question_type;
        $difficulty_level = $request->difficulty_level;
        $question = $request->quest;
        $question_order = $request->quest_order;


        if($question_type === "mcq2"){
            $request->validate([
                'opt2_1'=>'required',
                'opt2_2'=>'required',
                'correctOpt2'=>'required',
            ]);
            $option_1 = $request->opt2_1;
            $option_2 = $request->opt2_2;
            $option_3 = "";
            $option_4 = "";
            $correct_option = $request->correctOpt2;
            $answer = "";
        }else if($question_type === "mcq4"){
            $request->validate([
                'opt4_1'=>'required',
                'opt4_2'=>'required',
                'opt4_3'=>'required',
                'opt4_4'=>'required',
                'correctOpt4'=>'required',
            ]);
            $option_1 = $request->opt4_1;
            $option_2 = $request->opt4_2;
            $option_3 = $request->opt4_3;
            $option_4 = $request->opt4_4;
            $correct_option = $request->correctOpt4;
            $answer = "";
        }else if($question_type === "chk2"){
            $request->validate([
                'chkopt2_1'=>'required',
                'chkopt2_2'=>'required',
                'correctchkopt2'=>'required',
            ]);
            $option_1 = $request->chkopt2_1;
            $option_2 = $request->chkopt2_2;
            $option_3 = "";
            $option_4 = "";
            $correct_option = implode(",", $request->correctchkopt2);     
            $answer = "";
        }else if($question_type === "chk4"){
            $request->validate([
                'chkopt4_1'=>'required',
                'chkopt4_2'=>'required',
                'chkopt4_3'=>'required',
                'chkopt4_4'=>'required',
                'correctchkopt4'=>'required',
            ]);
            $option_1 = $request->chkopt4_1;
            $option_2 = $request->chkopt4_2;
            $option_3 = $request->chkopt4_3;
            $option_4 = $request->chkopt4_4;
            $correct_option = implode(",", $request->correctchkopt4);
            $answer = "";
        }else if($question_type === "fillBlank"){
            $request->validate([
                'answer'=>'required',
            ]);
            $option_1 = "";
            $option_2 = "";
            $option_3 = "";
            $option_4 = "";
            $correct_option = "";
            $answer = $request->answer;
        }else if($question_type === "shortAns"){
            $request->validate([
                'answer1'=>'required',
            ]);
            $option_1 = "";
            $option_2 = "";
            $option_3 = "";
            $option_4 = "";
            $correct_option = "";
            $answer = $request->answer1;
        }else if($question_type === "longAns"){
            $request->validate([
                'answer2'=>'required',
            ]);
            $option_1 = "";
            $option_2 = "";
            $option_3 = "";
            $option_4 = "";
            $correct_option = "";
            $answer = $request->answer2;        
    }
        $image_link=$request->quest_img;
        $video_link=$request->quest_video;

        Question::where('question_id','=',$question_id)->update([
            'question_type' => $question_type,
            'difficulty_level' => $difficulty_level,
            'question' => $question,
            'question_order' => $question_order,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4,
            'correct_option' => $correct_option,
            'image_link' => $image_link,
            'video_link' => $video_link,
            'answer' => $answer,
        ]);
    //     // success message
        return redirect()->back()->with('success', 'Question updated successfully!!');
    }

    public function deleteQuestion($question_id){
        Question::where('question_id','=',$question_id)->delete();
        return redirect()->back()->with('success', 'Question deleted successfully!!');
    }


    public function showDetailsSubtopic($subtopic_id){
        $data=array();
        $data = Subtopic::where('subtopic_id', '=', $subtopic_id)->first();  // access one record
        
        $chapter = Chapter::where([
            ['chapter_id','=',$data->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('show-details-subtopic',compact('data', 'chapter', 'course'));

    }

    public function showDetailsSubtopic1($subtopic_id){
        $data=array();
        $data = Subtopic::where('subtopic_id', '=', $subtopic_id)->first();  // access one record
        
        $chapter = Chapter::where([
            ['chapter_id','=',$data->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('show-details-subtopic1',compact('data', 'chapter', 'course'));

    }

    public function viewSubtopics($chapter_id){
        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter_id],
        ])->first();

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // return $chapter;
    
        if($chapter){
            // $request->session()->put('chapter_id', $chapter->chapter_id);
            // $request->session()->put('chapter_name', $chapter->chapter_name);
           

            $subtopics = Chapter::find($chapter->chapter_id)->subtopics;
            // $chapters = Course::find($course->course_id)->paginate(5);
            // $chapters = Course::find($course->course_id)->chapters::paginate(10);

        
            // return view('manage-chapter');
            return view('view-subtopic', compact('course', 'chapter', 'subtopics')); // pass data from database 

        }
    }
    
    public function showDetails($question_id){
        $data=array();
        $data = Question::where('question_id', '=', $question_id)->first();  // access one record
        
        // return $data;

        $subtopic = Subtopic::where([
            ['subtopic_id','=',$data->subtopic_id], 
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id','=',$subtopic->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('show-details',compact('data', 'subtopic', 'chapter', 'course'));
        // return view('edit-question');
    }

    public function showDetails1($question_id){
        $data=array();
        $data = Question::where('question_id', '=', $question_id)->first();  // access one record
        
        // return $data;

        $subtopic = Subtopic::where([
            ['subtopic_id','=',$data->subtopic_id], 
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id','=',$subtopic->chapter_id], 
        ])->first();

        $course = Course::where([
            ['course_id','=',$chapter->course_id], 
        ])->first();

        // return $course;
        // $data = compact('data');
        // return $data;
        return view('show-details1',compact('data', 'subtopic', 'chapter', 'course'));
        // return view('edit-question');
    }
    //////////////////////////////////////////////////////////////////////////////////////

    
    public function selectedCourseForQuestion(){
        return view('selected-course-for-question');
    }

    public function identifiedCourseForQuestion(Request $request){
        $request->validate(
            [
                'class'=>'required',
                'curriculum' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        $course = Course::where([
            ['class','=',$request->class], 
            ['curriculum','=',$request->curriculum]
        ])->first();
    
        if($course){
            $request->session()->put('course_id', $course->course_id);
            $request->session()->put('class', $course->class);
            $request->session()->put('curriculum', $course->curriculum);

            $chapters = Course::find($course->course_id)->chapters;

            return view('selected-chapter-for-question', compact('course', 'chapters')); // pass data from database 

            // return back()->with('fail', 'No valid course selected');
    }

}

    public function selectedChapterForQuestion(){
        $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapters = Course::find($course_id)->chapters;
        // return $chapters;
        return view('selected-chapter-for-question', compact('course', 'chapters'));
    }
    
    public function identifiedChapterForQuestion(Request $request){
        $chapter = Chapter::where([
            ['chapter_name', '=', $request->chapter_name],
            ['course_id', '=', $request->course_id],
        ])->first();

        if($chapter){
            $request->session()->put('chapter_id', $chapter->chapter_id);
        }
        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter->chapter_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $subtopics = Chapter::find($chapter->chapter_id)->subtopics;

        return view('selected-subtopic-for-question', compact('course', 'chapter', 'subtopics'));
    }

    public function selectedSubtopicForQuestion(){
        $course_id = Session::get('course_id');
        $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $course_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $chapter_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;

        $subtopics = Chapter::find($chapter->chapter_id)->subtopics;
        
        return view('selected-subtopic-for-question', compact('course', 'chapter', 'subtopics'));

    }

    public function identifiedSubtopicForQuestion(Request $request){
        $subtopic = Subtopic::where([
            ['subtopic_name', '=', $request->subtopic_name],
            ['chapter_id', '=', $request->chapter_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $request->chapter_id],
        ])->first();

        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $questions = Subtopic::find($subtopic->subtopic_id)->questions;

        // return compact('questions');

        return view('view-questions', compact('course','chapter','subtopic','questions'));
    }



    public function viewQuestions($subtopic_id){
        $subtopic = Subtopic::where([
            ['subtopic_id', '=', $subtopic_id],
        ])->first();

        $chapter = Chapter::where([
            ['chapter_id', '=', $subtopic->chapter_id],
        ])->first();

        // $course_id = Session::get('course_id');
        // $chapter_id = Session::get('chapter_id');

        $course = Course::where([
            ['course_id', '=', $chapter->course_id],
        ])->first();

        // $chapters = Course::find($course_id)->chapters;
        // return $chapter;
        $questions = Subtopic::find($subtopic->subtopic_id)->questions;

        // return compact('questions');

        return view('view-questions', compact('course','chapter','subtopic','questions'));
    }




    /////////////////////////////////////////////////////////////////////////////////////
   public function courseSeries(){
    $courses = CourseSeries::all();
    return view('course-series', compact('courses'));
   }
    
   public function chapterSeries($course_series_id){

    $course = CourseSeries::where([
        ['course_series_id', '=', $course_series_id],
    ])->first();

   

    $chapters = CourseSeries::find($course_series_id)->chapterSeries;

    // return compact('chapters');

    return view('chapter-seriess', compact('course', 'chapters'));
   }

}