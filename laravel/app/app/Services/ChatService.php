<?php

namespace App\Services;

class ChatService
{
    public function chat_gpt($system, $user)
    {
        $api_key = env('CHAT_GPT_KEY');
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );
        $openaiClient = \Tectalic\OpenAi\Manager::build(
            new \GuzzleHttp\Client(),
            new \Tectalic\OpenAi\Authentication($api_key)
        );
        $response = $openaiClient->chatCompletions()->create(
            new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest($data)
        )->toModel();
        return $response->choices[0]->message->content;
    }
}