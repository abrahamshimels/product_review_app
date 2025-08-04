<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeminiController extends Controller
{
    public function generateReview(Request $request)
    {
        $apiKey = env('GEMINI_API_KEY'); // define this in your .env
        $productDescription = $request->input('product_description', 'This is a cool product');

        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => "Write a review for: " . $productDescription]
                    ]
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(['error' => curl_error($ch)], 500);
        }

        curl_close($ch);

        $responseData = json_decode($result, true);

        // Extract the response text
        $text = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'No response.';

        return response()->json(['review' => $text]);
    }
}
