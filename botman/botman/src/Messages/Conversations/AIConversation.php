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
class AIConversation extends Conversation
{
      
    public $curr_user;

    public function run()
    {
        $question = Question::create("Bot Menu")
        ->callbackId('create_question')
        ->addButtons([
            Button::create("Start")->value("on"),
            Button::create("Exit")->value("off"),

        ]);
        $this->ask($question, function (Answer $answer){
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                if($selectedValue === "on"){
                    $this->startBotText();
                }else{
                    return $this->say("Thankyou");
                }
                
            }
        });
        
    }

    public function startBotText(){
        $this->ask("🤖: Ask next ?",function(Answer $answer){
            $text = $answer->getText();
            $this->callBot($text);
        });


    }

    public function callBot($text){
        $mybot =Http::post("http://localhost:5005/webhooks/rest/webhook",
        array("sender"=>"Avishkar","message"=> $text)
        )->json();

        if(empty($mybot)){
            $this->say("No Data");
        }else{
            $this->say("🤖:" . $mybot[0]["text"]."");
            $this->startBotText();
        }
    }

}