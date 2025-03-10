<?php
/*---============== SANTHOSH =============---*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Business;

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

    $data = $response->json();

    // Extract the place_id if it exists
    if (isset($data['candidates'][0]['place_id'])) {
      $placeId = $data['candidates'][0]['place_id'];
      $detailsUrl = "https://maps.googleapis.com/maps/api/place/details/json?placeid={$placeId}&key={$apiKey}";
      $response = Http::get($detailsUrl);
      // return response()->json($response->json());


      $json = response()->json($response->json()); // Replace with actual JSON string
      $data = json_decode($json, true);

      $result = $data['result'] ?? [];

      $fields = [
          'name' => $result['name'] ?? null,
          'website' => $result['website'] ?? null,
          'international_phone_number' => $result['international_phone_number'] ?? null,
          'formatted_address' => $result['formatted_address'] ?? null,
          'country' => null,
          'administrative_area_level_1' => null,
          'administrative_area_level_3' => null,
          'business_category_id' => null,
      ];

      foreach ($result['address_components'] ?? [] as $component) {
          if (in_array('country', $component['types'])) {
              $fields['country'] = $component['long_name'];
          }
          if (in_array('administrative_area_level_1', $component['types'])) {
              $fields['administrative_area_level_1'] = $component['long_name'];
          }
          if (in_array('administrative_area_level_3', $component['types'])) {
              $fields['administrative_area_level_3'] = $component['long_name'];
          }
      }

      // return response()->json($fields);

      // Convert array to a Request object
      $request = new Request($fields);

      // Call store function
      $this->store($request);


    } else {
      return response()->json(['error' => 'place_id is required'], 400);
    }
  }

  public function store(Request $request)
  {
      $place = new Business();
      $business = $place->savePlaceDetails($request->all());

      return response()->json([
          'message' => 'Business saved successfully!',
          'business' => $business
      ], 201);
  }

}
/*---============== SANTHOSH =============---*/