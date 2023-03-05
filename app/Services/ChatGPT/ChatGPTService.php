<?php

namespace App\Services\ChatGPT;

use GuzzleHttp\Client;

class ChatGPTService
{
    /**
     * Summary of chat
     * @param string $content
     * @return string
     */
    public function chat(string $content): string
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ],
            'json' => [
                'model' => env('OPENAI_MODEL'),
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $content,
                    ],
                ],
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['choices'][0]['message']['content'];
    }
}
