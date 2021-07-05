<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelegramRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function receiver(TelegramRequest $request)
    {
        Http::get('https://api.telegram.org/bot'.env('TELEGRAM_TOKEN').'/sendMessage',[
            'chat_id' => 123,
            'text' => 'hello!'
        ]);
    }
}
