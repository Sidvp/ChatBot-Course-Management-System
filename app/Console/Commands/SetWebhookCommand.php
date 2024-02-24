<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Providers\DriverManager;
use App\Console\Commands\Http;
use Illuminate\Support\Facades\Config;

class SetWebhookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:set-webhook {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the telegram webhook to the given URL';

    /**
     * Execute the console command.
     */
    public function handle():void
    {
        $token = config('botman.telegram_token');
        $url = $this->argument('url');
    
        $response = Http::post("https://api.telegram.org/bot$token/setWebhook", compact('url'));
    
        $this->info($response->json('description', 'Unknown error'));
    }
}
