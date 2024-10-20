<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TranslatorController extends Controller
{
    public function getText()
    {
        $languages = Http::get('https://api.cognitive.microsofttranslator.com/languages?api-version=3.0&scope=translation')->object();
        $languages = $languages->translation;
        return view('translator.text', compact('languages'));
    }
}
