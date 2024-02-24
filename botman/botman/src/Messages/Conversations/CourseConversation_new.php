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
use App\Models\User;
use App\Models\Question as setQuest;
use App\Models\Userprogress as uprog;
use Illuminate\Support\Facades\Http;
use stdClass;

class CourseConversation_new extends Conversation
{   

    public $selectedChapter ;
    public $selectedCourse;
    
    public $curr_user;
    public $curr_username;
    public $curr_userclass;



    

    //  DB::select("select * from mdl_course");
   
    // got the data from db and printed 
    public function run()
    {
        
        $this->getUserData();
        // $this->courseSelect("6");
        // $this->say("". $this->getUserID());
        // $xx = $this->updateUserSubtopic(2,2);
        // $this->say("".$xx);
        // $this->getUserSubtopicIds(2);
        

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
        // );

        // if($userData)
        //     print_r($userData);
        $user = DB::table('users')->where('uid','=',2022005332)->first();
        $this->say("User ID : " . $user->uid);
        $this->courseSelect($user->class);
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

    public function verifyUser($userdata){
       
        $moodleData =Http::post("http://localhost/moodle/webservice/rest/server.php?wstoken=628ca07c975e4a8a031faae4664b0cee&wsfunction=core_user_get_users&moodlewsrestformat=json&criteria[0][key]=username&criteria[0][value]=". $userdata->name)->json();
        
        if(!empty($moodleData["users"])){
            $m_username = $moodleData["users"][0]["username"];
            $m_fullname = $moodleData["users"][0]["firstname"] ." ". $moodleData["users"][0]["lastname"];
            $this->say("Welcome " . $m_fullname ." . Lets get started");
            $this->curr_username = $m_username;
            $this->curr_userclass = $userdata->class;

            $userExist = User::where('uid',$m_username)->first();

            if($userExist){
                $this->courseSelect($userdata->class);
            }else{
                $user = new User;
                $user->uid = $m_username;
                $user->name = $m_fullname;
                $user->class = $userdata->class;
                $user->save();
                $this->courseSelect($userdata->class);
            }

        }else{
            $this->say("Sorry, Not Verified");
        }

    }

    public function getUserData(){

        $userData= new stdClass;
        $this->ask("Enter your moodle username",function(Answer $answer)use ($userData){
            $userData->name = $answer->getText();
            $this->ask("Enter your class/standard Number",function(Answer $answer)use ($userData){
                $userData->class = $answer->getText();
                $this->verifyUser($userData);
            });
        });

        
    }


    public function courseSelect($class){

        $course = DB::table('courses')->where('classID','=',$class."")->get();

        $question = Question::create("Select your Course")->callbackId('course_select');
        
        foreach($course as $c){
           $question->addButtons([
                Button::create($c->courseName)->value($c->id)
           ]);
        }

        $this->ask($question, function (Answer $answer){
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedCourse = $answer->getValue();
                        // $this->say("Selected Course : " . $selectedCourse); 
                        $this->selectedCourse = $selectedCourse;//storing the course id globally
                        $this->chapterSelect($selectedCourse);
                    }
                });

    }

