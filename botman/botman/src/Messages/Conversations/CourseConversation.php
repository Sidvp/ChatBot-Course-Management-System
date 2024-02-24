<?php

namespace BotMan\BotMan\Messages\Conversations;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Question as setQuest;
use Barryvdh\Debugbar\Facades\Debugbar as DebugBar;
use BotMan\BotMan\Messages\Attachments\Video;
use Illuminate\Support\Facades\Http;
use stdClass;

class CourseConversation extends Conversation
{   

    public $selectedChapterID;
    public $courseName;
    public $selectedCourseID;
    public $selectedSubtopicID;
    public $chapterName;
    public $subtopicName;
    public $subtopicVideoLink;
    
    public $curr_user;
    //  DB::select("select * from mdl_course");
   
    // got the data from db and printed 
    public function run()
    {
        // $this->getQuestion($order_count);
        $this->getUser();
        // $this->updateUserSubtopic(1,9);
        // $this->updateUserChapter(1,1);
        // $this->updateUserCourse(1,1);
        // $this->checkUserChapterComplete(1,1);
        // $this->getChapterSubTopics(2);

    }
    public function getUser(){
        
        // $userData = Http::post('http://localhost/moodle/webservice/rest/server.php',
        //     [
        //         'wstoken'=>'628ca07c975e4a8a031faae4664b0cee',
        //         'wsfunction'=>'core_user_get_users',
        //         'moodlewsrestformat'=>'json',
        //         'criteria[0][key]'=>'username',
        //         'criteria[0][value]'=>'admin',
        //     ]
        // )->json();

        // if($userData)
        //     print_r($userData);
        $user = DB::table('students')->where('uid','=',2022005332)->first();
        $this->say("Hi " . $user->name . " (User ID:". $user->uid .")...");
        $this->say("Welcome to CARES!!");
        $this->courseSelect($user->class);
    }

