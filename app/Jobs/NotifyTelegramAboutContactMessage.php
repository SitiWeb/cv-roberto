<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class NotifyTelegramAboutContactMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $name;

    protected string $message;

    protected string $ip;

    protected string $userAgent;

    protected string $email;

    protected string $phone;

    public function __construct(string $name, string $message, string $ip, string $userAgent, ?string $email = null, ?string $phone = null)
    {
        $this->name = $name;
        $this->message = $message;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function handle()
    {
        $email = $this->email ?? '–';
        $phone = $this->phone ?? '–';

        $text = <<<TEXT
📩 *Nieuw contactbericht ontvangen*

👤 Naam: *{$this->name}*

💬 Bericht:
{$this->message}
📧 Email: {$email}
📱 Telefoon: {$phone}
🌐 IP: {$this->ip}
🧭 User Agent: `{$this->userAgent}`

🕒 Tijdstip: *{now()->format('d-m-Y H:i')}*
TEXT;

        Http::post('https://api.telegram.org/bot'.config('services.telegram.bot_token').'/sendMessage', [
            'chat_id' => config('services.telegram.chat_id'),
            'text' => $text,
            'parse_mode' => 'Markdown',
        ]);
    }
}
