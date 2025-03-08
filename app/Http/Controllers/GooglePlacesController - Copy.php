<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GooglePlacesController extends Controller
{
    public function getBusinessInfo(Request $request)
    {
        $request->validate([
            'place_id' => 'required|string',
        ]);

        // $apiKey = config('services.google.places_api_key');
        $apiKey = env('GOOGLE_PLACES_API_KEY');
        $placeId = $request->input('place_id');
        $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid={$placeId}&key={$apiKey}";

        $response = Http::get($url);
        return response()->json($response->json());
    }
}