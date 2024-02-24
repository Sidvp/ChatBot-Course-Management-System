<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
//use Illuminate\View\View;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Conversations\MyProgressConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Conversations\CourseConversation;
use BotMan\BotMan\Messages\Conversations\TempConversation;
use BotMan\BotMan\Messages\Conversations\ChapterConversation;
use BotMan\BotMan\Messages\Conversations\MainMenuConversation;

class BotManController extends Controller
{
    public function handle(){
     
        $botman = app('botman');

        // $botman->hears('(Hi|Hello)', BotManController::class.'@StartConversation');

        // $botman->says('Please type "Hi" or "Hello" to continue...' );
        $botman->hears('{message}', function ($bot,$message) {
            if($message == 'Hi'|| $message == 'hi' || $message == 'Hello' || $message == 'hello' || $message == 'hey'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new TempConversation);
                // $bot->reply("Type learn to start with course");
                // $this->askName($bot);
            }else if($message == '/menu'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new MainMenuConversation);
            }else if($message == 'progress'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new MyProgressConversation);
            }else if($message == 'chapters'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new ChapterConversation);
            }
            else{
                $bot->typesAndWaits(2);
                // $bot->reply("Please type 'hi' or 'hello' for testing");
            }
        // })->stopsConversation();
        });

        $botman->hears('stop', function(BotMan $bot) {
            $bot->reply('stopped');
        })->stopsConversation();

        $botman->hears('pause', function(BotMan $bot) {
            $bot->reply('stopped');
        })->skipsConversation();

        $botman->fallback(function($bot) {
            $bot->reply("Sorry, I did not understand these commands. Please type 'hi' or 'hello' to begin the conversation ...");
        });
        

        $botman->listen();  
    }
    
    public function handle1(){
        
        require "vendor/autoload.php";

        $configs = [
            "telegram" => [
                "token" => "6388092748:AAEWO-l9Bs5mUJR9ZfcrgDiQu-9FYQWL_e8"    
            ]
        ];
        
        DriverManager::loadDriver(TelegramDriver::class);
        
        $botman = BotManFactory::create($configs);
     
        // $botman = app('botman');

        // $botman->hears('(Hi|Hello)', BotManController::class.'@StartConversation');


        $botman->hears('{message}', function ($bot,$message) {
            if($message == 'hi'|| $message == 'hello' || $message == 'hey'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new TempConversation);
                // $bot->reply("Type learn to start with course");
                // $this->askName($bot);
            }else if($message == 'progress'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new MyProgressConversation);
            }else if($message == 'chapters'){
                $bot->typesAndWaits(1);
                $bot->startConversation(new ChapterConversation);
            }
            else{
                $bot->typesAndWaits(2);
                $bot->reply("Please type 'hi' or 'hello' for testing");
            }
        });

        $botman->listen();  
    }
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////
// <?php

// namespace App\Http\Controllers;
// use BotMan\BotMan\BotMan;
// use BotMan\BotMan\Messages\Incoming\Answer;

// use Illuminate\Http\Request;

// class BotManController extends Controller
// {
//     public function handle(){
//         $botman = app('botman');

//         $botman->hears('{message}', function($botman, $message){
//             if($message == 'hi'){
//                 $botman->reply('Hello');
//             }else{
//                 $botman->reply('Type "hi"');
//             }
//         });
//         $botman->listen();
//     }
// }
