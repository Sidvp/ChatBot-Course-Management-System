<?php

namespace App\Http\Controllers;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function handle(){
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message){
            if($message == 'hi'){
                $botman->reply('Hello');
            }else{
                $botman->reply('Type "hi"');
            }
        });
        $botman->listen();
    }
}
