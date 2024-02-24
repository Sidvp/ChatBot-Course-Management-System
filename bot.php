<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require "vendor/autoload.php";

$configs = [
    "telegram" => [
        "token" => "6388092748:AAEWO-l9Bs5mUJR9ZfcrgDiQu-9FYQWL_e8"
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

$botman->hears("hi", function (BotMan $bot){
  $bot->reply("hello"); 
});

$botman->listen();