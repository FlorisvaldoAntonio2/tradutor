<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslatorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;

class TranslatorController extends Controller
{
    public function getText() : View|Factory
    {
        $languages = Http::get('https://api.cognitive.microsofttranslator.com/languages?api-version=3.0&scope=translation')->object();
        $languages = $languages->translation;
        return view('translator.text', compact('languages'));
    }

    public function translateText(TranslatorRequest $request) : JsonResponse {
        try {
            $data = $request->validated();
            $url = env('AZURE_URL') . '/translate?api-version=3.0&from=' . $data['from'] . '&to=' . $data['to'];
            $response = Http::withHeaders([
                'Ocp-Apim-Subscription-Key' => env('AZURE_CLIENT_SECRET'),
                'Ocp-Apim-Subscription-Region' => env('AZURE_REGION'),
                'Content-type' => 'application/json',
                'accept' => 'application/json'
            ])->post($url, [
                [
                    'text' => $data['text']
                ]
            ]);

            return response()->json($response->json());
        } catch (\Exception $e) {
            $message = env('APP_ENV') === 'PRODUCTION' ? 'Erro ao traduzir texto' : $e->getMessage();
            return response()->json([
                'error' => $message
            ]);
        }
    }
}
