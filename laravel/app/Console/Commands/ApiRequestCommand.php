<?php

namespace App\Console\Commands;

use App\Models\Joke;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ApiRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запрос для заполнения базы новыми записями в БД';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');

        if ($response->successful()) {
            $data = $response->json();

            Joke::query()->updateOrCreate(
                ['origin' => $data['id']],
                [
                    'setup' => $data['setup'],
                    'punchline' => $data['punchline'],
                    'type' => $data['type'],
                ]
            );
        } else {
            info('Ошибка запроса: ' . $response->status());
        }
    }
}
