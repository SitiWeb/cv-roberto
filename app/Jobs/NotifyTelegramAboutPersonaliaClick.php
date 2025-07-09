<?php

namespace App\Jobs;

use App\Models\Personalia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class NotifyTelegramAboutPersonaliaClick implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $personalia;

    protected $ip;

    protected $userAgent;

    public function __construct(Personalia $personalia, $ip, $userAgent)
    {
        $this->personalia = $personalia;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
    }

    public function handle()
    {
        $message = <<<TEXT
👤 *Persoonlijke gegevens bekeken*

Naam: {$this->personalia->value}
IP: {$this->ip}
User Agent: `{$this->userAgent}`

📅 Tijdstip: *{$this->personalia->updated_at->format('d-m-Y H:i')}*
TEXT;

        Http::post('https://api.telegram.org/bot'.config('services.telegram.bot_token').'/sendMessage', [
            'chat_id' => config('services.telegram.chat_id'),
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);
    }
}
