<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(Request $request, ChatService $chat)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $resopnse = $chat->chat_gpt("日本語で応答してください", $request->input('text'));
        return $resopnse;
    }
}
