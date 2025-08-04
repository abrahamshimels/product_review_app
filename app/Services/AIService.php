<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function generateReviewSummary($productName, $productDescription)
    {
        $prompt = "Write a smart, honest review summary for a product called '$productName'. Description: $productDescription";

        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7,
            'max_tokens' => 150,
        ]);

        return $response->json()['choices'][0]['message']['content'] ?? 'No summary available.';
    }
}