    public function getUserID(){
        $user = DB::table('students')->where('uid','=',123)->first();
        return $user->id;
    }

    
    public function courseSelect($class){

        $course = DB::table('course')->where('class','=',$class)->get();


        $question = Question::create("Select Course:")->callbackId('course_select');

        foreach($course as $c){
           $question->addButtons([
                Button::create($c->curriculum)->value($c->course_id)
           ]);
        }

        $this->ask($question, function (Answer $answer){
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedCourseID = $answer->getValue();
                // $this->say("Selected Course : " . $selectedCourse); 
                $this->selectedCourseID = $selectedCourseID;//storing the course id globally
                // $this->say("Course ID: " . $this->selectedCourseID);

                $courseSelected = DB::table('course')->where('course_id','=',$selectedCourseID)->first();

                $this->courseName = $courseSelected->curriculum;
                $this->say("Course Selected: " . $this->courseName);
                $this->chapterSelect($selectedCourseID);
            }
        });
    }


    public function chapterSelect($courseID){

        $chapters = DB::table('chapters')->where('course_id','=',$courseID)->get();
        
        $question = Question::create("Select Chapter")->callbackId('chapter_select');
        
        foreach($chapters as $chp){
            $question->addButtons([
                 Button::create($chp->chapter_name)->value($chp->chapter_id)
            ]);
         }        

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedChapterID = $answer->getValue();
                // $this->say("Selected Chapter : " . $selectedChapter); 

                $this->selectedChapterID = $selectedChapterID;//storing the chapter id globally

                $chapterSelected = DB::table('chapters')->where('chapter_id','=',$selectedChapterID)->first();

                $this->chapterName = $chapterSelected->chapter_name;
                $this->say("Chapter Selected: " . $this->chapterName);

                $this->subtopicSelect($selectedChapterID);
            }
        });

    }

    public function subtopicSelect($chapterID){

        $subtopics = DB::table('subtopics')->where('chapter_id','=',$chapterID)->get();
        
        $question = Question::create("Select Subtopic:")->callbackId('subtopic_select');
        
        foreach($subtopics as $sbt){
            $question->addButtons([
                 Button::create($sbt->subtopic_name)->value($sbt->subtopic_id)
            ]);
         }        

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedSubtopicID = $answer->getValue();
                // $this->say("Selected Subtopic ID: " . $selectedSubtopicID);
                $subtopicSelected = DB::table('subtopics')->where('subtopic_id','=',$selectedSubtopicID)->first();

                $this->subtopicName = $subtopicSelected->subtopic_name;
                // $this->say("Subtopic Selected: " . $this->subtopicName);

                $this->showSubtopicVideo($selectedSubtopicID);
            }
        });
    }

    //////////////////////////////////////////////////////////////////////////////////////////////
    public function nextSubtopic($selectedChapterID){
        $subtopics = DB::table('subtopics')->where('chapter_id','=',$selectedChapterID)->get();
        
        $question = Question::create("Select Subtopic:")->callbackId('subtopic_select');
        
        foreach($subtopics as $sbt){
            $question->addButtons([
                 Button::create($sbt->subtopic_name)->value($sbt->subtopic_id)
            ]);
         }        

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedSubtopicID = $answer->getValue();
                // $this->say("Selected Subtopic ID: " . $selectedSubtopicID);
                $subtopicSelected = DB::table('subtopics')->where('subtopic_id','=',$selectedSubtopicID)->first();

                $this->subtopicName = $subtopicSelected->subtopic_name;
                // $this->say("Subtopic Selected: " . $this->subtopicName);

                $this->showSubtopicVideo($selectedSubtopicID);
            }
        });
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    public function showSubtopicVideo($selectedSubtopicID){

        //video

        $subtopicSelected = DB::table('subtopics')->where('subtopic_id','=',$selectedSubtopicID)->first();

        $this->subtopicName = $subtopicSelected->subtopic_name;
    
        $this->say("Subtopic Selected: " . $this->subtopicName);

        $this->subtopicVideoLink = $subtopicSelected->video_link;

        $this->selectedSubtopicID = $subtopicSelected->subtopic_id;

        if($this->subtopicVideoLink){
            $iframe = "<iframe  width='250' height='150' src='$this->subtopicVideoLink' title='$this->subtopicName' allowfullscreen></iframe>";

            $this->say($iframe);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////
        
        // if($this->subtopicVideoLink){
        //     $attachment = new Video($this->subtopicVideoLink);
        //     $message = OutgoingMessage::create($this->subtopicName)->withAttachment($attachment);
        //     $this->say($message);
        // }

        $this->getQuestion(1, $selectedSubtopicID);
    }

    public function getQuestCount($subtopicID){
        $quest_count = DB::table('questions')->where('subtopic_id','=',$subtopicID)->count();
            // $this->say($quest_count);

        return $quest_count;
    }

    public function getUserCourseIds($uid){
        $progress = DB::table('user_progress')->where("uid","=",$uid)->first();

        if(empty($progress)){
            return "norecord";
        }else{
            if(strlen($progress->courseIDs) > 0){
                $courses = explode(",", $progress->courseIDs);
            }else{
                $courses = array();
            }
    
            // if no courses in column
            if(empty($courses)){
                return null;
            }
        }
        
        return $courses;
    }

    public function getUserChapterIds($uid){
        $progress = DB::table('user_progress')->where("uid","=",$uid)->first();

        if(empty($progress)){
            return "norecord";

        }else{
            if(strlen($progress->chapterIDs) > 0){
                $chapters = explode(",",$progress->chapterIDs);
            }else{
                $chapters = array();
            }
    
            // if no subtopics in column
            if(empty($chapters)){
                return array();
            }
        }
        return $chapters;
    }

    public function getUserSubtopicIds($uid){
        $progress = DB::table('user_progress')->where("uid","=",$uid)->first();

        if(empty($progress)){
            return "norecord";

        }else{
            if(strlen($progress->subtopicIDs) > 0){
                $subtopics = explode(",",$progress->subtopicIDs);
            }else{
                $subtopics = array();
            }
    
            // if no subtopics in column
            if(empty($subtopics)){
                return array();
            }
        }
        
        return $subtopics;
    }

    public function getChapterSubTopics($chapterId){
        $data = DB::table('subtopics')->where("chapter_id","=",$chapterId)->get();
        $subtopicIds = array();

        if(count($data)<=0){
            return array();
        }   

        foreach($data as $sub){
            array_push($subtopicIds,$sub->subtopic_id); 
        }

        return $subtopicIds; 

    }

    public function getCourseChapters($courseId){
        $data = DB::table('chapters')->where("course_id","=",$courseId)->get();
        $chapterIds = array();

        if(count($data)<=0){
            return array();
        }   
        
        foreach($data as $chp){
            array_push($chapterIds,$chp->chapter_id); 
        }

        return $chapterIds;
    }

    public function checkUserCourseComplete($uid,$courseId){

        $cur_chapters = $this->getUserChapterIds($uid);
        $tot_chapters = $this->getCourseChapters($courseId);

        if($cur_chapters==="norecord" || empty($cur_chapters) || empty($tot_chapters)){
            return false;
        }

        if(array_intersect($tot_chapters,$cur_chapters) === $tot_chapters){
            return true;
        }else{
            return false;
        }
    }

    public function checkUserChapterComplete($uid,$chapterId){

        $cur_subtopics = $this->getUserSubtopicIds($uid);
        $tot_subtopics = $this->getChapterSubTopics($chapterId);

        if($cur_subtopics==="norecord" || empty($cur_subtopics) || empty($tot_subtopics)){
            return false;
        }

        if(array_intersect($tot_subtopics,$cur_subtopics) === $tot_subtopics){
            return true;
        }else{
            return false;
        }
    }

    public function updateUserCourse($uid , $courseId){
        $hascompleted = $this->checkUserCourseComplete($uid,$courseId);

        if(!$hascompleted){
            return;
        }

        $userCourses = $this->getUserCourseIds($uid);

        if(empty( $userCourses)){
            $course_update = DB::update('update user_progress set courseIDs = ? where uid = ?', [$courseId,$uid]);
            
            return $this->say("Course Updated" . $course_update);
        }

        $idExist=0;
           
        foreach ($userCourses as $value) {
            if($value === settype($courseId,"string"))
            {
                $idExist=1;
                break;
            }
        }

        if($idExist){
            return $this->say("ID Exist Course Already Completed");
        }else{

            array_push($userCourses,$courseId);

            $new_chapters = implode(",", $userCourses);

            $course_update = DB::update('update user_progress set courseIDs = ? where uid = ?', [$new_chapters,$uid]);

            return $this->say("course Updated " . $course_update);
        }
    }

    public function updateUserChapter($uid , $chapterId){
        $hascompleted = $this->checkUserChapterComplete($uid,$chapterId);

        if(!$hascompleted){
            return;
        }

        $userChapters = $this->getUserChapterIds($uid);

        if(empty( $userChapters)){
            $chapter_update = DB::update('update user_progress set chapterIDs = ? where uid = ?', [$chapterId,$uid]);
            return $this->say("Chapter Updated" . $chapter_update);

            // return DB::table('user_progress')
            // ->where('id', $uid)
            // ->update([
            //     'chapterIDs'=>$chapterId,
            // ]);
        }

        $idExist=0;
            
        foreach ($userChapters as $value) {
            if($value === settype($chapterId,"string"))
            {
                $idExist=1;
                break;
            }
        } 

        if($idExist){
            return $this->say("ID Exist Chapter Already Completed");
        }else{

            array_push($userChapters,$chapterId);

            $new_chapters = implode(",", $userChapters);

            $chapter_update = DB::update('update user_progress set chapterIDs = ? where uid = ?', [$new_chapters,$uid]);

            return $this->say("Chapter Updated " . $chapter_update);
        }
    }


    public function updateUserSubtopic($uid , $subtopicId){

        $cur_subtopics = $this->getUserSubtopicIds($uid);

        if(empty($cur_subtopics)){//when user's data exist but subtopic is empty
            $topic_update = DB::update('update user_progress set subtopicIDs = ? where uid = ?', [$subtopicId,$uid]);

        }elseif($cur_subtopics==="norecord"){//when storing for first time

            $topic_update = DB::insert('insert into user_progress (uid, subtopicIDs) values (?, ?)', [$uid,$subtopicId]);

        }else{//appending the new subtopic to existing
            $idExist=0;
            
            foreach ($cur_subtopics as $value) {
                if($value === settype($subtopicId,"string"))
                {
                    $idExist=1;
                    break;
                }
            }
              

            if($idExist){
                return $this->say("ID Exist Subtopic Already Completed ");
            }


            array_push($cur_subtopics,$subtopicId);

            $new_subtopics = implode(",", $cur_subtopics);

            $topic_update = DB::update('update user_progress set subtopicIDs = ? where uid = ?', [$new_subtopics,$uid]);
            
        }

        if($topic_update){
            $this->say("Updated check "  . $topic_update);
        }else{
            $this->say("Erorrrr");
        }

        return $topic_update;
    }


    ///////////////////////////////////////////////////////////////////////////////////

    // task : to create set of question from db available and show in sequence wise
    public function getQuestion($order, $subtopicID){

        // $this->say("Updated check "  . $subtopicID);

        $quest = DB::table('questions')->where('subtopic_id','=',$subtopicID)->where('question_order','=',$order)->first();
        
        if($order > $this->getQuestCount($subtopicID)){
            $this->say("Your Subtopic is Completed");
        
            // $userprog["id"] = $this->getUserID();
            // $userprog["subtopicIDs"] = $order-1;


            // $progress = DB::insert('insert into userprogress (uid, subtopicIDs) values (?, ?)', [$userprog["id"],$userprog["subtopicIDs"]]);
            $progress = $this->updateUserSubtopic($this->getUserID(),$subtopicID);


            if($progress){
                $this->say("User progress stored");
                $chapterprog = $this->updateUserChapter($this->getUserID(),$this->selectedChapterID);

                if($chapterprog){

                    $this->say("Main Chapter Updated");
                    $courseprog = $this->updateUserCourse($this->getUserID(),$this->selectedCourseID);

                    if($courseprog){
                        $this->say("Main Course Updated");
                    }else{
                        $this->say("Main Course not Updated");
                    }
                }else{
                    $this->say("Main Chapter Not Updated");
                }
            }
            return $this->getUser();
        }


        if(!$quest){
            $this->say("Subtopic Over..");
            $this->selectedSubtopicID = $this->selectedSubtopicID + 1;
            // $subtopicID = $this->selectedSubtopicID;
            // return $this->showSubtopicVideo(2);

            // return $this->subtopicSelect($this->selectedChapterID);
            return $this->nextSubtopic($this->selectedChapterID, $this->selectedSubtopicID);
        }
        $next= "false";
 

        if($quest->question_type === "shortAns"){

            $this->ask($quest->question,function (Answer $answer) use ($order,$subtopicID){
                if(strlen($answer->getText())>1)
                    $this->getQuestion($order+1,$subtopicID);
                else
                    $this->repeat();
            });
        }
        elseif($quest->question_type === "longAns"){
            $this->ask($quest->question,function (Answer $answer) use ($order,$subtopicID){
                if(strlen($answer)>1)
                    $this->getQuestion($order+1,$subtopicID);
                else
                    $this->repeat();
            });
        }
        elseif($quest->question_type === "mcq2"){

            $question = Question::create($quest->question)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->option_1)->value("1"),
                    Button::create($quest->option_2)->value("2"),
                ]);
                $corr = $quest->correct_option;
            $this->ask($question, function (Answer $answer) use ($order,$subtopicID,$corr) {
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    if($selectedValue === $corr){
                        // $this->typesAndWaits(1);

                        $this->getQuestion($order+1,$subtopicID);
                        // $this->getQuestion(2,$subtopicID);
                    }else{
                        $this->repeat();
                    }
                }
            });
        }
        elseif($quest->question_type === "mcq4"){
            $question = Question::create($quest->question)
            ->callbackId('create_question');
                
            if($quest->image_link){
                $attachment = new Image($quest->image_link);
                $message = OutgoingMessage::create('Refering Image')->withAttachment($attachment);
                $this->say($message);
            }

            if($quest->video_link){
                $attachment = new Video($quest->video_link);
                $message = OutgoingMessage::create('Refering Video')->withAttachment($attachment);
                $this->say($message);
            }
                
            $question->addButtons([
                Button::create($quest->option_1)->value("1"),
                Button::create($quest->option_2)->value("2"),
                Button::create($quest->option_3)->value("3"),
                Button::create($quest->option_4)->value("4"),
            ]);

            // $corr = $quest->correctopt."";
            $corr = $quest->correct_option;
            $this->ask($question, function (Answer $answer) use ($order,$subtopicID,$corr) {
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    if($selectedValue === $corr){
                        $this->getQuestion($order+1,$subtopicID);
                    }else{
                        $this->say("Its Incorrect Answer");
                        $this->repeat();
                    }
                }
            });
        }
        elseif($quest->question_type === "chk2"){

            $question = Question::create($quest->question)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->option_1)->value("1"),
                    Button::create($quest->option_2)->value("2"),
                ]);
                $corr = $quest->correct_option;
            $this->ask($question, function (Answer $answer) use ($order,$subtopicID,$corr) {
                // Detect if button was clicked:
                // if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getText(); 
                if(strpos($corr,$selectedValue) !== false || strpos($corr,$selectedValue) === 0){
                    // $this->typesAndWaits(1);
                    $this->getQuestion($order+1,$subtopicID);
                }else{
                    $this->repeat();
                }
                // }
            });
        }
        elseif($quest->question_type === "chk4"){

            $question = Question::create($quest->question)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->option_1)->value("1"),
                    Button::create($quest->option_2)->value("2"),
                    Button::create($quest->option_3)->value("3"),
                    Button::create($quest->option_4)->value("4"),
                ]);
                $corr = $quest->correct_option;
            $this->ask($question, function (Answer $answer) use ($order,$subtopicID,$corr) {
                // Detect if button was clicked:
                // if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                if(strpos($corr,$selectedValue) !== false || strpos($corr,$selectedValue) === 0){
                    // $this->typesAndWaits(1);
                    $this->getQuestion($order+1,$subtopicID);
                }else{
                    $this->repeat();
                }
                        // }
            });
        }
        else{
           $this->say("Invalid Question");
        }

        
        // if($next=== "true")
        //     $this->getQuestion(2);
        // else
        //     $this->getQuestion(1);

    }

    public function askQuestion($curr_quest){

        if($curr_quest->question_type === "shortAns"){
            $this->ask($curr_quest->question,function (Answer $answer){
                if(strlen($answer->getValue()) > 1)
                    return true;
                else
                    return false;
            });
        }
        else
            return false;
    }


    //for learning and improvising
    public function askInfo()
    {
        $question = Question::create('Do you need a database?')
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons([
                Button::create('Yes!!')->value('yes'),
                Button::create('No!!')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                 if($selectedValue === "yes"){
                    $this->askNextStep();
                 }
            }
        });
    }

    public function askNextStep()
    {
        $this->ask('Shall we proceed? Say YES or NO', [
            [
                'pattern' => 'yes|yep',
                'callback' => function () {
                    $this->say('Okay - we\'ll keep going');
                }
            ],
            [
                'pattern' => 'nah|no|nope',
                'callback' => function () {
                    $this->say('PANIC!! Stop the engines NOW!');
                }
            ]
        ]);
    }

}

