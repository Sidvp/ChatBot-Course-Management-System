<?php
//    require_once '../vendor/autoload.php';

//    use App\Http\Controllers\BotManController;
//    use BotMan\BotMan\BotMan;
//    use BotMan\BotMan\BotManFactory;
//    use BotMan\BotMan\Drivers\DriverManager;

//        $config = [
        // Your driver-specific configuration
        // "telegram" => [
        //    "token" => "TOKEN"
        // ]
    // ];

    //    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

    //    $botman = BotManFactory::create($config);


    // // $botman->frameEndpoint('/chat.php');

    // // Give the bot something to listen for.

    // $botman = app('botman');
    // $botman->hears('hi', function (BotMan $bot) {
    //     $this->reply('Hello');
    // });

// $botman->fallback(function($bot) {
//     $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
// });

// Start listening
// $botman->listen();

// $botman->hears('what is the time in {city} located in {continent}' , function (BotMan $bot,$city,$continent) {
//     date_default_timezone_set("$continent/$city");
//      $reply = "The time in ".$city." ".$continent." is ".date("h:i:sa");
//    $bot->reply($reply);
// });



//////////////////////////////////////////////////////////////////
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
//                 $this->askName($botman);
//             }else{
//                 $botman->reply("type 'hi' for testing...");
//             }
//         });
//         $botman->listen();
//     }

//     public function askName($botman){
//         $botman->ask("Hello! What is your name?", function(Answer $answer){
//             $name = $answer->getText();
//             $this->say('Nice to meet you ' .$name);
//         });
//     }
// }
 

//////////////////////////////////////////////////////////////////////////////////////////////////

// <?php 
use App\Http\Controllers\BotManController;

// $botman = resolve('botman');
$botman = app('botman');

$botman->hears('hi', function($bot){
    $bot->reply('Hello');
});

$botman->listen();

