<?php

namespace BotMan\BotMan\Messages\Conversations;

use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use stdClass;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\CourseConversation;
use App\Models\Userprogress as uprog;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Subtopic;

/**
 * MyProgressConversation class
 *
 * This class handles the conversation for displaying user progress.
 */
class MyProgressConversation extends Conversation
{

    
    public $curr_user;
    public $curr_username;
    public $curr_userclass;

    public $courseCon;
    /**
     * The entry point for the conversation.
     */
    public function run()
    {
        
        // $this->getUserData();
        // $this->completedChapter(2);
        $this->mainMenu(2);
        // $this->ongoingCoursesSubtopicBased(2);
        
    }

    public function getUserData(){

        $this->ask("Enter your moodle username",function(Answer $answer){
            $userData = $answer->getText();
            $this->verifyUser($userData);
        });

        
    }

    public function verifyUser($userdata){
       
        $moodleData =Http::post("http://localhost/moodle/webservice/rest/server.php?wstoken=628ca07c975e4a8a031faae4664b0cee&wsfunction=core_user_get_users&moodlewsrestformat=json&criteria[0][key]=username&criteria[0][value]=". $userdata)->json();
        
        if(!empty($moodleData["users"])){
            $m_username = $moodleData["users"][0]["username"];
            $m_fullname = $moodleData["users"][0]["firstname"] ." ". $moodleData["users"][0]["lastname"];
            $this->say("Welcome " . $m_fullname ." . Lets get started");
            $this->curr_username = $m_username;

            $userExist = User::where('uid',$m_username)->first();

            if($userExist){
                $this->mainMenu($userExist->id);
            }else{
                $this->say("User not registered");
            }

        }else{
            $this->say("Soory, Not Verified");
        }

    }

    public function getUserID(){

        if(!empty($this->curr_username)){
            $user = User::where('uid',$this->curr_username )->first();
            return $user->id;
        }
        else{
            return "No User logged in";
        }
        
       
    }
    /**
     * Retrieves the user's information.
     */

    /**
     * Retrieves the completed subtopics for the user and displays them.
     *
     * @param int $uid The user ID
     */
    
