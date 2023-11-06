<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class Externals extends Controller
{

    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json(['error' => 'Unable to fetch data'], $response->status());
        }
    }
}
