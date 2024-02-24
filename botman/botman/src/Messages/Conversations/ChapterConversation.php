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
use App\Models\UserProgress as uprog;
use Barryvdh\Debugbar\Facades\Debugbar as DebugBar;
use BotMan\BotMan\Messages\Attachments\Video;
use Illuminate\Support\Facades\Http;
use stdClass;

class ChapterConversation extends Conversation
{   

    public $selectedChapterID;
    public $courseName;

    public $subtopics;
    public $selectedCourseID;
    public $selectedSubtopicID;
    public $chapterName;
    public $subtopicName;
    public $subtopicVideoLink;
    
    public $curr_user;

    public $option_1;
    public $option_2;
    public $option_3;
    public $option_4;
    //  DB::select("select * from mdl_course");
   
    // got the data from db and printed 
    public function run()
    {
        // $this->getQuestion($order_count);

        // $this->getUser();
        $courseID = session('courseID');
        // return $this->say($courseID);
        return $this->chapterSelect($courseID);

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


        ////////////////////////////////////////////////////////////////////////////
        $user = DB::table('students')->where('uid','=',2022005332)->first();
        $this->say("Hi " . $user->name . " (User ID:". $user->uid .")...");
        $this->say("Welcome to CARES!!");
        $this->courseSelect($user->class);
    }

    public function getUserID(){
        $user = DB::table('students')->where('uid','=',2022005332)->first();
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

    public function getQuestion($order, $subtopicID){

        // $this->say("Updated check "  . $subtopicID);

        $quest = DB::table('questions')->where('subtopic_id','=',$subtopicID)->where('question_order','=',$order)->first();
        

       
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
            $corr = $quest->correct_option."";
           
            $this->option_1 = $quest->option_1;
            $this->option_2 = $quest->option_2;
            $this->option_3 = $quest->option_3;
            $this->option_4 = $quest->option_4;

            $this->ask($question, function (Answer $answer) use ($order,$subtopicID,$corr) {
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); 
                    if($selectedValue === $corr){
                        
                        if($selectedValue === "1"){
                            $this->say($this->option_1);
                        }elseif($selectedValue === "2"){
                            $this->say($this->option_2);
                        }elseif($selectedValue === "3"){
                            $this->say($this->option_3);
                        }elseif($selectedValue === "4"){
                            $this->say($this->option_4);
                        }
                        $this->say('Correct Answer ✅');

                        $order = $order + 1;
                        if($order > $this->getQuestCount($subtopicID)){
                            $this->say("Subtopic is Completed Successfully 👏👏");
                            $this->say("Lets move to next Subtopic..😃");


                            $this->subtopicSelect($this->selectedChapterID);

                            //////////////

                            
                            ////////////////////

                            // $question1 = Question::create('Lets move to next Subtopic/Chapter..😃')
                            //         ->callbackId('next')
                            //         ->addButtons([
                            //             Button::create('Next Subtopic')->value("subtopic"),
                            //             Button::create('New Chapter')->value("chapter"),
                            //         ]);
                                    
                            //     $this->ask($question1, function (Answer $answer) {
                            //         // Detect if button was clicked:
                            //         if ($answer->isInteractiveMessageReply()) {
                            //             $selectedValue = $answer->getValue(); 
                            //             if($selectedValue === 'nextSubtopic'){
                            //                 $this->typesAndWaits(1);
                            //                 $this->subtopicSelect($this->selectedChapterID);
                            //                 }else{
                            //                     $this->chapterSelect($this->selectedCourseID);
                            //                 }
                            //             }
                            //         });
                                            
            

                            ///////////////

                            // record progress
                            // $progress = $this->updateUserSubtopic($this->getUserID(),$subtopicID);
                            // $topic_update = DB::insert('insert into user_progress (uid, subtopicIDs) values (?, ?)', [$this->getUserID(),$subtopicID]);

                            
                            // go to select subtopic
                            // $this->updateSubtopicID($this->selectedChapterID, $subtopicID);
                            
                           
                        }else{
                            $this->getQuestion($order,$subtopicID);
                        }
                        
                    }else{
                        $this->say("Its Incorrect Answer.. ❌");
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
                ->callbackId('create_question');

                ////////////
                // if($quest->imgLink == '1'){
                //     $iframeurl = "https://drive.google.com/file/d/".$quest->imgLink."/preview";
                //     $iframe = "<iframe width='250' src='$iframeurl'></iframe>";   
                //     $this->say($iframe);
                // }
                ////////////
                $question->addButtons([
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


    public function updateUserSubtopic($uid , $subtopicId){

        $cur_subtopics = $this->getUserSubtopicIds($uid);

        if(empty($cur_subtopics)){//when user's data exist but subtopic is empty
            $topic_update = DB::update('update user_progress set subtopicIDs = ? where uid = ?', [$subtopicId,$uid]);
            return $this->say($topic_update."");


        }elseif($cur_subtopics==="norecord"){//when storing for first time

            $topic_update = DB::insert('insert into user_progress (uid, subtopicIDs) values (?, ?)', [$uid,$subtopicId]);

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
            
            $topic_update = DB::update('update user_progress set subtopicIDs = ? where uid = ?', [$new_subtopics,$uid]);
            
        }

        if(!$topic_update)
            return $this->say("Erorrrr");

        $this->say($topic_update);
        return 1;


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








}


