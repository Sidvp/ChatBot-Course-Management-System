<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;


Route::view('/botman/chat', 'botman-web::chat');


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);