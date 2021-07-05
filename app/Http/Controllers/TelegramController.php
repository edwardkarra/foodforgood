<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelegramRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function receiver(TelegramRequest $request)
    {
        $chat_id = $request->chat_id;
        $name = $request->first_name;
        $message = $request->message_text;
        if($message == '/start')
        {
            $this->sendMessage($chat_id,"Hello $name,");
            $this->sendMessage($chat_id,'Welcome to BigBang Food Bot!');
            $this->sendMessage($chat_id,"we will notify you when it's time to order launch!");
        }
    }
    public function sendMessage($chat_id,$message)
    {
        $token = config('telegram.TELEGRAM_TOKEN');
        $path = 'https://api.telegram.org/bot'.$token;
        Http::get($path.'/sendMessage',[
            'chat_id' => $chat_id,
            'text' => $message
        ]);
    }
}