    public function chapterSelect($course){

        $chapters = DB::table('chapters')->where('courseID','=',$course)->get();
        
        $question = Question::create("Select your Chapter")->callbackId('chapter_select');
        
        foreach($chapters as $chp){
            $question->addButtons([
                 Button::create($chp->chapterName)->value($chp->id)
            ]);
         }        

        $this->ask($question, function (Answer $answer) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedChapter = $answer->getValue();
                        // $this->say("Selected Chapter : " . $selectedChapter); 

                        $this->selectedChapter = $selectedChapter;//storing the chapter id globally
                        $this->subtopicSelect($selectedChapter);
                    }
                });

    }

    public function subtopicSelect($chapter){

        $subtopics = DB::table('subtopics')->where('chapterID','=',$chapter)->get();
        
        $question = Question::create("Select your Subtopic")->callbackId('subtopic_select');
        
        foreach($subtopics as $sbt){
            $question->addButtons([
                 Button::create($sbt->subtopicName)->value($sbt->id)
            ]);
         }        

        $this->ask($question, function (Answer $answer) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedTopic = $answer->getValue();
                        $this->getQuestion(1,$selectedTopic);
                    }
                });

    }
    public function getQuestCount($subtopic){
        $quest_count = setQuest::where('subtopicID',$subtopic)->count();
        return $quest_count;
    }

    public function getUserCourseIds($uid){
        $cour = DB::table('userprogress')->where("uid","=",$uid)->first();

        if(empty($cour)){
            return "norecord";

        }else{
            if(strlen($cour->courseIDs) > 0){
                $courses = explode(",",$cour->courseIDs);
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
        $chap = uprog::where("uid",$uid)->first();

        if(empty($chap)){
            return "norecord";

        }else{
            if(strlen($chap->chapterIDs) > 0){
                $chapters = explode(",",$chap->chapterIDs);
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
        $sub = uprog::where("uid",$uid)->first();

        if(empty($sub)){
            return "norecord";

        }else{
            if(strlen($sub->subtopicIDs) > 0){    
                $subtopics = explode(",",$sub->subtopicIDs);
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
        $data = DB::table('subtopics')->where("chapterID","=",$chapterId)->get();
        $subtopicIds = array();

        if(count($data)<=0){
            return array();
        }   
        
        foreach($data as $sub){
            array_push($subtopicIds,$sub->id); 
        }

        return $subtopicIds;
       
    }

    public function getCourseChapters($courseId){
        $data = DB::table('chapters')->where("courseID","=",$courseId)->get();
        $chapterIds = array();

        if(count($data)<=0){
            return array();
        }   
        
        foreach($data as $chp){
            array_push($chapterIds,$chp->id); 
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
            $course_update = DB::update('update userprogress set courseIDs = ? where uid = ?', [$courseId,$uid]);
            return $this->say("Course Updated" . $course_update);
        }

        $idExist=0;
           
            foreach ($userCourses as $value) {
                if($value === $courseId."")
                    {
                        $idExist=1;
                        break;
                    }

            }

        if($idExist){
            return $this->say("Course Already Completed");
        }else{

            array_push($userCourses,$courseId);

            $new_chapters = implode(",", $userCourses);

            $course_update = DB::update('update userprogress set courseIDs = ? where uid = ?', [$new_chapters,$uid]);


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
            $chapter_update = DB::update('update userprogress set chapterIDs = ? where uid = ?', [$chapterId,$uid]);
            return $this->say("Chapter Updated" . $chapter_update);
        }

        $idExist=0;
            foreach ($userChapters as $value) {
                if($value === $chapterId."")
                    {
                        $idExist=1;
                        break;
                    }

              } 

        if($idExist){
            return $this->say("Chapter Already Completed");
        }else{

            array_push($userChapters,$chapterId);

            $new_chapters = implode(",", $userChapters);

            $chapter_update = DB::update('update userprogress set chapterIDs = ? where uid = ?', [$new_chapters,$uid]);


            return $this->say("Chapter Updated " . $chapter_update);
        }


    }


    public function updateUserSubtopic($uid , $subtopicId){

        $cur_subtopics = $this->getUserSubtopicIds($uid);

        if(empty($cur_subtopics)){//when user's data exist but subtopic is empty
            $topic_update = DB::update('update userprogress set subtopicIDs = ? where uid = ?', [$subtopicId,$uid]);
            return $this->say($topic_update."");


        }elseif($cur_subtopics==="norecord"){//when storing for first time

            $topic_update = DB::insert('insert into userprogress (uid, subtopicIDs) values (?, ?)', [$uid,$subtopicId]);

        }else{//appending the new subtopic to existing
            $idExist=0;
            
            foreach ($cur_subtopics as $value) {
                if($value === $subtopicId."")
                    {
                        $idExist=1;
                        break;
                    }

              }
              

            if($idExist){
                return $this->say("Subtopic Already Completed ");
            }


            array_push($cur_subtopics,$subtopicId);

            $new_subtopics = implode(",", $cur_subtopics);
            
            $topic_update = DB::update('update userprogress set subtopicIDs = ? where uid = ?', [$new_subtopics,$uid]);
            
        }

        if(!$topic_update)
            return $this->say("Erorrrr");

        $this->say($topic_update);
        return 1;


    }

    // task : to create set of question from db available and show in sequence wise
    public function getQuestion($order,$subtopic){

        $quest = DB::table('questions')->where('subtopicID','=',$subtopic)->where('questOrder','=',$order)->first();
        
        if($order > $this->getQuestCount($subtopic)){
            // 13na0tV2wJhW7Jx9-sI4PPdwEvYBAQVfJ
                $yay = "<iframe width='200' src='https://drive.google.com/file/d/13na0tV2wJhW7Jx9-sI4PPdwEvYBAQVfJ/preview'></iframe>";   
                $this->say($yay);
        
            $progress = $this->updateUserSubtopic($this->getUserID(),$subtopic);

            if($progress){
                // $this->say("User progress stored");
                $chapterprog = $this->updateUserChapter($this->getUserID(),$this->selectedChapter);

                if($chapterprog){
                    
                    $chpcomp = "<iframe width='200' src='https://drive.google.com/file/d/1fvIJN1l6gAfl52aIKVp2caS8MTggebzi/preview'></iframe>";   
                    $this->say($chpcomp);
 
                    $courseprog = $this->updateUserCourse($this->getUserID(),$this->selectedCourse);

                    if($courseprog){
                        $coursecomp = "<iframe width='200' src='https://drive.google.com/file/d/1CxQ22sfgbb-MojDX-2aZucDVotMBvcNB/preview'></iframe>";   
                        $this->say($coursecomp);
                        return $this->courseSelect($this->curr_userclass);

                        
                    }

                    return $this->chapterSelect($this->selectedCourse);
                }
            }

            return $this->subtopicSelect($this->selectedChapter);
        }


        if(!$quest)
            return $this->say("Lets move to next Topic..");
            

        if($quest->qtype === "shorttext"){

            $this->ask($quest->quest,function (Answer $answer) use ($order,$subtopic){
                if(strlen($answer->getText())>1)
                    $this->getQuestion($order+1,$subtopic);
                else
                    $this->repeat();
            });
        }
        elseif($quest->qtype === "longtext"){
            $this->ask($quest->quest,function (Answer $answer) use ($order,$subtopic){
                if(strlen($answer)>1)
                    $this->getQuestion($order+1,$subtopic);
                else
                    $this->repeat();
            });
        }
        elseif($quest->qtype === "mcq2"){

            $question = Question::create($quest->quest)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->opt1)->value("1"),
                    Button::create($quest->opt2)->value("2"),
                ]);

                if($quest->imgLink){
                    $iframeurl = "https://drive.google.com/file/d/".$quest->imgLink."/preview";
                    $iframe = "<iframe width='250' src='$iframeurl'></iframe>";   
                    $this->say($iframe);
                }

                if($quest->vidLink){
                    $iframeurl = "https://www.youtube.com/embed/".$quest->vidLink."/iframe";
                    $iframe = "<iframe allow='fullscreen' width='250' src='$iframeurl'></iframe>";   
                    $this->say($iframe); 
                }

                $corr = $quest->correctopt;
            $this->ask($question, function (Answer $answer) use ($order,$subtopic,$corr) {
                        // Detect if button was clicked:
                        if ($answer->isInteractiveMessageReply()) {
                            $selectedValue = $answer->getValue(); 
                            if($selectedValue === $corr){
                                // $this->typesAndWaits(1);
                                $this->getQuestion($order+1,$subtopic);
                            }else{
                                $this->repeat();
                            }
                        }
                    });
        }
        elseif($quest->qtype === "mcq4"){


            $question = Question::create($quest->quest)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->opt1)->value("1"),
                    Button::create($quest->opt2)->value("2"),
                    Button::create($quest->opt3)->value("3"),
                    Button::create($quest->opt4)->value("4"),
                ]);
                
                if($quest->imgLink){
                    $iframeurl = "https://drive.google.com/file/d/".$quest->imgLink."/preview";
                    $iframe = "<iframe width='250' src='$iframeurl'></iframe>";   
                    $this->say($iframe);
                }

                if($quest->vidLink){
                    $iframeurl = "https://www.youtube.com/embed/".$quest->vidLink."/iframe";
                    $iframe = "<iframe allow='fullscreen' width='250' src='$iframeurl'></iframe>";   
                    $this->say($iframe); 
                }
                
                $corr = $quest->correctopt."";
            $this->ask($question, function (Answer $answer) use ($order,$subtopic,$corr) {
                        // Detect if button was clicked:
                        if ($answer->isInteractiveMessageReply()) {
                            $selectedValue = $answer->getValue(); 
                            if($selectedValue === $corr){
                                $this->getQuestion($order+1,$subtopic);
                            }else{
                                $this->say("Opps. Incorrect Answer");
                                $this->repeat();
                            }
                        }
                    });
        }
        elseif($quest->qtype === "chk2"){

            $question = Question::create($quest->quest)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->opt1)->value("1"),
                    Button::create($quest->opt2)->value("2"),
                ]);
                $corr = $quest->correctopt;
            $this->ask($question, function (Answer $answer) use ($order,$subtopic,$corr) {
                        // Detect if button was clicked:
                        // if ($answer->isInteractiveMessageReply()) {
                            $selectedValue = $answer->getText(); 
                            if(strpos($corr,$selectedValue) !== false || strpos($corr,$selectedValue) === 0){
                                // $this->typesAndWaits(1);
                                $this->getQuestion($order+1,$subtopic);
                            }else{
                                $this->repeat();
                            }
                        // }
                    });
        }
        elseif($quest->qtype === "chk4"){

            $question = Question::create($quest->quest)
                ->callbackId('create_question')
                ->addButtons([
                    Button::create($quest->opt1)->value("1"),
                    Button::create($quest->opt2)->value("2"),
                    Button::create($quest->opt3)->value("3"),
                    Button::create($quest->opt4)->value("4"),
                ]);
                $corr = $quest->correctopt;
            $this->ask($question, function (Answer $answer) use ($order,$subtopic,$corr) {
                        // Detect if button was clicked:
                        // if ($answer->isInteractiveMessageReply()) {
                            $selectedValue = $answer->getValue(); 
                            if(strpos($corr,$selectedValue) !== false || strpos($corr,$selectedValue) === 0){
                                // $this->typesAndWaits(1);
                                $this->getQuestion($order+1,$subtopic);
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

        if($curr_quest->qtype === "shorttext"){
            $this->ask($curr_quest->quest,function (Answer $answer){
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
                Button::create('Of course')->value('yes'),
                Button::create('Hell no!')->value('no'),
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
