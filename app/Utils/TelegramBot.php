<?php

namespace App\Utils;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class TelegramBot
{
    public readonly string $username;
    public readonly string $botAccessToken;

    public string $chatId;

    public PendingRequest $http;

    public function __construct()
    {
        $this->username = env('TELEGRAM_BOT_USERNAME');
        $this->botAccessToken = env('TELEGRAM_BOT_ACCESSTOKEN');
        $this->chatId = env('TELEGRAM_BOT_CHAT_ID');

        $this->http = Http::baseUrl("https://api.telegram.org/bot{$this->botAccessToken}");
    }

    public function sendMessage($message)
    {

        if (filled($this->botAccessToken) && filled($this->chatId)) {
            $response = $this->http
                ->get('sendMessage', [
                    'chat_id' => $this->chatId,
                    'text' => $message,
                    'parse_mode' => 'HTML'
                ]);


            return $response;
        }
    }
}