    public function mainMenu($uid){

        $question = Question::create("Main Menu")
        ->callbackId('create_question')
        ->addButtons([
            Button::create("Overall Progress")->value("op"),
            Button::create("Detailed Course Progress")->value("dcp"),
            Button::create("Detailed Chapter Progress")->value("dchp"),
            Button::create("Ongoing Course")->value("oc"),
        ]);
        $this->ask($question, function (Answer $answer) use ($uid){
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                if($selectedValue === "op"){
                    $this->overallProgress($uid);
                }elseif($selectedValue === "dcp"){
                    $this->completedCourse($uid);
                }elseif($selectedValue === "dchp"){
                    $this->completedChapter($uid);
                }elseif($selectedValue === "oc"){
                    $this->ongoingMenu($uid);
                }
                
            }
        });
    }

    public function overallProgress($uid){

        $courseCon = new CourseConversation; 
        $courIds = $courseCon->getUserCourseIds($uid);
        $chapIds = $courseCon->getUserChapterIds($uid);
        $subIds = $courseCon->getUserSubtopicIds($uid);

        if(empty($courIds) || $courIds === "norecord")
            $courIds = array();
        if(empty($chapIds) || $chapIds === "norecord")
            $chapIds = array();
        if(empty($subIds) || $subIds === "norecord")
            $subIds = array();

        $message = '****************************************<br>';
        $message .= "Total Completed Courses :- ". count($courIds) .'<br><br>';
        $message .= '-------------------------------------- <br>';
        $message .= '-------------------------------------- <br><br>';
        $message .= "Total Completed Chapters :- ". count($chapIds) .'<br><br>';
        $message .= '-------------------------------------- <br>';
        $message .= '-------------------------------------- <br><br>';
        $message .= "Total Completed Subtopics :- ". count($subIds) .'<br><br>';
        $message .= '<br>****************************************<br>';

        return $this->say($message);


    }

    public function completedCourse($uid){
        $chapNames = array();
        $courseCon = new CourseConversation; 
        $courIds = $courseCon->getUserCourseIds($uid);

        // $chap = uprog::where("uid",$uid)->first();
        // $this->say($chap->chapterIDs);


        if(empty($courIds)){

            return $this->say("No Course Completed");

        }else if($courIds === "norecord"){

            return $this->say("No Course Completed");

        }else{
            foreach ($courIds as $value) {
                $cn = Course::where("id",$value)->first();
                $tt = Button::create($cn->courseName)->value($value);
                array_push($chapNames,$tt);
            }


            $question = Question::create("Course Completed :- " . count($courIds))
            ->callbackId('create_question')
            ->addButtons($chapNames);
            $this->ask($question, function (Answer $answer) use ($uid){
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    $this->completedChapter($uid,$selectedValue);
                }
            });
        }

    }
    
    public function completedChapter($uid,$courseId=0){

        if($courseId){

            $chapBtn = array();
            $chapIds = Chapter::where("courseID",$courseId)->get();

            foreach ($chapIds as $value) {
                $tt = Button::create($value->chapterName)->value($value->id);
                array_push($chapBtn,$tt);
            }
            $question = Question::create("Chapters Completed :- " . count($chapIds))
            ->callbackId('create_question')
            ->addButtons($chapBtn);
            $this->ask($question, function (Answer $answer){
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    $this->completedSubtopics($selectedValue);
                }
            });


        }else{
            $chapNames = array();
            $courseCon = new CourseConversation; 
            $chapIds = $courseCon->getUserChapterIds($uid);
            if(empty($chapIds)){

                return $this->say("No Chapters Completed");

            }else if($chapIds === "norecord"){

                return $this->say("No Chapters Completed");

            }else{
                foreach ($chapIds as $value) {
                    $cn = Chapter::where("id",$value)->first();
                    $tt = Button::create($cn->chapterName)->value($value);
                    array_push($chapNames,$tt);
                }


                $question = Question::create("Chapters Completed :- " . count($chapIds))
                ->callbackId('create_question')
                ->addButtons($chapNames);
                $this->ask($question, function (Answer $answer){
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedValue = $answer->getValue(); 
                        $this->completedSubtopics($selectedValue);
                    }
                });
            }
        }
    }
    
    
    
    public function completedSubtopics($chapterId)
    {
        $subIds = Subtopic::where("chapterID",$chapterId)->get(); 

        $message = '-------------------------------------- <br>';
        $message .= "Completed subtopics :- ". count($subIds) .'<br><br>';
        if($subIds){
            foreach($subIds as $value){
                $message .= $value->subtopicName.'<br>';
            }
        }
        $message .= '-------------------------------------- <br>';
        return $this->say($message);

    }

    public function ongoingMenu($uid){
        $question = Question::create("Ongoing Course Menu")
        ->callbackId('create_question')
        ->addButtons([
            Button::create("Chapter Based")->value("cb"),
            Button::create("Subtopic Based")->value("sb"),
        ]);
        $this->ask($question, function (Answer $answer) use ($uid){
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                if($selectedValue === "cb"){
                    $this->ongoingCoursesChapterBased($uid);
                }elseif($selectedValue === "sb"){
                    $this->ongoingCoursesSubtopicBased($uid);
                }
                
            }
        });
    }

    public function ongoingCoursesChapterBased($uid)
    {
        $courseCon = new CourseConversation;

        //getting user completed data
        $courIds = $courseCon->getUserCourseIds($uid);
        $chapIds = $courseCon->getUserChapterIds($uid);
        $subIds = $courseCon->getUserSubtopicIds($uid);

        if(empty($courIds) || $courIds === "norecord")
            $courIds = array();
        if(empty($chapIds) || $chapIds === "norecord")
            $chapIds = array();
        if(empty($subIds) || $subIds === "norecord")
            $subIds = array();

        

        //chapIds should not be empty
        if(!empty($chapIds)){
            $coursetemp = array();
            foreach($chapIds as $chp){
                $crid = Chapter::where("id",$chp)->first();
                array_push($coursetemp,$crid->courseID);
            }
            $coursetemp = array_unique($coursetemp);

            if(empty($courIds)){
                // return $this->say("Ongoing Courses:- ". implode(",",$coursetemp));
                $this->displayOnGoingCourse($uid,$coursetemp);
            }else{
                //compare 2 array and find the differnece
                $ongCou = array_diff($courIds,$coursetemp);
                $this->displayOnGoingCourse($uid,$ongCou);
            }
        }else{
            return $this->say("No chapter Completed");
        }
        
        
    }

    public function displayOnGoingCourse($uid,$ogCrs){

        if(empty($ogCrs)){
            return $this->say("No Ongoing Courses ");
        }else{
            $couNames = array();
            foreach ($ogCrs as $value) {
                $cr = Course::where("id",$value)->first();
                $tt = Button::create($cr->courseName)->value($value);
                array_push($couNames,$tt);
            }


            $question = Question::create("Total Ongoing Courses :- " . count($ogCrs))
            ->callbackId('ongoinCourse_question')
            ->addButtons($couNames);

            $this->ask($question, function (Answer $answer) use ($uid){
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    $this->displayOnGoingChapter($uid,$selectedValue);
                }
            });

        }
    }

    public function displayOnGoingChapter($uid,$courseId){


        $courseCon = new CourseConversation;

        //user completed chapters
        $userChapIds = $courseCon->getUserChapterIds($uid);

        //Chapters belongs to given course
        $courseChapters = Chapter::where("courseID",$courseId)->get();

        $chapIds = array();
        
        //store ids of chapters from course
        foreach($courseChapters as $c){
            array_push($chapIds,$c->id);
        }

        //if user has not completed any chapters
        if(empty($userChapIds) || $userChapIds === "norecord"){
            return $this->say("No chapters Completed");
        }
            
        $cmpChap = array_intersect($chapIds,$userChapIds);

        if(empty($cmpChap)){
            return $this->say("No Chapters Completed From Selected Course");

        }else{

            $question = Question::create("Chapters Completed :- " . count($cmpChap))
            ->callbackId('create_question');

            foreach($cmpChap as $value){
                $tempChap = Chapter::where("id",$value)->first();
                $question->addButtons([
                    Button::create($tempChap->chapterName)->value($value),
                ]);
            } 

            $this->ask($question, function (Answer $answer){
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    $this->completedSubtopics($selectedValue);
                }
            });
        }
        
    }

    public function ongoingCoursesSubtopicBased($uid){
        $courseCon = new CourseConversation;

        //getting user completed data
        $courIds = $courseCon->getUserCourseIds($uid);
        $chapIds = $courseCon->getUserChapterIds($uid);
        $subIds = $courseCon->getUserSubtopicIds($uid);

        if(empty($courIds) || $courIds === "norecord")
            $courIds = array();
        if(empty($chapIds) || $chapIds === "norecord")
            $chapIds = array();
        if(empty($subIds) || $subIds === "norecord")
            $subIds = array();

        

        //chapIds should not be empty
        if(!empty($subIds)){
            $chaptemp = array();
            foreach($subIds as $sbs){
                $sbid = Subtopic::where("id",$sbs)->first();
                array_push($chaptemp,$sbid->chapterID);
            }

            $unChapters = array_unique($chaptemp);

            // $this->say("Chapters :- " . implode(",",$unChapters));

            if(empty($chapIds)){
                $crtemp = array();
                foreach($unChapters as $val){
                    $crid = Chapter::where("id",$val)->first();
                    array_push($crtemp,$crid->courseID);
                }
                $crtemp = array_unique($crtemp);
                $this->displayOnGoingCourse($uid,$crtemp);
            }
            else{
                //compare 2 array and find the differnece
                $ongCou = array_diff($unChapters,$chapIds);
                $crtemp = array();
                foreach($ongCou as $val){
                    $crid = Chapter::where("id",$val)->first();
                    array_push($crtemp,$crid->courseID);
                }
                $crtemp = array_unique($crtemp);
                
                // return $this->say("Course " . implode(",",$crtemp));
                $this->displayOnGoingCourse($uid,$crtemp);
            }
        }else{
            return $this->say("No subtopic Completed");
        }
        
    }
}
