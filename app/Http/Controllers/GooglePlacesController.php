<?php
/*---============== SANTHOSH =============---*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GooglePlacesController extends Controller
{
    public function getBusinessInfo(Request $request)
    {
        $apiKey = env('GOOGLE_PLACES_API_KEY');
        $placeId = $request->query('place_id'); // Get place_id from query parameter

        if (!$placeId) {
            return response()->json(['error' => 'place_id is required'], 400);
        }

        $detailsUrl = "https://maps.googleapis.com/maps/api/place/details/json?placeid={$placeId}&key={$apiKey}";
        $response = Http::get($detailsUrl);
        return response()->json($response->json());
    }

    public function getPlaceId(Request $request)
    {
        $request->validate([
          'website' => ['required', 'regex:/^((https?:\/\/)?([\w-]+\.)+[\w-]{2,})$/'],
        ]);

        $apiKey = env('GOOGLE_PLACES_API_KEY');
        $website = urlencode($request->input('website'));

        $searchUrl = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input={$website}&inputtype=textquery&fields=place_id&key={$apiKey}";

        $response = Http::get($searchUrl);
        return response()->json($response->json());
    }
}
/*---============== SANTHOSH =============---*/