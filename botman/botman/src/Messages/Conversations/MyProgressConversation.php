<?php

namespace BotMan\BotMan\Messages\Conversations;
use Illuminate\Support\Facades\DB;

class MyProgressConversation extends Conversation
{
    public function run()
    {
        $this->getUser();
    }

    public function getUser(){

        $user = DB::table('students')->where('uid','=',123)->first();
        // $this->say("User ID : " . $user->uid);
        $this->say("Hello user ".$user->uid.", This is your Report :-");
        $this->completedSubtopics($user->uid);
    }

    public function getSubtopicIds($uid){
        $sub = DB::table('user_progress')->where("uid","=",$uid)->first();

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
                return null;
            }
        }
         
        return $subtopics;
    }

    public function completedSubtopics($uid){
        // $this->say($uid);
        $subtopics = $this->getSubtopicIds($uid);  //123 instead of 1 in db table
        if($subtopics){
            $query = DB::table('subtopics');
            $message = '-------------------------------------- <br>';
            $message .="Completed subtopics :- ". '<br>';
            foreach($subtopics as $sub){     
                $query->orWhere('subtopic_id', '=', $sub);        
            }
            $result = $query->get();
            foreach($result as $sub){
                $message .= 'ID : ' . $sub->subtopic_id . '<br>';
                $message .= 'Name : ' . $sub->subtopic_name . '<br>';
            }
            $message .= '---------------------------------------';
            $this->say($message);
        }

            // $query = DB::table('subtopics');
            // foreach($subtopics as $sub){
            //     $query->orWhere('id', '=', $sub);
            // }
            // $result = $query->get();
            // foreach($result as $sub){
            //     $this->say($sub->subtopicName);
            // }
            
        
    }
}
